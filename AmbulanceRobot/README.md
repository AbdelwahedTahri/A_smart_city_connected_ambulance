La communication entre le Robot et le serveur se fait par le protocole HTTP.

Le robot envoie des requêtes de types GET pour tous les types d'actions (comme demandé sur l'énoncé de la compétition) et le serveur y répond par du contenu textuel représenté dans un seul mot.

# Envoyer une requête au serveur 

## La structure d'une requête HTTP

Pour formuler une requête HTTP il faut suivre une structure comme suit :

![[Structure requete HTTP.png]]

### Le Verbe

Les **verbes HTTP** correspondent à différents types d’actions que vous pouvez accomplir avec votre requête.

Dans notre cas il sera GET utilisé pour obtenir une information du serveur

### L'URI

Un URI est le moyen d’identifier les ressources.

| URI | Role |
| :--: | :--: |
| /CHECK/ID | Vérifier que l'ID est autorisé |
| /ACCIDENT/ID | Obtenir l'emplacement de l'accident |
| /HOSPITAL/ID | Obtenir l'emplacement de l’hôpital disponible |
| /LIGHT/ID | Obtenir l’état du feu rouge devant |
| /GREEN/ID | Demander de changer l’état du feu rouge |
| /TRAFFIC/ID | Demander le chemin le plus rapide vers la destination |

### Header

Il vous permet de faire passer des informations supplémentaires sur le message.

Les headers sont représentés par une paire **clé et valeur**, et il existe de nombreux types d’options différents pour eux.

```YAML
Host: espAPI.com # Indiquer le nom du site (hote virtuel)
Accept-Charset: ISO-8859-1 # Encodage compris par le client
```

### Body

On s'en sert pas dans les requêtes de type GET.

## Une requête type du Robot

```YAML
GET /CHECK/1234 HTTP/1.1
Host: espAPI.com
Accept-Charset: ISO-8859-1
Connection: close

```

## Les fonctions responsables de l'envoie des requêtes

La bibliothèque `ESP8266WiFi` fournit l'objet `WiFiClient` qui permet d’établir une connexion TCP avec un port d'un serveur, et de lui envoyer des messages.

```C
// API.h
int startServerCommunication(IPAddress server, int port);
/**
* La fonction est responsable d'etablir une conexion avec le serveur
* elle retourne CONNECTION_ESTABLISHED si la connexion est reussie
* CONNECTION_FAILED si non 
* L'enum est definie dans WiFi.h
**/

void sendRequest(String action, String authID);
/*
* La fonction est responsable d'envoyer une requete GET au serveur auquel on s'est precedement connecté
*/
```


# Analyser la réponse reçue

## La structure d'une réponse HTTP

Version HTTP + Code de réponse HTTP + Headers + Body

![[Structure reponse HTTP.png]]

### Body

Le body contient l’information que vous avez demandée, et que l’API vous renvoie.

### Code de réponse HTTP

Le code de réponse HTTP aide le client à comprendre le **statut** de la réponse.

Les codes HTTP sont très codifiés, et chaque nombre correspond à une réponse particulière, C’est une sorte de nomenclature générale respectée par tous.

En général, les règles de base pour les codes de réponse HTTP sont les suivantes :

-   100+ ➡ Information
-   200+ ➡ Succès
-   300+ ➡ Redirection
-   400+ ➡ Erreur client
-   500+ ➡ Erreur serveur

## Une réponse type du serveur

```YAML
HTTP/1.1 200 OK
Date: Sat, 20 Apr 2023 21:38:24 GMT
Server: Apache
Content-Length: 7
Keep-Alive: timeout=5, max=100
Connection: close
Content-Type: text/html; charset=UTF-8

SUCCESS
```

## Les fonctions responsables du traitement des requêtes

```C
//API.h
int getApiResponse(char *responseBody);
/**
* La fonction Stocke la reponse reçu dans responseBody, et renvoie :
* SUCCESS si le code de la reponse est 200 OK
* FAILURE sinon
*/
```







