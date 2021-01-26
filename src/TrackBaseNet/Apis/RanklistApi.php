<?php

namespace TrackBaseNet\Apis;


class RanklistApi extends Api implements ApiInterface
{
	protected $defaultOptions = [
		'type' => 'normal',
		'order' => 'asc',
		'limit' => 10,
		'list' => 'players',
		'start' => 1
	];

	public function hostUri()
	{
		return self::hostname . '/rankings/' . $this->game . '.php';
	}
}