<?php

namespace App\Models;
use CodeIgniter\Model;
use Exception;

class BlogModel extends Model
{
    protected $table = 'news';
    protected $primarykey = 'id';
    protected $allowedFields = ['judul', 'isi', 'tanggalUpload', 'isDeleted', 'img'];
}

// public function date()
// {
//     return $this->db->where('id_peserta',$id_peserta)->get('laporan')->row();
// }

?>