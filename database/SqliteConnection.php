<?php
   class SqliteConnection {
      
      private static SqliteConnection $sqlite;
      // private SQLite3 $db;
      private PDO $db;

      public function __construct() {
         global $sqlite;
         $this->db = new PDO('sqlite:'. DB_FILE);
         // $this->db = new SQLite3($rootdir . 'database/sport_track.db');
         $sqlite = $this;
      }

      public static function getInstance() {
         if (!isset(self::$sqlite)) {
            self::$sqlite = new SqliteConnection();
         }
         return self::$sqlite;
      }

      function getConnection() {
         if(!$this->db){
            echo $this->db->lastErrorMsg();
         } else {
            // echo '<script>console.log("database connected!")</script>';
            return $this->db;
         }
      }
   }

?>