<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Modelkriteria;
use CodeIgniter\I18n\Time;

class Kriteria extends BaseController
{
    public function index()
    {
        $data_kriteria = new ModelKriteria();

        $data = [
            'tambah' => "admin-kriteria-tambah",
            'ubah' => "admin-kriteria-ubah",
            'hapus' => "admin-kriteria-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'kriteria',
            'logout' => 'logout',
            'kriteria' => $data_kriteria->getAll(),
        ];

        return view('pages/admin/kriteria/kriteria', $data);
    }

    public function index_tambah()
    {
        $data = [
            'kembali' => "admin-kriteria",
            'profile' => 'admin-profile',
            'halaman' => 'kriteria',
            'logout' => 'logout',
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/admin/kriteria/tambah_kriteria', $data);
    }

    public function tambah()
    {
        $data_kriteria = new ModelKriteria();

        $id_akun = session()->get('id_akun');

        if (!$this->validate([
            'kriteria' => [
                'rules' => 'required|is_unique[kriteria.kriteria]|min_length[4]|max_length[15]',
                'errors' => [
                    'required' => 'Kriteria harus diisi.',
                    'is_unique' => 'Kriteria sudah terdaftar di sistem.',
                    'min_length' => 'Kriteria harus memiliki minimal 4 karakter.',
                    'max_length' => 'Kriteria harus memiliki maximal 15 karakter.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => 'Keterangan harus diisi.',
                    'min_length' => 'Keterangan harus memiliki minimal 4 karakter.',
                    'max_length' => 'Keterangan harus memiliki maximal 10 karakter.'
                ]
            ],
            'bobot' => [
                'rules' => 'required|integer|max_length[1]',
                'errors' => [
                    'required' => 'Bobot harus diisi.',
                    'integer' => 'Bobot harus berupa angka bilangan bulat.',
                    'max_length' => 'Bobot harus memiliki maximal 1 digit.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation,
                'profile' => 'admin-profile',
                'halaman' => 'kriteria',
                'logout' => 'logout',
                'kembali' => "admin-kriteria",
            ];
            return view('pages/admin/kriteria/tambah_kriteria', $data);
        }

        $data = [
            'id_akun' => $id_akun,
            'kriteria' => $this->request->getVar('kriteria'),
            'keterangan' => $this->request->getVar('keterangan'),
            'bobot' => $this->request->getVar('bobot'),
        ];
        $data_kriteria->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-kriteria'));
    }

    public function index_ubah($id)
    {
        $data_kriteria = new ModelKriteria();

        $data = [
            "kembali" => "/admin-kriteria",
            'profile' => '/admin-profile',
            'halaman' => 'kriteria',
            'logout' => '/logout',
            "kriteria" => $data_kriteria->getById($id),
            "validation" => \Config\Services::validation(),
        ];

        return view('pages/admin/kriteria/ubah_kriteria', $data);
    }

    public function ubah($id)
    {
        $data_kriteria = new ModelKriteria();
        $data_id = $data_kriteria->getById($id);

        $id_akun = session()->get('id_akun');

        if ($data_id['kriteria'] == $this->request->getVar('kriteria')) {
            if (!$this->validate([
                'kriteria' => [
                    'rules' => 'required|min_length[4]|max_length[15]',
                    'errors' => [
                        'required' => 'Kriteria harus diisi.',
                        'min_length' => 'Kriteria harus memiliki minimal 4 karakter.',
                        'max_length' => 'Kriteria harus memiliki maximal 15 karakter.'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required|min_length[4]|max_length[10]',
                    'errors' => [
                        'required' => 'Keterangan harus diisi.',
                        'min_length' => 'Keterangan harus memiliki minimal 4 karakter.',
                        'max_length' => 'Keterangan harus memiliki maximal 10 karakter.'
                    ]
                ],
                'bobot' => [
                    'rules' => 'required|integer|max_length[1]',
                    'errors' => [
                        'required' => 'Bobot harus diisi.',
                        'integer' => 'Bobot harus berupa angka bilangan bulat.',
                        'max_length' => 'Bobot harus memiliki maximal 1 digit.'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-kriteria",
                    'profile' => '/admin-profile',
                    'halaman' => 'kriteria',
                    'logout' => '/logout',
                    "kriteria" => $data_kriteria->getById($id),
                ];
                return view('pages/admin/kriteria/ubah_kriteria', $data);
            }
        } else {
            if (!$this->validate([
                'kriteria' => [
                    'rules' => 'required|is_unique[kriteria.kriteria]|min_length[4]|max_length[15]',
                    'errors' => [
                        'required' => 'Kriteria harus diisi.',
                        'is_unique' => 'Kriteria sudah terdaftar di sistem.',
                        'min_length' => 'Kriteria harus memiliki minimal 4 karakter.',
                        'max_length' => 'Kriteria harus memiliki maximal 15 karakter.'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required|min_length[4]|max_length[10]',
                    'errors' => [
                        'required' => 'Keterangan harus diisi.',
                        'min_length' => 'Keterangan harus memiliki minimal 4 karakter.',
                        'max_length' => 'Keterangan harus memiliki maximal 10 karakter.'
                    ]
                ],
                'bobot' => [
                    'rules' => 'required|integer|max_length[1]',
                    'errors' => [
                        'required' => 'Bobot harus diisi.',
                        'integer' => 'Bobot harus berupa angka bilangan bulat.',
                        'max_length' => 'Bobot harus memiliki maximal 1 digit.'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-kriteria",
                    'profile' => '/admin-profile',
                    'halaman' => 'kriteria',
                    'logout' => '/logout',
                    "kriteria" => $data_kriteria->getById($id),
                ];
                return view('pages/admin/kriteria/ubah_kriteria', $data);
            }
        }

        $data = [
            'id_kriteria' => $id,
            'id_akun' => $id_akun,
            'kriteria' => $this->request->getVar('kriteria'),
            'keterangan' => $this->request->getVar('keterangan'),
            'bobot' => $this->request->getVar('bobot'),
        ];
        $data_kriteria->ubah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-kriteria'));
    }

    public function hapus($id)
    {
        $data_kriteria = new ModelKriteria();
        $data_kriteria->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-kriteria'));
    }
}
