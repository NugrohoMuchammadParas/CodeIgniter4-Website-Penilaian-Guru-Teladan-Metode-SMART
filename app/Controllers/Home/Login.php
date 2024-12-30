<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\ModelAkun;

class Login extends BaseController
{
    public function index_login()
    {
        $data = [
            'register' => "register",
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/home/login', $data);
    }

    public function data_login()
    {
        $data_akun = new ModelAkun();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $hasil = $data_akun->getByUsername($username);

        if ($hasil) {
            if ($hasil['level'] == 'admin') {
                if ($hasil['password'] == $password) {
                    $data = [
                        'id_akun' => $hasil['id_akun'],
                        'username' => $hasil['username'],
                        'nama' => $hasil['nama'],
                        'file' => $hasil['file'],
                        'level' => $hasil['level'],
                        'status' => $hasil['status'],
                    ];
                    session()->set($data);

                    return redirect()->to(base_url('admin-home'));
                } else {
                    if (!$this->validate([
                        'username' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Username harus diisi',
                            ]
                        ],
                        'password' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Password harus diisi',
                            ]
                        ]
                    ])) {
                        $validation = \Config\Services::validation();
                        $data = [
                            'validation' => $validation,
                            'register' => "register",
                        ];

                        return view('pages/home/login', $data);
                    }

                    return redirect()->to(base_url('login'));
                }
            } else {
                if ($hasil['password'] == $password) {
                    $data = [
                        'id_akun' => $hasil['id_akun'],
                        'username' => $hasil['username'],
                        'nama' => $hasil['nama'],
                        'file' => $hasil['file'],
                        'level' => $hasil['level'],
                        'status' => $hasil['status'],
                    ];
                    session()->set($data);

                    return redirect()->to(base_url('user-home'));
                } else {
                    if (!$this->validate([
                        'username' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Username harus diisi',
                            ]
                        ],
                        'password' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Password harus diisi',
                            ]
                        ]
                    ])) {
                        $validation = \Config\Services::validation();
                        $data = [
                            'validation' => $validation,
                            'register' => "register",
                        ];
                        return view('pages/home/login', $data);
                    }

                    return redirect()->to(base_url('login'));
                }
            }
        } else {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $data = [
                    'validation' => $validation,
                    'register' => "register",
                ];

                return view('pages/home/login', $data);
            }

            return redirect()->to(base_url('login'));
        }
    }
}
