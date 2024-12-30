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
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Guru</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="viewTable" class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Lahir</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($guru as $data) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td class="dtr-control"><?= $data['nama']; ?></td>
                      <td class="dtr-control"><?= $data['lahir']; ?></td>
                      <td class="dtr-control"><?= $data['telepon']; ?></td>
                      <td class="dtr-control"><?= $data['alamat']; ?></td>
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