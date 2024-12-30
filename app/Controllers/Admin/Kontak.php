<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Kontak extends BaseController
{
    public function index()
    {
        $data = [
            'profile' => 'admin-profile',
            'halaman' => 'kontak',
            'logout' => 'logout',
        ];

        return view('pages/admin/kontak/kontak', $data);
    }
}
