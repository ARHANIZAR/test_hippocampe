# Test PHP Hippocampe


## Requirements

- **Web server:** Apache with mod_rewrite enabled
- **Database server:** MySQL
- PHP 7.x

## Installing

Installer les dépendances via composer.

```
$ composer install
```

Les librairies utilisés sont :
* Twig v3.0
* monolog v2.1


Configurer la base de données dans le fichier *configDB.php* 
```
 define("DB_HOST", "localhost:8889");
 define("DB_USER", "root");>
 define("DB_PASS", "root");
 define("DB_NAME", "test_hippocampe");
```
Créer les tables Employe et Company

Table: Company
```
create table Company
 (
     id int auto_increment primary key,
     name        varchar(32) not null,
     postal_code int(2)      not null
 );
```
Table: Employe
```
 create table Employe
 (
   id         int auto_increment   primary key,
    first_name varchar(32) not null,
    last_name  varchar(32) not null,
    birthday   date        not null,
    id_company int         not null,
    constraint FK_EMPLOYE_COMPANY
        foreign key (id_company) references Company (id)
            on update cascade on delete cascade
);
```

 Insertion des données de test

 Etape 1 : Insertion Companys
```
INSERT INTO test_hippocampe.Company (id, name, postal_code) VALUES (1, 'CygneTech', 91);
INSERT INTO test_hippocampe.Company (id, name, postal_code) VALUES (2, 'Hippocampe', 75);
INSERT INTO test_hippocampe.Company (id, name, postal_code) VALUES (5, 'Ayah', 90);
INSERT INTO test_hippocampe.Company (id, name, postal_code) VALUES (8, 'Test', 1);
```
 Etape 2 : Insertion Employes
 
```
INSERT INTO test_hippocampe.Employe (id, first_name, last_name, birthday, id_company) VALUES (1, 'Aymane', 'RHANIZAR', '1996-08-27', 1);
INSERT INTO test_hippocampe.Employe (id, first_name, last_name, birthday, id_company) VALUES (6, 'Eric', 'JEANIER', '1965-08-27', 2);
INSERT INTO test_hippocampe.Employe (id, first_name, last_name, birthday, id_company) VALUES (7, 'Stephane', 'JARDIN', '1976-10-21', 5);
INSERT INTO test_hippocampe.Employe (id, first_name, last_name, birthday, id_company) VALUES (8, 'Julien', 'LAYMANI', '2003-12-13', 1);

```
Pour tester l'application executer la commande :

```
 $ php -S localhost:8000
```

Vous pouvez consulter les logs dans les fichiers ci-dessous 

* log/app.log
* log/errors.log
* log/request.log




## Author

* **Aymane RHANIZAR** <rhanizar.aymane@gmail.com>

