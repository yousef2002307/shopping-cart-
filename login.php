<?php
include 'init.php';

use App\Controllers\Guard\LoginedChecker;
use App\Controllers\Guard\LoginSentizer;

if(LoginedChecker::check()){
    header("Location:home.php");
}

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $arrofdata = new LoginSentizer();
    $data = $arrofdata->senetizedata($email,$password);
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $data['email']); 
    $stmt->bindParam(':password', $data['password']); 
    $stmt->execute();
    $user = $stmt->fetch();

    if($user){
        $_SESSION['id'] = $user['id'];
        header("Location:home.php");
    }else{
        $errors[] = "email or password is wrong";
    }
}

foreach($errors as $error){
    echo "<div class='alert alert-danger'>". $error . "</div>";
}
?>
<!doctype html>
<html>

<head>

  <title>yousef</title>
  <meta charset="UTF-8" />
  <meta name="robots" description='unfollow' />
  <!--عشان تخليه ريسبونسيف ويشتغل الانترننت الاكسبلولر-->


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="css/icons-fonts.css"/>

  <link rel="stylesheet" href="css/style.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
 
<style>
  
</style>
<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCuTilAfnGfkZtIx0T3qf-eOmWZ_N2LpoY"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" style="margin-top: 200px;">
<div class="form-group text-center">
<label for="exampleInputEmail1">Email address</label>
    <input class="form-control" type="email" name="email"/>
    <small id="emailHelp" class="form-text text-muted d-block text-left">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group text-center">
    <label for="exampleInputPassword1">Password</label>
    
    <input class="form-control" type="password" name="password"/>
    </div>
    <div class="form-group text-center">
    <input class="btn btn-primary" type="submit" value="submit"/>
    </div>
</form>

</body>
</html>