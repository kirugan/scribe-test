<?php
require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    include_once __DIR__ . "/gen-php/$class.php";
});
$transport = new \Thrift\Transport\TCurlClient('localhost', 9090);

$protocol = new \Thrift\Protocol\TJSONProtocol($transport);
$transport->open();
$client = new KiruganClient($protocol);

$resp = $client->doit();
var_dump($resp);

$transport->close();

