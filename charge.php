<?php
require_once "init.php";
if (isset($_POST['submit'])) {
$_SESSION['order_id'] = $_POST['order_id'];
    try {
        $response = $gateway->purchase(array(
            'amount' => $_POST['amount'],
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();

        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}