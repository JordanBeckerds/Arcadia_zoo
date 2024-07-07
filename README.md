# Les fonts

https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,700&display=swap

# Color palet 

#00ad0e
#ffffff
#fbfcfd
#f9f9f9
#ccc
#ddd
#000000
#fec016
#fec913
#fbca47
#4CAF50
#4cae4c
#45a049
#28a745
#337ab7
#353434
#cdcbcd
#007bff
#0056b3
#5cb85c
#286090
#d9534f
#c9302c

# KANBAN  

https://jdsbecker.atlassian.net/jira/software/projects/KAN/boards/1?atlOrigin=eyJpIjoiNGJmNGJjM2M4YmRlNDQ1Y2FmMTkxYmMxMjliMjQ5MDIiLCJwIjoiaiJ9

# Documentation du Déploiement de l'Application Arcadia Zoo
Introduction

Ce document décrit les étapes suivies pour le déploiement de l'application Arcadia Zoo. Il couvre la préparation de l'environnement, la configuration de la base de données, l'installation de l'application et les tests finaux avant la mise en production.
Démarche de Déploiement

    Préparation de l'Environnement
        Choix de l'Infrastructure: Sélectionner un fournisseur de services cloud tel que AWS, Azure, ou Google Cloud.
        Configuration du Serveur: Provisionner un serveur avec les spécifications nécessaires (CPU, mémoire, stockage) selon les besoins de l'application.
        Système d'Exploitation: Installer un système d'exploitation Linux (par exemple, Ubuntu Server) pour une meilleure performance et sécurité.

    Installation des Dépendances
        Serveur Web: Installer un serveur web comme Apache ou Nginx.
        Langage de Programmation: Installer PHP, si l'application est basée sur PHP.
        Base de Données: Installer MySQL ou MariaDB pour gérer les données de l'application.
        Autres Dépendances: Installer des outils supplémentaires comme Composer pour la gestion des dépendances PHP et Git pour le contrôle de version.

    Configuration de la Base de Données
        Création de la Base de Données: Créer une base de données dédiée pour l'application Arcadia Zoo.
        Importation du Schéma: Importer le schéma de la base de données incluant toutes les tables nécessaires (animaux, guests, habitats, passages, reviews, services, users).
        Configuration des Utilisateurs: Créer des utilisateurs avec des permissions appropriées pour accéder et manipuler les données.

    Déploiement de l'Application
        Téléchargement du Code Source: Cloner le dépôt Git de l'application sur le serveur.
        Configuration des Paramètres: Mettre à jour les fichiers de configuration (comme .env pour les variables d'environnement) avec les informations spécifiques à l'environnement de production (base de données, clés API, etc.).
        Installation des Dépendances: Utiliser Composer pour installer toutes les dépendances du projet.
        Configuration du Serveur Web: Configurer le serveur web pour pointer vers le répertoire public de l'application, et s'assurer que les réécritures d'URL sont correctement configurées.

    Tests et Validation
        Tests Unitaires et d'Intégration: Exécuter des tests pour s'assurer que toutes les fonctionnalités de l'application fonctionnent correctement.
        Tests de Performance: Utiliser des outils comme JMeter pour évaluer la performance de l'application sous charge.
        Tests de Sécurité: Effectuer des audits de sécurité pour identifier et corriger les vulnérabilités.

    Mise en Production
        Déploiement Final: Déployer l'application sur le serveur de production.
        Monitoring et Maintenance: Mettre en place des outils de monitoring (comme New Relic ou Nagios) pour surveiller la performance et la disponibilité de l'application.
        Sauvegardes: Configurer des sauvegardes régulières de la base de données et des fichiers importants pour assurer la récupération en cas de problème.

Conclusion

Le déploiement de l'application Arcadia Zoo a été réalisé en suivant une démarche structurée et méthodique. Chaque étape a été soigneusement planifiée et exécutée pour garantir une transition fluide vers l'environnement de production. La mise en place de tests rigoureux et de solutions de monitoring assure la stabilité et la fiabilité de l'application pour les utilisateurs finaux.
