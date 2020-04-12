<?php
    require_once '../load.php';

    function grabHomeContent(){
        $count = 1;
        $pdo = Database::getInstance()->getConnection();
        $home_query = 'SELECT * FROM tbl_home';
        $home_data = $pdo->query($home_query);
        $content = array();
        while($data = $home_data->fetch(PDO::FETCH_ASSOC)){
            $count++;
            $result = array();
            $result['content_id'] = $data['ID'];
            $num = $count % 2;
            if($num !== 1){
                $result['class'] = "float-left";
            } else {
                $result['class'] = "float-right";
            }
            $result['title'] = $data['Title'];
            $result['text'] = $data['Text'];
            $result['image'] = $data['Image'];
            $content[] = $result;
        }
        echo json_encode($content); 
    }
    grabHomeContent();