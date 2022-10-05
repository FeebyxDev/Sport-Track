**@JAMARD YOUENN
@BENDRAOU AYOUB**

### SQLITE

Afin de créer la base de donnée sqlite3 est requis.
Une simple execution de commande pour lancer sqlite3 : `sqlite3`.
Dans le terminal de sqlite3 on execute : `.open sport_tracks_.db` afin de créer le fichier de base de donnée.
Puis on executeme la commande `.read create_db.sql` afin de créer les tables.

La base de données est maintenant créée. (la création est à faire dans le dossier /database/ de préférence)

### PHP

On lance le serveur php avec la commande "php -s localhost:8080" à la racine du projet.

Pour la partie php, nous avons créer une classe de connexion d'utilisateur, une autre pour la création de compte avec une classe modify pour modifier les informations des utilisateurs. Bien sur ils sont connecter à la base de données, la class SignUp - Création de compte - Rentre les informations du compte dans la bdd, la classe SignIn - connexion au compte - Vérifie si le user existe dans la bdd, pendant que Modify - modifier les infos - permets aux utilisateurs qui sont connectées de modifier leurs informations.

Nous avons pu utilisées ces méthodes grâce à la classe UtilisateurDAO, et la class SqliteConnection pour se connecter à la base de données.

Ensuite, nous avons créer une interface pour implémenter des méthodes dans la classe CalculDistanceImpl pour pouvoir calculer un trajet entre 2 points. 
Et une classe test pur les tester.

De plus, nous avons rajouté une option de suppression de compte dans la page de modification d'information.
Un utilisateur ne doit pas avoir accès à une page qui requiere une authentification et ne doit pas pouvoir altérer les données d'un autre utilisateur.

Nous avons insérer les données importés depuis un fichier json dans la bdd.
Nous sommes ensuite passer à l'affichage et à la valorisation des données.
Notre question a été "Comment traiter les données afin d'obtenir un maximum d'information avec les données qui nous sont fournies ?".

L'implementation de la modification des données utilisateurs et des d'activités est valide et fonctionne.

Un gros travail MVC a été necessaire, car jusque là (erreur de notre part) nous n'avions pas penser au model MVC.
Il a donc fallu prendre chaque fichier pour faire sa vue et son controller.

Après ces travaux, nous obtenons une multitudes de dossier

* /CalculDist/ : Implémantation du calcul entre 2 point GPS
* /controllers/ : Emplacement des controllers de chaque page
* /DataAccessObject/ : Classes permettant d'interoger la base de donnée pour faire la liaison
* /database/ : Emplacement de la base de données ainsi que le fichier SqliteConnection permettant de si connecter
* /Model/ : Emplacement des fichiers des models de données
* /parts/ : Emplacement de différentes parties de l'application (Le menu, l'entête, le pied de page ...)
* /Temp/ : Dossier temporaire où est stocker le fichier JSON exemple à insérer via le formulaire d'insertion d'activité
* /views/ : Emplacement des différentes vue de l'application (les pages)
* ./ : La racine qui contient ce readme ainsi que la config et le fichier principal de l'application permettant de définir les routes
