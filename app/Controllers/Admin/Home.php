<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelPenilaian;
use App\Models\ModelLaporan;
use App\Models\ModelAkun;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {
        $data_guru = new ModelGuru();
        $data_penilaian = new ModelPenilaian();
        $data_laporan = new ModelLaporan();
        $data_akun = new ModelAkun();

        $data = [
            'guru' => $data_guru->getAll(),
            'penilaian' => $data_penilaian->getAll(),
            'laporan' => $data_laporan->getAll(),
            'akun' => $data_akun->getAll(),
            'profile' => 'admin-profile',
            'halaman' => 'home',
            'logout' => 'logout',
        ];

        return view('pages/admin/home/home', $data);
    }
}
