<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo 'Automate All v2 Server Side';
	}

	public function cobajwt()
	{
		$token = $this->request->getServer('HTTP_AUTHORIZATION');
        $model = new \App\Models\UserModel();
        $data = $model->getUserByJWT($token);
		print json_encode($data, JSON_PRETTY_PRINT);
	}
}
