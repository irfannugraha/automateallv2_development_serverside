<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class ContactController extends BaseController
{
    use ResponseTrait;
    protected $format = 'json'; // agar dapat mengembalikan data respon berbentuk json

    public function __construct()
    {
        $this->email = \Config\Services::email(); //config bawaan dari codeigniter
    }

	public function sendMail()
	{
        // source : https://codeigniter.com/user_guide/libraries/email.html
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $pesan = $this->request->getPost('pesan');

        $this->email->setFrom($email, $name);
        $this->email->setTo('contact@automateall.id'); // sesuaikan dengan alamat email yang akan diterima
        $this->email->setReplyTo($email, $name); // balas pesan ke email pengirim
        $this->email->setSubject($name); // memasukan subject dengan nama pengirim
        $this->email->setMessage('Nama : '.$name.'<br> Phone : '.$phone.'<br> Pesan : '.$pesan); // isi pesan

        if (! $this->email->send()) {
            return $this->respond([
                'status' => 500,
                'message'    => 'False',
                'data'       => 'Email Gagal Terkirim'
            ], 500);
        }
        else
        {
            return $this->respond([
                'status' => 200,
                'message'    => 'True',
                'data'       => 'Email Telah Terkirim'
            ], 200);
        }
	}
}
