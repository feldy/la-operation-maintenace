<?php
	session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) ) {
        echo "<script>window.location.href='form/login.php'</script>";
    } else {
    	$role = $_SESSION['role'];
    	if ($role == "team") {}
		else if ($role == "manager" || $role == "noc" || $role == "admin") {
        	echo "<script>window.location.href='form/admin/'</script>";
		} else {
        	echo "<script>window.location.href='form/login.php'</script>";
		}
    }
?>