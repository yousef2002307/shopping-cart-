<?php
namespace App\Controllers\Guard;
class RegisterSentizer extends Register  {
    protected $errors = [];
    public function __construct(string $name,string $email,string $password) {
        parent::__construct($name,$email,$password);

     
    }
    public function isThereIsErrors() : bool
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = "email format is wrong";
           
        }

        if (strlen($this->name) < 5) {
            $this->errors[] = "name is too short";
           
        }

        if (strlen($this->password) < 5) {
            $this->errors[] = "password is too short must be larger than 4";
          
        }
if (!is_numeric($this->password)) {
    $this->errors[] = "passwords must be numeric";
}
        return count($this->errors) > 0;
    }
    public function ReturnErrors():array{
        return $this->errors;
    }
}

