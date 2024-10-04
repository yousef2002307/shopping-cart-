<?php
require_once 'init.php';
 
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
 
        $sql = "INSERT INTO payments (payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssss", $payment_id, $payer_id, $payer_email, $amount, $currency, $payment_status);
        $stmt->execute();
 
        echo "Payment is successful. Your transaction id is: ". $payment_id;
    } else {
     
        $stmt = $db->prepare('UPDATE `orders` SET `paid` = 1 WHERE `orders`.`id` = ?');
        $stmt->execute(array($_SESSION['order_id']));
        $stmt2 = $db->prepare("DELETE FROM orders WHERE id = ?");
        $stmt2->execute(array($_SESSION['order_id']));
        header("Location: product.php");
        echo "--------". $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}