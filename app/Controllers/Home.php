<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        $data["title"] = "Homepage";
        return view('templates/index', $data);
    }
}
