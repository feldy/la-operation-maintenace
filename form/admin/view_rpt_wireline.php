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

    $qwireline1 = "SELECT * FROM rpt_wireline where spk_sid = '$id_spk' LIMIT 1";
    $awireline1 = mysqli_query($conn, $qwireline1) or die(mysqli_error($conn));
    $wireline1 = mysqli_fetch_array($awireline1);
    $src_image = "../../images/picture_not_available.png";
    if (!empty($wireline1['file_photo'])) {
        $src_image = "../../upload/photo/".$wireline1['file_photo'];
    } 

    function getValueByIndex($arr, $items) {
        return explode(",", $items)[$arr];
    }
    $nama_brg1 = explode(",", $wireline1['existing_nama_barang']);
    $nama_brg2 = explode(",", $wireline1['temuan_tidak_terpakai_nama_barang']);
    $nama_brg3 = explode(",", $wireline1['cabut_nama_barang']);
    $nama_brg4 = explode(",", $wireline1['pengganti_nama_barang']);
    // echo ">>>>".count($nama_brg1);
    // echo ">>".$qwireline1;
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
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Global Checklist</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Data Perangkat</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Sarana</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Posisi Modem di Lantai</td>
                                                                <td colspan="3">: <?php echo $wireline1['lantai_posisi_modem'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ruang</td>
                                                                <td colspan="3">: <?php echo $wireline1['ruang'];?></td>
                                                            </tr>
                                                            <?php
                                                                $vOutput = $wireline1['output_tegangan_ke_modem'];
                                                                $vOutputs = explode("|", $vOutput);
                                                            ?>
                                                            <tr>
                                                                <td><u>Output Tegangan yang Mencatu ke Modem</u></td>
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
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Temuan</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="4"><h3><?php echo htmlspecialchars_decode($wireline1['catatan_soltem_ljm']);?></h3></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Electrical</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Grounding Bar Terkoneksi Ke-</td>
                                                                <td colspan="3">: <?php echo $wireline1['grounding_bar_koneksi'];?></td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">Environment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>AC Pendingin Ruangan</td>
                                                                <td colspan="3">: <?php echo parsingBoolean($wireline1['is_ada_ac']);?> Ada</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Suhu Ruangan Perangkat</td>
                                                                <td colspan="3">: <?php echo $wireline1['suhu_ruangan'];?></td>
                                                            </tr>
                                                            </tbody>
                                                            <thead>
                                                            <tr>
                                                                <th colspan="4">Gambar Konfigurasi Jaringan</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <img alt="image" class="img-responsive" id="img_tmp" src="<?php echo $src_image; ?>">
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-2">
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
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireline1['existing_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['existing_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['existing_serial_number']);?></td>
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
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireline1['temuan_tidak_terpakai_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['temuan_tidak_terpakai_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['temuan_tidak_terpakai_serial_number']);?></td>
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
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireline1['cabut_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['cabut_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['cabut_serial_number']);?></td>
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
                                                                <td colspan="2"><?php echo getValueByIndex($i, $wireline1['pengganti_nama_barang']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['pengganti_no_reg']);?></td>
                                                                <td ><?php echo getValueByIndex($i, $wireline1['pengganti_serial_number']);?></td>
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