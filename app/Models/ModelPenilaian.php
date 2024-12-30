<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenilaian extends Model
{
    protected $table      = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_penilaian', 'id_alternatif', 'id_guru', 'rencana_pelaksanaan_pembelajaran', 'kriteria_ketuntasan_minimal', 'pembuatan_soal', 'absensi_kehadiran', 'ketepatan_waktu', 'nilai', 'rank'];

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
        return $this->where('id_penilaian', $data['id_penilaian'])->findAll();
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

    public function getOrderedByRank()
    {
        $builder = $this->db->table('penilaian')
            ->join('guru', 'penilaian.id_guru = guru.id_guru')
            ->select('penilaian.*, guru.nama as nama')
            ->orderBy('rank', 'ASC');

        return $builder->get()->getResultArray();
    }
}
