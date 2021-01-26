<?php

namespace TrackBaseNet\Apis;


class ClanApi extends Api implements ApiInterface
{
	protected $defaultOptions = [
		'cid' => 1,
		'order' => 'asc',
	];

	public function hostUri()
	{
		return self::hostname . '/clans/' . $this->game . '.php';
	}
}