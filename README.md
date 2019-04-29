Projet_Ucape
============

Projet scolaire BTS 2 2018-2019

Bienvenue sur l'application UCAPE du lycée saint-vincent.

Contexte :

Cette application a pour but de s'occuper de la gestion des voyages scolaires du lycée saint-vincent ainsi que les évaluations du diplôme de l'ucape.

Installation :

1) Tout d'abord, il faut créer un dossier vide afin d'y accueilir l'application. Ensuite, ouvrez l'invité de commande et entrer la commande "git clone ..." suivi de l'url github du projet. Exemple : https://github.com/Fchaow/Projet-UCAPE.git

2) Ensuite, il est nécéssaire d'installer composer, afin de gérer les dépendances du projet. Rendez vous sur le site : https://getcomposer.org/
Télécharger le. Après avoir télécharger le package, il est nécéssaire d'installer les dépendances via la commande : "composer install"

3)Après avoir installé composer, il est nécéssaire de remplir le fichier de configuration de la base de données. Rendez vous à : App/config/parameters.yml et renseignez les informations de votre base de données.

4)Une fois la base de données paramétrés dans le projet, il est nécéssaire de créer cette base de données. Il faut donc taper la commande " php bin/console doctrine:database:create " dans l'invité de commande.

5)Après avoir créer la base de données, il faut la mettre à jour avec le "schéma" du projet. Taper la commande "php bin/console doctrine:schema:update --force" afin de mettre à jour la base de données.

6)Pour finir, il faut remplir cette base de données avec les données de fixtures présente dans le projet.Ainsi, il faut entrer la commande : "php bin/console doctrine:fixtures:load"

Afin de vous connecter à l'application, il faut remplir les champs identifiant et mot de passe grace à "admin" comme identifiant et "admin" comme mot de passe.

Contributeurs : 
Corentin FAMECHON : cfamechon.lyceestvincent.fr
Nicolas LE GALL : nlegall.lyceestvincent.fr
Gabriel GOMEZ : ggomez.lyceestvincent.fr