<?php
class UtilisateurDAO {
    private static UtilisateurDAO $dao;

    private function __construct() {}

    public static function getInstance(): UtilisateurDAO {
        if(!isset(self::$dao)) {
            self::$dao= new UtilisateurDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM USER;";
        $stmt = $dbc->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
        return $users;
    }

    public final function insert(Utilisateur $st): void{
        if($st instanceof Utilisateur){
            $db = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $db->prepare('INSERT INTO USER (mdp, mail, nom, prenom, date_de_naissance, sexe, poids, taille) VALUES (:p,:m,:n,:pr,:d,:s,:po,:t);');

            // bind the paramaters
            $stmt->bindValue(':p', $st->getMdp());
            $stmt->bindValue(':m',$st->getMail());
            $stmt->bindValue(':n',$st->getNom());
            $stmt->bindValue(':pr',$st->getPrenom());
            $stmt->bindValue(':d',$st->getDate());
            $stmt->bindValue(':s',$st->getSexe());
            $stmt->bindValue(':po',$st->getPoids());
            $stmt->bindValue(':t',$st->getTaille());

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(Utilisateur $st): void {
        if($st instanceof Utilisateur){
            $db = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $db->prepare('UPDATE USER SET mdp=:p, mail=:m, nom=:n, prenom=:pr, date_de_naissance=:d, sexe=:s, poids=:po, taille=:t WHERE id=:id;');

            // bind the paramaters
            $stmt->bindValue(':id', $st->getID());
            $stmt->bindValue(':p', $st->getMdp());
            $stmt->bindValue(':m',$st->getMail());
            $stmt->bindValue(':n',$st->getNom());
            $stmt->bindValue(':pr',$st->getPrenom());
            $stmt->bindValue(':d',$st->getDate());
            $stmt->bindValue(':s',$st->getSexe());
            $stmt->bindValue(':po',$st->getPoids());
            $stmt->bindValue(':t',$st->getTaille());

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st): void {
        if($st instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnection();

            // prepare the SQL statement
            $query = "DELETE FROM USER WHERE id=:uid;";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':uid',$st->getId());

            // execute the prepared statement
            $stmt->execute();
        }
    }

    /**
     * Fonction de connection
     */
    public function connect($mail, $pass): ?Utilisateur {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM USER WHERE mail=:mail;";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':mail',$mail);
        $stmt->execute();
        $user = $stmt->fetchObject('Utilisateur');
        if($user && $user->comparePass($pass)) {
            return $user;
        } else {
            return null;
        }
    }
}
?>