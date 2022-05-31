<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISTANI LOKA</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/mdi/css/materialdesignicons.css">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
</head>

<?php
session_start();
include 'baseUrl.php';
include 'koneksi.php';
$isLogin = $_SESSION['isLoginUser'] ?? '';
if ($isLogin != "logged") {
    header("location: index.php");
}
$status = $_SESSION['status'] ?? '';
$deskripsi = $_SESSION['deskripsi'] ?? '';
$id_user = $_SESSION['id_user'] ?? "";
$nama_lengkap = $_SESSION['nama'] ?? "";
$level = $_SESSION['level'] ?? "";
$username = $_SESSION['username'] ?? "";

$keltanisql = "SELECT * FROM pengguna INNER JOIN anggota ON pengguna.id_pengguna = anggota.id_user 
INNER JOIN kelompok_tani ON anggota.id_kelompok_tani = kelompok_tani.id_kelompok_tani WHERE pengguna.id_pengguna = $id_user";
$querykeltani = $koneksi->query($keltanisql);
$datakeltani = $querykeltani->fetch_array();
$kelompoktani = $datakeltani['nama_kelompok_tani'] ?? "-";
$idkelompoktani = $datakeltani['id_kelompok_tani'] ?? "-";
$jabatankeltani = $datakeltani['jabatan'] ?? "-";
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-shrink" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Sistani Loka</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
                    <li class="nav-item"><a class="nav-link active" href="dashboard-user.php">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- forum page-->
    <section class="page-section">
        <div class="container px-4 px-lg-5">
            <h4 class="text-success mb-4"><b><i class="mdi mdi-home"></i> Dashboard</b></h4>
            <div class="row">
                <div class="col-lg-3 mb-5">
                    <div class="card" style="padding: 8px 10px !important;">
                        <div class="card-body">
                            <div class="box-nama">
                                <p style="font-size: 18px;">
                                    <b>
                                        <?php echo $nama_lengkap ?>
                                    </b>
                                </p>
                                <p style="font-size: 15px; color: grey; margin-top: -18px;">
                                    <i class="mdi mdi-corn"></i> <?php echo $kelompoktani?>
                                </p>
                            </div>
                            <div class="navmenu">
                                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                                    <li class="nav-item"><a class="nav-link nav-dash" href="dashboard-user.php" id="homeNav"><i class="mdi mdi-account-circle"></i> &nbsp;Akun Saya</a></li>
                                    <li class="nav-item"><a class="nav-link nav-dash" id="keltaniNav" href="dashboard-user.php?page=keltani"><i class="mdi mdi-account-multiple-outline"></i> &nbsp;Kelompok Tani</a></li>
                                    <li class="nav-item"><a class="nav-link nav-dash" href="dashboard-user.php?page=thread"><i class="mdi mdi-comment-multiple-outline"></i> &nbsp;Thread Saya</a></li>
                                    <li class="nav-item"><a class="nav-link nav-dash" href="dashboard-user.php?page=jadwal"><i class="mdi mdi-calendar"></i> &nbsp;Agenda</a></li>
                                    <li class="nav-item"><a class="nav-link nav-dash" href="dashboard-user.php?page=bantuan"><i class="mdi mdi-ticket"></i> &nbsp;List Bantuan</a></li>
                                    <li class="nav-item"><a class="nav-link nav-dash" href="auth/proses_login.php?type=logout"><i class="mdi mdi-logout-variant"></i> &nbsp;Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="px-lg-4">
                        <?php include "./pages/user/routes.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; - Sistani Loka</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('#tablebasic').DataTable({
            "ordering": false,
            "bInfo": false,
            "oLanguage": {
                "sSearch": "cari :",
                "sLengthMenu": "tampil : _MENU_",
                "sEmptyTable": "tidak ada data",
                "sZeroRecords": "tidak ditemukan",
                "oPaginate": {
                    "sFirst": "first",
                    "sLast": "last",
                    "sNext": ">",
                    "sPrevious": "<"
                }
            }
        });
    });
</script>

<script>
    $('.empty-box-bantuan').hide()
    $("#searchbantuan").keyup(function() {
        var filter = $(this).val(),
            count = 0;
        if (count == 0) {
            $('.empty-box-bantuan').hide()
        }
        $('.listbantuan .card').each(function() {
            if ($(this).find('.card-title').text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
                if (count == 0) {
                    $('.empty-box-bantuan').show()
                } else {
                    $('.empty-box-bantuan').hide()
                }
            } else {
                $(this).show();
                count++;
            }
        });
    });
</script>


<?php if ($status == 'sukses') { ?>
    <script>
        swal({
            title: "Berhasil!",
            type: "success",
            text: 'Redirecting...',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        }).then(function() {
            window.location.reload();
        })
    </script>
<?php } else if ($status == 'gagal') { ?>
    <script>
        swal({
            title: "Gagal!",
            type: "error",
            text: '<?php echo $deskripsi ?>',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        });
    </script>
<?php } ?>

<?php unset($_SESSION['status']); ?>
<?php unset($_SESSION['deskripsi']); ?>

</html>