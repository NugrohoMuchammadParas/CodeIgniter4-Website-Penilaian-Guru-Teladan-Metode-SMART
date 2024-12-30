<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\ModelPenilaian;

class Penilaian extends BaseController
{
    public function index()
    {
        $data_penilaian = new ModelPenilaian();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'penilaian',
            'logout' => 'logout',
            'penilaian' => $data_penilaian->getOrderedByRank(),
        ];

        return view('pages/user/penilaian/penilaian', $data);
    }
}
