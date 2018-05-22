<?php
require __DIR__ . '/vendor/autoload.php';

use Code\Moip\Enviroment\Sandbox;
use Code\Moip\Sdk\Subscription;
use GuzzleHttp\Client;

if(!file_exists( $file =__DIR__ . '/config/credentials.php')) {
  die('Arquivo de credenciais não encontrado!');
} else {
	$credentials = require $file;
}

$client = new Client(array(
	'request.options' => array(
		'exceptions' => false,
	)
));

$enviroment = new Sandbox(
	$credentials['token'],
	$credentials['key']
);

$subscriptor = new Subscription($client);
$subscriptor->setEnviroment($enviroment);

$result = $subscriptor->makeSubscription();

print $result->getBody();


