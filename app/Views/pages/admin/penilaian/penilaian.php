<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h4 class="card-title">Data Penilaian</h4>
              </div>
              <div class="col-6 text-end">
                <?php if ($penilaian) { ?>
                  <button
                    class="btn btn-black btn-round ms-auto btn-sm mx-2"
                    id="perhitungan"
                    data-pages="<?= $perhitungan; ?>">
                    <i class="fas fa-print"></i>
                    Perhitungan
                  </button>
                  <a
                    class="btn btn-black btn-round ms-auto btn-sm mx-2"
                    href="admin-penilaian-print" rel="noopener" target="_blank">
                    <i class="fas fa-print"></i>
                    Print Penilaian
                  </a>
                <?php }; ?>
              </div>
            </div>
          </div>
          <div class="card-body">
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
            <div class="table-responsive">
              <table id="viewTable" class="table">
                <thead>
                  <tr>
                    <th style="width: 8%;">No</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Rank</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($penilaian as $data) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $data['nama']; ?></td>
                      <td><?= $data['nilai']; ?></td>
                      <td><?= $data['rank']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>