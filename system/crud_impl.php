<?php
	include("../config/configuration.php");
    if (isset($_POST['btn_save_spk'])) {
    	//generat sid
    	$id = gen_uuid();

    	//search nomor paling terakhir spk.
    	$nilai_terakhir = mysql_query("SELECT COALESCE(MAX(LEFT(no_spk, 4)+0), 0) as nilai_terakhir FROM t_surat_perintah_kerja") or die(mysql_error());
    	$nilai_terakhir = mysql_fetch_array($nilai_terakhir);
    	$nilai_terakhir = $nilai_terakhir['nilai_terakhir'];

    	// generate nomor spk
    	$nomor_spk = str_pad($nilai_terakhir+1, 4, "0", STR_PAD_LEFT)."/JAR/".date("Y");
    	$id_pelanggan = $_POST['id_pelanggan'];
    	$id_team = $_POST['id_team'];
    	$cp_nama = $_POST['cp_nama'];
    	$cp_telepon = $_POST['cp_telepon'];
    	$masalah = $_POST['masalah'];
    	$catatan = htmlspecialchars($_POST['catatan']);
    	$akses = $_POST['akses'];

    	//save action
    	$str = "INSERT INTO t_surat_perintah_kerja (sid, no_spk, id_pelanggan, id_team, tanggal, cp_nama, cp_telepon, masalah, catatan, akses, status) VALUES 
    	('$id', '$nomor_spk', '$id_pelanggan', '$id_team', now(), '$cp_nama', '$cp_telepon', '$masalah', '$catatan', '$akses', 'NEW')";
    	// echo ">>>>".$str;
    	$query = mysql_query($str) or die(mysql_error());

    	if ($query) {
			echo "<script>alert('Berhasil Menyimpan Data'); window.location.href = '../form/admin/?page=noc&form=view';</script>";
		} else {
			echo "<script>alert('Gagal Menyimpan Data');window.history.back();</script>";
		}	
    }
?>