<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ubah Data Akun</div>
                    </div>
                    <div class="card-body">
                        <form action="/admin-akun-ubah-data/<?= $akun['id_akun']; ?>" method="POST" id="formInput" enctype="multipart/form-data" autocomplete="off">
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
                                        <small id="username" class="form-text text-muted invalid-feedback"><?= $validation->getError('username') ?></small>
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
                                        <small id="password" class="form-text text-muted invalid-feedback"><?= $validation->getError('password') ?></small>
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
                                        <small id="nama" class="form-text text-muted invalid-feedback"><?= $validation->getError('nama') ?></small>
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
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('level') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="level">Level :</label>
                                        <select
                                            class="form-select form-control"
                                            id="level"
                                            name="level"
                                            value="<?= $akun['level']; ?>">
                                            <option class="select" disabled>Pilih Data</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                        <small id="level" class="form-text text-muted <?= ($validation->getError('level') ? 'text-danger' : ''); ?>"><?= $validation->getError('level') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('status') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="status">Status :</label>
                                        <select
                                            class="form-select form-control"
                                            id="status"
                                            name="status"
                                            value="<?= $akun['status']; ?>">
                                            <option value="<?= $akun['status']; ?>" class="select" disabled>Pilih Data</option>
                                            <option value="active">Active</option>
                                            <option value="nonactive">Non Active</option>
                                        </select>
                                        <small id="status" class="form-text text-muted <?= ($validation->getError('status') ? 'text-danger' : ''); ?>"><?= $validation->getError('status') ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a type="button" class="btn btn-rounded btn-sm btn-black mx-2" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-rounded btn-sm btn-black mx-2" id="simpan_ubah"><i class="fas fa-download"></i> Simpan</button>
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