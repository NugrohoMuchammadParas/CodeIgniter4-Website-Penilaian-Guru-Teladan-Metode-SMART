<?= $this->extend('template/user'); ?>

<?= $this->section('content-user'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Data Akun</div>
                    </div>
                    <div class="card-body">
                        <form action="/user-ubah-profile/<?= $akun['id_akun']; ?>" method="POST" id="formInput" enctype="multipart/form-data" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('username') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="username">username :</label>
                                        <input
                                            type="text"
                                            value="<?= $akun['username']; ?>"
                                            name="username"
                                            class="form-control"
                                            id="username"
                                            placeholder="Input data......" />
                                        <small id="username" class="form-text text-muted <?= ($validation->getError('username') ? 'text-danger' : ''); ?>"><?= $validation->getError('username') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('password') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="password">password :</label>
                                        <input
                                            type="text"
                                            value="<?= $akun['password']; ?>"
                                            name="password"
                                            class="form-control"
                                            id="password"
                                            placeholder="Input data......" />
                                        <small id="password" class="form-text text-muted <?= ($validation->getError('password') ? 'text-danger' : ''); ?>"><?= $validation->getError('password') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('nama') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="nama">Nama :</label>
                                        <input
                                            type="text"
                                            value="<?= $akun['nama']; ?>"
                                            name="nama"
                                            class="form-control"
                                            id="nama"
                                            placeholder="Input data......" />
                                        <small id="nama" class="form-text text-muted <?= ($validation->getError('nama') ? 'text-danger' : ''); ?>"><?= $validation->getError('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('file') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="file">File :</label>
                                        <input
                                            type="file"
                                            value="<?= $akun['file']; ?>"
                                            name="file"
                                            class="form-control"
                                            id="file"
                                            placeholder="Input data......" />
                                        <small id="file" class="form-text text-muted <?= ($validation->getError('file') ? 'text-danger' : ''); ?>"><?= $validation->getError('file') ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a type="button" class="btn btn-rounded btn-sm btn-black m-1" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-rounded btn-sm btn-black m-1" id="simpan_ubah"><i class="fas fa-download"></i> Simpan</button>
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