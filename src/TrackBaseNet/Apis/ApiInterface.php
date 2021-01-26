<?php

namespace TrackBaseNet\Apis;

interface ApiInterface {
	const TrackBaseIps = [
		'91.220.53.120',
		'91.220.53.121'
	];

	const hostname = 'https://api.trackbase.net';

	const userAddUri = 'https://developers.trackbase.net/relations/connect?app=%s&token=%s';

	public function countResults();

	public function firstResult();
	
	public function getResults();
}