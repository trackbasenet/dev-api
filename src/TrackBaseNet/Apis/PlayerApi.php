<?php

namespace TrackBaseNet\Apis;


class PlayerApi extends Api implements ApiInterface
{
	protected $defaultOptions = [
		'pid' => 1,
		'rcv' => 'playerinfo',
		'order' => 'asc',
		'limit' => 10,
		'start' => 1
	];

	public function hostUri()
	{
		return self::hostname . '/players/' . $this->game . '.php';
	}
}