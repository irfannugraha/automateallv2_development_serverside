<?php namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\cobaModel;

class Home extends BaseController
{
	public function __construct() {
		$cobaModel = new cobaModel();
	}

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
			[
				[
					'umur' => 10,
					'gender' => 'laki'
				],
				[
					'umur' => 10,
					'gender' => 'laki'
				]
			]
		);
	}
}