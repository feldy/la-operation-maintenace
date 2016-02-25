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
        	<a href="logout_mobile.php"><i class="fa fa-sign-out"></i> Logout</a>
	    </small>
    </div>
</div>
<form method="post" action="">
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
			                        <input type="text" id="" class="form-control">
			                    </div>
			                    <div class="form-group">
			                    	<label>Ruang</label>
			                        <input type="text" id="" class="form-control">
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
			                    						<select class="form-control">
						                                    <option>PLN/Gedung</option>
						                                    <option>UPS</option>
						                                    <option>IT</option>
						                                </select>
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="P-N" class="form-control">
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="P-G" class="form-control">
						                    		</div>
						                    		<div class="col-xs-2" style="padding: 2px;">
						                    			<input type="text" placeholder="N-G" class="form-control">
						                    		</div>
			                    				</div>
			                    			</div>
					                    </div>
					                    <div class="form-group">
					                    	<label>Grounding Bar Terkoneksi Ke-</label>
					                        <select class="form-control m-b" name="account">
			                                    <option>Tidak Ada</option>
			                                    <option>CPE/Router</option>
			                                    <option>MDP/Sumber Ground</option>
			                                    <option>Modem</option>
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
					                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Ada </label>
					                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak Ada</label>
					                                    </div>
						                            </td>
					                            </tr>
				                            </thead>
				                            <tbody>
					                            <tr>
					                                <td style="vertical-align: middle; ">Suhu Ruangan Perangkat</td>
					                                <td style="vertical-align: middle; text-align: right;">
					                                	<div class="input-group"><input type="text" class="form-control"> <span class="input-group-addon">Celcuis</span></div>
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
							                        <input type="text" id=""  class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
							                         <input type="text" id="" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
							                         <input type="text" id="" class="form-control">
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
							                        <input type="text" id=""  class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
							                         <input type="text" id="" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
							                         <input type="text" id="" class="form-control">
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
							                        <input type="text" id=""  class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
							                         <input type="text" id="" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
							                         <input type="text" id="" class="form-control">
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
							                        <input type="text" id=""  class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>No. Reg</label>
							                         <input type="text" id="" class="form-control">
							                    </div>
							                    <div class="form-group">
							                        <label>S/N</label>
							                         <input type="text" id="" class="form-control">
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Soltem/LJM:</a>
							                </h4>
							            </div>
							            <div id="collapseFive" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                      <div class="summernote"></div>
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Catatan/Gambar Konfigurasi Jaringan:</a>
							                </h4>
							            </div>
							            <div id="collapseSix" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <div class="form-group">
							                      	<label>Upload Konfigurasi Jaringan</label>
	                        						<span class="btn btn-default btn-file btn-block" style="float: right;">Browse <input type="file"></span>
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
									<button type="button" name="step" value="4" class="btn btn-primary btn-lg btn-block">Save</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
</form>