<?php 
    include("../config/configuration.php");
	// session_start();

	if (isset($_GET['type'])) {
		$type = $_GET['type'];
		if ($type == "pelanggan") {
			$term = $_GET['term'];
			$a = array();
			$x = mysqli_query($conn, "SELECT concat(no_jaringan, ' ( ', nama_pelanggan, ' )') as label, no_jaringan as value, sid as sid  FROM m_pelanggan where no_jaringan like '%$term%' or nama_pelanggan like '%$term%'  order by no_jaringan asc") or die(mysqli_error());
            while ($arr=mysqli_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		} else if ($type == "team") {
			$term = $_GET['term'];
			$a = array();
			$x = mysqli_query($conn, "SELECT nama_team as label, nama_team as value, sid as sid   FROM m_team_header where nama_team like '%$term%'  order by nama_team asc") or die(mysqli_error());
            while ($arr=mysqli_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		}
	}
?>