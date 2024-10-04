<?php
include 'init.php';
use App\Controllers\Guard\Logout;
  $logout = Logout::logout();
  header("Location:login.php");