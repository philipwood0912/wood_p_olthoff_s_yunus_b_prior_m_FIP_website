<?php

function changePass($oldpassword, $password){
    $pdo = Database::getInstance()->getConnection();
    $check_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Pass =:oldpass';
    $check_count = $pdo->prepare($check_query);
    $check_count->execute(
        array(
            ':oldpass'=>$oldpassword
        )
    );
    if($check_count->fetchcolumn()>0){
        $id = $_SESSION['user_id'];
        $change_pass_query = 'UPDATE `tbl_users` SET User_Pass =:pass WHERE ID = "'.$id.'"';
        $change_pass = $pdo->prepare($change_pass_query);
        $change_pass_success = $change_pass->execute(
            array(
                ':pass'=>$password
            )
        );
        if($change_pass_success){
            redirect_to('dashboard.php');
        } else {
            return "Something went wrong..";
        }
    } else {
        return "Old Password is incorrect..";
    }
}

function changeEmail($oldemail, $email){
    $pdo = Database::getInstance()->getConnection();
    $check_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE Email =:oldemail';
    $check_count = $pdo->prepare($check_query);
    $check_count->execute(
        array(
            ':oldemail'=>$oldemail
        )
    );
    if($check_count->fetchcolumn()>0){
        $id = $_SESSION['user_id'];
        $change_email_query = 'UPDATE `tbl_users` SET Email =:email WHERE ID = "'.$id.'"';
        $change_email = $pdo->prepare($change_email_query);
        $change_email_success = $change_email->execute(
            array(
                ':email'=>$email
            )
        );
        if($change_email_success){
            redirect_to('dashboard.php');
        } else {
            return "Something went wrong..";
        }
    } else {
        return "Old Email is incorrect..";
    }
}

function changeUser($oldusername, $username){
    $pdo = Database::getInstance()->getConnection();
    $check_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Name =:olduser';
    $check_count = $pdo->prepare($check_query);
    $check_count->execute(
        array(
            ':olduser'=>$oldusername
        )
    );
    if($check_count->fetchcolumn()>0){
        $id = $_SESSION['user_id'];
        $change_user_query = 'UPDATE `tbl_users` SET User_Name =:user WHERE ID = "'.$id.'"';
        $change_user = $pdo->prepare($change_user_query);
        $change_user_success = $change_user->execute(
            array(
                ':user'=>$username
            )
        );
        if($change_user_success){
            $_SESSION['username'] = $username;
            redirect_to('dashboard.php');
        } else {
            return "Something went wrong..";
        }
    } else {
        return "Old Username is incorrect..";
    }
}