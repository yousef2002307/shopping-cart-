<?php
include "init.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
//add order
$id = $_POST['id'];
$number = $_POST['quantity'];
$org = $_POST['org'];
$buy = $_POST['buy'];


// $actualquantity = $_POST['actual'];
//check if the product is in stock
$stmt2 = $db->prepare("SELECT * FROM orders WHERE id = ?");
$stmt2->execute(array($id));
$row = $stmt2->rowCount();
$data = $stmt2->fetch();
$product_id = $data['product_id'];
// echo $order_id;
// echo $row;
// exit;

//delete order first
$stmt2 = $db->prepare("DELETE FROM orders WHERE id = ?");

$stmt2->execute(array($id));


$stmt = $db->prepare("Insert into orders(product_id	,user_id	,quantity) values(?,?,?)");
$stmt->execute(array($product_id,$_SESSION['id'],$number));

// reduce quantity

if($number > $buy){
    $stmt = $db->prepare("UPDATE products set quantity = quantity - ? where id = ?");

    $stmt->execute(array($number - $buy,$product_id));
}else if($number < $buy){   
    $stmt = $db->prepare("UPDATE products set quantity = quantity + ? where id = ?");
    $stmt->execute(array($buy - $number,$product_id));
}


if($stmt){
    $_SESSION['success'] = "order edited successfully";
    header("Location: product.php");
}else{
    $_SESSION['error'] = "something went wrong";
    header("Location: product.php");
}
}else{
    header("Location: product.php");
}