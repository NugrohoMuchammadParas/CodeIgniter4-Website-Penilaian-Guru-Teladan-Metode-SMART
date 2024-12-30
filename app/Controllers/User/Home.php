<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelPenilaian;
use App\Models\ModelLaporan;
use App\Models\ModelAkun;

class Home extends BaseController
{
    public function index()
    {
        $data_guru = new ModelGuru();
        $data_penilaian = new ModelPenilaian();
        $data_laporan = new ModelLaporan();
        $data_akun = new ModelAkun();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'home',
            'logout' => 'logout',
            'guru' => $data_guru->getAll(),
            'penilaian' => $data_penilaian->getAll(),
            'laporan' => $data_laporan->getAll(),
            'akun' => $data_akun->getAll(),
        ];

        return view('pages/user/home/home', $data);
    }
}
