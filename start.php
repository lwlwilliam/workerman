<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');
var_dump(ini_get('display_errors'), ini_get('error_reporting'), E_ALL);
use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
require_once __DIR__ . '/vendor/autoload.php';

//$http_worker = new Worker("http://0.0.0.0:20001");
$http_worker = new Worker("http://0.0.0.0:10005");

$http_worker->count = 4;

$http_worker->onMessage = function(TcpConnection $connection, Request $request)
{
    $connection->send('hello world');
};

Worker::runAll();
