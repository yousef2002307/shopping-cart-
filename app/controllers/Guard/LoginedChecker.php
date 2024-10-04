<?php
namespace App\Controllers\Guard;
class LoginedChecker  {
    public static function check(){
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
}