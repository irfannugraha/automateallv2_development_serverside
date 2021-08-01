<?php

namespace App\Models;

use CodeIgniter\Model;

class cobaModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'name',
        'email',
        'password',
    ];
    protected $deletedField = 'updated_at';
    protected $useSoftDeletes = true;

    public function FunctionName()
    {
        return $this->delete('9');
    }
}