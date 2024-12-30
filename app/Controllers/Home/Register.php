<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

use App\Models\ModelAkun;

class Register extends BaseController
{
    public function index_register()
    {
        $data = [
            'kembali' => "login",
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/home/register', $data);
    }

    public function data_register()
    {
        $data_akun = new ModelAkun();

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[akun.username]|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar di sistem.',
                    'min_length' => 'Username harus memiliki minimal 4 karakter.',
                    'max_length' => 'Username harus memiliki maximal 20 karakter.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Username harus memiliki minimal 4 karakter.',
                    'max_length' => 'Username harus memiliki maximal 20 karakter.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation,
                'kembali' => "login",
            ];

            return view('pages/home/register', $data);
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama' => 'User',
            'file' => 'default.png',
            'level' => 'user',
            'status' => 'active',
        ];

        $data_akun->insert($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Disimpan !!',
            'title' => 'Simpan Data',
        ];

        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('register'));
    }
}
