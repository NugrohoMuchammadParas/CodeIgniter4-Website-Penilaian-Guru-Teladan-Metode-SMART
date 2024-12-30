<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Guru</div>
                    </div>
                    <div class="card-body">
                        <form action="admin-guru-tambah-data" method="POST" id="formInput" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('nama') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="nama">Nama :</label>
                                        <input
                                            type="text"
                                            name="nama"
                                            class="form-control"
                                            id="nama"
                                            placeholder="Input Data......" />
                                        <small id="nama" class="form-text text-muted <?= ($validation->getError('nama') ? 'text-danger' : ''); ?>"><?= $validation->getError('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('lahir') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="lahir">Lahir :</label>
                                        <input
                                            type="date"
                                            name="lahir"
                                            class="form-control"
                                            id="lahir"
                                            placeholder="Input Data......" />
                                        <small id="lahir" class="form-text text-muted <?= ($validation->getError('lahir') ? 'text-danger' : ''); ?>"><?= $validation->getError('lahir') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('telepon') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="telepon">Telepon :</label>
                                        <input
                                            type="text"
                                            name="telepon"
                                            class="form-control"
                                            id="telepon"
                                            placeholder="Input Data......" />
                                        <small id="telepon" class="form-text text-muted <?= ($validation->getError('telepon') ? 'text-danger' : ''); ?>"><?= $validation->getError('telepon') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('email') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="email">Email :</label>
                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            id="email"
                                            placeholder="Input Data......" />
                                        <small id="email" class="form-text text-muted <?= ($validation->getError('email') ? 'text-danger' : ''); ?>"><?= $validation->getError('email') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('alamat') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="alamat">Alamat :</label>
                                        <textarea class="form-control" placeholder="Input Data......" id="alamat" name="alamat" rows="5"></textarea>
                                        <small id="alamat" class="form-text text-muted <?= ($validation->getError('alamat') ? 'text-danger' : ''); ?>"><?= $validation->getError('alamat') ?></small>
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