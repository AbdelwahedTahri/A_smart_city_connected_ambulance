Ce projet fait partie d'une compétition organisé par les membres du club mécatronique de l’école ENSETM .

Ce dépôt regroupera les éléments (Code, Robot) utilisés par les membres du club Roboting FSTM afin de construire un projet complet et de participer à la compétition.

# Présentation de la thématique

Une ville intelligente, appelée également ville connectée ou ville numérique, est une ville
qui utilise les technologies d’information et de communication pour améliorer la qualité de vie de ses citoyens et la gestion de ses ressources.

L'un des éléments clés d'une ville intelligente est l'intégration des services d'ambulance à
l'infrastructure de la ville, cette ambulance connectée à une ville intelligente peut fournir un suivi de localisation en temps réel, permettant des temps de réponse plus rapides, une meilleure coordination entre le personnel médical et les autres parties prenantes.

## L'aire du jeu

La maquette présente le trajet d'une ambulance, marqué par une ligne noire, qui part du point de départ, traverse le lieu de l'accident et arrive finalement à l'hôpital.

![[Suiveur de ligne connecté/attachements/Map.png]]

Vous trouverez d'autre informations comme les dimensions de la Map par [ici](MapDimensions.png).

## L'objectif

L'objectif de cette compétition est de construire une ambulance qui peut se connecter à
une ville intelligente (Smart City), interagir avec son environnement, et surmonter les obstacles qu'elle rencontre.

## Missions & défis 

La compétition repose sur un processus qui doit être suivi :

1. l'ambulance doit se connecter au serveur dès le départ.
2. Une fois que l'ambulance commence à prendre son trajet, elle doit envoyer une requête au serveur pour connaître l'emplacement de l'accident.
3. l'ambulance doit détecter la première LED qui indique la présence d'un accident, puis attendre à ce point pendant 5 secondes avant de poursuivre son trajet.
4. Pour connaître l'hôpital disponible, l'ambulance doit envoyer une requête au serveur pour obtenir l'information correspondante.
5. Au centre de la Map une LED (Traffic Light) indique la présence d'un feu de circulation, si le feu est rouge l'ambulance doit demander au serveur de changer pour faire passer le feu rouge au feu vert.
6. Une dernière requête doit être envoyer pour connaitre le chemin le plus rapide (embouteillage par exemple) pour arriver le plus vite possible à l’hôpital.
7. Devant chaque hôpital il y a une barrière que l'ambulance doit détecter grâce aux LED Bx et s'arrêter jusqu'à ce qu'elle s'ouvre automatiquement.

## La liste des requêtes envoyés au serveur

| URI | Port | Response |
| :--: | :--: | :--: |
| /CHECK/ID | 5000 | SUCCESS, FAILED |
| /ACCIDENT/ID | 5000 | [A1, A2], FAILED|
| /HOSPITAL/ID | 5000 | [H1, H2], FAILED|
| /LIGHT/ID | 5000 | [RED, GREEN], FAILED|
| /GREEN/ID | 5000 | CHANGED, FAILED|
| /TRAFFIC/ID | 5000 | \[[V11,V12], [V21,V22]\], FAILED |

## Règles supplémentaires

1. Si le robot pas à se connecter avec le serveur, il suffit juste de suivre la ligne de point de départ vers l'hôpital.
2. L'ambulance a le droit de transmettre les requêtes au serveur à n'importe quel moment pour obtenir les informations requises afin de surmonter les défis confrontés.
3. Les dimensions du robot ne doivent pas excéder en :
	- Longueur : 25 cm
	- Largeur : 16 cm


# Le travail réalisé

- [Du coté Serveur](Server/README.md)
- [Du coté Client](AmbulanceRobot/README.md)

# Note

Le Projet est en cours de réalisation, de nouveaux éléments seront ajouter au dépôt au fur et à mesure que l’équipe avance dans ses taches.