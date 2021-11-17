<?php declare(strict_types=1);

use service\SimpleCacheService;
use Dpl\SimpleCache\SimpleCacheInterface;
use Spiral\Goridge\StreamRelay;
use Spiral\RoadRunner\Worker;
use Spiral\GRPC\Server;

ini_set('display_errors', 'stderr'); // error_log will be reflected properly in roadrunner logs
require "vendor/autoload.php";

//To run server in debug mode - new \Spiral\GRPC\Server(null, ['debug' => true]);
$server = new Server();

// Register our cache service
$server->registerService(SimpleCacheInterface::class, new SimpleCacheService());

// RoadRunner to PHP communication will happen over stdin and stdout pipes
$relay = new StreamRelay(STDIN, STDOUT);
$w = new Worker($relay);
$server->serve($w);