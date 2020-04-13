<?php 

    require_once '../load.php';
    // function to grab about page content
    // return encoded array with content
    function grabAboutContent(){
        $pdo = Database::getInstance()->getConnection();
        $about_query = 'SELECT * FROM tbl_about';
        $about_data = $pdo->query($about_query);
        $content = array();
        while($data = $about_data->fetch(PDO::FETCH_ASSOC)){
            $result = array();
            $result['content_id'] = $data['ID'];
            $result['title'] = $data['Title'];
            $result['text'] = $data['Text'];
            $content[] = $result;
        }
        echo json_encode($content); 
    }
    grabAboutContent();