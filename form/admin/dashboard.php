<?php 
    $value_str_search = "";
    $strSearch = "";
    if (isset($_POST['src_search'])) {
        $value_str_search = $_POST['src_search'];
        $strSearch = "WHERE spk.no_spk like '%$value_str_search%' OR pel.nama_pelanggan like '%$value_str_search%' OR spk.akses like '%$value_str_search%' OR tim.nama_team like '%$value_str_search%'";
    }
?>
<style type="text/css">
ul {
  list-style: none;
  /*padding: 0px;*/
}
ul li {
  /*display: block;*/
  display: inline;
  padding-left: 30px;
  position: relative;
  margin-bottom: 4px;
  border-radius: 5px;
  padding: 2px 8px 2px 28px;
  font-size: 14px;
  cursor: default;
  -webkit-transition: background-color 200ms ease-in-out;
  -moz-transition: background-color 200ms ease-in-out;
  -o-transition: background-color 200ms ease-in-out;
  transition: background-color 200ms ease-in-out;
}
li span {
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 20px;
  height: 100%;
  border-radius: 5px;
}
#chart-area > *{
  float:left
    }   
</style>
<div class="row  border-bottom white-bg dashboard-header" style="padding: 5px;">
    <div class="col-sm-12">
    	<div class="col-sm-10">
    		<p>
                <h1 style="">Selamat Datang Kembali <?php echo $_SESSION['nama'];?> !</h1>
		        <h4>Dashboard Panel</h4>
		        <small><a href="../../system/logout.php"><i class="fa fa-sign-out"></i> Logout</a></small>|
                <small><a href="?page=view"><i class="fa fa-reply"></i> View Data</a></small>
	        </p>
    	</div>
    	<div class="col-sm-2">
    		<img src="../../images/logo.png" class="img-responsive">
    	</div>
    </div>
</div>
<?php if ((isset($_GET['form'])) && ($_GET['form'] == "view_detail")) { ?>
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
<div class="row" style="padding: 5px;">
	<div  class="wrapper wrapper-content" style="padding: 5px 20px 5px 20px" > 
		<div class="row">
            <div class="col-sm-3">
                <?php 
                    $str0 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'VSAT' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y') and spk.status = 'NEW'";
                    $str0 = mysqli_query($conn, $str0) or die(mysqli_error());
                    $str0 = mysqli_fetch_array($str0);

                    $str1 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'VSAT' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y')";
                    $str1 = mysqli_query($conn, $str1) or die(mysqli_error());
                    $str1 = mysqli_fetch_array($str1);
                ?>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">VSAT</span>
                        <h5>Laporan Inprogress</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo number_format($str0['jumlah_laporan']);?></h1>
                        <small>Dari <strong><?php echo number_format($str1['jumlah_laporan']);?></strong> Laporan Hari ini</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php 
                    $str0 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'WIRELESS' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y') and spk.status = 'NEW'";
                    $str0 = mysqli_query($conn, $str0) or die(mysqli_error());
                    $str0 = mysqli_fetch_array($str0);

                    $str1 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'WIRELESS' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y')";
                    $str1 = mysqli_query($conn, $str1) or die(mysqli_error());
                    $str1 = mysqli_fetch_array($str1);
                ?>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Wireless</span>
                        <h5>Laporan Inprogress</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo number_format($str0['jumlah_laporan']);?></h1>
                        <small>Dari <strong><?php echo number_format($str1['jumlah_laporan']);?></strong> Laporan Hari ini</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php 
                    $str0 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'WIRELINE' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y') and spk.status = 'NEW'";
                    $str0 = mysqli_query($conn, $str0) or die(mysqli_error());
                    $str0 = mysqli_fetch_array($str0);

                    $str1 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE spk.akses = 'WIRELINE' AND DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y')";
                    $str1 = mysqli_query($conn, $str1) or die(mysqli_error());
                    $str1 = mysqli_fetch_array($str1);
                ?>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label  label-success pull-right">Wireline</span>
                        <h5>Laporan Inprogress</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo number_format($str0['jumlah_laporan']);?></h1>
                        <small>Dari <strong><?php echo number_format($str1['jumlah_laporan']);?></strong> Laporan Hari ini</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php 
                    $str0 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y') and spk.status = 'INPROGRESS'";
                    $str0 = mysqli_query($conn, $str0) or die(mysqli_error());
                    $str0 = mysqli_fetch_array($str0);

                    $str1 = "SELECT count(*) as jumlah_laporan FROM t_surat_perintah_kerja spk WHERE DATE_FORMAT(spk.tanggal, '%d/%m/%Y') = DATE_FORMAT(now(), '%d/%m/%Y') and spk.status = 'NEW'";
                    $str1 = mysqli_query($conn, $str1) or die(mysqli_error());
                    $str1 = mysqli_fetch_array($str1);
                ?>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
	                    <span class="label label-primary pull-right">Total</span>
                        <h5>Laporan Selesai</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo number_format($str0['jumlah_laporan']);?></h1>
                        <small>Total Laporan sedang Inprogress <strong><?php echo number_format($str1['jumlah_laporan']);?></strong> Hari ini</small>
                    </div>
                </div>
            </div>
    	</div>
		<div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Orders</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        <div class="col-sm-9">
                            <div id="chart-area">
                                <canvas id="barChart" height="85"></canvas>
                                <div id="legend"></div>
                            </div>
                            <!-- <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                            </div> -->
                        </div>
                        <div class="col-sm-3">
                            <ul class="stat-list">
                                <li>
                                    <h2 class="no-margins">2,346</h2>
                                    <small>Total Laporan</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">4,422</h2>
                                    <small>Total Laporan Inprogress</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">9,180</h2>
                                    <small>Total Laporan Selesai</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="row">
	        <div class="col-sm-12">
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Progress Maintenance Pelanggan</h5>
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
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Pelapor</th>
                                        <th>Masalah</th>
                                        <th>Pelanggan</th>
                                        <th>Alamat Pelanggan</th>
                                        <th>Team Leader</th>
                                        <th>Team Handling</th>
                                    </tr>
                                    </thead> -->
                                    <tbody>
                                    <?php 
                                        $str = "SELECT  DATE_FORMAT(spk.tanggal, '%d/%m/%Y %h:%i:%s') as tanggal, spk.sid as sid_spk,
                                                        no_spk, akses, masalah, pel.nama_pelanggan as nama_pelanggan, DATE_FORMAT(spk.access_date, '%d/%m %h:%i') as access_date,
                                                        pel.alamat as alamat, tim.nama_team as nama_team, spk.status as status,
                                                        spk.cp_nama as cp_nama, tim.leader as leader, tim.no_handphone as no_hp
                                                FROM t_surat_perintah_kerja spk 
                                                LEFT JOIN m_pelanggan pel ON spk.id_pelanggan = pel.sid 
                                                LEFT JOIN m_team_header tim ON spk.id_team = tim.sid 
                                                $strSearch 
                                                ORDER BY spk.status desc
                                                ";

                                        // echo $str;
                                        $result = mysqli_query($conn, $str) or die(mysqli_error());
                                        while($arr=mysqli_fetch_array($result)) {
                                            $status = $arr['status'];
                                            if ($status == "NEW") {
                                                $status = "<small>In Progress...</small>";
                                            } else if($status == "CANCELED") {
                                                $status = '<span class="label label-danger">Canceled</span><br/> <small><i class="fa fa-clock-o"></i>'.$arr["access_date"].'</small>';
                                            } else {
                                                $status = '<span class="label label-info">Completed</span> <br/> <small><i class="fa fa-clock-o"></i>'.$arr["access_date"].'</small>';
                                            }
                                    ?>
                                    <tr>
                                        <td class="project-status" style="width: 90px;">
                                            <?php echo $status ?>
                                        </td>
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
                                        <td class="project-actions">
                                            <?php if ($arr['status'] == "INPROGRESS") { ?>   
                                            <a href="?form=view_detail&akses=<?php echo $arr['akses'];?>&sid=<?php echo $arr['sid_spk'];?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <?php } else { ?>
                                            <a class="btn btn-warning btn-sm"><i class="fa fa-yelp"></i> <?php echo $arr['status'];?> </a>
                                            <?php } ?>
                                        </td>
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
<script type="text/javascript">
$(function () {
    var random = function() {
      return Math.round(Math.random() * 100)
    };
    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "VSAT",
                fillColor: "rgba(237,85,101,0.5)",
                strokeColor: "rgba(237,85,101,0.8)",
                highlightFill: "rgba(237,85,101,0.75)",
                highlightStroke: "rgba(237,85,101,1)",
                data: [random(), random(), random(), random(), random(), random(), random()]
            },
            {
                label: "WIRELESS",
                fillColor: "rgba(35,198,200,0.5)",
                strokeColor: "rgba(35,198,200,0.8)",
                highlightFill: "rgba(35,198,200,0.75)",
                highlightStroke: "rgba(35,198,200,1)",
                data: [random(), random(), random(), random(), random(), random(), random()]
            },
            {
                label: "WIRELINE",
                fillColor: "rgba(28, 132, 198, 0.5)",
                strokeColor: "rgba(28, 132, 198, 0.8)",
                highlightFill: "rgba(28, 132, 198, 0.75)",
                highlightStroke: "rgba(28, 132, 198, 1)",
                data: [random(), random(), random(), random(), random(), random(), random()]
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

    var legendHolder = document.createElement('div');
    legendHolder.innerHTML = myNewChart.generateLegend();
    document.getElementById('legend').appendChild(legendHolder.firstChild);
});
</script>
<?php } ?>