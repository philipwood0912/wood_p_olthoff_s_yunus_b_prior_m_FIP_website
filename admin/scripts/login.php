<?php

function login($username, $password){
    $pdo = Database::getInstance()->getConnection();
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
     );

    if($user_set->fetchColumn()>0){
        $check_match_query = 'SELECT * FROM `tbl_users` WHERE user_name =:username AND user_pass =:password';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );
        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $id = $founduser['ID'];
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $founduser['User_Name'];
        }
        if(isset($id)){
            //redirect_to('admin/dashboard.php');
            redirect_to('dashboard.php');
        } else {
            return 'wrong password';
        }
    } else {
        return 'User does not exist!';
    }
}