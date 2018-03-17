# Volet Automatique
système de pilotage automatique d'un volet

La carte arduino récupère les informations des capteurs, puis les envoie sur le port série.
Un programme python récupére les infos, puis les stocke en clair à la racine du serveur apache.

placeholder image: 
![alt text](https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Title Text 1")


# Arborescence
```text
|____arduino
|       |______*.ino
|
|____raspberry pi
         |    |___php
         |         |__android.php
         |         |__envoi.php      
         |
         |____python
                |__sync.py
      
```    
          
# A faire
__Partie Matérielle__
* Faire fonctionner le moteur du volet

__Partie Logicielle__
* ~~Lancer automatiquement le python du raspberry pi~~ [OK]
* Créer un script d'installation Bash permettant d'installer le système complet
* Terminer l'application android
* Mettre au propre le code source arduino

__Partie Documentaire__
* Réaliser une revue de projet
* Réaliser le schéma électrique de la carte Arduino et des capteurs
* Créer un manuel d'explication du serveur Apache et du script Python
