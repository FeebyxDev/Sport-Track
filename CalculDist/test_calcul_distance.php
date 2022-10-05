<?php
    include 'CalculDistanceImpl.php';
    function test() {
        $lat1 = (float) 47.664259; 
        $lng1 = (float) -2.757912;
        $lat2 = (float) 48.44399;
        $lng2 = (float) -2.025889;

        return CalculDistanceImpl::calculDistance2PointsGPS($lat1, $lng1, $lat2, $lng2);
    }

    echo test();
?>