<?php

use Thrift\Transport\TPhpStream;

require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    include_once __DIR__ . "/gen-php/$class.php";
});

$handler = new class() implements KiruganIf {

    public function ping()
    {
        // TODO: Implement ping() method.
    }

    public function doit()
    {
        return [2323 => true, 3223 => true];
    }
};

$processor = new KiruganProcessor($handler);

$transport = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);
$protocol = new \Thrift\Protocol\TBinaryProtocol($transport, true, true);
$transport->open();
$processor->process($protocol, $protocol);
$transport->close();