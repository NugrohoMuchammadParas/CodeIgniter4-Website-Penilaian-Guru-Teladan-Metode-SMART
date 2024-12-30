<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Kriteria</div>
                    </div>
                    <div class="card-body">
                        <form action="admin-kriteria-tambah-data" method="POST" id="formInput" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('kriteria') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="kriteria">Kriteria :</label>
                                        <input
                                            type="text"
                                            name="kriteria"
                                            class="form-control"
                                            id="kriteria"
                                            placeholder="Input Data......" />
                                        <small id="kriteria" class="form-text text-muted <?= ($validation->getError('kriteria') ? 'text-danger' : ''); ?>"><?= $validation->getError('kriteria') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('keterangan') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="keterangan">Keterangan :</label>
                                        <input
                                            type="text"
                                            name="keterangan"
                                            class="form-control"
                                            id="keterangan"
                                            placeholder="Input Data......" />
                                        <small id="keterangan" class="form-text text-muted <?= ($validation->getError('keterangan') ? 'text-danger' : ''); ?>"><?= $validation->getError('keterangan') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('bobot') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="bobot">Bobot :</label>
                                        <input
                                            type="number"
                                            name="bobot"
                                            class="form-control"
                                            id="bobot"
                                            placeholder="Input Data......" />
                                        <small id="bobot" class="form-text text-muted <?= ($validation->getError('bobot') ? 'text-danger' : ''); ?>"><?= $validation->getError('bobot') ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="button" class="btn btn-rounded btn-sm btn-black mx-2" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</button>
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