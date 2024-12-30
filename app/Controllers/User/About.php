<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'profile' => 'user-profile',
            'halaman' => 'about',
            'logout' => 'logout'
        ];

        return view('pages/user/about/about', $data);
    }
}
