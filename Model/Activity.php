<?php
    class Activity {
        private $Id;
        private $userId;
        private $date;
        private $Description;
        private $entries;

        public function __construct() {}

        public function init($id, $userid, $date, $description) {
            $this->Id = $id;
            $this->userId = $userid;
            $this->date = $date;
            $this->Description = $description;
            if($id != null) $this->setEntry();
        }

        public function getId() {
            return $this->Id;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function getDate() {
            return $this->date;
        }

        public function getDescription() {
            return $this->Description;
        }

        public function getEntry() {
            return $this->entries;
        }

        public function setEntry() {
            $res = ActivityDAO::getInstance()->detailsActivity($this->userId, $this->Id);
            $this->entries = $res;
        }

        public function setDesc($desc) {
            $this->Description = $desc;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function setUserId($userid) {
            $this->userId = $userid;
        }


        public function getDistance(): float {
            $distance = 0;
            $parcours = null;
            foreach($this->entries as $e) {
                $parcours[] += $e->getLatitude();
                $parcours[] += $e->getLongitude();
            }
            $distance = CalculDistanceImpl::CalculDistanceTrajet($parcours);
            return round((float) $distance, 2);
        }

        public function getTempsSeconde(): float {
            $min = null;
            $max = null;
            foreach($this->entries as $e) {
                $time = explode(":", $e->getTemps());
                $seconde = $time[0]*3600 + $time[1]*60 + $time[2];
                if($min == null && $max == null) {$min = $seconde;$max = $seconde;}

                if($min > $seconde) $min = $seconde;
                if($max < $seconde) $max = $seconde;
            }
            return $max - $min;
        }

        public function getTemps(): string {
            $temps = $this->getTempsSeconde();
            $heure = floor($temps/3600);
            $minute = floor(($temps - $heure*3600)/60);
            $seconde = $temps - $heure*3600 - $minute*60;
            if($heure < 10) $heure = "0" . $heure;
            if($minute < 10) $minute = "0" . $minute;
            if($seconde < 10) $seconde = "0" . $seconde;
            return $heure . ":" . $minute . ":" . $seconde;
        }


        public function getVitesseMoy(): float {
            $distance = $this->getDistance();
            $temps = $this->getTempsSeconde();
            return round((float) $distance/$temps, 2);
        }

        public function getVitesseMoyKilo(): float {
            $distance = $this->getDistance();
            $temps = $this->getTempsSeconde();
            return round((float) (($distance/$temps)*3600)/1000, 2);
        }

        public function getCardioMoy() {
            $cardio = 0;
            foreach($this->entries as $e) {
                $cardio += $e->getCardio();
            }
            return round((float) $cardio/count($this->entries), 2);
        }

        public function getCardioMax() {
            $cardio = null;
            foreach($this->entries as $e) {
                if($cardio < $e->getCardio() || $cardio == null) $cardio = $e->getCardio();
            }
            return $cardio;
        }

        public function getCardioMin() {
            $cardio = null;
            foreach($this->entries as $e) {
                if($cardio > $e->getCardio() || $cardio == null) $cardio = $e->getCardio();
            }
            return $cardio;
        }

        public function calculDenivele() {
            $denivele = 0;
            $denivelePos = 0;
            $deniveleNeg = 0;
            $i = 0;
            foreach($this->entries as $e) {
                if($i == 0) {
                    $i++;
                    continue;
                }
                $denivele = $e->getAltitude() - $this->entries[$i-1]->getAltitude();
                if($denivele > 0) $denivelePos += $denivele;
                else $deniveleNeg += abs($denivele);
                $i++;
            }
            return array($denivelePos, $deniveleNeg);
        }

        public function removeActivity() {
            foreach ($this->entries as $entry) {
                $entry->removeEntry();
            }
            $actDAO = ActivityDAO::getInstance();
            $actDAO->delete($this);
        }

    }
?>