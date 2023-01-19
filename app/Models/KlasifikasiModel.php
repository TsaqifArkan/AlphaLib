<?php

namespace App\Models;

use CodeIgniter\Model;

class KlasifikasiModel extends Model
{
    protected $table = 'klasifikasi';
    protected $primaryKey = 'idklasifikasi';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['noklas', 'nama'];
    protected $useTimestamps = true;
    protected $dateFormat = 'date';
    protected $createdField = '';
    protected $updatedField = '';
}