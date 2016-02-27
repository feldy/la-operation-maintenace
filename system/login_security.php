<?php
	include("../config/configuration.php");

	if (isset($_POST['btn_login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = mysqli_query($conn,"SELECT * FROM m_user where username = '$user' and password = '$pass' ");
		$arr = mysqli_fetch_array($sql);

		$id = $arr['sid'];
		$password = $arr['password'];
		$username = $arr['username'];
		$role = $arr['role'];
		$nama = $arr['nama'];
		// $role = $arr['has_role'];

		if (($user == $username && $pass == $password) && ($user != "" && $pass != "")) {

			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['user_sid'] = $id;
			$_SESSION['nama'] = $nama;
			$_SESSION['role'] = $role;

			$halaman = "../form/login.php";
			if ($role == "team") {}
			else if ($role == "manager" || $role == "noc" || $role == "admin") {
				$halaman = "../form/admin/";
			}

			// echo "<script> alert(''); window.location.href='".$halaman."';</script>";
			showDialogUtama("Halo!", "Selamat datang ".$nama." ! ", "success", "../form/admin/");
		} else {
			showDialogUtama("Maaf!", "Email atau password anda belum terdaftar, silahkan ulangi kembali!", "error", "../index.php");
			// echo "<script> alert(' '); window.history.back();</script>";
		}
	}

?>