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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
</head>

<?php
session_start();
$status = $_SESSION['status'] ?? '';
$level = $_SESSION['level'] ?? '';
$isLogin = $_SESSION['isLogin'] ?? '';
if ($isLogin == "logged") {
    if ($level == "admin desa") {
        header("location: dashboard-admin.php");
    } else {
        header("location: dashboard-user.php");
    }
}
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Sistani Loka</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#mainNav">Beranda</a></li>
                    <?php if ($status == "logged") { ?>
                        <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="dashboard-user.php">Dashboard</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" onclick="alertLogin()" href="#">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="#login">login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 custom-header" style="margin-top: 90px;">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <img src="assets/logo.png" alt="" style="width: 12%; margin-bottom: 20px;">
                    <h1 class="text-white font-weight-bold">Sistem Informasi Tani</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Sistani loka karya
                        memberikan manfaat besar untuk para petani dengan berbasis teknologi.</p>
                    <a class="btn btn-primary btn-custom" href="#login">masuk sekarang &nbsp;&#127807;</a>
                </div>
            </div>
        </div>
    </header>

    <!-- login page-->
    <section class="page-section" id="login" style="margin-top: -50px;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Masuk ke Dashboard &nbsp;&#127806;</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-4">masuk dan bergabunglah dengan para petani lainnya dan membentuk sebuah
                        komunitas utuh.</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form method="POST" action="auth/proses_login.php?type=login">
                        <div class="form-floating mb-3">
                            <input name="username" class="form-control" type="text" placeholder="Enter your username" />
                            <label for="name">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" class="form-control" type="password" placeholder="Enter your password" />
                            <label for="pass">Password</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <div class="mb-3"><b>Kontak Kami</b></div>
                    <i class="bi-phone fs-2 mb-5 text-muted"></i>
                    <div>Phone : +62 89 746 800 344<br />Email : lokatani@mail.com</div>
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
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
</body>

<?php if ($status == 'gagal') { ?>
    <script>
        swal({
            title: "Gagal!",
            type: "error",
            text: 'Redirecting...',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        });
    </script>
<?php } ?>

<?php unset($_SESSION['status']); ?>

<script>
    alertLogin = () => {
        swal({
            title: "Silahkan login",
            type: "info",
            text: 'login untuk mengakses halaman forum.',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        })
    }
</script>

</html>