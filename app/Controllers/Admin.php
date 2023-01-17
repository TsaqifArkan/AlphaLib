<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel, $db, $builder;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('admin');
    }

    public function index()
    {
        $id = '1';
        $datadb = $this->adminModel->find($id);
        $hour = date('H');
        $dayterm = ($hour > 17) ? "Malam" : (($hour > 11) ? "Siang" : "Pagi");
        $data = [
            'title' => 'Profil Admin',
            'admindata' => $datadb,
            'greet' => $dayterm
        ];
        return view('admin/index', $data);
    }

}