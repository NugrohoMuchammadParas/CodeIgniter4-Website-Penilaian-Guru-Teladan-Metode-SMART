<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index_logout()
    {
        session()->destroy();

        return redirect()->to(base_url('/'));
    }
}
