<?php
    require_once '../load.php';

    function grabHomeContent(){
        $pdo = Database::getInstance()->getConnection();
        $home_query = 'SELECT * FROM tbl_home';
        $home_data = $pdo->query($home_query);
        $content = array();
        while($data = $home_data->fetch(PDO::FETCH_ASSOC)){
            $result = array();
            $result['content_id'] = $data['ID'];
            $result['title'] = $data['Title'];
            $result['text'] = $data['Text'];
            if($data['ID'] % 2){
                $result['class'] = "popUpLeft";
            } else {
                $result['class'] = "popUpRight";
            }
            $result['id'] = "popUp" .$data['ID'];
            $content[] = $result;
        }
        echo json_encode($content); 
    }
    grabHomeContent();