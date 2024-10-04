<?php
require 'vendor/autoload.php';
//AeX-1L-KZ7TtUc1IiYDH3JzsOw1Ly6J8G7v2utXdcZ8AAd5bJtjKLdyjk_jxckyWuctkgRiwR3awJbbT
//ENIjrB_zm78UYVWNHq4xUX7SzsczXrJZmomT2zLR7STqVdcKMuCXs_7CsiS1t5e3ESLIPm3MNKGJOjsv
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AaTo4p6pkR7eaGNZ284vw_BS1om8TLv1IzMOcz3EpCDpu9GWl4TVVDcNVE7ys4CTx-42Z7PI0oVURZnQ',     // Client ID
        'EOdp7AVC892IuLI9xX9voOJLis4P0QvVqDwVDarXZMrMzpymtcjAaJY4NfMPUHD3MsqGqhBQn0kPyY-k'     // Secret Key
    )
);

$apiContext->setConfig([
    'mode' => 'sandbox',  // Change to 'live' for production
    'log.LogEnabled' => true,
    'log.FileName' => 'PayPal.log',
    'log.LogLevel' => 'DEBUG',
]);

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('10.99');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl('http://example.com/return')
             ->setCancelUrl('http://example.com/cancel');

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);
try {
    $payment->create($apiContext);
    echo $payment;
} catch (Exception $ex) {
    echo $ex->getMessage();
}


$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

$execution = new \PayPal\Api\PaymentExecution();
$execution->setPayerId($payerId);

try {
    $result = $payment->execute($execution, $apiContext);
    echo $result;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
