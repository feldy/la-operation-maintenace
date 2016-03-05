<?php 
    $id_spk = $_GET['sid'];
    $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal,
                    no_spk, akses, masalah, cp_nama,
                    tim.nama_team as nama_team, 
                    pel.nama_pelanggan as nama_pelanggan, 
                    pel.alamat as alamat, 
                    pel.no_jaringan as no_jaringan, 
                    pel.no_telepon as pel_no_tel
            FROM t_surat_perintah_kerja spk 
            LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
            LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
            WHERE spk.sid = '$id_spk'
            LIMIT 1
            ";

    // echo $str;
    $result = mysqli_query($conn, $str) or die(mysqli_error($conn));
    $arr = mysqli_fetch_array($result);

    $qwireless1 = "SELECT * FROM rpt_wireless_indoor_area_checklist where spk_sid = '$id_spk' LIMIT 1";
    $awireless1 = mysqli_query($conn, $qwireless1) or die(mysqli_error($conn));
    $wireless1 = mysqli_fetch_array($awireless1);

    $qwireless2 = "SELECT * FROM rpt_wireless_outdoor_area_checklist where spk_sid = '$id_spk' LIMIT 1";
    $awireless2 = mysqli_query($conn, $qwireless2) or die(mysqli_error($conn));
    $wireless2 = mysqli_fetch_array($awireless2);

    $qwireless3 = "SELECT * FROM rpt_wireless_informasi where spk_sid = '$id_spk' LIMIT 1";
    $awireless3 = mysqli_query($conn, $qwireless3) or die(mysqli_error($conn));
    $wireless3 = mysqli_fetch_array($awireless3);
    $src_image = "../../images/picture_not_available.png";
    if (!empty($wireless3['file_photo'])) {
        $src_image = "../../upload/photo/".$wireless3['file_photo'];
    } 

    $qwireless4 = "SELECT * FROM rpt_wireless_data_perangkat_terpasang where spk_sid = '$id_spk' LIMIT 1";
    $awireless4 = mysqli_query($conn, $qwireless4) or die(mysqli_error($conn));
    $wireless4 = mysqli_fetch_array($awireless4);


    function getValueByIndex($arr, $items) {
        return explode(",", $items)[$arr];
    }
    $nama_brg1 = explode(",", $wireless4['existing_nama_barang']);
    $nama_brg2 = explode(",", $wireless4['temuan_tidak_terpakai_nama_barang']);
    $nama_brg3 = explode(",", $wireless4['cabut_nama_barang']);
    $nama_brg4 = explode(",", $wireless4['pengganti_nama_barang']);
    // echo ">>>>".count($nama_brg1);
    // echo ">>".$qwireless1;
?>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Nomor SPK: <?php echo $arr['no_spk'];?></h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="m-b-md">
                                <h2><?php echo $arr['nama_pelanggan'];?></h2>
                            </div>
                            <dl class="dl-horizontal">
                                <dt>Akses:</dt> <dd><span class="label label-primary"><?php echo $arr['akses'];?></span></dd>
                                <dt>Nomor Jaringan:</dt> <dd><?php echo $arr['no_jaringan'];?></dd>
                            </dl>
                        </div>
                        <div class="col-sm-6">
                            <dl class="dl-horizontal">
                                <dt>Contact Person:</dt> <dd>  <?php echo $arr['cp_nama'];?></dd>
                                <dt>Alamat:</dt> <dd><a class="text-navy"> <?php echo $arr['alamat'];?></a> </dd>
                                <dt>Nomor Telepon:</dt> <dd><?php echo $arr['pel_no_tel'];?></dd>
                                <dt>Tanggal:</dt> <dd><?php echo $arr['tanggal'];?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-lg-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Indoor Area Checklist</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Outdoor Area Checklist</a></li>
                                            <li class=""><a href="#tab-3" data-toggle="tab">Informasi Hasil Pekerjaan</a></li>
                                            <li class=""><a href="#tab-4" data-toggle="tab">Data Perangkat Terpasang</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Sarana Penunjang</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Merk UPS</td>
                                                                <td colspan="3">: <?php echo $wireless1['merk_ups'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kapasitas UPS</td>
                                                                <td colspan="3">: <?php echo number_format($wireless1['kapasitas_ups']);?></td>
                                                            </tr>
                                                            <?php
                                                                $vOutput = $wireless1['v_output_pn_pg_ng'];
                                                                $vOutputs = explode("|", $vOutput);
                                                            ?>
                                                            <tr>
                                                                <td><u>V-Output</u></td>
                                                                <td><u>P-N</u></td>
                                                                <td><u>P-G</u></td>
                                                                <td><u>N-G</u></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $vOutputs[0];?></td>
                                                                <td><?php echo $vOutputs[1];?></td>
                                                                <td><?php echo $vOutputs[2];?></td>
                                                                <td><?php echo $vOutputs[3];?></td>
                                                            </tr>
                                                             <tr>
                                                                <td colspan="4">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Perangkat Modem</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Catuan Input Modem</td>
                                                                <td colspan="3">: <?php echo $wireless1['catuan_input_modem'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi (Lantai, Ruang, Rack)</td>
                                                                <td colspan="3">: <?php echo $wireless1['lokasi_lantai_ruang_rak'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bertumpuk</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_bertumpuk']);?></td>
                                                            </tr>
                                                             <tr>
                                                                <td colspan="4">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Perangkat CPE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Pemilik Perangkat CPE</td>
                                                                <td colspan="3">: <?php echo $wireless1['pemilik_perangkat_cpe'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Perangkat CPE</td>
                                                                <td colspan="3">: <?php echo $wireless1['jenis_perangkat_cpe'];?></td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Temuan Indor Area Dan Tindak Lanjut</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="4"><h3><?php echo htmlspecialchars_decode($wireless1['temuan_indor_area']);?></h3></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Quality Parameter</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Menggunakan UPS</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_menggunakan_ups']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis UPS</td>
                                                                <td colspan="3">: <?php echo $wireless1['jenis_ups'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ruang Bebas Debu</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_bebas_debu']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Terpasang Ground Bar dan parsingBoolean ke MDP pentanahan</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_terpasang_groundbar_mdp']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Suhu Ruangan ( < 26 Derajat )</td>
                                                                <td colspan="3">: <?php echo number_format($wireless1['suhu_ruangan']);?> Celcius</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Quality Parameter</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>V Input Modem (Phasa - Netral)</td>
                                                                <td colspan="3">: <?php echo number_format($wireless1['v_input_modem_pn']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>V Input Modem (Netral - Ground)</td>
                                                                <td colspan="3">: <?php echo number_format($wireless1['v_input_modem_ng']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Suhu Casing Modem</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_suhu_casing_panas']);?> Panas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Catuan Input Terbounding ke Ground</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_terbounding_ke_ground_kencang']);?> Kencang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Splicing Konektor kabel IFL di modem</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_splicing_konektor_kabel_ifl']);?></td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Quality Parameter</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Perangkat CPE mendapat catuan sama dengan modem</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_perangkat_cpe_catuan_sama_dengan_modem']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Perangkat CPE terbounding dalam 1 ground yang sama dengan Modem</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless1['is_perangkat_cpe_bounding_sama_dengan_modem']);?> Kencang</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Sarana Penunjang</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Type Mounting</td>
                                                                <td colspan="3">: <?php echo $wireless2['tipe_mounting'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tinggi Mounting</td>
                                                                <td colspan="3">: <?php echo $wireless2['tinggi_mounting'];?> Meter</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Type Penangkal Petir</td>
                                                                <td colspan="3">: <?php echo $wireless2['tipe_penangkal_petir'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" >&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Perangkat Antena</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Polarisasi</td>
                                                                <td colspan="3">: <?php echo number_format($wireless2['polaris']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Altitude</td>
                                                                <td colspan="3">: <?php echo number_format($wireless2['altitude']);?> Mdpl</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Elevasi</td>
                                                                <td colspan="3">: <?php echo number_format($wireless2['elevasi']);?>°</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">&nbsp;</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Cabling Installation</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Type Kabel IFL</td>
                                                                <td colspan="3">: <?php echo $wireless2['tipe_kabel_ifl'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Panjang Kabel IFL</td>
                                                                <td colspan="3">: <?php echo $wireless2['panjang_kabel_ifl'];?> Meter</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tahanan Short Kabel IFL</td>
                                                                <td colspan="3">: <?php echo $wireless2['tahanan_short_kabel_ifl'];?> Ω</td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Temuan Outdor Area Dan Tindak Lanjut</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="4"><h3><?php echo htmlspecialchars_decode($wireless2['temuan_outdor_area']);?></h3></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Quality Parameter</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Mounting Tidak Goyang dan Berkarat</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_mounting_tidak_goyang_berkarat']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Center of Grafity Canester = 0° (Tegak Lurus)</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_tegak_lurus']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Disekitar Mounting Terdapat Penangkal Petir</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_ada_penangkal_petir']);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sudut Mounting Terhadap Penangkal Petir < 45°</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_sudut_mounting_penangkal_petir_kurang_45']);?></td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Quality Parameter</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Antena Terbounding dengan Ground</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_antena_bounding_ground']);?> Kencang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Posisi Antena Sejajar Dengan Permukaan AIR</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_antena_sejajar_dengan_air']);?></td>
                                                            </tr>
                                                            
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Quality Parameter</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Terpasang Arrestor & Terhubung dengan Ground</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_terpasang_arrestor_ground']);?> Kencang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Splicing Konektor kabel IFL di Antena</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireless2['is_splicing_konektor_kabel_ifl']);?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-3">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4">Konfigurasi Jaringan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="4">
                                                            <img alt="image" class="img-responsive" id="img_tmp" src="<?php echo $src_image; ?>">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4">Catatan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="4">
                                                            <h3><?php echo htmlspecialchars_decode($wireless3['catatan']);?></h3>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-4">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Existing</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Barang</td>
                                                                <td >No. Reg</td>
                                                                <td >S/N</td>
                                                            </tr>
                                                            <?php for ($i=0; $i < count($nama_brg1); $i++) { ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireless4['existing_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['existing_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['existing_serial_number']);?></td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Temuan Tidak Terpakai</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Barang</td>
                                                                <td >No. Reg</td>
                                                                <td >S/N</td>
                                                            </tr>
                                                            <?php for ($i=0; $i < count($nama_brg2); $i++) { ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireless4['temuan_tidak_terpakai_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['temuan_tidak_terpakai_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['temuan_tidak_terpakai_serial_number']);?></td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Cabut</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Barang</td>
                                                                <td >No. Reg</td>
                                                                <td >S/N</td>
                                                            </tr>
                                                            <?php for ($i=0; $i < count($nama_brg3); $i++) { ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireless4['cabut_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['cabut_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['cabut_serial_number']);?></td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Pengganti/Pasang Baru</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Barang</td>
                                                                <td >No. Reg</td>
                                                                <td >S/N</td>
                                                            </tr>
                                                            <?php for ($i=0; $i < count($nama_brg4); $i++) { ?>
                                                            <tr>
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireless4['pengganti_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['pengganti_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireless4['pengganti_serial_number']);?></td>
                                                            </tr>
                                                            <?php } ?>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Custom responsive table </h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th></th>
                            <th>Project </th>
                            <th>Completed </th>
                            <th>Task</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"  checked class="i-checks" name="input[]"></td>
                            <td>Project<small>This is example of project</small></td>
                            <td><span class="pie">0.52/1.561</span></td>
                            <td>20%</td>
                            <td>Jul 14, 2013</td>
                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->