# Plateforme-Formation
Projet de plate-forme de formation en ligne open source destiné aux Junior-Entreprises.

## ETIC INSA Technologies
L'équipe du pôle DSI de la Junior-Entreprise de l'INSA de Lyon est à l'initiative de ce projet.

## Contributeurs & Junior-Entreprises

 - Marc Fallouh (ETIC INSA Technologies)

## Structure
Le répertoire formationREST contient les sources de l'application Symfony développé en mode API.

Le répertoire formationCLIENT contient les sources de l'application angular de présentation.

Ces deux applications peuvent être déployées sur deux serveurs différents, en modifiant au besoin les configurations.

## Mise en garde

Ce dépôt est en évolution constante, la mise en production n'est pas encore envisageable à ce stade.

## Installation 

1. Cloner le repository dans le répertoire de votre serveur Apache (htdocs pour xampp)
2. Installer Composer pour votre plate forme de développement: https://getcomposer.org/download/
3. Ouvrir une console dans le répertoire formationREST et exécuter la commande `composer install`
4. Configurer le serveur de données pour faire correspondre le nom de base et le login/password.
