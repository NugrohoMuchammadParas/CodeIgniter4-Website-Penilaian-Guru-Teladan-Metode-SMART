<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Kontak extends BaseController
{
    public function index()
    {
        $data = [
            'profile' => 'user-profile',
            'halaman' => 'kontak',
            'logout' => 'logout'
        ];

        return view('pages/user/kontak/kontak', $data);
    }
}
