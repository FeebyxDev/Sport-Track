<?php
    class Entry {
        private $id;
        private $activiteId;
        private $altitude;
        private $longitude;
        private $latitude;
        private $frequence;
        private $temps;
        
        public function __construct() {
            
        }

        public function init($id, $activiteId, $altitude, $longitude, $latitude, $frequence, $temps) {
            $this->id = $id;
            $this->activiteId = $activiteId;
            $this->altitude = $altitude;
            $this->longitude = $longitude;
            $this->latitude = $latitude;
            $this->frequence = $frequence;
            $this->temps = $temps;
        }

        public function getId() {
            return $this->id;
        }

        public function getActiviteId() {
            return $this->activiteId;
        }

        public function getAltitude() {
            return $this->altitude;
        }

        public function getLongitude() {
            return $this->longitude;
        }

        public function getLatitude(){
            return $this->latitude;
        }

        public function getCardio(){
            return $this->frequence;
        }

        public function getTemps(){
            return $this->temps;
        }

        public function setAltitude($altitude) {
            $this->altitude = $altitude;
        }

        public function setLongitude($longitude) {
            $this->longitude = $longitude;
        }

        public function setLatitude($latitude) {
            $this->latitude = $latitude;
        }

        public function setCardio($frequence){
            $this->frequence = $frequence;
        }

        public function setTemps($temps){
            $this->temps = $temps;
        }

        public function removeEntry() {
            $actEntryDAO = ActivityEntryDAO::getInstance();
            $actEntryDAO->delete($this);
        }
    }
?>