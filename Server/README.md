
# La structure des fichiers de l'application

```
smartCity
├── adminInterface
│   ├── data
│   ├── index.php
│   ├── src
│   └── templates
├── data
│   ├── authorizedIdentifiers.json
│   └── cityParameterValues.json
└── EspAPI
    ├── data
    ├── index.php
    └── src

```

## data/

Ce répertoire contient deux fichiers :

- authorizedIdentifiers.json : contient les IDs des robots autorisés à accéder aux données sur l’état courante des différents paramètres de la map (la ville intelligente).
- cityParameterValues.json : contient les différents paramètres de la map qui sont stockés sous forme d'un seul objet.

### Note

Ces deux fichiers doivent être liés directement aux répertoires `adminInterface/data/` et 
`EspAPI/data/` selon le / les fichier manipulé par l'application.

Vérifiez aussi que les droits sur les fichiers sont correctes.

## EspAPI/

Ce répertoire contient les fichiers de l'application responsable de fournir les réponses à l'ESP (notre MCU) lorsqu'elle les demande.

L'application à besoin des fichiers contenant la liste des identifiants et l’état courante des paramètres de la map.

### Structure

```
EspAPI
    ├── data
    │   ├── authorizedIdentifiers.json
    │   └── cityParameterValues.json
    ├── index.php
    └── src
        ├── controllers
        │   ├── Accident.php
        │   ├── Check.php
        │   ├── Green.php
        │   ├── Hospital.php
        │   ├── Light.php
        │   └── Traffic.php
        ├── model
        │   ├── CityDataHandler.php
        │   └── IDLoader.php
        └── structure
            └── CityStatus.php
```

#### src/model

Ce répertoire contient les classes responsable de lire / d’écrire les données depuis les fichiers dans `data/`

#### src/structure

Ce répertoire contient la classe `CityStatus` qui définit la structure de l'objet, et la façon dont il sera stockés au moment de la sérialisation.

#### src/controllers

Ce répertoire regroupe les scripts chargé de répondre à chacune des actions demandées par l'Esp.

#### index.php

Ce fichier représente notre routeur, qui va appeler le script adéquat selon l'action demandée

## adminInterface/

Ce répertoire contient les fichiers d'une application qui fournit une interface à l'utilisateur qui lui permet de modifier les paramètres de la map ainsi que voir l’état actuel de ces paramètres. 

L'application à besoin du fichier contenant l’état courante des paramètres de la map.

### Structure

```
adminInterface
│   ├── data
│   │   └── cityParameterValues.json
│   ├── index.php
│   ├── src
│   │   ├── controllers
│   │   │   ├── form
│   │   │   │   ├── Accident.php
│   │   │   │   ├── Hospital.php
│   │   │   │   ├── Light.php
│   │   │   │   └── Path.php
│   │   │   ├── mainPage.php
│   │   │   └── offcanvas
│   │   │       └── updateDisplay.php
│   │   ├── model
│   │   │   └── CityDataHandler.php
│   │   ├── structure
│   │   │   └── CityStatus.php
│   │   └── utility
│   │       ├── form
│   │       │   └── CitySafeSetter.php
│   │       └── offcanvas
│   │           └── StatusTranslater.php
│   └── templates
│       ├── icons
│       ├── images
│       ├── interface.php
│       ├── js
│       ├── layout
│       └── lib
```

### templates/

Ce répertoire regroupe les fichiers nécessaires pour la vue :
- icons/ : les icônes utilisées
- images/ : les images utilisées
- js/ : les scripts js pour les formulaires et pour l'offcanvas
- layout/ : la mise en page d'un composant precis
- lib/ : les fichiers importé de bibliothèques / framework

### src/utility

Ce répertoire regroupe les classes :

- **CitySafeSetter** : ajoute une couche de sécurité en vérifiant d'abord si les réponses reçues par les formulaires sont des valeurs valides, et dans certains cas un traitement spécial, par exemple la valeur du chemin le plus court qui dépend de l'emplacement de l’hôpital.
- **StatusTranslater** : permet de traduire les valeurs des paramètres stockés dans `data/cityParameterValues.json`  en des mots plus clair pour être par la suite affichés à l'utilisateur.

### src/controllers

Les actions qui peuvent être traités sont divisées en trois :

- form : regroupe les scripts qui traitent les requêtes venant des formulaires.
- offcanvas : un script qui génère les données nécessaires à l'affichage d'un tableau à l’intérieur d'un offcanvas.
- mainPage : il appelle simplement la page qui représente le contenu affiché à l'utilisateur.

### index

Le routeur frontal appelant les scripts dans `controllers`.

# Utiliser l'application

## Machine Virtuelle préparée

Vérifiez  bien que votre subnet est sur `192.168.1.0/24` ou autre dont l'adresse `192.168.1.100` est joignable et n'est pas prise par une autre appareil.

Si ce n'est pas le cas changez la configuration sur `/etc/netplan` et redémarrez le demon. 

- username : `user`
- password : `0000`

Le site :

- L'api Esp : `192.168.1.100:5000`
- L'interface d'admin : `192.168.1.100:80` nécessite une authentification
	- username : `abdelwahed`
	- password : `abdelwahed`
	- vous pouvez ajouter et retirer des utilisateurs dans `/etc/apache2/passwords`

Lien vers l'image de la VM : [EspApi]() ( Besoin d'un service d’hébergement `:(` ).

## Créer une Image docker à partir d'un dockerfile

Téléchargez le dossier fournit `DockerSmartCity`  puis lancez :

```Bash
# Build Image
$ docker build -t build_name /docker_file_dir/

# Run it
$ docker run -d -p 5000:5000 -p 80:80 build_name
```












