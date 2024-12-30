<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelLaporan;
use App\Models\ModelGuru;
use CodeIgniter\I18n\Time;

class Laporan extends BaseController
{
    public function index()
    {
        $data_laporan = new ModelLaporan();

        $data = [
            'tambah' => "admin-laporan-tambah",
            'ubah' => "admin-laporan-ubah",
            'download' => "admin-laporan-download",
            'hapus' => "admin-laporan-hapus",
            'profile' => 'admin-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'laporan' => $data_laporan->getNameByIdAll(),
        ];

        return view('pages/admin/laporan/laporan', $data);
    }

    public function index_tambah()
    {
        $data_guru = new ModelGuru();

        $data = [
            'kembali' => "admin-laporan",
            'profile' => 'admin-profile',
            'halaman' => 'laporan',
            'logout' => 'logout',
            'guru' => $data_guru->getAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/admin/laporan/tambah_laporan', $data);
    }

    public function tambah()
    {
        $data_laporan = new Modellaporan();
        $data_guru = new ModelGuru();

        $id_guru = $data_guru->getIdByName($this->request->getVar('nama'));

        $id_akun = session()->get('id_akun');

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[30]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                    'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                ]
            ],
            'tanggal' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal harus diisi.',
                    'valid_date' => 'Tanggal harus berupa tanggal yang valid.'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]',
                'errors' => [
                    'uploaded' => 'File harus  diisi',
                    'ext_in' => 'File harus berformat PDF.',
                    'max_size' => 'File tidak boleh lebih dari 2MB.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation,
                'kembali' => "admin-laporan",
                'profile' => 'admin-profile',
                'halaman' => 'laporan',
                'logout' => 'logout',
                'guru' => $data_guru->getAll(),
            ];
            return view('pages/admin/laporan/tambah_laporan', $data);
        }

        $file = $this->request->getFile('file');
        $nama_file = $file->getName();
        $file->move('pdf/', $nama_file);

        $data = [
            'id_akun' => $id_akun,
            'id_guru' => $id_guru,
            'tanggal' => $this->request->getVar('tanggal'),
            'file' => $nama_file,
        ];
        $data_laporan->tambah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Ditambah !!',
            'title' => 'Tambah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-laporan'));
    }

    public function index_ubah($id)
    {
        $data_laporan = new Modellaporan();
        $data_guru = new ModelGuru();

        $laporan = $data_laporan->getById($id);

        $data = [
            "kembali" => "/admin-laporan",
            'profile' => '/admin-profile',
            'halaman' => 'laporan',
            'logout' => '/logout',
            "laporan" => $data_laporan->getNameById($laporan['id_guru']),
            'guru' => $data_guru->getAll(),
            "validation" => \Config\Services::validation(),
        ];

        return view('pages/admin/laporan/ubah_laporan', $data);
    }

    public function ubah($id)
    {
        $data_laporan = new Modellaporan();
        $data_guru = new ModelGuru();

        $guru = $data_guru->getByName($this->request->getVar('nama'));
        $file_laporan = $data_laporan->getIdByLaporan($id);
        $id_guru = $data_guru->getIdByName($this->request->getVar('nama'));

        $id_akun = session()->get('id_akun');

        if ($guru['nama'] == $this->request->getVar('nama')) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi.',
                        'valid_date' => 'Tanggal harus berupa tanggal yang valid.'
                    ]
                ],
                'file' => [
                    'rules' => 'ext_in[file,pdf]|max_size[file,2048]',
                    'errors' => [
                        'ext_in' => 'File harus berformat PDF.',
                        'max_size' => 'File tidak boleh lebih dari 2MB.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $laporan = $data_laporan->getById($id);

                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-laporan",
                    'profile' => '/admin-profile',
                    'halaman' => 'laporan',
                    'logout' => '/logout',
                    "laporan" => $data_laporan->getNameById($laporan['id_guru']),
                    'guru' => $data_guru->getAll(),
                ];
                return view('pages/admin/laporan/ubah_laporan', $data);
            }
        } else {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|is_unique[laporan.nama]|min_length[4]|max_length[30]',
                    'errors' => [
                        'required' => 'Nama harus diisi.',
                        'is_unique' => 'Nama sudah terdaftar di sistem.',
                        'min_length' => 'Nama harus memiliki minimal 4 karakter.',
                        'max_length' => 'Nama harus memiliki maximal 30 karakter.'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'Tanggal harus diisi.',
                        'valid_date' => 'Tanggal harus berupa tanggal yang valid.'
                    ]
                ],
                'file' => [
                    'rules' => 'ext_in[file,pdf]|max_size[file,2048]',
                    'errors' => [
                        'ext_in' => 'File harus berformat PDF.',
                        'max_size' => 'File tidak boleh lebih dari 2MB.',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $laporan = $data_laporan->getById($id);

                $data = [
                    'validation' => $validation,
                    'kembali' => "/admin-laporan",
                    'profile' => '/admin-profile',
                    'halaman' => 'laporan',
                    'logout' => '/logout',
                    "laporan" => $data_laporan->getNameById($laporan['id_guru']),
                    'guru' => $data_guru->getAll(),
                ];
                return view('pages/admin/laporan/ubah_laporan', $data);
            }
        }

        $data_nama = '';
        $file = $this->request->getFile('file');
        $nama_file = $file->getName();
        if ($nama_file == '') {
            $data_nama = $file_laporan['file'];
        } else {
            $data_nama = $file->getName();
            $file->move('pdf/', $data_nama);
        }

        $data = [
            'id_laporan' => $id,
            'id_akun' => $id_akun,
            'id_guru' => $id_guru,
            'tanggal' => $this->request->getVar('tanggal'),
            'file' => $data_nama,
        ];
        $data_laporan->ubah($data);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Diubah !!',
            'title' => 'Ubah Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-laporan'));
    }

    public function hapus($id)
    {
        $data_laporan = new ModelLaporan();
        $data_laporan->hapus($id);

        $data_flash = [
            'icon' => 'fas fa-check',
            'state' => 'success',
            'message' => 'Data Berhasil Dihapus !!',
            'title' => 'Hapus Data',
        ];
        session()->setFlashdata($data_flash);

        return redirect()->to(base_url('admin-laporan'));
    }

    public function download($id)
    {
        $data_laporan = new ModelLaporan();
        $data_file = $data_laporan->getById($id);
        $data = $data_file['file'];

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
