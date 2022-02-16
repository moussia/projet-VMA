# Back

## API Plateform
## Vue JS
## Microservice (back + back-payment)

## Etape 1 : Pensez à lancer le serveur (ex : pour windows wampserver)

## Etape 2 : Créer la BD (si c'est pas déjà fait)
```
php bin/console doctrine:database:create
```

## Etape 3 : Mettre à jour la BD

* Voir les requètes qui seront jouer avec force
```
php bin/console doctrine:schema:update --dump-sql
```
* Executer les requètes en DB
```
php bin/console doctrine:schema:update --force
```
* Mise à jour (dans le cas ou la cmd au dessus marche pas)
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

# Generate the public and private keys used for signing JWT tokens
```
php bin/console lexik:jwt:generate-keypair
```
## Etaoe 4 : Lancer le back 
```
symfony serve
```

## Etape 5 : Lancer le front (front-auth)
```
yarn serve
```





