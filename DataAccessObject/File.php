<?php 
    function parseJson($string) {
        $json = json_decode($string, true);
        if($json == null) {
            $_SESSION['error'] = "Le fichier n'est pas au bon format !";
            header("Location: http://".$_SERVER['HTTP_HOST']."/upload");
            // throw new Exception("Invalid JSON");
        }
        return $json;
    }

    function insertActivity($json) {
        $db = SqliteConnection::getInstance()->getConnection();
        $stmt = $db->prepare('INSERT INTO ACTIVITE (userId, date, Description) VALUES (:uid,:d,:desc);');

        $userid = $_SESSION['user']->getId();

        $stmt->bindValue(':uid', $userid);
        $stmt->bindValue(':d', $json['activity']['date']);
        $stmt->bindValue(':desc', $json['activity']['description']);
        $stmt->execute();

        $activiteId = $db->lastInsertId();

        foreach ($json['data'] as $data) {
            $stmt = $db->prepare('INSERT INTO ENTRAINEMENT (activiteId, altitude, longitude, latitude, frequence, temps) VALUES (:aid,:al,:long,:lat,:freq,:tps);');

            $stmt->bindValue(':aid', $activiteId);
            $stmt->bindValue(':al', $data['altitude']);
            $stmt->bindValue(':long', $data['longitude']);
            $stmt->bindValue(':lat', $data['latitude']);
            $stmt->bindValue(':freq', $data['cardio_frequency']);
            $stmt->bindValue(':tps', $data['time']);
            $stmt->execute();
        }

        
    }
    
?>