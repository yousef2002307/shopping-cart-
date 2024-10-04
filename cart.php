<?php
include "init.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
//add order
$id = $_POST['id'];
$number = $_POST['quantity'];
$actualquantity = $_POST['actual'];
//check if the product is in stock
$stmt2 = $db->prepare("SELECT * FROM orders WHERE user_id = ? AND product_id = ?");
$stmt2->execute(array($_SESSION['id'],$id));
$row = $stmt2->rowCount();
$data = $stmt2->fetch();
$order_id = $data['id'];
// echo $order_id;
// echo $row;
// exit;
if($row <= 0){



$stmt = $db->prepare("Insert into orders(product_id	,user_id	,quantity) values(?,?,?)");
$stmt->execute(array($id,$_SESSION['id'],$number));
}else{
    $stmt = $db->prepare("UPDATE orders SET quantity = quantity + ? WHERE id = ?");
    $stmt->execute(array($number,$order_id));
    
}
// reduce quantity
$stmt = $db->prepare("UPDATE products set quantity = quantity - ? where id = ?");

$stmt->execute(array($number,$id));

if($stmt){
    $_SESSION['success'] = "order added successfully";
    header("Location: home.php");
}else{
    $_SESSION['error'] = "something went wrong";
    header("Location: home.php");
}
}else{
    header("Location: home.php");
}