<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ModelLaporan;

class Laporan extends BaseController
{
    public function index()
    {
        $data_laporan = new ModelLaporan();

        $data = [
            'profile' => 'user-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'download' => "user-laporan-download",
            'laporan' => $data_laporan->getNameByIdAll(),
        ];

        return view('pages/user/laporan/laporan', $data);
    }

    public function download($id)
    {
        $data_laporan = new ModelLaporan();
        $data_file = $data_laporan->getById($id);
        $data = $data_file[0]['file'];

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Didownload !!',
            'title' => 'Download Data',
        ];
        session()->setFlashdata($data_flash);

        return $this->response->download('pdf/' . $data, null);
    }
}
