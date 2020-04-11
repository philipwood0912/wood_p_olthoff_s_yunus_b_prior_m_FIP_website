<?php

function login($username, $password){
    $pdo = Database::getInstance()->getConnection();
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
     );

    if($user_set->fetchColumn()>0){
        $check_match_query = 'SELECT * FROM `tbl_users` WHERE User_Name =:username';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username
            )
        );
        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['user_id'] = $founduser['ID'];
            $_SESSION['username'] = $founduser['User_Name'];
            $pass_hash = $founduser['User_Pass'];
            $pass_ver = password_verify($password, $pass_hash);
        }
        if($pass_ver){
            redirect_to('dashboard.php');
        } else {
            return 'wrong password';
        }
    } else {
        return 'User does not exist!';
    }
}