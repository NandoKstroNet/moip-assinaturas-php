<?php
namespace Code\Moip\Sdk;

use Code\Moip\Enviroment\Enviroment;
use GuzzleHttp\Client;

class Subscription
{
	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @var Enviroment
	 */
	private $enviroment;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function setEnviroment(Enviroment $enviroment)
	{
		$this->enviroment = $enviroment;
	}

	public function makeSubscription()
	{
		$data = [
			"code" => "assinatura23",
			"amount" => "1599",
			"payment_method" => "CREDIT_CARD",
			"store" => false,
			"plan" => [
				"name" => "Ionic Hero Mensal",
				"code" => "1527013019"
			],
			"customer" => [
				"code" => "cliente03",
				"email" => "nome@exemplo.com.br",
				"fullname" => "Nome Sobrenome",
				"cpf" => "22222222222",
				"phone_number" => "934343434",
				"phone_area_code" => "11",
				"birthdate_day" => "26",
				"birthdate_month" => "04",
				"birthdate_year" => "1986",
				"address" => [
					"street" => "Rua nome da Rua",
					"number" => "170",
					"complement" => "Casa",
					"district" => "Bairro",
					"city" => "São Paulo",
					"state" => "SP",
					"country" => "BRA",
					"zipcode" => "00000000"
				],
				"billing_info" => [
					"credit_card" => [
						"holder_name" => "Nome Completo",
						"number" => "4111111111111111",
						"expiration_month" => "04",
						"expiration_year" => "25",
					],
				],
			]
		];

		$response = $this->client->request('POST', $this->enviroment->apiUrl . '?new_customer=true',
			 [
			 	'body' => json_encode($data),
			    'headers' => [
			        'Authorization' => 'Basic ' . base64_encode($this->enviroment->token . ':' . $this->enviroment->key),
				    'Content-Type'  => 'application/json'
			    ]
			 ]
			);

		return $response;
	}
}
