<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Data Akun</h4>
              <button
                class="btn btn-black btn-round ms-auto btn-sm"
                id="tambah"
                data-pages="<?= $tambah; ?>">
                <i class="fa fa-plus"></i>
                Tambah
              </button>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th style="width: 23%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($akun as $data) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $data['username']; ?></td>
                      <td><?= $data['password']; ?></td>
                      <td>
                        <button type="button" class="btn-round btn btn-black btn-sm ubah" style="margin-right:3px;"
                          id="ubah" data-id="<?= $data['id_akun']; ?>" data-pages="<?= $ubah; ?>">
                          <i class="fas fa-edit"></i>
                          Ubah
                        </button>
                        <button type="button" class="btn-round btn btn-black btn-sm hapus" style="margin-left:2px;"
                          id="hapus" data-id="<?= $data['id_akun']; ?>" data-pages="<?= $hapus; ?>">
                          <i class="fas fa-trash-alt"></i>
                          Hapus
                        </button>
                      </td>
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