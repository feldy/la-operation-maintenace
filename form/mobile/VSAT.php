<?php
	//inisialisasi
	//mapping data step 1
	$step = 1;
	$isProses = 0;
	
	$merk_ups = "";
	$kapasitas_ups = "";
	$v_output_pn = "";
	$v_output_pg = "";
	$v_output_ng = "";
	$v_output_pn_pg_ng = "";
	$jenis_ups = "Sinus";
	$is_menggunakan_ups = 0;
	$is_bebas_debu = 0;
	$is_terpasang_groundbar_mdp = 0;
	$suhu_ruangan = "";
	$catuan_input_modem = "Tidak Ada";
	$lokasi_lantai_ruang_rak = "";
	$is_bertumpuk = 0;
	$v_input_modem_pn = "";
	$v_input_modem_ng = "";
	$is_suhu_casing_panas = 0;
	$is_terbounding_ke_ground_kencang = 0;
	$is_splicing_konektor_kabel_ifl = 0;
	$pemilik_perangkat_cpe = "";
	$jenis_perangkat_cpe = "";
	$is_perangkat_cpe_catuan_sama_dengan_modem = 0;
	$is_perangkat_cpe_bounding_sama_dengan_modem = 0;
	$temuan_indor_area = "";

	//mapping data step 2
	$tipe_mounting = "";
	$is_mounting_tidak_goyang_berkarat = 0;
	$is_mounting_standard_bounding_ground = 0;
	$is_ballast_terpasang = 0;
	$is_tegak_lurus = 0;
	$polaris = "";
	$azimuth = "";
	$elevasi = "";
	$is_antena_bounding_ground = 0;
	$is_reflector_tidak_lobang_kotor_kencang = 0;
	$is_feed_support_tidak_berkarat_kencang = 0;
	$is_feed_support_tidak_bocor_berembun = 0;
	$tipe_kabel_ifl = "";
	$panjang_kabel_ifl = "";
	$tahanan_short_kabel_ifl = "";
	$is_splicing_konektor_kabel_ifl = 0;
	$is_system_rf_bounding_ground = 0;
	$temuan_outdor_area = "";		

	//mapping data step 3
	$file_photo = "";
	$catatan = "";
	$extension = "";

	//mapping data step 4
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

	$caption = "1: Indoor Area Checklist";
	if (isset($_POST['step'])) {
		//mapping data step 1
    	$merk_ups = $_POST['merk_ups'];
    	$kapasitas_ups = $_POST['kapasitas_ups'];
		$v_output_pn_pg_ng = $_POST['v_output_pn_pg_ng'];
		$v_output_pn = $_POST['v_output_pn'];
		$v_output_pg = $_POST['v_output_pg'];
		$v_output_ng = $_POST['v_output_ng'];
		$is_menggunakan_ups = $_POST['is_menggunakan_ups'];
		$jenis_ups = $_POST['jenis_ups'];
		$is_bebas_debu = $_POST['is_bebas_debu'];
		$is_terpasang_groundbar_mdp = $_POST['is_terpasang_groundbar_mdp'];
		$suhu_ruangan = $_POST['suhu_ruangan'];
		$catuan_input_modem = $_POST['catuan_input_modem'];
		$lokasi_lantai_ruang_rak = $_POST['lokasi_lantai_ruang_rak'];
		$is_bertumpuk = $_POST['is_bertumpuk'];
		$v_input_modem_pn = $_POST['v_input_modem_pn'];
		$v_input_modem_ng = $_POST['v_input_modem_ng'];
		$is_suhu_casing_panas = $_POST['is_suhu_casing_panas'];
		$is_terbounding_ke_ground_kencang = $_POST['is_terbounding_ke_ground_kencang'];
		$is_splicing_konektor_kabel_ifl = $_POST['is_splicing_konektor_kabel_ifl'];
		$pemilik_perangkat_cpe = $_POST['pemilik_perangkat_cpe'];
		$jenis_perangkat_cpe = $_POST['jenis_perangkat_cpe'];
		$is_perangkat_cpe_catuan_sama_dengan_modem = $_POST['is_perangkat_cpe_catuan_sama_dengan_modem'];
		$is_perangkat_cpe_bounding_sama_dengan_modem = $_POST['is_perangkat_cpe_bounding_sama_dengan_modem'];
		$temuan_indor_area = htmlspecialchars($_POST['temuan_indor_area']);

		//mapping data step 2
		$tipe_mounting = $_POST['tipe_mounting'];
		$is_mounting_tidak_goyang_berkarat = $_POST['is_mounting_tidak_goyang_berkarat'];
		$is_mounting_standard_bounding_ground = $_POST['is_mounting_standard_bounding_ground'];
		$is_ballast_terpasang = $_POST['is_ballast_terpasang'];
		$is_tegak_lurus = $_POST['is_tegak_lurus'];
		$polaris = $_POST['polaris'];
		$azimuth = $_POST['azimuth'];
		$elevasi = $_POST['elevasi'];
		$is_antena_bounding_ground = $_POST['is_antena_bounding_ground'];
		$is_reflector_tidak_lobang_kotor_kencang = $_POST['is_reflector_tidak_lobang_kotor_kencang'];
		$is_feed_support_tidak_berkarat_kencang = $_POST['is_feed_support_tidak_berkarat_kencang'];
		$is_feed_support_tidak_bocor_berembun = $_POST['is_feed_support_tidak_bocor_berembun'];
		$tipe_kabel_ifl = $_POST['tipe_kabel_ifl'];
		$panjang_kabel_ifl = $_POST['panjang_kabel_ifl'];
		$tahanan_short_kabel_ifl = $_POST['tahanan_short_kabel_ifl'];
		$is_splicing_konektor_kabel_ifl = $_POST['is_splicing_konektor_kabel_ifl'];
		$is_system_rf_bounding_ground = $_POST['is_system_rf_bounding_ground'];
		$temuan_outdor_area = htmlspecialchars($_POST['temuan_outdor_area']);

		//mapping data step 3
		if (isset($_FILES['file_photo'])) {
			if ($_FILES['file_photo']['error'] == 0) {
				$extension = pathinfo($_FILES['file_photo']['name'], PATHINFO_EXTENSION);
			} else {
				$extension = $_POST['extension'];
			}
		}
		
		$file_photo_final = "";
        if (!empty($extension)) {
            $file_photo_final = $SPK_SID.".".$extension;
	        if (isset($_FILES['file_photo'])) {
	            if ($_FILES['file_photo']['error'] == 0) {
	                move_uploaded_file($_FILES['file_photo']['tmp_name'], '../../upload/photo/'.$file_photo_final);
	            }
	        }
        }

		$catatan = htmlspecialchars($_POST['catatan']);
		
		//mapping data step 4
		$existing_nama_barang = $_POST['existing_nama_barang'];
		$existing_no_reg = $_POST['existing_no_reg'];
		$existing_serial_number = $_POST['existing_serial_number'];
		$temuan_tidak_terpakai_nama_barang = $_POST['temuan_tidak_terpakai_nama_barang'];
		$temuan_tidak_terpakai_no_reg = $_POST['temuan_tidak_terpakai_no_reg'];
		$temuan_tidak_terpakai_serial_number = $_POST['temuan_tidak_terpakai_serial_number'];
		$cabut_nama_barang = $_POST['cabut_nama_barang'];
		$cabut_no_reg = $_POST['cabut_no_reg'];
		$cabut_serial_number = $_POST['cabut_serial_number'];
		$pengganti_nama_barang = $_POST['pengganti_nama_barang'];
		$pengganti_no_reg = $_POST['pengganti_no_reg'];
		$pengganti_serial_number = $_POST['pengganti_serial_number'];

		///////////////////////////////////////////////
		$step = $_POST['step'];
		if ($step == 2) {
			$caption = "2. Outdoor Area Checklist";
		} else if ($step == 3) {
			$caption = "3. Informasi Hasil Pekerjaan";
		} else if ($step == 4) {
			$caption = "4. Data Perangkat Terpasang";
		}
		include("crud_impl_mobile.php");
	}
?>
<?php 
	if ($isProses == 0) {
?>
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-12">
    	<small>
        	<?php 
        		echo "No Jaringan: ".$query['no_jaringan']." | ".$query['nama_pelanggan']." | ".$query['alamat']." (".$query['no_telepon'].")";
        	?>
    	</small>
        <h2>Maintenance Remote VSAT | Step <?php echo $caption;?></h2>
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
						                        <input type="text" placeholder="Merk UPS" value="<?php echo $merk_ups; ?>" name="merk_ups" class="form-control">
						                    </div>
			                        		<div class="form-group">
						                        <label>Kapasitas UPS</label>
				                        		<input type="text" placeholder="Kapasitas UPS" value="<?php echo $kapasitas_ups; ?>" name="kapasitas_ups" class="form-control">
						                    </div>
						                    <div class="form-group">
				                            	<label>V-Output</label>
				                    			<div class="row">
				                    				<div class="col-xs-12">
							                    		<div class="col-xs-6" style="padding: 2px;">
				                    						<select class="form-control" name="v_output_pn_pg_ng" >
							                                    <option value="PLN/Gedung" <?php if ($v_output_pn_pg_ng == "PLN/Gedung") { echo 'selected';} ?>>PLN/Gedung</option>
							                                    <option value="UPS" <?php if ($v_output_pn_pg_ng == "UPS") { echo 'selected';} ?>>UPS</option>
							                                    <option value="IT" <?php if ($v_output_pn_pg_ng == "IT") { echo 'selected';} ?>>IT</option>
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


			                        	</div>
			                        	<div id="tab-2" class="tab-pane">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Menggunakan UPS</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_menggunakan_ups == 1) {echo "active"; } ?>"> <input <?php if ($is_menggunakan_ups == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_menggunakan_ups"> Ya </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_menggunakan_ups == 0) {echo "active"; } ?>"> <input <?php if ($is_menggunakan_ups == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_menggunakan_ups"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Jenis UPS</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($jenis_ups == "Sinus") {echo "active"; } ?>"> <input <?php if ($jenis_ups == "Sinus") {echo "checked='checked'"; } ?>  type="radio" value="Sinus" name="jenis_ups"> Sinus </label>
						                                        <label class="btn btn-sm btn-white <?php if ($jenis_ups == "Continu") {echo "active"; } ?>"> <input <?php if ($jenis_ups == "Continu") {echo "checked='checked'"; } ?>  type="radio" value="Continu" name="jenis_ups"> Continu </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Ruang Bebas Debu</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_bebas_debu == 1) {echo "active"; } ?>"> <input <?php if ($is_bebas_debu == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_bebas_debu"> Ya </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_bebas_debu == 0) {echo "active"; } ?>"> <input <?php if ($is_bebas_debu == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_bebas_debu"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Terpasang Ground Bar dan Terhubung ke MDP pentanahan</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_terpasang_groundbar_mdp == 1) {echo "active"; } ?>"> <input <?php if ($is_terpasang_groundbar_mdp == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_terpasang_groundbar_mdp"> Ya </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_terpasang_groundbar_mdp == 0) {echo "active"; } ?>"> <input <?php if ($is_terpasang_groundbar_mdp == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_terpasang_groundbar_mdp"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Suhu Ruangan ( < 26 Derajat )</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div class="input-group"><input type="text" class="form-control" name="suhu_ruangan" value="<?php echo $suhu_ruangan;?>"> <span class="input-group-addon">Celcuis</span></div>
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
						                        <select class="form-control m-b" name="catuan_input_modem">
				                                    <option value="Tidak Ada" <?php if ($catuan_input_modem == "Tidak Ada") { echo 'selected';} ?>>Tidak Ada</option>
				                                    <option value="IT" <?php if ($catuan_input_modem == "IT") { echo 'selected';} ?>>IT</option>
				                                    <option value="UPS" <?php if ($catuan_input_modem == "UPS") { echo 'selected';} ?>>UPS</option>
				                                    <option value="Stabilizer" <?php if ($catuan_input_modem == "Stabilizer") { echo 'selected';} ?>>Stabilizer</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Lokasi (Lantai, Ruang, Rack)</label>
						                        <input type="text" name="lokasi_lantai_ruang_rak" value="<?php echo "$lokasi_lantai_ruang_rak";?>" class="form-control">
						                    </div>
						                     <div class="form-group">
				                    			<div class="row">
				                    				<div class="col-xs-12">
							                    		<div class="col-xs-6" style="padding: 2px; vertical-align: middle;">
				                            				<label style="">Bertumpuk</label>
							                    		</div>
							                    		<div class="col-xs-6" style="padding: 2px; text-align: right;">
							                    			<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_bertumpuk == 1) {echo "active"; } ?>"> <input <?php if ($is_bertumpuk == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_bertumpuk"> Ya </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_bertumpuk == 0) {echo "active"; } ?>"> <input <?php if ($is_bertumpuk == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_bertumpuk"> Tidak </label>
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
						                                	<div class="input-group"><input type="text" placeholder="Standard (210-230 VAC)" name="v_input_modem_pn" value="<?php echo "$v_input_modem_pn";?>" class="form-control"> <span class="input-group-addon">VAC</span></div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">V Input Modem (Netral - Ground)</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div class="input-group"><input type="text" placeholder="Standard (< 1 VAC)" name="v_input_modem_ng" value="<?php echo "$v_input_modem_ng";?>" class="form-control"> <span class="input-group-addon">VAC</span></div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Suhu Casing Modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_suhu_casing_panas == 1) {echo "active"; } ?>"> <input <?php if ($is_suhu_casing_panas == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_suhu_casing_panas"> Panas </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_suhu_casing_panas == 0) {echo "active"; } ?>"> <input <?php if ($is_suhu_casing_panas == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_suhu_casing_panas"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Catuan Input Terbounding ke Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_terbounding_ke_ground_kencang == 1) {echo "active"; } ?>"> <input <?php if ($is_terbounding_ke_ground_kencang == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_terbounding_ke_ground_kencang"> Kencang </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_terbounding_ke_ground_kencang == 0) {echo "active"; } ?>"> <input <?php if ($is_terbounding_ke_ground_kencang == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_terbounding_ke_ground_kencang"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Splicing Konektor kabel IFL di modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                    <div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_splicing_konektor_kabel_ifl == 1) {echo "active"; } ?>"> <input <?php if ($is_splicing_konektor_kabel_ifl == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_splicing_konektor_kabel_ifl"> Baik </label>
																<label class="btn btn-sm btn-white <?php if ($is_splicing_konektor_kabel_ifl == 0) {echo "active"; } ?>"> <input <?php if ($is_splicing_konektor_kabel_ifl == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_splicing_konektor_kabel_ifl"> Tidak </label>
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
						                        <select class="form-control m-b" name="pemilik_perangkat_cpe">
				                                    <option value="Pelanggan" <?php if ($pemilik_perangkat_cpe == "Pelanggan") { echo 'selected';} ?>>Pelanggan</option>
				                                    <option value="Lintas Arta" <?php if ($pemilik_perangkat_cpe == "Lintas Arta") { echo 'selected';} ?>>Lintas Arta</option>
				                                </select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Jenis Perangkat CPE</label>
						                        <input type="text" name="jenis_perangkat_cpe" value="<?php echo $jenis_perangkat_cpe;?>" class="form-control">
						                    </div>
			                        	</div>
			                        	<div id="tab-6" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Perangkat CPE mendapat catuan sama dengan modem</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_perangkat_cpe_catuan_sama_dengan_modem == 1) {echo "active"; } ?>"> <input <?php if ($is_perangkat_cpe_catuan_sama_dengan_modem == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_perangkat_cpe_catuan_sama_dengan_modem"> Ya </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_perangkat_cpe_catuan_sama_dengan_modem == 0) {echo "active"; } ?>"> <input <?php if ($is_perangkat_cpe_catuan_sama_dengan_modem == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_perangkat_cpe_catuan_sama_dengan_modem"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Perangkat CPE terbounding dalam 1 ground yang sama dengan Modem</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_perangkat_cpe_bounding_sama_dengan_modem == 1) {echo "active"; } ?>"> <input <?php if ($is_perangkat_cpe_bounding_sama_dengan_modem == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_perangkat_cpe_bounding_sama_dengan_modem"> Ya, Kencang </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_perangkat_cpe_bounding_sama_dengan_modem == 0) {echo "active"; } ?>"> <input <?php if ($is_perangkat_cpe_bounding_sama_dengan_modem == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_perangkat_cpe_bounding_sama_dengan_modem"> Tidak </label>
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
			                        	<textarea class="summernote" name="temuan_indor_area" id="temuan_indor_area"><?php echo $temuan_indor_area; ?></textarea>
			                        	<input type="hidden" value="<?php echo $temuan_indor_area; ?>" id="temuan_indor_area_hidden" />
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
						                    	<select class="form-control" name="tipe_mounting" >
						                    	    <option value="Standart/NPM" <?php if ($tipe_mounting == "Standart/NPM") { echo 'selected';} ?>>Standart/NPM</option>
						                    	    <option value="Special" <?php if ($tipe_mounting == "Special") { echo 'selected';} ?>>Special</option>
						                    	    <option value="Wall Mount" <?php if ($tipe_mounting == "Wall Mount") { echo 'selected';} ?>>Wall Mount</option>
						                    	    <option value="Lainnya" <?php if ($tipe_mounting == "Lainnya") { echo 'selected';} ?>>Lainnya</option>
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
						                                		<label class="btn btn-sm btn-white <?php if ($is_mounting_tidak_goyang_berkarat == 1) {echo "active"; } ?>"> <input <?php if ($is_mounting_tidak_goyang_berkarat == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_mounting_tidak_goyang_berkarat"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_mounting_tidak_goyang_berkarat == 0) {echo "active"; } ?>"> <input <?php if ($is_mounting_tidak_goyang_berkarat == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_mounting_tidak_goyang_berkarat"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Mounting Standard/NPM terbounding dengan Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                        <label class="btn btn-sm btn-white <?php if ($is_mounting_standard_bounding_ground == 1) {echo "active"; } ?>"> <input <?php if ($is_mounting_standard_bounding_ground == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_mounting_standard_bounding_ground"> Ya, Kencang </label>
						                                        <label class="btn btn-sm btn-white <?php if ($is_mounting_standard_bounding_ground == 0) {echo "active"; } ?>"> <input <?php if ($is_mounting_standard_bounding_ground == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_mounting_standard_bounding_ground"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Ballast Terpasang pada mounting Standard/NPM</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_ballast_terpasang == 1) {echo "active"; } ?>"> <input <?php if ($is_ballast_terpasang == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_ballast_terpasang"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_ballast_terpasang == 0) {echo "active"; } ?>"> <input <?php if ($is_ballast_terpasang == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_ballast_terpasang"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Center of Grafity Canester = 0&deg; (Tegak Lurus)</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_tegak_lurus == 1) {echo "active"; } ?>"> <input <?php if ($is_tegak_lurus == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_tegak_lurus"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_tegak_lurus == 0) {echo "active"; } ?>"> <input <?php if ($is_tegak_lurus == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_tegak_lurus"> Tidak </label>
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
						                    	<select class="form-control" name="polaris" >
						                    	    <option value="H" <?php if ($polaris == "H") { echo 'selected';} ?>>H</option>
						                    	    <option value="V" <?php if ($polaris == "V") { echo 'selected';} ?>>V</option>
						                    	</select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Azimuth</label>
						                        <div class="input-group"><input type="text" name="azimuth" value="<?php echo "$azimuth";?>" class="form-control"> <span class="input-group-addon">&deg;</span></div>
						                    </div>
						                    <div class="form-group">
						                    	<label>Elevasi</label>
						                        <div class="input-group"><input type="text" name="elevasi" value="<?php echo "$elevasi";?>" class="form-control"> <span class="input-group-addon">&deg;</span></div>
						                    </div>
			                        	</div>
			                        	<div id="tab-10" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Antena Terbounding dengan Ground</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_antena_bounding_ground == 1) {echo "active"; } ?>"> <input <?php if ($is_antena_bounding_ground == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_antena_bounding_ground"> Ya, Kencang </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_antena_bounding_ground == 0) {echo "active"; } ?>"> <input <?php if ($is_antena_bounding_ground == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_antena_bounding_ground"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">Reflector tidak Lobang, Kotor dan Kencang</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_reflector_tidak_lobang_kotor_kencang == 1) {echo "active"; } ?>"> <input <?php if ($is_reflector_tidak_lobang_kotor_kencang == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_reflector_tidak_lobang_kotor_kencang"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_reflector_tidak_lobang_kotor_kencang == 0) {echo "active"; } ?>"> <input <?php if ($is_reflector_tidak_lobang_kotor_kencang == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_reflector_tidak_lobang_kotor_kencang"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Feed Support tidak Berkarat dan Kencang</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_feed_support_tidak_berkarat_kencang == 1) {echo "active"; } ?>"> <input <?php if ($is_feed_support_tidak_berkarat_kencang == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_feed_support_tidak_berkarat_kencang"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_feed_support_tidak_berkarat_kencang == 0) {echo "active"; } ?>"> <input <?php if ($is_feed_support_tidak_berkarat_kencang == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_feed_support_tidak_berkarat_kencang"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
						                            <tr>
						                                <td style="vertical-align: middle; ">Feed Horn Tidak Bocor dan Tidak Berembun</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_feed_support_tidak_bocor_berembun == 1) {echo "active"; } ?>"> <input <?php if ($is_feed_support_tidak_bocor_berembun == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_feed_support_tidak_bocor_berembun"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_feed_support_tidak_bocor_berembun == 0) {echo "active"; } ?>"> <input <?php if ($is_feed_support_tidak_bocor_berembun == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_feed_support_tidak_bocor_berembun"> Tidak </label>
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
						                    	<select class="form-control" name="tipe_kabel_ifl" >
						                    	    <option value="LMR 240" <?php if ($tipe_kabel_ifl == "LMR 240") { echo 'selected';} ?>>LMR 240</option>
						                    	    <option value="Belden 9913" <?php if ($tipe_kabel_ifl == "Belden 9913") { echo 'selected';} ?>>Belden 9913</option>
						                    	    <option value="Belden 9292" <?php if ($tipe_kabel_ifl == "Belden 9292") { echo 'selected';} ?>>Belden 9292</option>
						                    	    <option value="Conscope" <?php if ($tipe_kabel_ifl == "Conscope") { echo 'selected';} ?>>Conscope</option>
						                    	</select>
						                    </div>
						                    <div class="form-group">
						                    	<label>Panjang Kabel IFL</label>
						                        <div class="input-group"><input type="text" name="panjang_kabel_ifl" value="<?php echo "$panjang_kabel_ifl";?>" class="form-control"> <span class="input-group-addon">Meter</span></div>
						                    </div>
						                    <div class="form-group">
						                    	<label>Tahanan Short Kabel IFL</label>
						                        <div class="input-group"><input type="text" name="tahanan_short_kabel_ifl" value="<?php echo "$tahanan_short_kabel_ifl";?>" class="form-control"> <span class="input-group-addon">Ω</span></div>
						                    </div>
			                        	</div>
			                        	<div id="tab-12" class="tab-pane ">
			                        		<table class="table">
					                            <thead>
						                            <tr>
						                                <td width="50%" style="vertical-align: middle; ">Splicing Konektor kabel IFL di Antena</td>
						                                <td width="50%" style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_splicing_konektor_kabel_ifl == 1) {echo "active"; } ?>"> <input <?php if ($is_splicing_konektor_kabel_ifl == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_splicing_konektor_kabel_ifl"> Rapat, Baik </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_splicing_konektor_kabel_ifl == 0) {echo "active"; } ?>"> <input <?php if ($is_splicing_konektor_kabel_ifl == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_splicing_konektor_kabel_ifl"> Tidak </label>
						                                    </div>
							                            </td>
						                            </tr>
					                            </thead>
					                            <tbody>
						                            <tr>
						                                <td style="vertical-align: middle; ">System RF terbounding dengan Ground</td>
						                                <td style="vertical-align: middle; text-align: right;">
						                                	<div data-toggle="buttons" class="btn-group">
						                                		<label class="btn btn-sm btn-white <?php if ($is_system_rf_bounding_ground == 1) {echo "active"; } ?>"> <input <?php if ($is_system_rf_bounding_ground == 1) {echo "checked='checked'"; } ?> type="radio" value=1 name="is_system_rf_bounding_ground"> Ya </label>
						                                		<label class="btn btn-sm btn-white <?php if ($is_system_rf_bounding_ground == 0) {echo "active"; } ?>"> <input <?php if ($is_system_rf_bounding_ground == 0) {echo "checked='checked'"; } ?> type="radio" value=0 name="is_system_rf_bounding_ground"> Tidak </label>
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
			                        	<textarea class="summernote" name="temuan_outdor_area" id="temuan_outdor_area"><?php echo $temuan_outdor_area; ?></textarea>
			                        	<input type="hidden" value="<?php echo $temuan_outdor_area; ?>" id="temuan_outdor_area_hidden" />
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
		                        		<span class="btn btn-default btn-file btn-block" style="float: right;">Browse <input type="file" id="file_photo" name="file_photo" class="form-control"></span>
				                    	<input type="hidden" name="extension" value="<?php echo $extension; ?>" />
		                        	</div>
		                        	<div class="form-group">
				                    	<label>Catatan</label>
				                    	<textarea class="summernote" name="catatan" id="catatan"><?php $catatan; ?></textarea>
				                    	<input type="hidden" value="<?php echo $catatan; ?>" id="catatan_hidden" />
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
									<button type="submit" name="step" value="btn_save_vsat" class="btn btn-primary btn-lg btn-block">Save</button><br />
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php } ?>