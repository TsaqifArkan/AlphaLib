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

    public function updNoInv($idbuku, bool $first = false)
    {
        $db = \Config\Database::connect();
        // Condition it is the first data
        if ($first) {
            $lastNo = 0;
        } else {
            $prevID = $db->query("SELECT MAX(idbuku) AS previd FROM buku WHERE idbuku < $idbuku")->getResultArray()[0]['previd'];
            $prevData = $db->query("SELECT jmleksemplar, noinvent FROM buku WHERE idbuku = $prevID")->getResultArray()[0];
            if ($prevData['jmleksemplar'] > 1) {
                $firstExp = explode(' - ', $prevData['noinvent']);
                $scnExp = explode('/', $firstExp[1]);
                $lastNo = $scnExp[1];
            } else {
                $firstExp = explode('/', $prevData['noinvent']);
                $lastNo = $firstExp[1];
            }
        }
        // dd($prevID, $prevData, $lastNo);

        $res = $db->query("SELECT idbuku, jmleksemplar, noinvent FROM buku WHERE idbuku >= $idbuku")->getResultArray();
        foreach ($res as $i => $d) {
            $id = $d['idbuku'];
            // $noInv = $d['noinvent'];
            // Updating No Invent
            $jml = $d['jmleksemplar'];
            if ($jml > 1) {
                $newNoInv = "SD1/" . strval(intval($lastNo) + 1) . ' - ' . "SD1/" . strval(intval($lastNo) + intval($jml));
            } else {
                $newNoInv = "SD1/" . strval(intval($lastNo) + 1);
            }
            $lastNo += $jml;
            // Forming
            $res[$i]['newNoInv'] = $newNoInv;
            // Updating each data after this idbuku
            $db->query("UPDATE buku SET noinvent = '$newNoInv' WHERE idbuku = $id");
        }
        // return $res;
    }
}