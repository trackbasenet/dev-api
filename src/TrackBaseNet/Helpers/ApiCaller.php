<?php

namespace TrackBaseNet\Helpers;


class ApiCaller
{
	private $method = 'GET';
	private $url;
	private $data = [];
	
	public function __construct($url, array $data = [])
	{
		$this->url = $url;
		$this->data = $data;
	}

	public static function successReturnMessage()
	{
		return 'OK!';
	}

	public function fetch()
	{
		return self::call($this->getMethod(), $this->url, $this->data);
	}

	public static function call($method = 'GET', $url = null, array $data = [])
	{
		$curl = curl_init();

		if ($method === 'GET' && !empty($data)) {
			$url = sprintf('%s?%s', $url, http_build_query($data));
		}

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		if ($method === 'POST' && !empty($data)) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		}

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function setMethod($method)
	{
		$allowed_methods = ['GET', 'POST'];

		if (in_array($method, $allowed_methods)) {
			$this->method = mb_strtoupper($method);
		}
	}
}