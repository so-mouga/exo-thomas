# Meeting - Kevin Mougammadaly

Une application qui permettra d'avoir les environnements suivants: 
- apache
- php 7.2
- Mysql 5.7

## Utilisation
~~~
Désarchiver le projet sur votre ordinateur 

placer vous sur le projet 
- cd exo-thomas

Exécutez le fickier docker compose
- docker-compose up -d

Exécutez composer
- docker-compose exec web composer install

~~~

Une fois les conteneurs prêts et démarrés, ouvrez l'url http://localhost:8000/meeting dans le navigateur. Si tout s'est bien passé une liste de meeting devrais s'afficher.


## Base de donnée
~~~
Pour accéder à la base donnée ouvrez l'url http://localhost:8000/adminer.php 
Server = database
Username = demo
Password = demo
~~~



