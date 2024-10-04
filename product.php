<?php
include 'init.php';
$active = "product";
include "header.php";


$stmt = $db->prepare("SELECT orders.id AS order_id, orders.product_id, orders.quantity AS quan , orders.paid,orders.created_at,orders.id AS order_id, products.* , users.* FROM orders INNER JOIN products ON orders.product_id = products.id INNER JOIN users ON users.id = orders.user_id WHERE orders.user_id = ? AND orders.paid = 0");
$stmt->execute(array($_SESSION['id']));
$rows = $stmt->fetchAll();

if(isset($_SESSION['success'])){
  echo $_SESSION['success'];
  unset($_SESSION['success']);
}else if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}
?>
<div class="container">
<table class="table table-striped my-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">quantity</th>
      <th scope="col">total price</th>
      <th scope="col">paid</th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>
   <?php

foreach($rows as $row){
    ?>
    <tr>
      <th scope="row"><?php echo $row['order_id']  ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td><?php echo $row['quan'] ?></td>
      <td><?php echo $row['quan'] * $row['price'] ?></td>
      <td><?php echo $row['paid'] ? "yes" : "no" ?></td>
      <td>
      <form class="d-inline" action="charge.php" method="post">
    <input type="hidden" name="amount" value="<?php echo $row['quan'] * $row['price'] ?>" />
    <input type="hidden" name="order_id" value="<?php echo $row['order_id']  ?>" />
    <input class='btn btn-success' type="submit" name="submit" value="Pay Now">

       
        </form>

      <form class="d-inline" method="POST" action="edit.php"> 
        <input type="hidden" name="id" value="<?php echo $row['order_id'] ?>"/>
        <input type="hidden" name="quantity" value="<?php echo $row['quan'] ?>"/>
        <input type="hidden" name="product" value="<?php echo $row['product_id'] ?>"/>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
      <form class="d-inline" method="POST" action="delete.php"> 
        <input type="hidden" name="id" value="<?php echo $row['order_id'] ?>"/>
        <input type="hidden" name="quantity" value="<?php echo $row['quan'] ?>"/>
        <input type="hidden" name="product" value="<?php echo $row['product_id'] ?>"/>
        <button type="submit" class="btn btn-danger">Discard</button>
      </form>
    </td>
    </tr>
    <?php
}

?>
   
  </tbody>
</table>
</div>
<?php
include "footer.php";

?>