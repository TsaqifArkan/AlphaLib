<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KlasifikasiModel;

class Klasifikasi extends BaseController
{
    protected $klasifikasiModel, $db, $builder, $bukuModel;

    public function __construct()
    {
        $this->klasifikasiModel = new KlasifikasiModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('klasifikasi');
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['title'] = 'Klasifikasi';
        return view('klasifikasi/index', $data);
    }
    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data['datas'] = $this->klasifikasiModel->findAll();
            $msg['data'] = view('klasifikasi/tableklasifikasi', $data);
            echo json_encode($msg);
        }
    }

    public function formTambah()
    {
        if ($this->request->isAJAX()) {
            $msg['data'] = view('klasifikasi/modaltambah');
            echo json_encode($msg);
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'noKlas' => [
                    'label' => 'Nomor Klasifikasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Klasifikasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'noKlas' => $this->validation->getError('noKlas'),
                        'nama' => $this->validation->getError('nama')
                    ]
                ];
            } else {
                // Insert ke DB
                $inputData = [
                    'noklas' => $this->request->getPost('noKlas'),
                    'nama' => $this->request->getPost('nama')
                ];
                $this->klasifikasiModel->insert($inputData);
                $msg['flashData'] = 'Data klasifikasi berhasil ditambahkan.';
            }
            echo json_encode($msg);
        }
    }

    public function formEdit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $data['klasifikasi'] = $this->klasifikasiModel->find($id);
            $msg['data'] = view('klasifikasi/modaledit', $data);
            echo json_encode($msg);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $valid = $this->validate([
                'noKlas' => [
                    'label' => 'Nomor Klasifikasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Klasifikasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'noKlas' => $this->validation->getError('noKlas'),
                        'nama' => $this->validation->getError('nama')
                    ]
                ];
            } else {
                $updatedData = [
                    'noklas' => $this->request->getPost('noKlas'),
                    'nama' => $this->request->getPost('nama')
                ];
                $this->klasifikasiModel->update($id, $updatedData);
                $msg['flashData'] = 'Data klasifikasi berhasil diupdate.';
            }
            echo json_encode($msg);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            // Delete 1 row data
            $this->klasifikasiModel->delete($id);
            $msg['flashData'] = 'Data klasifikasi berhasil dihapus.';
            echo json_encode($msg);
        }
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Klasifikasi Buku';
        // $data['buku'] = $this->bukuModel->find($id);
        $data['datas'] = $this->bukuModel->builder()->select('judul, isbn')->where('idklas', $id)->get()->getResultArray();
        // Get Data Klasifikasi from this id
        // $idkls = $data['buku']['idklas'];
        // $data['klas'] = $this->klasifikasiModel->find($idkls);
        $data['klas'] = $this->klasifikasiModel->find($id);
        // dd($data);
        // if (empty($data['buku'])) {
        //     return redirect()->to(base_url('buku'));
        // }
        return view('klasifikasi/detail', $data);
    }
}