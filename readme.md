Readme : projet limonade cir3
=============================


Configuration de la base de données
-----------------------------------

Créez votre base de donné, et importez y le fichier rentree.sql.
Si vous rencontrez des problème lié à l'encodage, modifiez la
configuration de mysql en rajoutant les lignes ci dessous dans
la section "[mysqld]":

collation-server = utf8_unicode_ci
init-connect='SET NAMES utf8'
character-set-server = utf8


Configuration de l'aplication de rentrée
----------------------------------------

L'appliation de rentrée se trouve dans le dossier /rentree. Son fichier de configuration à été modifié de façon à être compatible avec la table promo_label que nous avons rajouté dans la base de données. Cette table remplace le tableau $libellePromo de ce même fichier.


Configuration de l'aplication de gestion de l'appliation de rentrée
-------------------------------------------------------------------

Le fichier de configuration est config.inc.php.
Valeur de ce fichier:
'DB_host'        => '127.0.0.1' adresse ip du serveur mysql
'DB_name'        => 'rentree'   nom de la bdd
'DB_logon'       => 'rentree'   login de l'utilisateur
'DB_pw'          => 'rentree'   password de l'utilisateur

Les fichiers uploadés seront stockés dans le dossier /rentree/pdf.


Causes courantes concernant l'echec d'envoi de l'echec d'envoi de fichier
-------------------------------------------------------------------------

1. Probléme de droit: sous unix, verifiez que le dossier /rentre/pdf dispose des droits
   autorisant php à créér/lire/suprimer des fichiers.

2. Taille limite des fichier: par defaut, php limite la taille d'envoi des fichiers.
   Pour connaitre/modifier cette limite, consultez la documentation de votre version de php.
