<?php
$sql = "SELECT * FROM agenda WHERE id_kelompok_tani = $idkelompoktani";
$query = $koneksi->query($sql);
$totalAgenda = mysqli_num_rows($query);
$no = 1;

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
}
?>

<?php if ($kelompoktani == "-") { ?>
    <div class="empty-box">
        <img class="img-empty" src="assets/img/empty.svg" alt="">
        <br>
        <br>
        <h5 class="text-center">Belum gabung kelompok tani &nbsp;&#127806;</h5>
    </div>
<?php } else { ?>
    <p style="font-size: 20px;">
        <b>Agenda Kelompok Tani</b>
    </p>
    <hr>
    <div class="mt-4"></div>
    <?php if ($jabatankeltani == "ketua") { ?>
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 30px !important; padding: 6px 20px;">
            <i class="mdi mdi-plus"></i> Tambah
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Tambah jadwal</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo $base_url ?>pages/user/jadwal/c_jadwal.php" method="POST">
                        <input type="hidden" class="form-control" name="id_keltani" value="<?php echo $idkelompoktani ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label style="font-size: 14px; margin-bottom: 5px;">Tanggal :</label>
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label style="font-size: 14px; margin-bottom: 5px;">Jam :</label>
                                        <input type="text" class="form-control" name="jam" placeholder="ex. 08:00">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label style="font-size: 14px; margin-bottom: 5px;">Keterangan :</label>
                                        <textarea name="keterangan" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($totalAgenda < 1) { ?>
        <div class="empty-box">
            <img class="img-empty" src="assets/img/empty.svg" alt="">
            <br>
            <br>
            <h5 class="text-center">Tidak ada agenda &nbsp;&#9749;</h5>
        </div>
    <?php } else { ?>
        <?php while ($data = $query->fetch_array()) : ?>
            <!-- awal  -->
            <div class="course">
                <div class="course-preview">
                    <h4><?php echo formatTanggal($data['tanggal_agenda']) ?></h4>
                    <p><i class="mdi mdi-clock"></i> &nbsp;<?php echo $data['jam_agenda'] ?></p>
                </div>
                <div class="course-info">
                    <p>
                        <?php echo $data['keterangan'] ?>
                    </p>
                </div>
            </div>
            <?php if ($jabatankeltani == "ketua") { ?>
                <p class="btn-agenda" style="color: #a1a1a1;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['id_agenda'] ?>" style="text-decoration: none;">edit</a>
                    &nbsp;|&nbsp;
                    <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo $base_url ?>pages/user/jadwal/d_jadwal.php?id=<?php echo $data['id_agenda'] ?>" style="text-decoration: none;" class="text-danger">hapus</a>
                </p>
                <!-- Modal -->
                <div class="modal fade" id="modalEdit<?php echo $data['id_agenda'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Edit jadwal</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $base_url ?>pages/user/jadwal/u_jadwal.php" method="POST">
                                <input type="hidden" class="form-control" name="id_agenda" value="<?php echo $data['id_agenda'] ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Tanggal :</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal_agenda'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Jam :</label>
                                                <input type="text" class="form-control" name="jam" placeholder="ex. 08:00" value="<?php echo $data['jam_agenda'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 14px; margin-bottom: 5px;">Keterangan :</label>
                                                <textarea name="keterangan" rows="5" class="form-control"><?php echo $data['keterangan'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mb-4"></div>
            <?php } ?>
            <!-- akhir  -->
        <?php endwhile ?>
    <?php } ?>
<?php } ?>