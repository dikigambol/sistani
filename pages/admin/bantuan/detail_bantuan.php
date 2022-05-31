<?php
$id = $_GET['id'];
$sql = "SELECT * FROM bantuan WHERE id_bantuan = $id";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$sql2 = "SELECT * FROM detail_bantuan INNER JOIN pengguna 
ON detail_bantuan.id_user = pengguna.id_pengguna INNER JOIN anggota 
ON pengguna.id_pengguna = anggota.id_user INNER JOIN kelompok_tani 
ON anggota.id_kelompok_tani = kelompok_tani.id_kelompok_tani 
WHERE detail_bantuan.id_bantuan = $id";
$query2 = $koneksi->query($sql2);

$no = 1;

function formatTanggal($date)
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d M Y');
}
?>

<p style="font-size: 20px;">
    <b>List Penerima</b>
</p>
<hr>
<div class="mt-4 row">
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-ticket-confirmation"></i> Nama Bantuan</b><br />
            <?php echo $data['nama_bantuan'] ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-calendar"></i> Tanggal</b><br />
            <?php echo formatTanggal($data['tgl_bantuan']) ?>
        </p>
    </div>
    <div class="col-lg-6 mb-3">
        <p>
            <b><i class="mdi mdi-note-text"></i> Keterangan</b><br />
            <?php echo $data['ket_bantuan'] ?>
        </p>
    </div>
</div>
<div class="table-responsive">
    <table id="tablebasic" class="table" style="width:100%">
        <thead>
            <tr>
                <th width="5">No</th>
                <th>Nama Lengkap</th>
                <th>Kelompok Tani</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = $query2->fetch_array()) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a class="link-kel-tani" href="<?php echo $base_url ?>dashboard-admin.php?page=detailprofil&id=<?php echo $data['id_pengguna'] ?>" title="lihat detail">
                            <?php echo $data['nama'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $data['nama_kelompok_tani'] ?>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>