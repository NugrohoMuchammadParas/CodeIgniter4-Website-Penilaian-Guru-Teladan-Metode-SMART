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

  <link rel="stylesheet" href="/assets/table/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/table/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/table/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="/assets/css/kaiadmin.min.css" />
</head>

<body>
  <div class="wrapper">

    <?= $this->renderSection('content-home'); ?>

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
    var SweetAlert2Demo = (function() {
      var initDemos = function() {

        $("#login").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          e.preventDefault();

          swal({
            title: "Anda Yakin ?",
            text: "Login",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Login !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Login, Masuk Halaman", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Login !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              $("#formInput").submit();
            } else {
              swal("Login, Dibatalkan", {
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

        $("#register").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          swal({
            title: "Anda Yakin ?",
            text: "Register",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Register !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Register, Masuk Halaman", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Register !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              window.location.href = dataPages;
            } else {
              swal("Register, Dibatalkan", {
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

        $("#simpan_tambah").click(function(e) {
          var dataId = $(this).data('id');
          var dataPages = $(this).data('pages');

          e.preventDefault();

          swal({
            title: "Anda Yakin ?",
            text: "Simpan Tambah Data",
            type: "success",
            buttons: {
              cancel: {
                visible: true,
                text: "Tidak, Batalkan !!",
                className: "btn-round btn btn-black btn-sm",
              },
              confirm: {
                text: "Iya, Simpankan !!",
                className: "btn-round btn btn-black btn-sm",
              },
            },
          }).then((willDelete) => {
            if (willDelete) {
              swal("Simpan Tambah Data, Ditambahkan", {
                icon: "success",
                buttons: {
                  confirm: {
                    text: "Iya, Simpankan !!",
                    className: "btn-round btn btn-black btn-sm",
                  },
                },
              });
              $("#formInput").submit();
            } else {
              swal("Simpan Tambah Data, Dibatalkan", {
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