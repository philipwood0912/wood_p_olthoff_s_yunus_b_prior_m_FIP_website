<?php
// login function with basic encryption - username and password as parameters
function login($username, $password){
    $pdo = Database::getInstance()->getConnection();
    // check user existance
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
     );
    if($user_set->fetchColumn()>0){
        // grab user info
        $check_match_query = 'SELECT * FROM `tbl_users` WHERE User_Name =:username';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username
            )
        );
        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['user_id'] = $founduser['ID'];
            $_SESSION['name'] = $founduser['F_Name'];
            // set pass hash and verify against input password
            $pass_hash = $founduser['User_Pass'];
            $pass_ver = password_verify($password, $pass_hash);
        }
        // if password is verified - redirect to dashboard
        if($pass_ver){
            redirect_to('dashboard.php');
        } else {
            return 'Wrong password';
        }
    } else {
        return 'User does not exist!';
    }
}