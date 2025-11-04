# 🚗 AUTOnomie – Gestionnaire de consommation électrique

## 🧭 Introduction

**AUTOnomie** est une application web conçue pour aider les conducteurs de véhicules électriques à suivre, analyser et optimiser leur consommation énergétique.
Elle permet d’enregistrer les trajets et recharges, puis de visualiser en temps réel la consommation, les coûts énergétiques et l’autonomie du véhicule via une interface claire et ergonomique.

---

## ⚙️ Fonctionnalités

### 🔋 Suivi de la consommation

* Visualisation de la consommation par **trajet** ou par **période** (jour, semaine, mois, année).
* Comparaison de la consommation entre différentes périodes ou trajets.

### 🚗 Analyse des trajets

* Détails complets : date, destination, distance, pourcentage de batterie, autonomie, type de trajet, vitesse moyenne, consommation moyenne et totale, énergie récupérée, durée, etc.
* Analyse statistique selon le type de trajet (urbain, autoroute, mixte).
* Évaluation de l’efficacité énergétique (kWh/100 km).

### 💰 Suivi des coûts

* Estimation du **coût énergétique** par trajet ou période.

### ⚡ Autonomie et batterie

* Suivi de l’autonomie restante.
* Courbe d’évolution de la batterie.
* Alertes en cas de batterie faible ou de consommation anormale.

### 📊 Interface & accessibilité

* Interface optimisée pour **desktop**, avec pages dédiées :

  * **Trajets** : liste, ajout, modification et suppression.
  * **Recharges** : gestion complète des recharges.
  * **Graphiques** : visualisation en temps réel de la consommation et des coûts.

---

## 🏗️ Architecture

### 🧩 Architecture générale

* **Modèle MVC** (Model – View – Controller)
* **Backend** : Laravel 12
* **Base de données** : MySQL
* **Conteneurisation** : Docker (via Laravel Sail)

  * Conteneurs distincts :

    * PHP 8.2+
    * MySQL 8.0
    * Nginx / Apache

### 🎨 Front-End

* Moteur de templates : **Blade**

  * Layouts et composants réutilisables
* Intégration :

  * **HTML5 / SCSS**
  * **TailwindCSS**
  * **JavaScript ES6+** pour les interactions dynamiques

### 🖥️ Back-End

* **Framework Laravel 12**

  * Respect strict du pattern MVC
  * Routes RESTful, contrôleurs dédiés, Eloquent ORM

---

## 🔐 Sécurité et confidentialité

* Données sensibles (actions, destinations, trajets) **chiffrées en base**.
* Sauvegardes via **mysqldump** ou **mysqlpump** pour garantir la résilience des données.
* Conteneurisation Docker assurant un environnement stable, isolé et reproductible.
* Respect des bonnes pratiques Laravel en matière de validation, authentification et gestion des erreurs.

---

## 🛠️ Outils et collaboration

* **GitHub** : gestion de version (branches `main`, `develop`, `feature/*`)
* **Figma** : maquettes et prototypes UI/UX
* **Docker** : uniformisation des environnements de développement et de déploiement


## 💻 Installation

### 🚀 Prérequis

Avant de commencer, assurez-vous d’avoir installé :

* [Docker](https://www.docker.com/)
* [Composer](https://getcomposer.org/)
* [PHP](https://www.php.net/)

---
1. **Cloner le projet**

```bash
git clone https://github.com/tac1DEV/AUTOnomie.git
cd AUTOnomie
```

2. **Installer les dépendances**

```bash
composer install
```

3. **Installer Laravel Sail**

```bash
composer require laravel/sail --dev
cp .env.example .env
php artisan sail:install
```
> Choisir mysql

4. **Lancer les containers Docker**

```bash
./vendor/bin/sail up -d
```

5. **Configurer l’environnement**

```bash
./vendor/bin/sail artisan key:generate
```

> Modifiez `.env` si nécessaire (base de données, ports…).

6. **Exécuter les migrations et seeders**

```bash
./vendor/bin/sail artisan migrate --seed
```

7. **Accéder à l’application**
   Ouvrez votre navigateur :

```
http://localhost:80
```

---

## 📦 Structure du projet

* `/app` : Contient le code principal de l’application
* `/database` : Migrations et seeders
* `/routes` : Définition des routes
* `/resources/views` : Templates Blade

---

## 🔧 Commandes utiles

* Lancer Sail en mode interactif :

```bash
./vendor/bin/sail shell
```

* Arrêter les containers :

```bash
./vendor/bin/sail down
```

* Voir l’état des containers :

```bash
./vendor/bin/sail ps
```

---

## 📝 Licence

Ce projet est sous licence MIT.

---
