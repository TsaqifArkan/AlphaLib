<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel, $db, $builder;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('buku');
    }
    public function index()
    {
        $data['title'] = 'Buku';
        return view('buku/index', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data['datas'] = $this->bukuModel->findAll();
            $msg['data'] = view('buku/tabledatabuku', $data);
            echo json_encode($msg);
        }
    }

    public function formTambah()
    {
        if ($this->request->isAJAX()) {
            $msg['data'] = view('buku/modaltambah');
            echo json_encode($msg);
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'judul' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'tempatTerbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'jmlHal' => [
                    'label' => 'Jumlah Halaman',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'thnTerbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul' => $this->validation->getError('judul'),
                        'isbn' => $this->validation->getError('isbn'),
                        'pengarang' => $this->validation->getError('pengarang'),
                        'penerbit' => $this->validation->getError('penerbit'),
                        'tempatTerbit' => $this->validation->getError('tempatTerbit'),
                        'jmlHal' => $this->validation->getError('jmlHal'),
                        'thnTerbit' => $this->validation->getError('thnTerbit')
                    ]
                ];
            } else {
                // Insert ke DB
                $inputData = [
                    'judul' => $this->request->getPost('judul'),
                    'isbn' => $this->request->getPost('isbn'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'tempatterbit' => $this->request->getPost('tempatTerbit'),
                    'jmlhal' => $this->request->getPost('jmlHal'),
                    'thnterbit' => $this->request->getPost('thnTerbit')
                ];
                $this->bukuModel->insert($inputData);
                $msg['flashData'] = 'Data buku berhasil ditambahkan.';
            }
            echo json_encode($msg);
        }
    }
    public function formEdit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $data['buku'] = $this->bukuModel->find($id);
            $msg['data'] = view('buku/modaledit', $data);
            echo json_encode($msg);
        }
    }
    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $valid = $this->validate([
                'judul' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'tempatTerbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'jmlHal' => [
                    'label' => 'Jumlah Halaman',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'thnTerbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul' => $this->validation->getError('judul'),
                        'isbn' => $this->validation->getError('isbn'),
                        'pengarang' => $this->validation->getError('pengarang'),
                        'penerbit' => $this->validation->getError('penerbit'),
                        'tempatTerbit' => $this->validation->getError('tempatTerbit'),
                        'jmlHal' => $this->validation->getError('jmlHal'),
                        'thnTerbit' => $this->validation->getError('thnTerbit')
                    ]
                ];
            } else {
                $updatedData = [
                    'judul' => $this->request->getPost('judul'),
                    'isbn' => $this->request->getPost('isbn'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'tempatterbit' => $this->request->getPost('tempatTerbit'),
                    'jmlhal' => $this->request->getPost('jmlHal'),
                    'thnterbit' => $this->request->getPost('thnTerbit')
                ];
                $this->bukuModel->update($id, $updatedData);
                $msg['flashData'] = 'Data buku berhasil diupdate.';
            }
            echo json_encode($msg);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            // Delete 1 row data
            $this->bukuModel->delete($id);
            $msg['flashData'] = 'Data buku berhasil dihapus.';
            echo json_encode($msg);
        }
    }
}

?>