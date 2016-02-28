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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal,
                                                        no_spk, akses, masalah, pel.nama_pelanggan as nama_pelanggan, pel.alamat as alamat, tim.nama_team as nama_team
                                                FROM t_surat_perintah_kerja spk 
                                                LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
                                                LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
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
                                        <td> <a><i class="fa fa-users"></i>&nbsp;<?php echo $arr['nama_team'] ?></a></td>
                                        <td> <a href="#"><i class="fa fa-ban"></i>&nbsp;Cancel ?</a></td>
                                    </tr>
                                    <?php }  ?>
                                    </tbody>
                                </table>
                                <br />
                                <a class="btn btn-primary" href="?page=noc&form=new">Create New Issue</a>
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