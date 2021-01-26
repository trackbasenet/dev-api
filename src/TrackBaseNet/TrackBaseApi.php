<?php

/**
 * This is the TrackBase API for Developers
 * It is hosted on Github under trackbasenet/dev-api
 * or https://github.com/trackbasenet/dev-api
 * @author JoNny / github.com/trackbasenet
 * @version 0.1
 * For questions please visit https://forum.trackbase.net
 * or our Discord server under https://discord.gg/JFzd8hH
 */

namespace TrackBaseNet;

use TrackBaseNet\Apis\RanklistApi;
use TrackBaseNet\Apis\PlayerApi;
use TrackBaseNet\Apis\ClanApi;
use TrackBaseNet\Apis\ServerApi;
use TrackBaseNet\Apis\UserApi;


class TrackBaseApi
{	
	const ALLOWED_GAMES = ['et'];

	protected $app_id;

	private $token;

	private $_aak;

	protected $options = [];

	private $apis = [];

	public function __construct($app_id, $token, $_aak, array $options = [])
	{
		$this->app_id = $app_id;
		$this->token = $token;
		$this->_aak = $_aak;

		$this->setOptions($options);
	}

	public function getAppId()
	{
		return $this->app_id;
	}

	public function getOptions()
	{
		return $this->options;
	}

	public function setOptions(array $options = [])
	{
		// Default options
		$options_ = [
			'game' => 'et'
		];

		$options = array_map('mb_strtolower', array_change_key_case($options, CASE_LOWER));

		if (!empty($options['game']) && !in_array($options['game'], self::ALLOWED_GAMES, true)) {
			$options['game'] = $options_['game'];
		}

		$this->options = array_merge($options_, $options);

		return $this;
	}

	public function getOption($option)
	{
		return $this->options[mb_strtolower($option)] ?? null;
	}

	public function setOption($key, $value)
	{
		$this->setOptions([$key => $value]);

		return $this;
	}

	private function _ranklistApi(array $options = [])
	{
		// Generating new object to take into account all changes made to $this->options and $options
		return new RanklistApi($this->options['game'], $this->app_id, $this->token, $this->_aak, $options);
	}

	public function ranklist(array $options = [])
	{
		$options['type'] = 'normal';
		$options['list'] = 'players';

		return $this->_ranklistApi($options);
	}

	public function toplist(array $options = [])
	{
		$options['type'] = 'tsp';
		$options['list'] = 'players';

		return $this->_ranklistApi($options);
	}

	public function clanRanklist(array $options = [])
	{
		$options['type'] = 'normal';
		$options['list'] = 'clans';

		return $this->_ranklistApi($options);
	}

	public function clanToplist(array $options = [])
	{
		$options['type'] = 'tsp';
		$options['list'] = 'clans';

		return $this->_ranklistApi($options);
	}

	private function _playerApi(array $options = [])
	{
		return new PlayerApi($this->options['game'], $this->app_id, $this->token, $this->_aak, $options);
	}

	public function playerInfo(array $options = [])
	{
		$options['rcv'] = 'playerinfo';

		return $this->_playerApi($options);
	}

	public function playerServers(array $options = [])
	{
		$options['rcv'] = 'serverslist';

		return $this->_playerApi($options);
	}

	public function playerSessions(array $options = [])
	{
		$options['rcv'] = 'sessionslist';

		return $this->_playerApi($options);
	}

	public function _clanApi(array $options = [])
	{
		return new ClanApi($this->options['game'], $this->app_id, $this->token, $this->_aak, $options);
	}

	public function clanInfo(array $options = [])
	{
		return $this->_clanApi($options);
	}


	public function _serverApi(array $options = [])
	{
		return new ServerApi($this->options['game'], $this->app_id, $this->token, $this->_aak, $options);
	}

	public function serverInfo(array $options = [])
	{
		$options['rcv'] = 'serverinfo';

		return $this->_serverApi($options);
	}

	public function serverSessions(array $options = [])
	{
		$options['rcv'] = 'sessionslist';
		$options['order-by'] = 'time';

		return $this->_serverApi($options);
	}

	public function serverUsage(array $options = [])
	{
		$options['rcv'] = 'playerusage';

		return $this->_serverApi($options);
	}

	public function _userApi(array $options = [])
	{
		return $this->apis['user'] ?? $this->apis['user'] = new UserApi($this->app_id, $this->token, $this->_aak, $options);
	}

	public function userInfo(array $options = [])
	{
		return $this->_userApi($options);
	}

	public function getUser($userid, $request = 0)
	{
		return $this->_userApi([
			'uid' => $userid,
			'request' => $request		
		]);
	}

	public function connectUser()
	{
		return header('Location: ' . $this->_userApi()->userAddUri());
	}

	public function collectNewUser($returnToken, callable $function)
	{
		return $this->_userApi()->collectNewUser($returnToken, $function);
	}
}