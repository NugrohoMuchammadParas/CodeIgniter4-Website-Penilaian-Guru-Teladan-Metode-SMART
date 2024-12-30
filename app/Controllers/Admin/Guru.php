<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelguru;
use CodeIgniter\I18n\Time;

class Guru extends BaseController
{
    public function index()
    {
        $data_guru = new Modelguru();

        $data = [
            'tambah' => "admin-guru-tambah",
            'ubah' => "admin-guru-ubah",
            'hapus' => "admin-guru-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'guru',
            'logout' => 'logout',
            'guru' => $data_guru->getAll(),
        ];

        return view('pages/admin/guru/guru', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-guru",
            'profile' => 'admin-profile',
            'halaman' => 'guru',
            'logout' => 'logout',
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/admin/guru/tambah_guru', $data);
    }

    public function tambah()
    {
        $data_guru = new Modelguru();

        $id_akun = session()->get('id_akun');

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[guru.nama]|min_length[4]|max_length[30]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'is_unique' => 'Nama sudah terdaftar di sistem.',
                    'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                    'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                ]
            ],
            'lahir' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi.',
                    'valid_date' => 'Tanggal lahir harus berupa tanggal yang valid.'
                ]
            ],
            'telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'numeric' => 'Nomor telepon harus berupa angka.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Alamat email harus diisi.',
                    'valid_email' => 'Alamat email harus berupa alamat email yang valid.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                    'min_length' => 'Alamat harus memiliki minimal 4 karakter.',
                    'max_length' => 'Alamat harus memiliki maximal 100 karakter.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation,
                'profile' => 'admin-profile',
                'halaman' => 'guru',
                'logout' => 'logout',
                'kembali' => "admin-guru",
            ];
            return view('pages/admin/guru/tambah_guru', $data);
        }

        $data = [
            'id_akun' => $id_akun,
            'nama' => $this->request->getVar('nama'),
            'lahir' => $this->request->getVar('lahir'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $data_guru->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-guru'));
    }

    public function index_ubah($id)
    {
        $data_guru = new Modelguru();

        $data = [
            "kembali" => "/admin-guru",
            'profile' => '/admin-profile',
            'halaman' => 'guru',
            'logout' => '/logout',
            "guru" => $data_guru->getById($id),
            "validation" => \Config\Services::validation(),
        ];

        return view('pages/admin/guru/ubah_guru', $data);
    }

    public function ubah($id)
    {
        $data_guru = new Modelguru();
        $data_id = $data_guru->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['nama'] == $this->request->getVar('nama')) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'lahir' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi.',
                        'valid_date' => 'Tanggal lahir harus berupa tanggal yang valid.'
                    ]
                ],
                'telepon' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Nomor telepon harus diisi.',
                        'numeric' => 'Nomor telepon harus berupa angka.',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Alamat email harus diisi.',
                        'valid_email' => 'Alamat email harus berupa alamat email yang valid.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => 'Alamat harus diisi.',
                        'min_length' => 'Alamat harus memiliki minimal 4 karakter.',
                        'max_length' => 'Alamat harus memiliki maximal 100 karakter.'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-guru",
                    'profile' => '/admin-profile',
                    'halaman' => 'guru',
                    'logout' => '/logout',
                    "guru" => $data_guru->getById($id),
                ];
                return view('pages/admin/guru/ubah_guru', $data);
            }
        } else {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|is_unique[guru.nama]|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'is_unique' => 'Nama sudah terdaftar di sistem.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'lahir' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'Tanggal lahir harus diisi.',
                        'valid_date' => 'Tanggal lahir harus berupa tanggal yang valid.'
                    ]
                ],
                'telepon' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Nomor telepon harus diisi.',
                        'numeric' => 'Nomor telepon harus berupa angka.',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Alamat email harus diisi.',
                        'valid_email' => 'Alamat email harus berupa alamat email yang valid.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => 'Alamat harus diisi.',
                        'min_length' => 'Alamat harus memiliki minimal 4 karakter.',
                        'max_length' => 'Alamat harus memiliki maximal 100 karakter.'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-guru",
                    'profile' => '/admin-profile',
                    'halaman' => 'guru',
                    'logout' => '/logout',
                    "guru" => $data_guru->getById($id),
                ];
                return view('pages/admin/guru/ubah_guru', $data);
            }
        }

        $data = [
            'id_guru' => $id,
            'id_akun' => $id_akun,
            'nama' => $this->request->getVar('nama'),
            'lahir' => $this->request->getVar('lahir'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $data_guru->ubah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-guru'));
    }

    public function hapus($id)
    {
        $data_guru = new Modelguru();
        $data_guru->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-guru'));
    }
}
