<?= $this->extend('template/user'); ?>

<?= $this->section('content-user'); ?>
<div class="container">
  <div class="page-inner">
    <?php if (session()->getFlashdata('state')) { ?>
      <script>
        function myFunction() {
          var placementFrom = 'top';
          var placementAlign = 'right';
          var state = '<?= session()->getFlashdata('state'); ?>';
          var style = 'withicon';
          var content = {};

          content.message = '<?= session()->getFlashdata('message'); ?>';
          content.title = '<?= session()->getFlashdata('title'); ?>';
          content.icon = '<?= session()->getFlashdata('icon'); ?>';
          content.url = '';
          content.target = "_blank";

          $.notify(content, {
            type: state,
            placement: {
              from: placementFrom,
              align: placementAlign,
            },
            time: 1000,
            delay: 5,
            animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
            }
          });
        }

        window.onload = myFunction;
      </script>
    <?php }; ?>
    <h3 class="fw-bold mb-4">Dashboard</h3>
    <div class="row">
      <div class="col-6 col-sm-6 col-md-3">
        <div class="card card-stats card-black card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="fas fa-users fa-lg"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Guru</p>
                  <h4 class="card-title"><?= count($guru); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-3">
        <div class="card card-stats card-black card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="fas fa-balance-scale fa-lg"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Penilaian</p>
                  <h4 class="card-title"><?= count($penilaian); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-3">
        <div class="card card-stats card-black card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="fas fa-book fa-lg"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Laporan</p>
                  <h4 class="card-title"><?= count($laporan); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-3">
        <div class="card card-stats card-black card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="fas fa-id-badge fa-lg"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Akun</p>
                  <h4 class="card-title"><?= count($akun); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body" style="text-align: justify">
            <h1 class="text-center">METODE SMART</h1>
            <br>
            <p>Metode SMART (Simple Multi-Attribute Rating Technique) merupakan salah satu pendekatan
              yang efisien dalam proses pemilihan guru teladan, di mana metode ini bekerja dengan cara
              memberikan bobot pada setiap kriteria penilaian yang telah ditentukan, seperti
              Rencana Pelaksanaan Pembeljaran, Kriteria Ketuntasan Minimal, Pembuatan Soal, Absensi
              Kehadiran, Dan Ketepatan Waktu. Dengan demikian, SMART memungkinkan pihak
              pengambil keputusan untuk secara sistematis menilai dan membandingkan setiap kandidat
              berdasarkan skor total yang dihitung dari nilai dan bobot masing-masing kriteria.
              Pendekatan ini tidak hanya mempermudah proses pengambilan keputusan yang objektif,
              tetapi juga memastikan bahwa guru yang terpilih adalah sosok yang paling sesuai dengan
              kriteria teladan yang diharapkan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>