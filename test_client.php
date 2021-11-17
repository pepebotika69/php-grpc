<?php

use Dpl\SimpleCache\SimpleCacheClient;

require "vendor/autoload.php";

use Grpc\ChannelCredentials;
use Dpl\SimpleCache\DelRequest;
use Dpl\SimpleCache\GetRequest;
use Dpl\SimpleCache\SetRequest;
use Spiral\GRPC\StatusCode;

$client = new SimpleCacheClient(
	'dplgrpc-service:9090',
	[
		'credentials' => ChannelCredentials::createInsecure(),
	]
);

[$response, $status] = $client->Set(new SetRequest(['key' => 'my_key1', 'value' => 'this']))->wait();
echo "================== SET ==================\n";
echo $response->getSuccess() === true, "\n";

[$response, $status] = $client->Set(new SetRequest(['key' => 'my_key2', 'value' => 'is']))->wait();
echo "================== SET ==================\n";
echo $response->getSuccess() === true, "\n";

[$response, $status] = $client->Set(new SetRequest(['key' => 'my_key3', 'value' => 'Sparta']))->wait();
echo "================== SET ==================\n";
echo $response->getSuccess() === true, "\n";


[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key1']))->wait();
echo "================== GET ==================\n";
echo $response->getkey(), " : ", $response->getvalue(), "\n";

[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key2']))->wait();
echo "================== GET ==================\n";
echo $response->getkey(), " : ", $response->getvalue(), "\n";

[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key3']))->wait();
echo "================== GET ==================\n";
echo $response->getkey(), " : ", $response->getvalue(), "\n";


[$response, $status] = $client->Del(new DelRequest(['key' => 'my_key3']))->wait();
echo "================== DEL ==================\n";
echo $response->getSuccess() === true, "\n";


[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key1']))->wait();
echo "================== GET ==================\n";
if ($status->code == StatusCode::NOT_FOUND) {
	echo 'Not found', "\n";
} else {
	echo $response->getkey(), " : ", $response->getvalue(), "\n";
}

[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key2']))->wait();
echo "================== GET ==================\n";
if ($status->code == StatusCode::NOT_FOUND) {
	echo 'Not found', "\n";
} else {
	echo $response->getkey(), " : ", $response->getvalue(), "\n";
}

[$response, $status] = $client->Get(new GetRequest(['key' => 'my_key3']))->wait();
echo "================== GET ==================\n";
if ($status->code == StatusCode::NOT_FOUND) {
	echo 'Not found', "\n";
} else {
	echo $response->getkey(), " : ", $response->getvalue(), "\n";
}
