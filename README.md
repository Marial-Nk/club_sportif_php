# MALANGWA :: Application de gestion des participants 

Cette application permet de gérer les participants à des événements avec :
- une recherche dynamique (autocomplete),
- un formulaire pré-rempli,
- la gestion des dossards par événement.

---

## Fonctionnalités

- Gestion des participants
- Attribution des dossards
- Gestion des catégories

---

## Technologies utilisées

- PHP 7+
- SQLite
- HTML / CSS
- JavaScript

---

## Comment lancer l’application

### 1. Initialiser la base de données

Avant de lancer l’application, il faut **exécuter le script d’initialisation** de la base de données.

Dans un terminal, à la racine du projet :

```bash
php database/init_db.php
```

### 2. Démarrer le serveur PHP local

Toujours à la racine du projet, lancer dans un terminal:

```bash
php -S localhost:8000

```

### 3. Ouvrir l’application dans le navigateur

Dans un navigateur web, accéder à l’adresse suivante :

http://localhost:8000
