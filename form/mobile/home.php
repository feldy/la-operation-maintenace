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
    
    <link href="../../lib/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="../../lib/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

</head>

<body>
    <?php 
        $role = $_SESSION['role'];
        if ($role == "team") {
            //SEARCH TUGAS
            $id_team = $_SESSION['id_team_header'];
            $str = "SELECT spk.sid as spk_sid, spk.akses, spk.no_spk, team.nama_team, team.leader, pelanggan.no_jaringan, pelanggan.nama_pelanggan, pelanggan.alamat, pelanggan.no_telepon
                    FROM t_surat_perintah_kerja spk 
                    LEFT JOIN m_team_header team ON team.sid = spk.id_team 
                    LEFT JOIN m_pelanggan pelanggan ON pelanggan.sid = spk.id_pelanggan 
                    WHERE id_team = '$id_team' 
                    AND spk.status = 'NEW' 
                    ORDER BY spk.tanggal asc LIMIT 1 ";
            $query = mysqli_query($conn, $str) or die(mysqli_error());
            $query = mysqli_fetch_array($query);
            if ($query) {
                $SPK_SID = $query['spk_sid'];
                $akses = $query['akses'];
                if ($akses == 'VSAT') {
                    include("VSAT.php");
                } else if ($akses == 'WIRELESS') {
                    include("WIRELESS.php");
                } else if ($akses == 'WIRELINE') {
                    include("WIRELINE.php");
                }
            } else {
    ?>

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
    <?php
            }
        }   
    ?>

    <!-- Mainly scripts -->
    <script src="../../lib/js/jquery-2.1.1.js"></script>
    <script src="../../lib/js/bootstrap.min.js"></script>
    <!-- SUMMERNOTE -->
    <script src="../../lib/js/plugins/summernote/summernote.min.js"></script>
    <!-- Main JS -->
    <script src="../../js/main.js"></script>

</body>

</html>
<?php } ?>