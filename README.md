# Gestionnaire_consommation
Application pour surveiller la consommation de son véhicule électrique

## **Installation Rapide**

### **Prérequis**
- **Docker Desktop** installé et en cours d’exécution
- **Git** installé
- **Composer** et **NPM** installés globalement

---

### **Étapes d’installation**
```bash
# 1. Cloner le projet
git clone https://github.com/tac1DEV/gestionnaire_consommation.git
cd gestionnaire_consommation

# 2. Copier le fichier d'environnement
cp .env.example .env

# 3. Installer les dépendances
composer install
npm install

# 4. Démarrer l'environnement Docker
./vendor/bin/sail up -d

# 5. Configurer l'application
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm run dev
```

**Accès local :**
- Application : [http://localhost](http://localhost)
- Base de données : PostgreSQL sur `localhost:5432`
- Données de test : incluses automatiquement

---

## **Dépannage**

### **Erreurs fréquentes :**
- **Permission denied (Linux/macOS)**  
```bash
chmod +x vendor/bin/sail
./vendor/bin/sail up -d
```
- **Port 80 occupé**  
Modifier dans `.env` :  
```env
APP_PORT=8080
```
Puis redémarrer :  
```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

- **Réinitialisation complète**  
```bash
./vendor/bin/sail down --volumes
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh --seed
```
---

## **Fonctionnalités principales**

### **Suivi de la consommation**
- Affichage en temps réel de la consommation électrique (kWh)
- Visualisation de la consommation par trajet ou par période (jour/semaine/mois)
- Historique des consommations
- Comparaison entre différents trajets ou périodes
- Exportation des données (PDF, CSV)

### **Analyse des trajets**
- Liste des trajets effectués avec date, distance et consommation
- Statistiques par type de trajet (urbain, autoroute, mixte)
- Évaluation de l'efficacité énergétique (kWh/100 km)

### **Coûts**
- Estimation du coût énergétique de chaque trajet

### **Autonomie et état de la batterie**
- Suivi de l’autonomie restante
- Courbe d’évolution de la batterie
- Alertes en cas de batterie faible ou consommation anormale

### **Indicateurs et tableaux de bord**
- Tableau de bord personnalisé avec widgets (consommation moyenne, pic de consommation, etc.)
- Graphiques interactifs (lignes, barres, jauges)

---

## **Commandes utiles**
```bash
# Voir les logs
./vendor/bin/sail logs

# Accéder au container
./vendor/bin/sail bash

# Artisan
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan tinker

# Arrêter l'environnement
./vendor/bin/sail down
```

---

## **Base de données**
- **Mysql** avec Docker
- **Migrations versionnées** et **seeders** intégrés

Accès direct :  
```bash
./vendor/bin/sail mysql
```

---

## **Stack technique**
- **Laravel 12.x** – Framework PHP
- **Mysql** – Base de données
- **Docker Sail** – Environnement de développement
- **Tailwind CSS** – Styles minimalistes
- **Blade Components** – Interface modulaire

---

## **Arborescence**
```
apwap/
├── app/Models/           # Modèles
├── app/Http/Controllers/ # Contrôleurs
├── resources/views/      # Vues Blade
├── database/migrations/  # Migrations
├── database/seeders/     # Données de test
└── routes/web.php        # Routes
```

---