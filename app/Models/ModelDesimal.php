<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDesimal extends Model
{
    protected $table      = 'desimal';
    protected $primaryKey = 'id_desimal';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_desimal', 'id_akun', 'id_guru', 'rencana_pelaksanaan_pembelajaran', 'kriteria_ketuntasan_minimal', 'pembuatan_soal', 'absensi_kehadiran', 'ketepatan_waktu'];

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

    public function cekData($data)
    {
        return $this->where('id_desimal', $data['id_desimal'])->findAll();
    }

    public function getMin($column)
    {
        return $this->selectMin($column)->first()[$column];
    }

    public function getMax($column)
    {
        return $this->selectMax($column)->first()[$column];
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

    public function getNameByIdAll()
    {
        return $this->db->table('desimal')
            ->join('guru', 'desimal.id_guru = guru.id_guru')
            ->select('desimal.*, guru.nama as nama')
            ->get()
            ->getResultArray();
    }

    public function getNameById($id_guru)
    {
        return $this->db->table('desimal')
            ->join('guru', 'desimal.id_guru = guru.id_guru')
            ->where('desimal.id_guru', $id_guru)
            ->select('desimal.*, guru.nama as nama')
            ->get()
            ->getRowArray();
    }
}
