<?php
    require_once '../load.php';
    function getClinics(){
        $pdo = Database::getInstance()->getConnection();
        $clinic_query = 'SELECT * FROM tbl_clinics';
        $get_clinics = $pdo->query($clinic_query);
        while($row = $get_clinics->fetch(PDO::FETCH_ASSOC)){
            $results[] = $row;
        }
        echo json_encode($results);
    }
    getClinics();