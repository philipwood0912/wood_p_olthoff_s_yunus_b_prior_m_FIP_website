<?php

function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '.$tbl;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else {
        return 'There was a problem..';
    }
};
function getItem($id, $tbl){
    $pdo = Database::getInstance()->getConnection();
    $queryAll = 'SELECT * FROM '.$tbl.' WHERE ID =:id';
    $results = $pdo->prepare($queryAll);
    $results->execute(
        array(
            ':id'=>$id
        )
    );
    return $results;
}
function deleteItem($id, $tbl){
    $pdo = Database::getInstance()->getConnection();
    $delete_query = 'DELETE FROM '.$tbl.' WHERE ID =:id';
    $delete_item = $pdo->prepare($delete_query);
    $delete_success = $delete_item->execute(
        array(
            ':id'=>$id
        )
    );
    $count = $delete_item->rowCount();
    if($delete_success && $count > 0 ){
        redirect_to('mng_content.php');
    } else {
        return false;
    }
}
function addHomeItem($args){
    try {
        $pdo = Database::getInstance()->getConnection();
        $image = $args['image'];
        $upload_file = pathinfo($image['name']);
        $accepted_types = array('svg');
        if(!in_array($upload_file['extension'], $accepted_types)){
            throw new Exception('Wrong file type!');
        }
        $image_path = '../public/images/';
        $generated_name = md5($upload_file['filename'].time());
        $generated_filename = $generated_name.'.'.$upload_file['extension'];
        $targetpath = $image_path.$generated_filename;
        if(!move_uploaded_file($image['tmp_name'], $targetpath)){
            throw new Exception('Failed to move uploaded file, check permission!');
        }
        $insert_content_query = 'INSERT INTO tbl_home(Title, Text, Image)';
        $insert_content_query .= ' VALUES(:title, :text, :image)';
        $insert_content = $pdo->prepare($insert_content_query);
        $insert_success = $insert_content->execute(
            array(
                ':title'=>$args['title'],
                ':text'=>$args['text'],
                ':image'=>$generated_filename
            )
        );
        $last_uploaded_id = $pdo->lastInsertId();
        // insert info link table for gender / category
        if($insert_success){
            redirect_to('mng_content.php');
        } else {
            return "Something went wrong..";
        }
    } catch(Exception $e){
        $error = $e->getMessage();
        return $error;
    }
    // $pdo = Database::getInstance()->getConnection();
    // $insert_query = 'INSERT INTO tbl_home(Title, Text) VALUES(:title, :text)';
    // $insert_item = $pdo->prepare($insert_query);
    // $insert_success = $insert_item->execute(
    //     array(
    //         ':title'=>$args['title'],
    //         ':text'=>$args['text']
    //     )
    // );
    // if($insert_success){
    //     redirect_to('mng_content.php');
    // } else {
    //     return false;
    // }
}
function editHomeItem($args){
    $pdo = Database::getInstance()->getConnection();
    $update_query = 'UPDATE tbl_home SET Title =:title, Text =:text WHERE ID =:id';
    $update_item = $pdo->prepare($update_query);
    $update_success = $update_item->execute(
        array(
            ':title'=>$args['title'],
            ':text'=>$args['text'],
            ':id'=>$args['id']
        )
    );
    if($update_success){
        redirect_to('mng_content.php');
    } else {
        return false;
    }
}