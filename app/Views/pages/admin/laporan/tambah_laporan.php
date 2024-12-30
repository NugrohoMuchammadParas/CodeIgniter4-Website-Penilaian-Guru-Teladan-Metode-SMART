<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Laporan</div>
                    </div>
                    <div class="card-body">
                        <form action="admin-laporan-tambah-data" method="POST" enctype="multipart/form-data" id="formInput" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('nama') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="nama">Nama :</label>
                                        <select class="form-select form-control" id="nama" name="nama">
                                            <option class="select" disabled>Pilih Data</option>
                                            <?php foreach ($karyawan as $isi) : ?>
                                                <option value="<?= $isi['nama'] ?>"><?= $isi['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="nama" class="form-text text-muted <?= ($validation->getError('nama') ? 'text-danger' : ''); ?>"><?= $validation->getError('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('tanggal') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="tanggal">Tanggal :</label>
                                        <input
                                            type="date"
                                            name="tanggal"
                                            class="form-control"
                                            id="tanggal"
                                            placeholder="Input data......" />
                                        <small id="tanggal" class="form-text text-muted <?= ($validation->getError('tanggal') ? 'text-danger' : ''); ?>"><?= $validation->getError('tanggal') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('file') ? 'has-error has-feedback' : ''); ?>">
                                        <label for="file">File :</label>
                                        <input
                                            type="file"
                                            name="file"
                                            class="form-control"
                                            id="file"
                                            placeholder="Enter file" />
                                        <small id="file" class="form-text text-muted <?= ($validation->getError('file') ? 'text-danger' : ''); ?>"><?= $validation->getError('file') ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a type="button" class="btn btn-rounded btn-sm btn-black m-1" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-rounded btn-sm btn-black m-1" id="simpan_tambah"><i class="fas fa-download"></i> Simpan</button>
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