<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Alternatif</div>
                    </div>
                    <div class="card-body">
                        <form action="admin-alternatif-tambah-data" method="POST" id="formInput" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('nama') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="nama">Nama :</label>
                                        <select class="form-select form-control" id="nama" name="nama">
                                            <option class="select" disabled>Pilih Data</option>
                                            <?php foreach ($guru as $isi) : ?>
                                                <option value="<?= $isi['nama'] ?>"><?= $isi['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="nama" class="form-text text-muted <?= ($validation->getError('nama') ? 'text-danger' : ''); ?>"><?= $validation->getError('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('rencana_pelaksanaan_pembelajaran') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="rencana_pelaksanaan_pembelajaran">Rencana Pelaksanaan Pembelajaran :</label>
                                        <input
                                            type="number"
                                            name="rencana_pelaksanaan_pembelajaran"
                                            class="form-control"
                                            id="rencana_pelaksanaan_pembelajaran"
                                            placeholder="Input data......" />
                                        <small id="rencana_pelaksanaan_pembelajaran" class="form-text text-muted <?= ($validation->getError('rencana_pelaksanaan_pembelajaran') ? 'text-danger' : ''); ?>"><?= $validation->getError('rencana_pelaksanaan_pembelajaran') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('kriteria_ketuntasan_minimal') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="kriteria_ketuntasan_minimal">Kriteria Ketuntasan Minimal :</label>
                                        <input
                                            type="number"
                                            name="kriteria_ketuntasan_minimal"
                                            class="form-control"
                                            id="kriteria_ketuntasan_minimal"
                                            placeholder="Input data......" />
                                        <small id="kriteria_ketuntasan_minimal" class="form-text text-muted <?= ($validation->getError('kriteria_ketuntasan_minimal') ? 'text-danger' : ''); ?>"><?= $validation->getError('kriteria_ketuntasan_minimal') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('pembuatan_soal') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="pembuatan_soal">Pembuatan Soal :</label>
                                        <input
                                            type="number"
                                            name="pembuatan_soal"
                                            class="form-control"
                                            id="pembuatan_soal"
                                            placeholder="Input data......" />
                                        <small id="pembuatan_soal" class="form-text text-muted <?= ($validation->getError('pembuatan_soal') ? 'text-danger' : ''); ?>"><?= $validation->getError('pembuatan_soal') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('absensi_kehadiran') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="absensi_kehadiran">Absensi Kehadiran :</label>
                                        <input
                                            type="number"
                                            name="absensi_kehadiran"
                                            class="form-control"
                                            id="absensi_kehadiran"
                                            placeholder="Input data......" />
                                        <small id="absensi_kehadiran" class="form-text text-muted <?= ($validation->getError('absensi_kehadiran') ? 'text-danger' : ''); ?>"><?= $validation->getError('absensi_kehadiran') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('ketepatan_waktu') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="ketepatan_waktu">Ketepatan Waktu :</label>
                                        <input
                                            type="number"
                                            name="ketepatan_waktu"
                                            class="form-control"
                                            id="ketepatan_waktu"
                                            placeholder="Input data......" />
                                        <small id="ketepatan_waktu" class="form-text text-muted <?= ($validation->getError('ketepatan_waktu') ? 'text-danger' : ''); ?>"><?= $validation->getError('ketepatan_waktu') ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a type="button" class="btn btn-rounded btn-sm btn-black mx-2" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    <button type="button" class="btn btn-rounded btn-sm btn-black mx-2" id="simpan_tambah"><i class="fas fa-download"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>