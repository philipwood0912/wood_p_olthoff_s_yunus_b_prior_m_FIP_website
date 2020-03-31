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
function addHomeItem($title, $text){
    $pdo = Database::getInstance()->getConnection();
    $insert_query = 'INSERT INTO tbl_home(Title, Text) VALUES(:title, :text)';
    $insert_item = $pdo->prepare($insert_query);
    $insert_success = $insert_item->execute(
        array(
            ':title'=>$title,
            ':text'=>$text
        )
    );
    if($insert_success){
        redirect_to('mng_content.php');
    } else {
        return false;
    }
}
function editHomeItem($id, $title, $text){
    $pdo = Database::getInstance()->getConnection();
    $update_query = 'UPDATE tbl_home SET Title =:title, Text =:text WHERE ID =:id';
    $update_item = $pdo->prepare($update_query);
    $update_success = $update_item->execute(
        array(
            ':title'=>$title,
            ':text'=>$text,
            ':id'=>$id
        )
    );
    if($update_success){
        redirect_to('mng_content.php');
    } else {
        return false;
    }
}