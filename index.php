<?php
include 'init.php';
use App\Controllers\Guard\LoginedChecker;
if(!LoginedChecker::check()){
  header("Location:register.php");











}else{
echo "welcome home";

  
}
?>













<?php
include "footer.php";