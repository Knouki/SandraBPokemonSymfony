# SandraBPokemonSymfony

Pour commencer cloné le projet et lancer la commande :

php composer.phar install

Lorsque l'on demande les informations pour la database, mettre la database qui va servir pour le projet

Exécuter ensuite les commandes :

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load

php bin/console server:run

Ensuite aller sur :
localhost:8000/


Compte administrateur : 

admin 

1234

Compte utilisateur :

Pierre

password
