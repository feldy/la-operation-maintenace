<?php
	include("../../config/configuration.php");

	if (isset($_POST['btn_login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = mysql_query("SELECT * FROM m_user_team where username = '$user' and password = '$pass' ");
		$arr = mysql_fetch_array($sql);

		$id = $arr['sid'];
		$password = $arr['password'];
		$username = $arr['username'];
		$role = $arr['role'];
		$id_team_header = $arr['id_team_header'];
		// $role = $arr['has_role'];

		if (($user == $username && $pass == $password) && ($user != "" && $pass != "")) {

			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['user_sid'] = $id;
			$_SESSION['id_team_header'] = $id_team_header;
			$_SESSION['role'] = $role;

			echo "<script>window.location.href='index.php';</script>";
		} else {
			echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
		}
	}

?>