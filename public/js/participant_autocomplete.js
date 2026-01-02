const input = document.getElementById('search-participant');
const dropdown = document.getElementById('search-results');

let timeout = null;

input.addEventListener('input', () => {
    clearTimeout(timeout);
    const query = input.value.trim();

    if (query.length < 2) {
        dropdown.classList.add('hidden');
        return;
    }

    timeout = setTimeout(() => {
        fetch(`search.php?q=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur serveur');
                }
                return response.json();
            })
            .then(data => {
                dropdown.innerHTML = '';

                if (!Array.isArray(data) || data.length === 0) {
                    dropdown.classList.add('hidden');
                    return;
                }

                data.forEach(p => {
                    const li = document.createElement('li');
                    li.textContent = `${p.last_name} ${p.first_name} (${p.club ?? '-'})`;

                    li.addEventListener('click', () => {
                        input.value = `${p.last_name} ${p.first_name}`;
                        dropdown.classList.add('hidden');
                        dropdown.innerHTML = '';
                        remplirFormulaire(p);

                    });

                    dropdown.appendChild(li);
                });

                 dropdown.classList.remove('hidden');
            })
            .catch(err => {
                console.error('Erreur AJAX:', err);
                dropdown.classList.add('hidden');
            });
    }, 300);
});

function setGender(value) {
    if (!value) return;

    const radios = document.querySelectorAll('input[name="gender"]');

    radios.forEach(radio => {
        radio.checked = (radio.value === value);
    });
}

function setPaid(value) {
    const checkbox = document.getElementById('paid');
    if (!checkbox) return;

    checkbox.checked = Number(value) === 1;
}


function remplirFormulaire(p) {
    document.getElementById('participant_id').value = p.id ;
    document.getElementById('dossard').value = p.dossard ?? '';
    document.getElementById('last_name').value = p.last_name ?? '';
    document.getElementById('first_name').value = p.first_name ?? '';
    document.getElementById('birth_date').value = p.birth_date ?? '';
    document.getElementById('club').value = p.club ?? '';
    document.getElementById('nationality').value = p.nationality ?? '';
    document.getElementById('uci_code').value = p.uci_code ?? '';
    document.getElementById('category').value = p.course ?? '';
    document.getElementById('category_id').value = p.course_id ?? '';
    setGender(p.gender);
    setPaid(p.is_paid);
}
