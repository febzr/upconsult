<?php
$access_token = "TEST-4347360308719648-101722-235750956ec06e726a73669e199d21d6-553546048";
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken($access_token);

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = 'upconsult';
$item->quantity = 1;
$item->unit_price = 50.00;
$preference->items = array($item);

$preference->back_urls = array(
    "success" => "localhost/sucessopagamento",
    "failure" => "localhost/falhapagamento",
    "pending" => "localhost/pendentepagamento"
);

$preference->notification_url = "localhost/watchdog.php";
$preference->external_reference = "upconsult";
$preference->save();

$link = $preference->init_point;
echo $link;
?>

