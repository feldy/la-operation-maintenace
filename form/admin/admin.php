<div class="row  border-bottom white-bg dashboard-header" style="padding: 5px;">
    <div class="col-sm-12">
        <div class="col-sm-10">
            <p>
                <h1 style="">Selamat Datang Kembali <?php echo $_SESSION['nama'];?> !</h1>
                <h4>Dashboard ADMIN</h4>
                <small><a href="../../system/logout.php"><i class="fa fa-sign-out"></i> Logout</a></small>
            </p>
        </div>
        <div class="col-sm-2">
            <img src="../../images/logo.png" class="img-responsive">
        </div>
    </div>
</div>
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
                        $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal,
                                        no_spk, akses, masalah, pel.nama_pelanggan as nama_pelanggan, pel.alamat as alamat, tim.nama_team as nama_team
                                FROM t_surat_perintah_kerja spk 
                                LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
                                LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
                                WHERE spk.status = 'INPROGRESS'
                                AND spk.lampiran_file = '' and spk.lampiran_keterangan = ''
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
                        <td class="text-primary"> <a href="#"><i class="fa fa-file-o"></i>&nbsp;+ Lampiran</a></td>
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