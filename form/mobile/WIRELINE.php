<?php 
	//inisialisasi
	$isError = 0;
	$extension = "";
	$lantai_posisi_modem = "";
	$ruang = "";
	$output_tegangan_ke_modem = "";
	$v_output_pn = "";
	$v_output_pg = "";
	$v_output_ng = "";
	// $v_output_pn_pg_ng = "";
	$grounding_bar_koneksi = "";
	$is_ada_ac = "";
	$suhu_ruangan = "";
	$existing_nama_barang = "";
	$existing_no_reg = "";
	$existing_serial_number = "";
	$temuan_tidak_terpakai_nama_barang = "";
	$temuan_tidak_terpakai_no_reg = "";
	$temuan_tidak_terpakai_serial_number = "";
	$cabut_nama_barang = "";
	$cabut_no_reg = "";
	$cabut_serial_number = "";
	$pengganti_nama_barang = "";
	$pengganti_no_reg = "";
	$pengganti_serial_number = "";
	$catatan_soltem_ljm = "";
	$file_photo = "";

	if (isset($_POST['step'])) {
		include("crud_impl_mobile.php");
	}
?>

<?php 
	if (!$isError) {
?>
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-12">
    	<small>
        	<?php 
        		echo "No Jaringan: ".$query['no_jaringan']." | ".$query['nama_pelanggan']." | ".$query['alamat']." (".$query['no_telepon'].")";
        	?>
    	</small>
        <h2>Maintenance Remote Wireline</h2>
        <small>
        	<a href="#">
        		<i class="fa fa-key"></i> No SPK: <?php echo $query['no_spk'];?> |
        		<i class="fa fa-group"></i> Nama Team: <?php echo $query['nama_team'];?> |
        		<i class="fa fa-child	"></i> Leader: <?php echo $query['leader'];?> |
	        </a>
        	<a href="index.php"><i class="fa fa-sign-out"></i> Home</a>
	    </small>
    </div>
</div>
<form method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
			<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
				<div class="row">
				    <div class="col-sm-12">
				    	<div class="panel white-bg ">
				    		<div class="panel-heading">
				    			<h3><label>Global Checklist</label></h3>
				    		</div>
				    		<div class="panel-body">
					    		<div class="form-group">
			                    	<label>Posisi Modem di Lantai</label>
			                        <input type="text" value="<?php echo $lantai_posisi_modem; ?>" name="lantai_posisi_modem" class="form-control">
			                    </div>
			                    <div class="form-group">
			                    	<label>Ruang</label>
			                        <input type="text" value="<?php echo $ruang; ?>" name="ruang" class="form-control">
			                    </div>
			                </div>
	                        <div class="panel-heading">
	                            <div class="panel-options">
	                                <ul class="nav nav-tabs">
	                                    <li class="active"><a data-toggle="tab" href="#tab-1">Electrical</a></li>
	                                    <li class=""><a data-toggle="tab" href="#tab-2">Environment</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="panel-body">
	                            <div class="tab-content">
		                        	<div id="tab-1" class="tab-pane active">
					                    <div class="form-group">
			                            	<label>Output Tegangan yang Mencatu ke Modem</label>
			                    			<div class="row">
			                    				<div class="col-xs-12">
						                    		<div class="col-xs-6" style="padding: 2px;">
			                    						<select class="form-control" name="output_tegangan_ke_modem" >
			                    						    <option value="PLN/Gedung" <?php if ($output_tegangan_ke_modem == "PLN/Gedung") { echo 'selected';} ?>>PLN/Gedung</option>
			                    						    <option value="UPS" <?php if ($output_tegangan_ke_modem == "UPS") { echo 'selected';} ?>>UPS</option>
			                    						    <option value="IT" <?php if ($output_tegangan_ke_modem == "IT") { echo 'selected';} ?>>IT</option>
			                    						</select>
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="P-N" class="form-control" name="v_output_pn" value="<?php echo $v_output_pn;?>">
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="P-G" class="form-control" name="v_output_pg" value="<?php echo $v_output_pg;?>">
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="N-G" class="form-control" name="v_output_ng" value="<?php echo $v_output_ng;?>">
						                    		</div>
			                    				</div>
			                    			</div>
					                    </div>
					                    <div class="form-group">
					                    	<label>Grounding Bar Terkoneksi Ke-</label>
					                    	<select class="form-control" name="grounding_bar_koneksi" >
					                    	    <option value="Tidak Ada" <?php if ($grounding_bar_koneksi == "Tidak Ada") { echo 'selected';} ?>>Tidak Ada</option>
					                    	    <option value="CPE/Router" <?php if ($grounding_bar_koneksi == "CPE/Router") { echo 'selected';} ?>>CPE/Router</option>
					                    	    <option value="MDP/Sumber Ground" <?php if ($grounding_bar_koneksi == "MDP/Sumber Ground") { echo 'selected';} ?>>MDP/Sumber Ground</option>
					                    	    <option value="Modem" <?php if ($grounding_bar_koneksi == "Modem") { echo 'selected';} ?>>Modem</option>
					                    	</select>
					                    </div>
		                        	</div>
		                        	<div id="tab-2" class="tab-pane">
		                        		<table class="table">
				                            <thead>
					                            <tr>
					                                <td width="50%" style="vertical-align: middle; ">AC Pendingin Ruangan</td>
					                                <td width="50%" style="vertical-align: middle; text-align: right;">
					                                    <div data-toggle="buttons" class="btn-group">
					                                    	<label class="btn btn-sm btn-white <?php if ($is_ada_ac == 1) {echo "active"; } ?>"> <input <?php if ($is_ada_ac == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_ada_ac"> Ada </label>
					                                    	<label class="btn btn-sm btn-white <?php if ($is_ada_ac == 0) {echo "active"; } ?>"> <input <?php if ($is_ada_ac == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_ada_ac"> Tidak Ada </label>
					                                    </div>
						                            </td>
					                            </tr>
				                            </thead>
				                            <tbody>
					                            <tr>
					                                <td style="vertical-align: middle; ">Suhu Ruangan Perangkat</td>
					                                <td style="vertical-align: middle; text-align: right;">
					                                	<div class="input-group"><input type="text" value="<?php echo $suhu_ruangan; ?>" name="suhu_ruangan" class="form-control"> <span class="input-group-addon">Celcuis</span></div>
						                            </td>
					                            </tr>
				                            </tbody>
				                        </table>
		                        	</div>
		                        </div>
	                        </div>
	                    </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
				<div class="row">
				    <div class="col-sm-12">
				    	<div class="panel white-bg ">
				    		<div class="panel-heading">
				    			<h3><label>Data Perangkat</label></h3>
				    		</div>
	                        <div class="panel-body">
	                        	<div class="panel-group" id="accordion">
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h5 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Existing</a>
							                </h5>
							            </div>
							            <div id="collapseOne" class="panel-collapse collapse in">
							                <div class="panel-body">
							                    <div class="form-group">
							                        <label>Nama barang</label>
													<input type="text" name="existing_nama_barang" value="<?php echo "$existing_nama_barang";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
													<input type="text" name="existing_no_reg" value="<?php echo "$existing_no_reg";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
													<input type="text" name="existing_serial_number" value="<?php echo "$existing_serial_number";?>" class="form-control">
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Temuan Tidak Terpakai</a>
							                </h4>
							            </div>
							            <div id="collapseTwo" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                        <label>Nama barang</label>
													<input type="text" name="temuan_tidak_terpakai_nama_barang" value="<?php echo "$temuan_tidak_terpakai_nama_barang";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
													<input type="text" name="temuan_tidak_terpakai_no_reg" value="<?php echo "$temuan_tidak_terpakai_no_reg";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
													<input type="text" name="temuan_tidak_terpakai_serial_number" value="<?php echo "$temuan_tidak_terpakai_serial_number";?>" class="form-control">
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Cabut</a>
							                </h4>
							            </div>
							            <div id="collapseThree" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                        <label>Nama barang</label>
													<input type="text" name="cabut_nama_barang" value="<?php echo "$cabut_nama_barang";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
													<input type="text" name="cabut_no_reg" value="<?php echo "$cabut_no_reg";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
													<input type="text" name="cabut_serial_number" value="<?php echo "$cabut_serial_number";?>" class="form-control">
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Pengganti/Pasang Baru</a>
							                </h4>
							            </div>
							            <div id="collapseFour" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                        <label>Nama barang</label>
													<input type="text" name="pengganti_nama_barang" value="<?php echo "$pengganti_nama_barang";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
													<input type="text" name="pengganti_no_reg" value="<?php echo "$pengganti_no_reg";?>" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
													<input type="text" name="pengganti_serial_number" value="<?php echo "$pengganti_serial_number";?>" class="form-control">
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Temuan:</a>
							                </h4>
							            </div>
							            <div id="collapseFive" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                      <textarea class="summernote" name="catatan_soltem_ljm" id="catatan_soltem_ljm"><?php $catatan_soltem_ljm; ?></textarea>
							                      <input type="hidden" value="<?php echo $catatan_soltem_ljm; ?>" id="catatan_soltem_ljm_hidden" />
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Gambar Konfigurasi Jaringan:</a>
							                </h4>
							            </div>
							            <div id="collapseSix" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                      	<label>Upload Konfigurasi Jaringan</label>
	                        						<span class="btn btn-default btn-file btn-block" style="float: right;">Browse <input type="file" id="file_photo" name="file_photo" class="form-control"></span>
				                    				<input type="hidden" name="extension" value="<?php echo $extension; ?>" />
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>    
	                        </div>
	                    </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
			<div class="col-sm-12">
				<div class="wrapper wrapper-content" style="padding: -10px;margin-bottom: -25px;">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="panel blank-panel">
		                        <div class="panel-body" style="padding: 0px;">
									<button type="submit" name="step" value="btn_save_wireline" class="btn btn-primary btn-lg btn-block">Save</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
</form>

<?php } ?>