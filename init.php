<?php
session_start();

require_once "vendor/autoload.php";

use Omnipay\Omnipay;


include 'connection.php';

define('CLIENT_ID', 'AeX-1L-KZ7TtUc1IiYDH3JzsOw1Ly6J8G7v2utXdcZ8AAd5bJtjKLdyjk_jxckyWuctkgRiwR3awJbbT');
define('CLIENT_SECRET', 'ENIjrB_zm78UYVWNHq4xUX7SzsczXrJZmomT2zLR7STqVdcKMuCXs_7CsiS1t5e3ESLIPm3MNKGJOjsv');

define('PAYPAL_RETURN_URL', 'http://localhost/problemsolving/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/problemsolving/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here

try {
    // ... (PayPal integration code)

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true);
} catch (Exception $e) {
    // Handle exceptions and provide informative error messages
    echo "An error occurred: " . $e->getMessage();
}
$cartcount = 0;
if(isset($_SESSION['id'])){
    $stmt = $db->prepare("SELECT SUM(quantity) AS total FROM orders WHERE user_id = ?");
    $stmt->execute(array($_SESSION['id']));
    $cartcount = $stmt->fetch()['total'] ?? 0;
}
//sb-95m5432495180@business.example.com

//r|>n^P3g
