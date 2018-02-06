# Volet Automatique
système de pilotage automatique d'un volet

La carte arduino récupère les informations des capteurs, puis les envoie sur le port série.
Un programme python récupére les infos, puis les stocke en clair à la racine du serveur apache.

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
* Mettre au propre le code source arduino
* Lancer automatiquement le python du raspberry pi
* Terminer l'application android
* Réaliser schéma électrique de la carte
* Faire fonctionner le moteur du volet
