<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel, $db, $builder;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kategori');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        return view('kategori/index', $data);
    }
    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data['datas'] = $this->kategoriModel->findAll();
            $msg['data'] = view('kategori/tablekategori', $data);
            echo json_encode($msg);
        }
    }

    public function formTambah()
    {
        if ($this->request->isAJAX()) {
            $msg['data'] = view('kategori/modaltambah');
            echo json_encode($msg);
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama')
                    ]
                ];
            } else {
                // Insert ke DB
                $inputData = [
                    'nama' => $this->request->getPost('nama')
                ];
                $this->kategoriModel->insert($inputData);
                $msg['flashData'] = 'Data kategori berhasil ditambahkan.';
            }
            echo json_encode($msg);
        }
    }

    public function formEdit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $data['kategori'] = $this->kategoriModel->find($id);
            $msg['data'] = view('kategori/modaledit', $data);
            echo json_encode($msg);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama')
                    ]
                ];
            } else {
                $updatedData = [
                    'nama' => $this->request->getPost('nama')
                ];
                $this->kategoriModel->update($id, $updatedData);
                $msg['flashData'] = 'Data kategori berhasil diupdate.';
            }
            echo json_encode($msg);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            // Delete 1 row data
            $this->kategoriModel->delete($id);
            $msg['flashData'] = 'Data kategori berhasil dihapus.';
            echo json_encode($msg);
        }
    }
}