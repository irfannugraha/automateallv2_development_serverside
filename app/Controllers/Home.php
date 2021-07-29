<?php namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
	public function index()
	{
		return $this->getResponse(
			'automateall.id V2',
			200,
		);
	}

	public function cobajwt()
	{
		return $this->getResponse(
			'JWT Diterima',
			ResponseInterface::HTTP_OK,
		);
	}
}