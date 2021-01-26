<?php

namespace TrackBaseNet\Apis;

use TrackBaseNet\Helpers\ApiCaller;

class UserApi extends Api implements ApiInterface
{
	protected $defaultOptions = [
		'uid' => 0,
		'request' => 0
	];

	public function __construct($id, $token, $_aak, array $options = [])
	{
		$this->id = $id;
		$this->token = $token;
		$this->_aak = $_aak;

		$this->setOptions($options);

		$this->fetchResults();
	}

	public function hostUri()
	{
		return self::hostname . '/user/general.php';
	}

	public function userAddUri()
	{
		return sprintf(self::userAddUri, $this->id, $this->token);
	}

	public function collectNewUser($returnToken, callable $function)
	{
		if (!(!empty($this->id) && is_int($this->id) && $this->id > 0)) {
			// Strictly required to continue
			return;
		}

		$tb_ips = self::TrackBaseIps;

		// Used to collect user information once the user has agreed to and connected with the app.
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && in_array($_SERVER['REMOTE_ADDR'], $tb_ips, true)) {
			if (
				!empty($_POST['newRelationToken']) && $_POST['newRelationToken'] === $returnToken &&
				!empty($_POST['newRelationAppid']) && (int)$_POST['newRelationAppid'] === $this->id
			) {
				if (!empty($_POST['newRelationUserid'])) {
					// Also needs to send the success message once connected!
					echo ApiCaller::successReturnMessage();

					return $function((int)$_POST['newRelationUserid']);
				}
			}
		}
	}
}