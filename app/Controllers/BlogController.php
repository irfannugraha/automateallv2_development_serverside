<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class BlogController extends ResourceController
{  
    use ResponseTrait;
    protected $modelName = 'App\Models\BlogModel';
    protected $format = 'json';


    public function blog()
    {
        $last = $this->request->getGet('lastest');
        $currentDate = $this->request->getGet('currentDate');
        
        if($last == 1)
        {
            return $this->respond([
                'status' => 200,
                'message'    => 'OK',
                'data'       => $this->model->orderBy('createDate', 'ASC')->findAll(5) //menampilkan data terbaru by createdate
            ], 200);
        }
        elseif($currentDate)
        {
            $currDate = $this->model->where('tanggalUpload =', date("Y-m-d", strtotime($currentDate)))->findAll();
            // var_dump($currDate);
            // die();

            return $this->respond([
                'status' => 200,
                'message'    => 'OK',
                'data'       => $currDate
            ], 200);
        }
        else
        {
            return $this->respond([
                'status' => 200,
                'message'    => 'OK',
                'data'       => $this->model->findAll()
            ], 200);
        }

        
    }

    public function blogDetail($id)
    {
        if($this->model->find($id))
        {
            return $this->respond([
                'status' => 200,
                'message'    => 'OK',
                'data'       => $this->model->find($id)
            ], 200);
        }
        else
        {
            return $this->respond([
                'status' => 404,
                'message'    => 'False',
                'data'       => 'Data Tidak Ditemukan'
            ], 404);
        }
    }
}

?>