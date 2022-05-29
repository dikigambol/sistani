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
    <link rel="stylesheet" href="assets/mdi/css/materialdesignicons.css">
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<?php
session_start();
$isLogin = $_SESSION['isLogin'] ?? '';
$level = $_SESSION['level'] ?? '';
if ($isLogin != "logged") {
    header("location: index.php");
}
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-shrink" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Sistani Loka</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="forum.php">Forum</a></li>
                    <?php if ($level == "admin desa") { ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard-admin.php">Dashboard</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard-user.php">Dashboard</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- forum page-->
    <section class="page-section">
        <div class="container px-4 px-lg-5">
            <div class="empty-box" style="display: none;">
                <img class="img-empty" src="assets/img/empty.svg" alt="">
                <br>
                <br>
                <h5 class="text-center">Tidak ada postingan &nbsp;&#9749;</h5>
            </div>
            <h4 class="text-success mb-4"><b><i class="mdi mdi-comment-multiple-outline"></i> Thread & Discussions</b></h4>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="header-forum mb-4">
                        <h5><i class="mdi mdi-account-circle"></i> &nbsp;<b>Diki Akbar</b> <span style="color: grey; font-size: 14px;">- 27 Februari 2022</span></h5>
                    </div>
                    <h4 class="card-title mb-4"><b>Special title treatment ?</b></h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <hr>
                    <h6 class="card-title mb-4"><b>Jawaban :</b></h6>
                    <div class="mb-4">
                        <p><i class="mdi mdi-account-location"></i> &nbsp;<b>Diki Akbar</b></p>
                        <p style="margin-top: -15px;">dummy comment</p>
                        <a href="" style="text-decoration: none;">
                            <p style="font-size: 14px; margin-top: -12px;" class="text-danger"><i class="mdi mdi-eraser"></i> hapus</p>
                        </a>
                    </div>
                    <hr>
                    <p style="margin-bottom: 10px; font-size: 14px;">Tulis tanggapan anda :</p>
                    <form action="">
                        <textarea name="" rows="2" class="form-control"></textarea>
                        <p style="text-align: right;">
                            <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px;">
                                <i class="mdi mdi-send"></i>&nbsp;&nbsp;kirim
                            </button>
                        </p>
                    </form>
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
</body>

</html>