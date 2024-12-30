<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'profile' => 'admin-profile',
            'halaman' => 'about',
            'logout' => 'logout',
        ];

        return view('pages/admin/about/about', $data);
    }
}
