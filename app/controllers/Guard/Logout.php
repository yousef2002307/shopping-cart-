<?php
namespace App\Controllers\Guard;


class Logout{

    public static function logout(){

        session_destroy();
        header("Location:login.php");
    }
}