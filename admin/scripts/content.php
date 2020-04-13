<?php
// function to grab all from table - takes table as parameter
// add returns results to be processed
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
// function to grab specific item from table - takes id and table as parameters
// returns results to be processed
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
// function to delete specific item from table - takes id and table as parameters 
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
    // if delete was a success and row count from execution is greater than 0 redirect to content page
    if($delete_success && $count > 0 ){
        redirect_to('mng_content.php');
    } else {
        return "Something went wrong..";
    }
}
// function to add item to home section - takes args (array) as parameter
// code is same as we learned in class
// extension type only svg
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
        if($insert_success){
            redirect_to('mng_content.php');
        } else {
            return "Something went wrong..";
        }
    } catch(Exception $e){
        $error = $e->getMessage();
        return $error;
    }
}
// function to edit home item already in section - takes args (array) as parameter
// code is similar to what we learned in class - modified a bit to delete image if new one is uploaded
// or to run normal edit if no image is selected to be uploaded
// extension type is only svg
function editHomeItem($args){
    try{
        $pdo = Database::getInstance()->getConnection();
        $image = $args['image'];
        // check if image has been selected, if it has, handle new upload
        if($image['name'] != ""){
            $upload_file = pathinfo($image['name']);
            $accepted_types = array('svg');
            if(!in_array($upload_file['extension'], $accepted_types)){
                throw new Exception('Wrong file type!');
            }
            $image_path = '../public/images/';
            //delete old image file 
            unlink($image_path.$args['oldimage']);
            $generated_name = md5($upload_file['filename'].time());
            $generated_filename = $generated_name.'.'.$upload_file['extension'];
            $targetpath = $image_path.$generated_filename;
            if(!move_uploaded_file($image['tmp_name'], $targetpath)){
                throw new Exception('Failed to move uploaded file, check permission!');
            }
            // update query for item
            $update_query = 'UPDATE tbl_home SET Title =:title, Text =:text, Image =:image';
            $update_query .= ' WHERE ID =:id';
            $update_item = $pdo->prepare($update_query);
            $update_success = $update_item->execute(
                array(
                    ':title'=>$args['title'],
                    ':text'=>$args['text'],
                    ':image'=>$generated_filename,
                    ':id'=>$args['id']
                )
            );
        } else { // if it hasnt run update query without image
            $update_query = 'UPDATE tbl_home SET Title =:title, Text =:text';
            $update_query .= ' WHERE ID =:id';
            $update_item = $pdo->prepare($update_query);
            $update_success = $update_item->execute(
                array(
                    ':title'=>$args['title'],
                    ':text'=>$args['text'],
                    ':id'=>$args['id']
                )
            );
        }
        redirect_to('mng_content.php');
    }catch(Exception $e){
        $error = $e->getMessage();
        return $error;
    }
}
// function to edit specific about item in section - takes args (array) as parameter
function editAboutItem($args){
    $pdo = Database::getInstance()->getConnection();
    $update_query = 'UPDATE tbl_about SET Title =:title, Text =:text WHERE ID =:id';
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
        return 'Something went wrong..';
    }
}
// function to add item to about section - takes args (array) as parameter
function addAboutItem($args){
    $pdo = Database::getInstance()->getConnection();
    $insert_query = 'INSERT INTO tbl_about(Title, Text) VALUES(:title, :text)';
    $insert_item = $pdo->prepare($insert_query);
    $insert_success = $insert_item->execute(
        array(
            ':title'=>$args['title'],
            ':text'=>$args['text']
        )
    );
    if($insert_success){
        redirect_to('mng_content.php');
    } else {
        return "Something went wrong..";
    }
}