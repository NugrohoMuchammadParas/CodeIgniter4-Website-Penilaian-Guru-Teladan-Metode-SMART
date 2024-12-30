<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ModelGuru;

class Guru extends BaseController
{
    public function index()
    {
        $data_guru = new ModelGuru();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'guru',
            'logout' => 'logout',
            'guru' => $data_guru->getAll(),
        ];

        return view('pages/user/guru/guru', $data);
    }
}
