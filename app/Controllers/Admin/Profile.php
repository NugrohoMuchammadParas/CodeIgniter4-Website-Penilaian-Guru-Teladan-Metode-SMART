<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelAkun;
use CodeIgniter\I18n\Time;

class Profile extends BaseController
{
    public function index_ubah($id)
    {
        $data_akun = new ModelAkun();

        $data = [
            "kembali" => "/admin-home",
            'profile' => '/admin-profile',
            'halaman' => 'profile',
            'logout' => '/logout',
            "akun" => $data_akun->getById($id),
            "validation" => \Config\Services::validation(),
        ];

        return view('pages/admin/profile/profile', $data);
    }

    public function ubah($id)
    {
        $data_akun = new ModelAkun();
        $data_id = $data_akun->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['username'] == $this->request->getVar('username')) {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Username harus diisi.',
                        'min_length' => 'Username harus memiliki minimal 4 karakter.',
                        'max_length' => 'Username harus memiliki maximal 30 karakter.'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Password harus diisi.',
                        'min_length' => 'Password harus memiliki minimal 4 karakter.',
                        'max_length' => 'Password harus memiliki maximal 30 karakter.'
                    ]
                ],
                'nama' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'file' => [
                    'rules' => 'ext_in[file,jpg,png]|max_size[file,2048]',
                    'errors' => [
                        'ext_in' => 'File harus berformat JPG dan PNG.',
                        'max_size' => 'File tidak boleh lebih dari 2MB.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    "kembali" => "/admin-home",
                    'profile' => '/admin-profile',
                    'halaman' => 'profile',
                    'logout' => '/logout',
                    "akun" => $data_akun->getById($id),
                ];
                return view('pages/admin/profile/profile', $data);
            }
        } else {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|is_unique[akun.username]|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Username harus diisi.',
                        'is_unique' => 'Username sudah terdaftar di sistem.',
                        'min_length' => 'Username harus memiliki minimal 4 karakter.',
                        'max_length' => 'Username harus memiliki maximal 30 karakter.'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Password harus diisi.',
                        'min_length' => 'Password harus memiliki minimal 4 karakter.',
                        'max_length' => 'Password harus memiliki maximal 30 karakter.'
                    ]
                ],
                'nama' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'file' => [
                    'rules' => 'ext_in[file,jpg,png]|max_size[file,2048]',
                    'errors' => [
                        'ext_in' => 'File harus berformat JPG dan PNG.',
                        'max_size' => 'File tidak boleh lebih dari 2MB.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    "kembali" => "/admin-home",
                    'profile' => '/admin-profile',
                    'halaman' => 'profile',
                    'logout' => '/logout',
                    "akun" => $data_akun->getById($id),
                ];
                return view('pages/admin/profile/profile', $data);
            }
        }

        $data_nama = '';
        $file = $this->request->getFile('file');
        $nama_file = $file->getName();
        if ($nama_file == '') {
            $data_nama = 'default.png';
        } else {
            $data_nama = $file->getName();
            $file->move('assets/img/', $nama_file);
        }

        $data = [
            'id_akun' => $id_akun,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama' => $this->request->getVar('nama'),
            'file' => $data_nama,
            'level' => 'admin',
            'status' => 'active',
        ];
        $data_akun->ubah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->setFlashdata($data_flash);

        $akun = $data_akun->getById($id);
        $data_session = [
            'id_akun' => $akun['id_akun'],
            'username' => $akun['username'],
            'nama' => $akun['nama'],
            'file' => $akun['file'],
            'level' => $akun['level'],
            'status' => $akun['status'],
        ];
        session()->set($data_session);

        return redirect()->to(base_url('admin-home'));
    }
}
