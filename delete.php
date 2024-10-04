<?php
include "init.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //add order
    $id = $_POST['id'];
    $number = $_POST['quantity'];
    $product = $_POST['product'];
    $stmt = $db->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute(array($id));
   

    //increase quantiy of product agian
    $stmt2 = $db->prepare("UPDATE products SET quantity = quantity + ? WHERE id = ?");
    $stmt2->execute(array($number,$product));
    
    if($stmt){
        $_SESSION['success'] = "order deleted successfully";
        header("Location: product.php");
    }else{
        $_SESSION['error'] = "something went wrong";
        header("Location: product.php");
    }
    }else{
        header("Location: product.php");
    }