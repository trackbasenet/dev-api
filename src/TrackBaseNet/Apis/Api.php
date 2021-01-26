<?php

namespace TrackBaseNet\Apis;

use TrackBaseNet\Helpers\ApiCaller;

class Api
{
	protected $game = 'et';

	protected $id;

	protected $token;

	protected $_aak;

	protected $options = [];

	private $response;

	public function __construct($game, $id, $token, $_aak, array $options = [])
	{
		$this->game = $game;
		$this->id = $id;
		$this->token = $token;
		$this->_aak = $_aak;

		$this->setOptions($options);

		$this->fetchResults();
	}

	public function setOptions(array $options = [])
	{
		// Set default if empty
		$options_ = $this->defaultOptions;

		$this->options = array_merge($options_, array_change_key_case($options, CASE_LOWER));

		return $this;
	}

	private function composeData()
	{
		return array_merge(
			$this->options,
			[
				'app' => $this->id,
				'token' => $this->token,
				'_aak' => $this->_aak
			]
		);
	}

	protected function fetchResults()
	{
		$this->response = json_decode(ApiCaller::call('GET', $this->hostUri(), $this->composeData()));
	}

	public function countResults()
	{
		return $this->response->count ?? 0;
	}

	public function firstResult()
	{
		if (!is_null($this->response) && !empty($this->response->results)) {
			if (is_array($this->response->results)) {
				return $this->response->results[0];
			} else {
				return $this->response->results;
			}
		}
	}
	
	public function getResults()
	{
		return $this->response->results ?? [];
	}

	public function getStatusCode()
	{
		return $this->response->code ?? null;
	}

	public function getMessage()
	{
		return $this->response->message ?? '';
	}

	public function getError()
	{
		return $this->response->error ?? '';
	}

	public function getErrorCode()
	{
		return $this->response->errorcode ?? 0;
	}

	public function hasErrors()
	{
		return !is_null($this->response->errorcode) && $this->response->errorcode !== 0;
	}
}