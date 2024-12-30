<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkun extends Model
{
    protected $table      = 'akun';
    protected $primaryKey = 'id_akun';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_akun', 'username', 'password', 'nama', 'file', 'level', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = false;

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getByUsername($data)
    {
        return $this->where(['username' => $data])->first();
    }

    public function tambah($data)
    {
        $this->insert($data);
    }

    public function ubah($data)
    {
        $this->replace($data);
    }

    public function hapus($id)
    {
        $this->delete($id);
    }
}
