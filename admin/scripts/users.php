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

    function searchUser($username){
        $pdo = Database::getInstance()->getConnection();
        $search_query = 'SELECT * FROM `tbl_users` WHERE User_Name =:username';
        $user_search = $pdo->prepare($search_query);
        $user_search->execute(
            array(
                ':username'=>$username
            )
        );
        if($row = $user_search->fetch(PDO::FETCH_ASSOC)){
            $results[] = $row;
            if($row = null){
                return null;
            } else {
                return $results;
            }
        }
    }
    function deleteUser($username){
        $pdo = Database::getInstance()->getConnection();
        $check_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE User_Name =:username';
        $user_check = $pdo->prepare($check_query);
        $user_check->execute(
            array(
                ':username'=>$username
            )
        );
        if($user_check->fetchColumn()>0){
            $delete_query = 'DELETE FROM `tbl_users` WHERE User_Name =:username';
            $user_delete = $pdo->prepare($delete_query);
            $delete_success = $user_delete->execute(
                array(
                    ':username'=>$username
                )
            );
            if($delete_success){
                return "User was successfully deleted!";
            } else {
                return "Something went wrong..";
            }
        } else {    
            return "User does not exist!";
        }
    }
