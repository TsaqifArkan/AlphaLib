<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KlasifikasiModel;

define('NOT_NULL', '{field} tidak boleh kosong!');

class Buku extends BaseController
{
    protected $bukuModel, $db, $builder, $klasModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('buku');
        $this->klasModel = new KlasifikasiModel();
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
            // Get Data Klasifikasi from DB
            $data['klas'] = $this->klasModel->findAll();
            $msg['data'] = view('buku/modaltambah', $data);
            echo json_encode($msg);
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'noInvent' => [
                    'label' => 'Nomor Inventaris',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'judul' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'klasifikasi' => [
                    'label' => 'Klasifikasi Keilmuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih salah satu {field}!'
                    ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'tempatTerbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'jmlHal' => [
                    'label' => 'Jumlah Halaman',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'thnTerbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'jmlEks' => [
                    'label' => 'Jumlah Eksemplar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'edisi' => [
                    'label' => 'Edisi Cetakan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'noInvent' => $this->validation->getError('noInvent'),
                        'judul' => $this->validation->getError('judul'),
                        'isbn' => $this->validation->getError('isbn'),
                        'klasifikasi' => $this->validation->getError('klasifikasi'),
                        'pengarang' => $this->validation->getError('pengarang'),
                        'penerbit' => $this->validation->getError('penerbit'),
                        'tempatTerbit' => $this->validation->getError('tempatTerbit'),
                        'jmlHal' => $this->validation->getError('jmlHal'),
                        'thnTerbit' => $this->validation->getError('thnTerbit'),
                        'jmlEks' => $this->validation->getError('jmlEks'),
                        'edisi' => $this->validation->getError('edisi')
                    ]
                ];
            } else {
                // Insert ke DB
                $inputData = [
                    'noinvent' => $this->request->getPost('noInvent'),
                    'judul' => $this->request->getPost('judul'),
                    'isbn' => $this->request->getPost('isbn'),
                    'idklas' => $this->request->getPost('klasifikasi'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'tempatterbit' => $this->request->getPost('tempatTerbit'),
                    'jmlhal' => $this->request->getPost('jmlHal'),
                    'thnterbit' => $this->request->getPost('thnTerbit'),
                    'jmleksemplar' => $this->request->getPost('jmlEks'),
                    'edisicetak' => $this->request->getPost('edisi')
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
            // Get Data Klasifikasi from DB
            $data['klas'] = $this->klasModel->findAll();
            // Klasifikasi selected one Book
            $data['idkls'] = $data['buku']['idklas'];
            $msg['data'] = view('buku/modaledit', $data);
            echo json_encode($msg);
        }
    }
    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $valid = $this->validate([
                'noInvent' => [
                    'label' => 'Nomor Inventaris',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'judul' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'klasifikasi' => [
                    'label' => 'Klasifikasi Keilmuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih salah satu {field}!'
                    ]
                ],
                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'tempatTerbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'jmlHal' => [
                    'label' => 'Jumlah Halaman',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'thnTerbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'jmlEks' => [
                    'label' => 'Jumlah Eksemplar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ],
                'edisi' => [
                    'label' => 'Edisi Cetakan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => NOT_NULL
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'noInvent' => $this->validation->getError('noInvent'),
                        'judul' => $this->validation->getError('judul'),
                        'isbn' => $this->validation->getError('isbn'),
                        'klasifikasi' => $this->validation->getError('klasifikasi'),
                        'pengarang' => $this->validation->getError('pengarang'),
                        'penerbit' => $this->validation->getError('penerbit'),
                        'tempatTerbit' => $this->validation->getError('tempatTerbit'),
                        'jmlHal' => $this->validation->getError('jmlHal'),
                        'thnTerbit' => $this->validation->getError('thnTerbit'),
                        'jmlEks' => $this->validation->getError('jmlEks'),
                        'edisi' => $this->validation->getError('edisi')
                    ]
                ];
            } else {
                $updatedData = [
                    'noinvent' => $this->request->getPost('noInvent'),
                    'judul' => $this->request->getPost('judul'),
                    'isbn' => $this->request->getPost('isbn'),
                    'idklas' => $this->request->getPost('klasifikasi'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'tempatterbit' => $this->request->getPost('tempatTerbit'),
                    'jmlhal' => $this->request->getPost('jmlHal'),
                    'thnterbit' => $this->request->getPost('thnTerbit'),
                    'jmleksemplar' => $this->request->getPost('jmlEks'),
                    'edisicetak' => $this->request->getPost('edisi')
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

    public function detail($id = 0)
    {
        $data['title'] = 'Detail Buku';
        $data['buku'] = $this->bukuModel->find($id);
        // Get Data Klasifikasi from this id
        $idkls = $data['buku']['idklas'];
        $data['klas'] = $this->klasModel->find($idkls);
        if (empty($data['buku'])) {
            return redirect()->to(base_url('buku'));
        }
        return view('buku/detail', $data);
    }
}

?>