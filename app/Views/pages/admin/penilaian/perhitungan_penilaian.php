<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
  <div class="page-inner">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Setiap Alternatif</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>RPP</th>
                    <th>KKM</th>
                    <th>Soal</th>
                    <th>Kehadiran</th>
                    <th>Ketepatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($alternatif as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['rencana_pelaksanaan_pembelajaran'] ?></td>
                      <td><?= $data['kriteria_ketuntasan_minimal'] ?></td>
                      <td><?= $data['pembuatan_soal'] ?></td>
                      <td><?= $data['absensi_kehadiran'] ?></td>
                      <td><?= $data['ketepatan_waktu'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Kriteria</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Bobot</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kriteria as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['kriteria'] ?></td>
                      <td><?= $data['keterangan'] ?></td>
                      <td><?= $data['bobot'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Kriteria Ternormalisasi</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Bobot</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kriteria as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['kriteria'] ?></td>
                      <td><?= $data['keterangan'] ?></td>
                      <td><?= $data['bobot'] / 100 ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Desimal</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>RPP</th>
                    <th>KKM</th>
                    <th>Soal</th>
                    <th>Kehadiran</th>
                    <th>Ketepatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($desimal as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['rencana_pelaksanaan_pembelajaran'] ?></td>
                      <td><?= $data['kriteria_ketuntasan_minimal'] ?></td>
                      <td><?= $data['pembuatan_soal'] ?></td>
                      <td><?= $data['absensi_kehadiran'] ?></td>
                      <td><?= $data['ketepatan_waktu'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Utility</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>RPP</th>
                    <th>KKM</th>
                    <th>Soal</th>
                    <th>Kehadiran</th>
                    <th>Ketepatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($utility as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['rencana_pelaksanaan_pembelajaran'] ?></td>
                      <td><?= $data['kriteria_ketuntasan_minimal'] ?></td>
                      <td><?= $data['pembuatan_soal'] ?></td>
                      <td><?= $data['absensi_kehadiran'] ?></td>
                      <td><?= $data['ketepatan_waktu'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Perangkingan Nilai Akhir</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table viewTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>RPP</th>
                    <th>KKM</th>
                    <th>Soal</th>
                    <th>Kehadiran</th>
                    <th>Ketepatan</th>
                    <th>Nilai</th>
                    <th>Rank</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($penilaian as $data) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['rencana_pelaksanaan_pembelajaran'] ?></td>
                      <td><?= $data['kriteria_ketuntasan_minimal'] ?></td>
                      <td><?= $data['pembuatan_soal'] ?></td>
                      <td><?= $data['absensi_kehadiran'] ?></td>
                      <td><?= $data['ketepatan_waktu'] ?></td>
                      <td><?= $data['nilai'] ?></td>
                      <td><?= $data['rank'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-action">
      <button type="button" class="btn btn-rounded btn-sm btn-black mx-2" id="kembali" data-pages="<?= $kembali; ?>"><i class="fas fa-arrow-circle-left"></i> Kembali</button>
      <a class="btn btn-black btn-round ms-auto btn-sm mx-2" href="admin-perhitungan-print" rel="noopener" target="_blank"><i class="fas fa-print"></i> Print Perhitungan</a>
    </div>

  </div>
</div>
<?= $this->endSection(); ?>