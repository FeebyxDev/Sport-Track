<?php
    class CalculDistanceImpl {

        /**
         * Calculate Distance between 2 points
         * @return - float km of the distance
         */
        public static function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float{
            $pi80 = M_PI / 180;
            $lat1 *= $pi80;
            $long1 *= $pi80;
            $lat2 *= $pi80;
            $long2 *= $pi80;
    
            $r = 6372.797; // rayon moyen de la Terre en km
            $dlat = $lat2 - $lat1;
            $dlng = $long2 - $long1;
            $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $km = $r * $c;
        
            return (float) $km*1000;
        }
        /**
         * Calculate the Distance between points in the array
         * @return - float metres of the distance
         */
        public static function CalculDistanceTrajet(Array $parcours): float {
            $ret = 0.0;
            for ($i=0; $i <= count($parcours)-3; $i = $i+2) { 
                $ret += (float) CalculDistanceImpl::calculDistance2PointsGPS($parcours[$i],$parcours[$i+1],$parcours[$i+2],$parcours[$i+3]);
            }
            return $ret;
        }
    }
?>