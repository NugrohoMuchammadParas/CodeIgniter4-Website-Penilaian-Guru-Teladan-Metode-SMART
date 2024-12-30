<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAlternatif extends Model
{
    protected $table      = 'alternatif';
    protected $primaryKey = 'id_alternatif';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_alternatif', 'id_akun', 'id_guru', 'rencana_pelaksanaan_pembelajaran', 'kriteria_ketuntasan_minimal', 'pembuatan_soal', 'absensi_kehadiran', 'ketepatan_waktu'];

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
        return $this->where('id_alternatif', $data['id_alternatif'])->findAll();
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
        return $this->db->table('alternatif')
            ->join('guru', 'alternatif.id_guru = guru.id_guru')
            ->select('alternatif.*, guru.nama as nama')
            ->get()
            ->getResultArray();
    }

    public function getNameById($id_guru)
    {
        return $this->db->table('alternatif')
            ->join('guru', 'alternatif.id_guru = guru.id_guru')
            ->where('alternatif.id_guru', $id_guru)
            ->select('alternatif.*, guru.nama as nama')
            ->get()
            ->getRowArray();
    }
}
