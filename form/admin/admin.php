<?php 
    //proses upload
    if (isset($_POST['btn_update'])) {
    $spk_sid = $_GET['sid'];
        $isProses = 1;
        $lampiran_file = "";
        if (isset($_FILES['file_photo'])) {
            $extension = "";
            if ($_FILES['file_photo']['error'] == 0) {
                $extension = pathinfo($_FILES['file_photo']['name'], PATHINFO_EXTENSION);
                $lampiran_file = $spk_sid.".".$extension;;
            }
        }


        $lampiran_keterangan = $_POST['lampiran_keterangan'];
        $str = "UPDATE t_surat_perintah_kerja SET lampiran_file = '$lampiran_file', lampiran_keterangan = '$lampiran_keterangan' WHERE sid = '$spk_sid' ";
        $query = mysqli_query($conn, $str);
        if ($query) {
            move_uploaded_file($_FILES['file_photo']['tmp_name'], '../../upload/lampiran/'.$lampiran_file);
            showDialog("Berhasil", "Data Berhasil di Update !", "success", "index.php");
        } else {
            showDialog("Maaf!", "Data Gagal diupdate. Silahkan Ulangi !", "error", "?page=lampiran&sid=$spk_sid");
        }
    } else {
?>
<div class="row  border-bottom white-bg dashboard-header" style="padding: 5px;">
    <div class="col-sm-12">
        <div class="col-sm-10">
            <p>
                <h1 style="">Selamat Datang Kembali <?php echo $_SESSION['nama'];?> !</h1>
                <h4>Dashboard ADMIN</h4>
                <small><a href="../../system/logout.php"><i class="fa fa-sign-out"></i> Logout</a></small> |
                <small><a href="?page=view"><i class="fa fa-reply"></i> View Data</a></small>
            </p>
        </div>
        <div class="col-sm-2">
            <img src="../../images/logo.png" class="img-responsive">
        </div>
    </div>
</div>
<?php if ((isset($_GET['page'])) and ($_GET['page'] == "lampiran")) { 
    $spk_sid = $_GET['sid'];
    $str = "SELECT * FROM t_surat_perintah_kerja where sid = '$spk_sid'";
    $query = mysqli_query($conn, $str);
    $query = mysqli_fetch_array($query);

    $src_image = "../../images/picture_not_available.png";
    if (!empty($query['lampiran_file'])) {
        $src_image = "../../upload/lampiran/".$query['lampiran_file'];
    } 
?>
<div class="row" style="padding: 5px;">
    <div  class="wrapper wrapper-content" style="padding: 5px 20px 5px 20px" > 
        <div class="row">
             <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Tambah Lampiran Pekerjaan</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <form  method="post" action="" enctype="multipart/form-data">
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="summernote" name="lampiran_keterangan"><?php echo htmlspecialchars_decode($query['lampiran_keterangan']);?></textarea>
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <img alt="image" class="img-responsive" id="img_tmp" src="<?php echo $src_image; ?>">
                                                <span class="btn btn-default btn-file btn-block" style="float: right;">Upload <input type="file" id="file_photo" name="file_photo" class="form-control"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary btn-lg btn-block" name="btn_update">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#file_photo").change(function(event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#img_tmp").fadeIn("fast").attr('src', tmppath);
            console.log(tmppath);
        });
    });
</script>
<?php } else { ?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Maintenance Pelanggan</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover no-margins">
                    <thead>
                    <tr>
                        <th width="160px">Tanggal </th>
                        <th>No. SPK</th>
                        <th>Pelanggan</th>
                        <th>Alamat</th>
                        <th>Akses</th>
                        <th>Keluhan</th>
                        <th>Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal, spk.sid as sid_spk,
                                        no_spk, akses, masalah, pel.nama_pelanggan as nama_pelanggan, pel.alamat as alamat, tim.nama_team as nama_team
                                FROM t_surat_perintah_kerja spk 
                                LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
                                LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
                                WHERE spk.status = 'INPROGRESS'
                                ";

                        // echo $str;
                        $result = mysqli_query($conn, $str) or die(mysqli_error());

                        while($arr=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><i class="fa fa-clock-o"></i> <?php echo $arr['tanggal'] ?></td>
                        <td><?php echo $arr['no_spk'] ?></td>
                        <td><?php echo $arr['nama_pelanggan'] ?></td>
                        <td><?php echo $arr['alamat'] ?></td>
                        <td><?php echo $arr['akses'] ?></td>
                        <td><?php echo $arr['masalah'] ?></td>
                        <td class="text-navy"> <a href="#"><i class="fa fa-users"></i>&nbsp;<?php echo $arr['nama_team'] ?></a></td>
                        <td class="text-primary"> <a href="?page=lampiran&sid=<?php echo $arr['sid_spk'];?>"><i class="fa fa-file-o"></i>&nbsp;+ Lampiran</a></td>
                    </tr>
                    <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php } } ?>
