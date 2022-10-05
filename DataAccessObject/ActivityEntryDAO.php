<?php
    class ActivityEntryDAO {
        private static ActivityEntryDAO $dao;

        private function __construct(){}

        public static function getInstance(): ActivityEntryDAO {
            if(!isset(self::$dao)) {
                self::$dao= new ActivityEntryDAO();
            }
            return self::$dao;
        }
        
        public final function findAll($id): Array {
            $dbc = SqliteConnection::getInstance()->getConnection();
            if($id!=null) $query = "SELECT * FROM ENTRAINEMENT WHERE id=:i;";
            else $query = "SELECT * FROM ENTRAINEMENT;";
            $stmt = $dbc->prepare($query);
            if($id!=null) $stmt->bindValue(':i', $id);
            $stmt->execute();
            $entries = $stmt->fetchAll(PDO::FETCH_CLASS, 'Entry');
            return $entries;
        }

        public final function insert(Entry $st): void{
            if($st instanceof Entry){
                $db = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $stmt = $db->prepare('INSERT INTO Entrainement (activiteId, altitude, longitude, latitude, frequence, temps) VALUES (:act,:alt,:lon,:lat,:freq,:te);');

                // bind the paramaters
                $stmt->bindValue(':act',$st->getActiviteId());
                $stmt->bindValue(':alt',$st->getAltitude());
                $stmt->bindValue(':lon',$st->getlongitude());
                $stmt->bindValue(':lat',$st->getLatitude());
                $stmt->bindValue(':freq',$st->getCardio());
                $stmt->bindValue(':t',$st->getTemps());

                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function delete($st): void {
            if($st instanceof Entry){ 
                $dbc = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $query = "DELETE FROM ENTRAINEMENT WHERE id=:i;";
                $stmt = $dbc->prepare($query);
                
                // bind the paramaters
                $stmt->bindValue(':i',$st->getId());

                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function update(Entry $st, $Id):void {
            if($st instanceof Entry){
                $db = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $stmt = $db->prepare('UPDATE ENTRAINEMENT SET altitude=:alt, longitude=:lng, latitude=:lat, frequence=:freq, temps=:t WHERE id=:Id;');
    
                // bind the paramaters
                $stmt->bindValue(':Id', $Id);
                $stmt->bindValue(':alt', $st->getAltitude());
                $stmt->bindValue(':lng', $st->getlongitude());
                $stmt->bindValue(':lat', $st->getLatitude());
                $stmt->bindValue(':freq', $st->getCardio());
                $stmt->bindValue(':t', $st->getTemps());
    
                // execute the prepared statement
                $stmt->execute();
            }
        }
    }
?>