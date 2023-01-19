<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['judul', 'pengarang', 'tempatterbit', 'isbn', 'jmlhal', 'penerbit', 'edisicetak', 'thnterbit', 'noinvent', 'jmleksemplar', 'idklas'];
    protected $useTimestamps = true;
    protected $dateFormat = 'date';
    protected $createdField = '';
    protected $updatedField = '';
}