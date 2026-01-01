(function () {

    let timeout = null;

    window.showToast = function (message, type = 'success', duration = 3000) {
        const toast = document.getElementById('toast');

        if (!toast) return;

        // Reset précédent timer
        if (timeout) {
            clearTimeout(timeout);
        }

        toast.textContent = message;
        toast.className = `toast ${type}`;

        // Affiche
        toast.classList.remove('hidden');

        // Cache après X ms
        timeout = setTimeout(() => {
            toast.classList.add('hidden');
        }, duration);
    };

})();
