<?php 
    class ActivityDAO {
        private static ActivityDAO $dao;

        private function __construct() {}

        public static function getInstance(): ActivityDAO {
            if(!isset(self::$dao)) {
                self::$dao= new ActivityDAO();
            }
            return self::$dao;
        }

        public final function findAll($userid, $id): Array {
            $dbc = SqliteConnection::getInstance()->getConnection();
            if($id == null) $query = "SELECT * FROM ACTIVITE WHERE userId=:u;";
            else $query = "SELECT * FROM ACTIVITE WHERE userId=:u AND Id=:i;";
            $stmt = $dbc->prepare($query);
            if($id!=null) $stmt->bindValue(':i', $id);
            $stmt->bindValue(':u', $userid);
            $stmt->execute();
            $activities = $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
            foreach ($activities as $act) { $act->setEntry(); }
            return $activities;
        }

        public final function detailsActivity($userid, $id) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "SELECT * FROM ENTRAINEMENT WHERE activiteId=:aid;";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':aid', $id);
            $stmt->execute();
            $entries = $stmt->fetchAll(PDO::FETCH_CLASS, 'Entry');
            return $entries;
        }

        public final function insert(Activity $st): void{
            if($st instanceof Activity){
                $db = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $stmt = $db->prepare('INSERT INTO ACTIVITY (userid, date, Description) VALUES (:u,:d,:de);');

                // bind the paramaters
                $stmt->bindValue(':u', $st->getUserId());
                $stmt->bindValue(':d',$st->getDate());
                $stmt->bindValue(':de',$st->getDescription());

                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function update(Activity $st, $actid):void {
            if($st instanceof Activity){
                $db = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $stmt = $db->prepare('UPDATE ACTIVITE SET date=:da, Description=:de WHERE Id=:actid;');
    
                // bind the paramaters
                $stmt->bindValue(':actid', $actid);
                $stmt->bindValue(':da', $st->getdate());
                $stmt->bindValue(':de', $st->getDescription());
    
                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function delete($st): void {
            if($st instanceof Activity){
                $dbc = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $query = "DELETE FROM ACTIVITE WHERE Id=:id;";
                $stmt = $dbc->prepare($query);
                // bind the paramaters
                $stmt->bindValue(':id', $st->getId());

                // execute the prepared statement
                $stmt->execute();
            }
        }
    }

?>