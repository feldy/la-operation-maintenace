<div class="row  border-bottom white-bg dashboard-header" style="padding: 5px;">
    <div class="col-sm-12">
    	<div class="col-sm-10">
    		<p>
		        <h1 style="">Selamat Datang Kembali</h1>
		        <h4>Dashboard NOC</h4>
                <small><a href="#"><i class="fa fa-sign-out"></i> Logout</a></small> | 
		        <small><a href="?page=noc&form=view"><i class="fa fa-reply"></i> View Data</a></small>
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
            <?php if (isset($_GET['form'])) { $form = $_GET['form']; ?>
            <?php if ($form == "new") { ?>
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
                                    <input class="form-control" type="text" name="no_jaringan" id="no_jaringan" >
                                </div>
                                <div class="form-group">
                                    <label>Team Handling (Pilih Nama Team)</label>
                                    <input class="form-control" type="text" name="team_handling" id="team_handling" >
                                </div>
                                <div class="form-group">
                                    <label>Masalah</label>
                                    <input class="form-control" type="text" name="masalah" id="masalah" >
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <div class="summernote"></div>
                                </div>
                                <br ><br >
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if ($form == "view") { ?>
	        <div class="col-sm-12">
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Assign Tim Operator</h5>
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
                                        <th>Tanggal </th>
                                        <th>Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Keluhan</th>
                                        <th>Assign</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> 11:20pm</td>
                                        <td>Samantha</td>
                                        <td>Depok</td>
                                        <td>Kabel Putus</td>
                                        <td class="text-navy"> <a href="#"><i class="fa fa-users"></i> Tim Jaguar</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br />
                                <a class="btn btn-primary" href="?page=noc&form=new">Create New Issue</a>
                            </div>
                        </div>
	        		</div>
	        	</div>
	        </div>
            <?php }} ?>
	    </div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#no_jaringan").autocomplete({
          source: "../../system/service_impl.php?type=pelanggan"
        });
        $("#team_handling").autocomplete({
          source: "../../system/service_impl.php?type=team"
        });
    });
</script>