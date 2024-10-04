<?php

include "init.php";
include "header.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // //add order
    $id = $_POST['id'];
    $number = $_POST['quantity'];
    $product_id = $_POST['product'];
    $stmt = $db->prepare("SELECT orders.product_id, orders.quantity AS quan , orders.paid,orders.created_at,orders.id AS order_id, products.* , users.* FROM orders INNER JOIN products ON orders.product_id = products.id INNER JOIN users ON users.id = orders.user_id WHERE orders.user_id = ? AND orders.id = ? LIMIT 1");
    $stmt->execute(array($_SESSION['id'],$id));
    $rows = $stmt->fetch();
    $actualquantity = $rows['quantity'] + $number;
    $quuu = $rows['quantity'];
    ?>
    <div class="container mt-5">
    <div class="row">


<div class='col-md-3 mx-auto' data-id='$id'>
            <div class='card mb-5'>
                <img src='data:image/jpeg;base64,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' class='card-img-top' alt='Product 1'>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $rows['name'] ?></h5>
                    <p class='card-text'> <?php echo $rows['description'] ?></p>
                    <p class='card-text'>$ <?php echo $rows['price'] ?></p>
                      <p class='card-text'>available quantity :     <?php echo $actualquantity ?></p>
                    <form action= 'update.php' method='post'>
                    <input name='quantity' type='number' value=<?php echo $number?> min='1' max='<?php echo $actualquantity ?>'/>
                 <input type="hidden" name="org" value="<?php echo $quuu ?>"/>
                 <input type="hidden" name="buy" value="<?php echo $number?>"/>
                    <input type="hidden" value="<?php echo $id ?>" name="id"/>
                    <input type='submit' value='update' href='#' class='btn btn-primary'/>
                    </form>
                </div>
            </div>
        </div>

<?php
   exit;
?>


<?php

include "footer.php";

?>
<?php
    // //increase quantiy of product agian
    // $stmt2 = $db->prepare("UPDATE products SET quantity = quantity + ? WHERE id = ?");
    // $stmt2->execute(array($number,$product));
    
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

