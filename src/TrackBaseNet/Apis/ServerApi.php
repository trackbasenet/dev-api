<?php

namespace TrackBaseNet\Apis;


class ServerApi extends Api implements ApiInterface
{
	protected $defaultOptions = [
		'sid' => 1,
		'rcv' => 'serverinfo',
		'order-by' => 'rate',
		'order' => 'desc',
		'limit' => 10,
		'start' => 1
	];

	public function hostUri()
	{
		return self::hostname . '/servers/' . $this->game . '.php';
	}
}