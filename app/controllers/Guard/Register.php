<?php
namespace App\Controllers\Guard;
class Register  {
    protected $name;
    protected $email;
    protected $password;
    public function __construct( $name,  $email, $password)
    {
       $this->name =  $name;
         $this->email = $email;
         $this->password = $password;
    }
}