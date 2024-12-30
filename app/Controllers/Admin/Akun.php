<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelAkun;
use CodeIgniter\I18n\Time;

class Akun extends BaseController
{
    public function index()
    {
        $data_akun = new ModelAkun();

        $data = [
            'tambah' => "admin-akun-tambah",
            'ubah' => "admin-akun-ubah",
            'hapus' => "admin-akun-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'akun',
            'logout' => 'logout',
            'akun' => $data_akun->getAll(),
        ];

        return view('pages/admin/akun/akun', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-akun",
            'profile' => 'admin-profile',
            'halaman' => 'akun',
            'logout' => 'logout',
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/admin/akun/tambah_akun', $data);
    }

    public function tambah()
    {
        $data_akun = new ModelAkun();

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
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi.',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation,
                'profile' => 'admin-profile',
                'halaman' => 'akun',
                'logout' => 'logout',
                'kembali' => "admin-akun",
            ];
            return view('pages/admin/akun/tambah_akun', $data);
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
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama' => $this->request->getVar('nama'),
            'file' => $data_nama,
            'level' => $this->request->getVar('level'),
            'status' => $this->request->getVar('status'),
        ];
        $data_akun->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-akun'));
    }

    public function index_ubah($id)
    {
        $data_akun = new ModelAkun();

        $data = [
            "kembali" => "/admin-akun",
            'profile' => '/admin-profile',
            'halaman' => 'akun',
            'logout' => '/logout',
            "akun" => $data_akun->getById($id),
            "validation" => \Config\Services::validation(),
        ];

        return view('pages/admin/akun/ubah_akun', $data);
    }

    public function ubah($id)
    {
        $data_akun = new ModelAkun();
        $data_id = $data_akun->getById($id);

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
                ],
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level harus diisi.',
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus diisi.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    "kembali" => "/admin-akun",
                    'profile' => '/admin-profile',
                    'halaman' => 'akun',
                    'logout' => '/logout',
                    "akun" => $data_akun->getById($id),
                ];
                return view('pages/admin/akun/ubah_akun', $data);
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
                ],
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level harus diisi.',
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus diisi.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    "kembali" => "/admin-akun",
                    'profile' => '/admin-profile',
                    'halaman' => 'akun',
                    'logout' => '/logout',
                    "akun" => $data_akun->getById($id),
                ];
                return view('pages/admin/akun/ubah_akun', $data);
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
            'id_akun' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama' => $this->request->getVar('nama'),
            'file' => $data_nama,
            'level' => $this->request->getVar('level'),
            'status' => $this->request->getVar('status'),
        ];
        $data_akun->ubah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-akun'));
    }

    public function hapus($id)
    {
        $data_akun = new ModelAkun();
        $data_akun->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-akun'));
    }
}
