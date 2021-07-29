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
        return $this->respond([
            'status' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('tanggalUpload', 'ASC')->findAll(5)
        ], 200);
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