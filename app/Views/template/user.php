<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Metode SMART</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="/assets/img/favicons/favicon.ico" type="image/x-icon" />

  <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["/assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <link rel="stylesheet" href="/assets//table/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets//table/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets//table/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="/assets/css/kaiadmin.min.css" />
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-background-color="dark2">
      <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark2">
          <a href="/user-home" class="logo">
            <img src="/assets/img/logo.png" alt="navbar brand" class="navbar-brand" height="150"
              width="170" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-info">
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Menu</h4>
            </li>
            <li class="nav-item <?= $halaman == 'home' ? 'active' : '' ?>">
              <a href="/user-home">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item <?= $halaman == 'guru' ? 'active' : '' ?>">
              <a href="/user-guru">
                <i class="fas fa-user-tie"></i>
                <p>Guru</p>
              </a>
            </li>
            <li class="nav-item <?= $halaman == 'penilaian' ? 'active' : '' ?>">
              <a href="/user-penilaian">
                <i class="fas fa-balance-scale"></i>
                <p>Penilaian</p>
              </a>
            </li>
            <li class="nav-item <?= $halaman == 'laporan' ? 'active' : '' ?>">
              <a href="/user-laporan">
                <i class="fas fa-book"></i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Lainnya</h4>
            </li>
            <li class="nav-item <?= $halaman == 'about' ? 'active' : '' ?>">
              <a href="/user-about">
                <i class="fas fa-info-circle"></i>
                <p>About</p>
              </a>
            </li>
            <li class="nav-item <?= $halaman == 'kontak' ? 'active' : '' ?>">
              <a href="/user-kontak">
                <i class="fas fa-phone-volume"></i>
                <p>Kontak</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <div class="logo-header" data-background-color="dark2">
            <a href="/user-home" class="logo">
              <img src="/assets/img/logo.png" alt="navbar brand" class="navbar-brand" height="150"
                width="170" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
        </div>
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"
                  aria-expanded="false">
                  <div
                    class="avatar <?= session()->get('status') == 'active' ? 'avatar-online' : 'avatar-offline' ?>">
                    <img src="/assets/img/<?= session()->get('file') ?>" alt="..."
                      class="avatar-img rounded-circle" />
                  </div>
                  <span class="profile-username text-dark">
                    <span class="fw-bold"><?= session()->get('nama') ?></span>
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        <div class="avatar <?= session()->get('status') == 'active' ? 'avatar-online' : 'avatar-offline' ?>">
                          <img src="/assets/img/<?= session()->get('file') ?>"
                            alt="image profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="u-text">
                          <h4><?= session()->get('nama') ?></h4>
                          <p class="text-muted"><?= session()->get('username') ?></p>
                          <button type="button" id="profile"
                            data-id="<?= session()->get('id_akun') ?>"
                            data-pages="<?= $profile ?>"
                            class="btn btn-xs btn-black btn-sm">Profile</button>
                          <button type="button" id="logout"
                            data-pages="<?= $logout ?>"
                            class="btn btn-xs btn-black btn-sm">Logout</button>
                        </div>
                      </div>
                    </li>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <?= $this->renderSection('content-user'); ?>

      <footer class="footer">
        <div class="container-fluid d-flex justify-content-center">
          <div class="copyright">
            <i class="fas fa-copyright"></i> 2024 Metode TOPSIS. By
            <a href="https://www.instagram.com/algorithmwebstore/profilecard/?igsh=aTJheTV5bWM0MzFk">Algorithm
              Web Store</a>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="/assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/js/plugin/chart.js/chart.min.js"></script>
  <script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>
  <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
  <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script src="/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
  <script src="/assets/js/plugin/jsvectormap/world.js"></script>
  <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <script src="/assets/js/kaiadmin.min.js"></script>
  <script src="/assets/js/setting-demo.js"></script>
  <script src="/assets/table/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/table/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/table/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/assets/table/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/assets/table/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/table/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/table/jszip/jszip.min.js"></script>
  <script src="/assets/table/pdfmake/pdfmake.min.js"></script>
  <script src="/assets/table/pdfmake/vfs_fonts.js"></script>
  <script src="/assets/table/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="/assets/table/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="/assets/table/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function() {
      $('#viewTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <script>
    var SweetAlert2Demo = (function() {
      var initDemos = function() {

        $("#logout").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          swal({
            title: "Anda Yakin ?",
            text: "Logout",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Logout !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Logout, Dikeluarkan", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Logout !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              window.location.href = dataPages;
            } else {
              swal("Logout, Dibatalkan", {
                icon: "error",
                buttons: {
                  confirm: {
                    text: "Iya, Batalkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
            }
          });
        });

        $("#profile").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          swal({
            title: "Anda Yakin ?",
            text: "Profile Data",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Profile !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Profile Data, Diarahkan", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Profilekan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              window.location.href = dataPages + '/' + dataId;
            } else {
              swal("Profile Data, Dibatalkan", {
                icon: "error",
                buttons: {
                  confirm: {
                    text: "Iya, Batalkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
            }
          });
        });

        $("#kembali").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          swal({
            title: "Anda Yakin ?",
            text: "Kembali",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Kembali !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Kembali, Dikembalikan", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Tambahkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              window.location.href = dataPages;
            } else {
              swal("Kembali, Dibatalkan", {
                icon: "error",
                buttons: {
                  confirm: {
                    text: "Iya, Batalkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
            }
          });
        });

        $("#simpan_ubah").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          e.preventDefault();

          swal({
            title: "Anda Yakin ?",
            text: "Simpan Ubah Data",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Ubahkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Simpan Ubah Data, Diubahkan", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Ubahkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              $("#formInput").submit();
            } else {
              swal("Simpan Ubah Data, Dibatalkan", {
                icon: "error",
                buttons: {
                  confirm: {
                    text: "Iya, Batalkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
            }
          });
        });

        $(".download").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          swal({
            title: "Anda Yakin ?",
            text: "Download Data",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Dwonload !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Download Data, Didownload", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Download !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              window.location.href = dataPages + '/' + dataId;
            } else {
              swal("Download Data, Dibatalkan", {
                icon: "error",
                buttons: {
                  confirm: {
                    text: "Iya, Batalkan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
            }
          });
        });

      };

      return {
        init: function() {
          initDemos();
        },
      };
    })();

    jQuery(document).ready(function() {
      SweetAlert2Demo.init();
    });
  </script>


</body>

</html>