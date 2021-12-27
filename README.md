# Back

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

## Etaoe 4 : Lancer le back 
```
symfony serve
```

## Etape 5 : Lancer le front 
```
yarn serve
```


### Mémo
Penser à mettre à jour son user et password dans le fichier de conf côté back (.nev)
à ce niveau là : DATABASE_URL="mysql://root:@127.0.0.1:3306/test-api?serverVersion=5.7"

Si besoin se référer au README du back ou du front 





