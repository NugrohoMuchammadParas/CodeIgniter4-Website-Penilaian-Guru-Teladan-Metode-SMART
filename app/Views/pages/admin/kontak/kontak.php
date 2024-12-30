<?= $this->extend('template/admin'); ?>

<?= $this->section('content-admin'); ?>
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
    <h3 class="fw-bold mb-4">Kontak</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-header" style="background-image: url('assets/img/background.jpg')">
            <div class="profile-picture">
              <div class="avatar avatar-xl">
                <img src="assets/img/logo-aws.png" alt="..." class="avatar-img rounded-circle"
                  width="100" />
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="user-profile text-center">
              <div class="name">Algorithm</div>
              <div class="job">Web Store</div>
              <div class="desc">Developer</div>
              <div class="social-media">
                <a class="btn btn-black btn-sm btn-link" rel="publisher"
                  href="https://www.instagram.com/algorithmwebstore/profilecard/?igsh=aTJheTV5bWM0MzFk">
                  <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                  </span>
                </a>
              </div>
              <div class="view-profile">
                <a href="https://www.instagram.com/algorithmwebstore/profilecard/?igsh=aTJheTV5bWM0MzFk"
                  class="btn btn-black w-100">View Full Profile</a>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row user-stats text-center">
              <div class="col">
                <div class="number">*****</div>
                <div class="title">Post</div>
              </div>
              <div class="col">
                <div class="number">*****</div>
                <div class="title">Followers</div>
              </div>
              <div class="col">
                <div class="number">*****</div>
                <div class="title">Following</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150928.76779577334!2d106.83482921910469!3d-6.249481709093268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f2d148fbe713%3A0x6e667d52ebedf5a9!2sJakarta%20Timur%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1730385077662!5m2!1sid!2sid"
          width="600" height="450" style="border: 0; width: 100%" allowfullscreen="" loading="lazy"
          class="shadow" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>