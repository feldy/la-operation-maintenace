<?php 
    include("../../config/configuration.php");

    session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) || $_SESSION['role'] != "team" ) {
        echo "<script>window.location.href='login_mobile.php'</script>";
    } else {
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mobile</title>

    <link href="../../lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../../lib/css/animate.css" rel="stylesheet">
    <link href="../../css/default.css" rel="stylesheet">
    <link href="../../lib/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <?php if (isset($_GET['page']) && $_GET['page'] == "perintah_kerja") { ?>
            <?php
                //SEARCH TUGAS
                $id_team = $_SESSION['id_team_header'];
                $str = "SELECT spk.sid as spk_sid, spk.catatan, spk.akses, spk.no_spk, team.nama_team, team.leader, pelanggan.no_jaringan, pelanggan.nama_pelanggan, pelanggan.alamat, pelanggan.no_telepon
                        FROM t_surat_perintah_kerja spk 
                        LEFT JOIN m_team_header team ON team.sid = spk.id_team 
                        LEFT JOIN m_pelanggan pelanggan ON pelanggan.sid = spk.id_pelanggan 
                        WHERE id_team = '$id_team' 
                        AND spk.status = 'NEW' 
                        ORDER BY spk.tanggal asc LIMIT 1 ";
                $query = mysqli_query($conn, $str) or die(mysqli_error());
                $query = mysqli_fetch_array($query);
                if ($query) {
            ?>
            <div class="widget lazur-bg p-xl">
                <small><a href="index.php" style="color: white" =""><i class="fa fa-sign-out"></i> Back</a></small><br>
                <small>Surat Perintah Kerja</small>
                <h2><?php echo $query['nama_pelanggan'];?></h2>
                <span class="label"><?php echo $query['akses'] ?></span>
                <ul class="list-unstyled m-t-md">
                    <li>
                        <span class="fa fa-dot-circle-o m-r-xs"></span>
                        <label>No SPK:</label>
                        <?php echo $query['no_spk'];?>
                    </li>
                    <li>
                        <span class="fa fa-plus-square-o m-r-xs"></span>
                        <label>No Jaringan:</label>
                        <?php echo $query['no_jaringan'];?>
                    </li>
                    <li>
                        <span class="fa fa-home m-r-xs"></span>
                        <label>Alamat:</label>
                        <?php echo $query['alamat'];?>
                    </li>
                    <li>
                        <span class="fa fa-phone m-r-xs"></span>
                        <label>Contact:</label>
                        <?php echo $query['no_telepon'];?>
                    </li>
                    <li>
                        <span class="fa fa-font m-r-xs"></span>
                        <label>Catatan:</label>
                        <?php echo htmlspecialchars_decode($query['catatan']);?>
                    </li>
                </ul>
            </div>
            <?php } else { ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <h1 class="m-xs"><i class="fa fa-angellist fa-2x"></i></h1>
                            <h3 class="font-bold no-margins">
                                Pemberitahuan
                            </h3>
                            <small>Belum ada Tugas Tersedia. :) </small>
                            <h3><a href="index.php" style="color: white" =""><i class="fa fa-sign-out"></i> Back</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } else if (isset($_GET['page']) && $_GET['page'] == "laporan_selesai") { ?>
        <?php } else { ?>
        <div class="col-lg-12">
            <div class="middle-box text-center loginscreen  animated fadeInDown" style="margin-top: 0px;">
                <div>
                    <div><img src="../../images/logo.png" class="img-responsive"></div>
                    <?php 
                        $id = $_SESSION['id_team_header'];
                        $q = mysqli_query($conn, "SELECT * FROM m_team_header WHERE sid = '$id' ") or die(mysqli_error($conn));
                        $q = mysqli_fetch_array($q);
                    ?>
                    <h2>Wellcome <?php echo $q['nama_team']?></h2>
                    <h3>Operation and Maintenance</h3>
                    <button class="btn btn-primary dim btn-large-dim" style="width: 100%;" type="button" onclick="window.location.href = '?page=perintah_kerja'">
                        <table width="100%">
                            <tr>
                                <td width="40px"><i class="fa fa-envelope-square"></i></td>
                                <td style="font-size: 25px; text-align: right;"><span>Perintah Kerja</span></td>
                            </tr>
                        </table>
                    </button>
                    <button class="btn btn-danger  dim btn-large-dim" style="width: 100%;" type="button">
                        <table width="100%">
                            <tr>
                                <td width="40px"><i class="fa fa-edit"></i></td>
                                <td style="font-size: 25px; text-align: right;"><span>Isi Laporan</span></td>
                            </tr>
                        </table>
                    </button>
                    <button class="btn btn-warning dim btn-large-dim" style="width: 100%;" type="button"  onclick="window.location.href = '?page=laporan_selesai'">
                        <table width="100%">
                            <tr>
                                <td width="40px"><i class="fa fa-list"></i></td>
                                <td style="font-size: 25px; text-align: right;"><span>Laporan Selesai</span></td>
                            </tr>
                        </table>
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Mainly scripts -->
    <script src="../../lib/js/jquery-2.1.1.js"></script>
    <script src="../../lib/js/bootstrap.min.js"></script>

</body>

</html>
<?php } ?>