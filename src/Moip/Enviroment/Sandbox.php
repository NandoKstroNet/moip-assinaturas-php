<?php
namespace Code\Moip\Enviroment;

class Sandbox implements Enviroment
{
	/**
	 * @var string
	 */
	public $apiUrl = "https://sandbox.moip.com.br/assinaturas/v1/subscriptions";

	/**
	 * @var string
	 */
	public $token;
	/**
	 * @var string
	 */
	public $key;

	public function __construct(string $token, string $key)
	{
		$this->token = $token;
		$this->key = $key;
	}
}