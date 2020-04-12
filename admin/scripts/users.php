<?php
    
    function createUser($fname, $lname, $email, $username, $password){
        $pdo = Database::getInstance()->getConnection();
        $check_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Name =:username';
        $user_check = $pdo->prepare($check_query);
        $user_check->execute(
            array(
                ':username'=>$username
            )
        );
        if($user_check->fetchcolumn()<1){
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = 'INSERT INTO tbl_users (F_Name, L_Name, Email, User_Name, User_Pass)';
            $insert_query .= ' VALUES (:fname, :lname, :email, :username, :password)';
            $user_insert = $pdo->prepare($insert_query);
            $user_success = $user_insert->execute(
                array(
                    ':fname'=>$fname,
                    ':lname'=>$lname,
                    ':email'=>$email,
                    ':username'=>$username,
                    ':password'=>$password_hash
                )
            );
            if($user_success){
                return "New user was successfully created!";
            } else {
                return "Something went wrong..";
            }
        } else {
            return "Username already exists!";
        }
    }

    function getSingleUser($id){
        $pdo = Database::getInstance()->getConnection();
        $get_query = 'SELECT * FROM tbl_users WHERE ID =:id';
        $get_user = $pdo->prepare($get_query);
        $user_success = $get_user->execute(
            array(
                ':id'=>$id
            )
        );
        if($user_success && $get_user->rowCount()){
            return $get_user;
        } else {
            return false;
        }
    }

    function editUser($id, $fname, $lname, $email, $username){
        $pdo = Database::getInstance()->getConnection();
        $edit_query = 'UPDATE tbl_users SET F_Name =:fname, L_Name =:lname, Email =:email, User_Name =:username WHERE ID =:id';
        $edit_user = $pdo->prepare($edit_query);
        $user_success = $edit_user->execute(
            array(
                ':id'=>$id,
                ':fname'=>$fname,
                ':lname'=>$lname,
                ':username'=>$username,
                ':email'=>$email
            )
        );
        if($user_success){
            redirect_to('mng_currentuser.php');
        } else {
            return "Something went wrong";
        }
    }

    function getAllUsers(){
        $pdo = Database::getInstance()->getConnection();
        $get_query = 'SELECT * FROM tbl_users';
        $get_user = $pdo->query($get_query);
        return $get_user;
    }

    function deleteUser($id) {
        $pdo = Database::getInstance()->getConnection();
        $delete_query = 'DELETE FROM tbl_users WHERE ID =:id';
        $delete_user = $pdo->prepare($delete_query);
        $delete_success = $delete_user->execute(
            array(
                ':id'=>$id
            )
        );
        $count = $delete_user->rowCount();
        if($delete_success && $count > 0 ){
            redirect_to('mng_users.php');
        } else {
            return 'User does not exist!';
        }
        
    }
    function passwordReset($id, $oldpass, $newpass){
        $pdo = Database::getInstance()->getConnection();
        $find_query = 'SELECT User_Pass FROM tbl_users WHERE ID =:id';
        $find_user = $pdo->prepare($find_query);
        $find_success = $find_user->execute(array(':id'=>$id));
        if($find_success){
            $pull_pass = $find_user->fetch(PDO::FETCH_ASSOC);
            $pass_verify = password_verify($oldpass, $pull_pass['User_Pass']);
            if($pass_verify){
                $hash_pass = password_hash($newpass, PASSWORD_DEFAULT);
                $reset_query = 'UPDATE tbl_users SET User_Pass =:hashpass WHERE ID =:id';
                $reset_pass = $pdo->prepare($reset_query);
                $reset_success = $reset_pass->execute(
                    array(
                        ':hashpass'=>$hash_pass,
                        ':id'=>$id
                    )
                );
                if($reset_success){
                    return "Password has been reset!";
                } else {
                    return "Something went wrong";
                }
            } else {
                return "Old password is incorrect";
            }
        } else {
            return "User not found";
        } 
    }
