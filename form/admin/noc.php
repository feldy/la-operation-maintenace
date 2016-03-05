<?php 
    $value_str_search = "";
    $strSearch = "";
    if (isset($_POST['src_search'])) {
        $value_str_search = $_POST['src_search'];
        $strSearch = "WHERE spk.no_spk like '%$value_str_search%' OR pel.nama_pelanggan like '%$value_str_search%' OR spk.akses like '%$value_str_search%' OR tim.nama_team like '%$value_str_search%'";
    } else if (isset($_POST['action_cancel'])) {
        $val_sid = $_POST['action_cancel'];
        $qry = mysqli_query($conn, "UPDATE t_surat_perintah_kerja SET status = 'CANCELED', access_date = now() WHERE sid = '$val_sid'") or die(mysqli_error($conn));
    }
?>

<div class="row  border-bottom white-bg dashboard-header" style="padding: 5px;">
    <div class="col-sm-12">
        <div class="col-sm-10">
            <p>
                <h1 style="">Selamat Datang Kembali <?php echo $_SESSION['nama'];?> !</h1>
                <h4>Dashboard NOC</h4>
                <small><a href="../../system/logout.php"><i class="fa fa-sign-out"></i> Logout</a></small> | 
                <small><a href="?page=noc"><i class="fa fa-reply"></i> View Data</a></small>
            </p>
        </div>
        <div class="col-sm-2">
            <img src="../../images/logo.png" class="img-responsive">
        </div>
    </div>
</div>
<div class="row" style="padding: 5px;">
    <div  class="wrapper wrapper-content" style="padding: 5px 20px 5px 20px" > 
        <div class="row">
            <?php if ((isset($_GET['form'])) && ($_GET['form'] == "new")) { $form = $_GET['form']; ?>
             <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Buat Surat Perintah Kerja</h5>
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
                                <form method="post" action="../../system/crud_impl.php" onsubmit="return postForm()">
                                    <div class="form-group">
                                        <label>Akses</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select class="form-control" name="akses">
                                                    <option></option>
                                                    <option value="VSAT">VSAT</option>
                                                    <option value="WIRELESS">WIRELESS</option>
                                                    <option value="WIRELINE">WIRELINE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Jaringan</label>
                                        <input class="form-control" type="text" id="no_jaringan" >
                                        <input type="hidden" name="id_pelanggan" id="id_no_jaringan"  >
                                    </div>
                                    <div class="form-group">
                                        <label>Team Handling (Pilih Nama Team)</label>
                                        <input class="form-control" type="text" id="team_handling" >
                                        <input type="hidden" name="id_team" id="id_team"  >
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelapor</label>
                                        <input class="form-control" type="text" name="cp_nama" >
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon Pelapor</label>
                                        <input class="form-control" type="text" name="cp_telepon" >
                                    </div>
                                    <div class="form-group">
                                        <label>Masalah</label>
                                        <input class="form-control" type="text" name="masalah" >
                                    </div>
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea class="summernote" id="id_catatan" name="catatan"></textarea>
                                    </div>
                                    <br ><br >
                                    <button class="btn btn-primary" name="btn_save_spk">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if ((isset($_GET['form'])) && ($_GET['form'] == "view_detail")) { ?>
            <?php 
                $akses = $_GET['akses'];
                if ($akses == "VSAT") {
                    include("view_rpt_vsat.php"); 
                } else if ($akses == "WIRELESS") {
                    include("view_rpt_wireless.php"); 
                } else if ($akses == "WIRELINE") {
                    include("view_rpt_wireline.php"); 
                }
                // include("view_rpt_vsat.php"); 
            ?>
            <?php } else { ?>
	        <div class="col-sm-12">
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
                                <div class="row">
                                    <div class="col-sm-8">
                                    </div>
                                    <div class="col-sm-4">
                                        <form method="post" action="">
                                            <div class="input-group">
                                                <input type="text" name="src_search" value="<?php echo $value_str_search;?>" placeholder="Search by No SPK, Team, Customer dan Akses" class="input-sm form-control" /> 
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-sm btn-primary"> Go!</button> 
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-hover no-margins">
                                    <!-- <thead>
                                    <tr>
                                        <th width="160px">Tanggal </th>
                                        <th>No. SPK</th>
                                        <th>Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Akses</th>
                                        <th>Keluhan</th>
                                        <th>Team</th>
                                        <th></th>
                                    </tr>
                                    </thead> -->
                                    <tbody>
                                    <?php 
                                        $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal, spk.sid as sid_spk,
                                                        no_spk, status, akses, masalah, pel.nama_pelanggan as nama_pelanggan, pel.alamat as alamat, tim.nama_team as nama_team, tim.leader as leader
                                                FROM t_surat_perintah_kerja spk 
                                                LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
                                                LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
                                                $strSearch 
                                                ORDER BY spk.tanggal desc
                                                ";

                                        // echo $str;
                                        $result = mysqli_query($conn, $str) or die(mysqli_error());

                                        while($arr=mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary"><?php echo $arr['akses'] ?></span>
                                            <br/>
                                            <small><?php echo $arr['no_spk'] ?></small>
                                        </td>
                                        <td class="project-title">
                                            <a href="#"><?php echo $arr['nama_pelanggan'] ?></a>
                                            <br/>
                                            <small><i class="fa fa-clock-o"></i> <?php echo $arr['alamat'] ?></small>
                                        </td>
                                        <td class="project-title">
                                            <a>Keluhan: <?php echo $arr['masalah'] ?></a>
                                            <br/>
                                            <small><i class="fa fa-clock-o"></i> <?php echo $arr['tanggal'] ?></small>
                                        </td>
                                        <td class="project-status">
                                            <span class="label label-info">Team: <?php echo $arr['nama_team'] ?></span>
                                            <br/>
                                            <small><i class="fa fa-user"></i> <?php echo $arr['leader'] ?></small>
                                        </td>
                                        <form method="post" action="" id="form_cancel">
                                        <td class="project-actions">
                                            <?php if ($arr['status'] == "INPROGRESS") { ?>   
                                            <a href="?form=view_detail&akses=<?php echo $arr['akses'];?>&sid=<?php echo $arr['sid_spk'];?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <?php } else if ($arr['status'] == "NEW" || $arr['status'] == "INPROGRESS") { ?>
                                            <button type="submit" name="action_cancel" value="<?php echo $arr['sid_spk'];?>" class="btn btn-white btn-sm"><i class="fa fa-ban"></i> Cancel </button>
                                            <!-- <a class="btn btn-warning btn-sm"><i class="fa fa-yelp"></i> Inprogress.. </a> -->
                                            <?php } else { ?>
                                            <a class="btn btn-warning btn-sm"><i class="fa fa-yelp"></i> <?php echo $arr['status'];?> </a>
                                            <?php } ?>
                                        </td>
                                        </form>
                                    </tr>
                                    <?php }  ?>
                                    </tbody>
                                </table>
                                <br />
                                <a class="btn btn-primary" href="?page=noc&form=new">Create NOC</a>
                            </div>
                        </div>
	        		</div>
	        	</div>
	        </div>
            <?php } ?>
	    </div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#no_jaringan").autocomplete({
            source: "../../system/service_impl.php?type=pelanggan",
            select: function (event, ui) {
                $("#id_no_jaringan").val(ui.item.sid);
            }
        });
        $("#team_handling").autocomplete({
            source: "../../system/service_impl.php?type=team",
            select: function (event, ui) {
                $("#id_team").val(ui.item.sid);
            }
        });
        var postForm = function() {
            var content = $('textarea[name="catatan"]').html($('#id_catatan').code());
        }

    });
</script>