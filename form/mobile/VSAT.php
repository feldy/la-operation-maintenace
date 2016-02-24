<?php
	$step = 1;
	$caption = "1: Indoor Area Checklist";
	if (isset($_POST['step'])) {
		$step = $_POST['step'];
		if ($step == 2) {
			$caption = "2. Outdoor Area Checklist";
		} else if ($step == 3) {
			$caption = "3. Informasi Hasil Pekerjaan";
		} else if ($step == 4) {
			$caption = "4. Data Perangkat Terpasang";
		}
	}

?>

<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-12">
        <h2>Maintenance Remote VSAT | Step <?php echo $caption;?></h2>
        <small><a href="index.php"><i class="fa fa-home"></i> Kembali Ke Menu Utama</a></small>
    </div>
</div>
<form method="post" action="">
	<span style="<?php if ($step == 1) { echo 'display: inherit';  } else { echo 'display: none'; }  ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="panel white-bg ">
		                        <div class="panel-heading">
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-1">Sarana Penunjang</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-2">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-1" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Merk UPS</label>
						                        <input type="text" placeholder="Merk UPS" id="merkUPS" class="form-control">
						                    </div>
			                        		<div class="form-group">
						                        <label>Kapasitas UPS</label>
				                        		<input type="text" placeholder="Kapasitas UPS" id="kapasitasUPS" class="form-control">
						                    </div>
						                    <div class="form-group">
				                            	<label>V-Output</label>
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


			                        	</div>
			                        	<div id="tab-2" class="tab-pane">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Menggunakan UPS</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Ya </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Jenis UPS</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Sinus </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Continu </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Ruang Bebas Debu</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Ya </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Terpasang Ground Bar dan Terhubung ke MDP pentanahan</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Ya </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Suhu Ruangan ( < 26 Derajat )</td>
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
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-3">Perangkat Modem</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-4">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-3" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Catuan Input Modem</label>
						                        <select class="form-control m-b" name="account">
				                                    <option>Tidak Ada</option>
				                                    <option>IT</option>
				                                    <option>UPS</option>
				                                    <option>Stabilizer</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Lokasi (Lantai, Ruang, Rack)</label>
						                        <input type="text" id="" class="form-control">
						                    </div>
						                     <div class="form-group">
				                    			<div class="row">
				                    				<div class="col-xs-12">
							                    		<div class="col-xs-6" style="padding: 2px; vertical-align: middle;">
				                            				<label style="">Bertumpuk</label>
							                    		</div>
							                    		<div class="col-xs-6" style="padding: 2px; text-align: right;">
							                    			<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Ya </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                    		</div>
				                    				</div>
				                    			</div>
						                    </div>
			                        	</div>
			                        	<div id="tab-4" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">V Input Modem (Phasa - Netral)</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div class="input-group"><input type="text" placeholder="Standard (210-230 VAC)" class="form-control"> <span class="input-group-addon">VAC</span></div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">V Input Modem (Netral - Ground)</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div class="input-group"><input type="text" placeholder="Standard (< 1 VAC)" class="form-control"> <span class="input-group-addon">VAC</span></div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Suhu Casing Modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name="">  Panas</label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Catuan Input Terbounding ke Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Kencang </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Splicing Konektor kabel IFL di modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Baik </label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
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
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-5">Perangkat CPE</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-6">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-5" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Pemilik Perangkat CPE</label>
						                        <select class="form-control m-b" name="account">
				                                    <option>Pelanggan</option>
				                                    <option>Lintas Arta</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Jenis Perangkat CPE</label>
						                        <input type="text" id="" class="form-control">
						                    </div>
			                        	</div>
			                        	<div id="tab-6" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Perangkat CPE mendapat catuan sama dengan modem</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Perangkat CPE terbounding dalam 1 ground yang sama dengan Modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name="">  Ya, Kencang</label>
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
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
		                        <div class="panel-body">
		                            <div class="form-group">
			                        	<label>Temuan Indor Area Dan Tindak Lanjut</label>
			                        	<div class="summernote"></div>
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
					    	<div class="panel blank-panel">
		                        <div class="panel-body" style="padding: 0px;">
									<button type="submit" name="step" value="2" class="btn btn-primary btn-lg btn-block">Next</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</span>
	<span style="<?php if ($step == 2) { echo 'display: inherit';  } else { echo 'display: none'; }  ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="panel white-bg ">
		                        <div class="panel-heading">
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-7">Sarana Penunjang</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-8">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-7" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Type Mounting</label>
						                        <select class="form-control m-b" name="account">
				                                    <option>Standart/NPM</option>
				                                    <option>Special</option>
				                                    <option>Wall Mount</option>
				                                    <option>Lainnya</option>
				                                </select>
						                    </div>
			                        	</div>
			                        	<div id="tab-8" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Mounting Tidak Goyang dan Berkarat</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Mounting Standard/NPM terbounding dengan Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya, Kencang</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Ballast Terpasang pada mounting Standard/NPM</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Center of Grafity Canester = 0&deg; (Tegak Lurus)</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
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
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-9">Perangkat Antena</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-10">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-9" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Polarisasi</label>
						                        <select class="form-control m-b" name="account">
				                                    <option>H</option>
				                                    <option>V</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Azimuth</label>
						                        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-addon">&deg;</span></div>
						                    </div>
						                    <div class="form-group">
						                    	<label>Elevasi</label>
						                        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-addon">&deg;</span></div>
						                    </div>
			                        	</div>
			                        	<div id="tab-10" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Antena Terbounding dengan Ground</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya, Kencang</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Reflector tidak Lobang, Kotor dan Kencang</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya </label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Feed Support tidak Berkarat dan Kencang</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Feed Horn Tidak Bocor dan Tidak Berembun</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
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
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a data-toggle="tab" href="#tab-11">Cabling Installation</a></li>
		                                    <li class=""><a data-toggle="tab" href="#tab-12">Quality Parameter</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                            <div class="tab-content">
			                        	<div id="tab-11" class="tab-pane active">
			                        		<div class="form-group">
						                    	<label>Type Kabel IFL</label>
						                        <select class="form-control" name="">
				                                    <option>LMR 240</option>
				                                    <option>Belden 9913</option>
				                                    <option>Belden 9292</option>
				                                    <option>Conscope</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Panjang Kabel IFL</label>
						                        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-addon">Meter</span></div>
						                    </div>
						                    <div class="form-group">
						                    	<label>Tahanan Short Kabel IFL</label>
						                        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-addon">Ω</span></div>
						                    </div>
			                        	</div>
			                        	<div id="tab-12" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Splicing Konektor kabel IFL di Antena</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Rapat, Baik</label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">System RF terbounding dengan Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="" name="">  Ya </label>
						                                        <label class="btn btn-sm btn-white"> <input type="radio" id="" name=""> Tidak </label>
						                                    </div>
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
		                        <div class="panel-body">
		                            <div class="form-group">
			                        	<label>Temuan Outdoor Area Dan Tindak Lanjut</label>
			                        	<div class="summernote"></div>
				                    </div>
				                    *Hanya untuk mounting standard/NPM (None Penetrating Mounting)
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
					    	<div class="panel blank-panel">
		                        <div class="panel-body" style="padding: 0px;">
									<button type="submit" name="step" value="3" class="btn btn-primary btn-lg btn-block">Next</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</span>
	<span style="<?php if ($step == 3) { echo 'display: inherit';  } else { echo 'display: none'; }  ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="panel white-bg ">
		                        <div class="panel-body">
		                        	<div class="form-group">
		                        		<label>Upload Konfigurasi Jaringan</label>
		                        		<span class="btn btn-default btn-file btn-block" style="float: right;">Browse <input type="file"></span>
		                        	</div>
		                        	<div class="form-group">
				                    	<label>Catatan</label>
				                    	<div class="summernote"></div>
				                    </div>
		                        </div>
		                    </div>
					    </div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="wrapper wrapper-content" style="padding: 0px;margin-bottom: -25px;">
								<div class="row">
								    <div class="col-sm-12">
								    	<div class="panel blank-panel">
					                        <div class="panel-body" style="padding: 0px;">
												<button type="submit" name="step" value="4" class="btn btn-primary btn-lg btn-block">Next</button><br />
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
	</span>
	<div style="<?php if ($step == 4) { echo 'display: inherit';  } else { echo 'display: none'; }  ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper wrapper-content" style="padding-bottom: 0px;margin-bottom: -25px;">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="panel white-bg ">
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
									<button type="submit" name="step" value="4" class="btn btn-primary btn-lg btn-block">Next</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>