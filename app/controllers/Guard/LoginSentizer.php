<?php
namespace App\Controllers\Guard;
class LoginSentizer{
    protected $errors = [];
    public function senetizedata($email,$password) : array
    {
       $email = filter_var($email,FILTER_SANITIZE_EMAIL);
       $password = filter_var($password,FILTER_SANITIZE_NUMBER_INT);

       

      

        return [
            'email' => $email,
            'password' => $password];
    }
  
}