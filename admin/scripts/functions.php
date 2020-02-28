<?php
    function redirect_to($location) {
        if($location != null){
            header('Location: '.$location);
            exit;
        }
    }

    function confirm_logged_in(){
        if(!isset($_SESSION['user_id'])){
            redirect_to('../#');
        }
    }
    
    function logout(){
        session_destroy();
        redirect_to('../#');
    }

