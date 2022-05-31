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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
</head>

<?php
session_start();
$status = $_SESSION['status'] ?? '';
$deskripsi = $_SESSION['deskripsi'] ?? '';
$id_user = $_SESSION['id_user'] ?? '';
$isForum = $_SESSION['isForum'] ?? '';
if ($isForum != "yes") {
    header("location: index.php");
}

include "baseUrl.php";
include "koneksi.php";

$sql = "SELECT * FROM forum INNER JOIN pengguna ON forum.id_user = pengguna.id_pengguna 
ORDER BY id_forum DESC";
$query = $koneksi->query($sql);

$countThread = mysqli_num_rows($query);

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- forum page-->
    <section class="page-section">
        <div class="container px-4 px-lg-5">
            <?php if ($countThread < 1) { ?>
                <div class="empty-box">
                    <img class="img-empty" src="assets/img/empty.svg" alt="">
                    <br>
                    <br>
                    <h5 class="text-center">Tidak ada postingan &nbsp;&#9749;</h5>
                </div>
            <?php } else { ?>
                <h4 class="text-success mb-4"><b><i class="mdi mdi-comment-multiple-outline"></i> Thread & Discussions</b></h4>
                <?php while ($data = $query->fetch_array()) : ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="header-forum mb-4">
                                <h5><i class="mdi mdi-account-circle"></i>&nbsp;<b><?php echo $data['nama'] ?></b> <span style="color: grey; font-size: 14px;">
                                        - <?php echo formatTanggal($data['tgl_posting']); ?>
                                    </span>
                                </h5>
                            </div>
                            <h4 class="card-title mb-3"><b><?php echo $data['judul'] ?></b></h4>
                            <p class="card-text">
                                <?php echo $data['isi'] ?>
                            </p>
                            <?php
                            $idForum = $data['id_forum'];
                            $sql2 = "SELECT * FROM komentar_forum INNER JOIN pengguna 
                            ON komentar_forum.id_user = pengguna.id_pengguna WHERE komentar_forum.id_forum = $idForum ORDER BY id_komentar ASC";
                            $query2 = $koneksi->query($sql2);
                            $countKomen = mysqli_num_rows($query2);
                            ?>
                            <?php if ($countKomen >= 1) { ?>
                                <hr>
                                <h6 class="card-title mb-4"><b>Jawaban :</b></h6>
                            <?php } ?>
                            <?php while ($data2 = $query2->fetch_array()) : ?>
                                <div class="mb-4">
                                    <p><i class="mdi mdi-account-location"></i>&nbsp;<b><?php echo $data2['nama'] ?></b></p>
                                    <p style="margin-top: -15px;"><?php echo $data2['komentar'] ?></p>
                                    <?php if ($data2['id_user'] == $id_user) { ?>
                                        <a href="<?php echo $base_url ?>pages/thread-api/d_komen.php?id=<?php echo $data2['id_komentar'] ?>" style="text-decoration: none;">
                                            <p style="font-size: 14px; margin-top: -12px;" class="text-danger"><i class="mdi mdi-eraser"></i> hapus</p>
                                        </a>
                                    <?php } ?>
                                </div>
                            <?php endwhile ?>
                            <hr>
                            <p style="margin-bottom: 10px; font-size: 14px;">Tulis tanggapan anda :</p>
                            <form action="<?php echo $base_url ?>pages/thread-api/c_komen.php" method="POST">
                                <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                                <input type="hidden" name="id_forum" value="<?php echo $data['id_forum'] ?>">
                                <textarea name="komentar" rows="2" class="form-control"></textarea>
                                <p style="text-align: right;">
                                    <button class="btn btn-primary mt-3" style="border-radius: 30px; padding: 5px 20px;">
                                        <i class="mdi mdi-send"></i>&nbsp;&nbsp;kirim
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php } ?>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; - Sistani Loka</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

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
</body>

</html>