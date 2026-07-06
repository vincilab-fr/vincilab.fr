# VinciLab

Plateforme de publication de projets open source pour développeurs. Les utilisateurs soumettent leurs projets, un administrateur les modère, et les projets validés sont visibles publiquement.

---

## Stack technique

| Couche | Technologie |
|---|---|
| Backend | PHP 8.2 (sans framework) |
| Base de données | MySQL |
| Frontend | HTML / CSS / JS vanilla + Bootstrap 5 (pages fonctionnelles) |
| Conteneurisation | Docker (php:8.2-apache) |
| CI/CD | GitHub Actions |
| Serveur web | Apache (mod_rewrite) |

---

## Architecture

Architecture **MVC** avec **Repository Pattern** :

```
public/index.php          ← Front Controller (point d'entrée unique)
    └── router.php        ← Routage des URLs
        └── Controller    ← Logique métier
            └── Repository Interface  ← Contrat d'accès aux données
                └── Repository        ← Requêtes SQL (PDO)
                    └── Vue PHP        ← Affichage
```

Le contrôleur ne connaît que l'interface, pas l'implémentation concrète du repository (injection de dépendances via constructeur).

---

## Fonctionnalités

**Côté utilisateur**
- Inscription / Connexion (mot de passe haché en bcrypt)
- Soumettre un projet (titre, description, lien GitHub, lien démo optionnel)
- Consulter ses projets et leur statut (en attente / approuvé / rejeté)
- Supprimer un de ses projets
- S'inscrire à la newsletter

**Côté public**
- Page d'accueil avec les projets mis à la une
- Page listant tous les projets approuvés

**Backoffice admin** (`/admin`)
- Voir et approuver / rejeter les projets en attente
- Mettre un projet approuvé à la une (affiché en homepage)
- Retirer un projet de la une
- Voir et supprimer des utilisateurs

---

## Sécurité

- Mots de passe : `password_hash()` / `password_verify()` (bcrypt)
- Requêtes SQL : PDO avec requêtes préparées (protection injection SQL)
- Routes admin : guard `requireAdmin()` sur chaque action
- Connexion BDD : Singleton PDO, credentials dans `app/config/config.php` (exclu du dépôt via `.gitignore`)
- Statuts projets : contrainte `ENUM('pending','approved','rejected')` directement en base MySQL

---

## Installation locale (XAMPP)

**Prérequis :** XAMPP avec Apache + MySQL

```bash
# 1. Cloner le dépôt dans htdocs
git clone https://github.com/<user>/vincilab.git C:/xampp/htdocs/vincilab

# 2. Créer la base de données
# Ouvrir phpMyAdmin et exécuter database.sql

# 3. Créer le fichier de configuration
cp app/config/config.example.php app/config/config.php
# Renseigner host, dbname, username, password dans config.php

# 4. Lancer Apache et MySQL depuis le panneau XAMPP
# Accéder à http://localhost/vincilab/public
```

---

## Installation avec Docker

```bash
# 1. Cloner le dépôt
git clone https://github.com/<user>/vincilab.git && cd vincilab

# 2. Renseigner app/config/config.php avec les credentials BDD

# 3. Builder et lancer
docker build -t vincilab .
docker run -d --name vincilab -p 80:80 vincilab

# Accéder à http://localhost
```

Le Dockerfile utilise `php:8.2-apache`, redirige le document root vers `/public` et active `mod_rewrite`.

---

## Pipeline CI/CD (GitHub Actions)

Déclenché sur push et pull request vers `main`.

```
Push → main
    │
    ├── Job CI
    │   ├── npm ci
    │   ├── Lint HTML  (HTMLHint)
    │   ├── Lint JS    (ESLint)
    │   └── Tests      (npm test --if-present)
    │
    └── Job deploy  (uniquement si CI ✓ ET branche = main)
        └── SSH → git pull → docker build → docker run
```

Le déploiement est bloqué si le CI échoue (`needs: ci`).

**Secrets GitHub requis :**
- `SERVER_HOST` — IP ou domaine du serveur
- `SERVER_USER` — utilisateur SSH
- `SSH_PRIVATE_KEY` — clé privée SSH
- `SSH_PASSPHRASE` — passphrase de la clé

---

## Structure du projet

```
vincilab/
├── public/
│   ├── index.php       ← Front Controller
│   └── style.css
├── app/
│   ├── config/
│   │   └── config.php  ← Credentials BDD (ignoré par git)
│   ├── core/
│   │   ├── Controller.php
│   │   └── Database.php  ← Singleton PDO
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── AuthController.php
│   │   ├── ProjetController.php
│   │   └── AdminController.php
│   ├── repositories/
│   │   ├── ProjetRepository.php
│   │   └── AdminRepository.php
│   ├── interfaces/
│   │   ├── ProjetRepositoryInterface.php
│   │   └── AdminRepositoryInterface.php
│   ├── views/
│   │   ├── home.php
│   │   ├── projets.php
│   │   ├── mes-projets.php
│   │   ├── projet-form.php
│   │   ├── login.php
│   │   ├── register.php
│   │   └── admin/
│   │       ├── dashboard.php
│   │       ├── projects.php
│   │       └── users.php
│   └── router.php
├── database.sql          ← Schéma de la base de données
├── Dockerfile
├── .github/
│   └── workflows/
│       └── ci-cd.yml
└── .gitignore
```

---

## Variables d'environnement / Configuration

Créer `app/config/config.php` à partir du modèle `config.example.php` :

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'vincilab');
define('DB_USER', 'root');
define('DB_PASS', '');
```

Ce fichier est exclu du dépôt (`.gitignore`). Ne jamais le committer.
