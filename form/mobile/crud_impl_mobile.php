<?php
    if ($_POST['step'] == "btn_save_vsat") {
        //generat sid
        $id1 = gen_uuid();
        $id2 = gen_uuid();
        $id3 = gen_uuid();
        $id4 = gen_uuid();

        $final_v_output_pn_pg_ng = $v_output_pn_pg_ng."|".$v_output_pn."|".$v_output_pg."|".$v_output_ng;
        $str_vsat_1 = "INSERT INTO rpt_vsat_indoor_area_checklist (sid, spk_sid, tanggal, merk_ups, kapasitas_ups, 
            v_output_pn_pg_ng, jenis_ups, is_menggunakan_ups, is_bebas_debu, is_terpasang_groundbar_mdp, 
            suhu_ruangan, catuan_input_modem, lokasi_lantai_ruang_rak, is_bertumpuk, v_input_modem_pn, 
            v_input_modem_ng, is_suhu_casing_panas, is_terbounding_ke_ground_kencang, 
            is_splicing_konektor_kabel_ifl, pemilik_perangkat_cpe, jenis_perangkat_cpe, 
            is_perangkat_cpe_catuan_sama_dengan_modem, is_perangkat_cpe_bounding_sama_dengan_modem, 
            temuan_indor_area) VALUES 
            ('$id1', '$SPK_SID', now(), '$merk_ups', '$kapasitas_ups', '$final_v_output_pn_pg_ng', 
            '$jenis_ups', $is_menggunakan_ups, $is_bebas_debu, $is_terpasang_groundbar_mdp, '$suhu_ruangan',
            '$catuan_input_modem', '$lokasi_lantai_ruang_rak', $is_bertumpuk, '$v_input_modem_pn', 
            '$v_input_modem_ng', $is_suhu_casing_panas, $is_terbounding_ke_ground_kencang, 
            $is_splicing_konektor_kabel_ifl, '$pemilik_perangkat_cpe', '$jenis_perangkat_cpe', 
            $is_perangkat_cpe_catuan_sama_dengan_modem, $is_perangkat_cpe_bounding_sama_dengan_modem, 
            '$temuan_indor_area' )";

        $str_vsat_2 = "INSERT INTO rpt_vsat_outdoor_area_checklist 
            (sid, spk_sid, tanggal, tipe_mounting, is_mounting_tidak_goyang_berkarat, 
            is_mounting_standard_bounding_ground, is_ballast_terpasang, is_tegak_lurus, polaris, azimuth, elevasi, 
            is_antena_bounding_ground, is_reflector_tidak_lobang_kotor_kencang, is_feed_support_tidak_berkarat_kencang, 
            is_feed_support_tidak_bocor_berembun, tipe_kabel_ifl, panjang_kabel_ifl, tahanan_short_kabel_ifl, 
            is_splicing_konektor_kabel_ifl, is_system_rf_bounding_ground, temuan_outdor_area) VALUES 
            ('$id2', '$SPK_SID', now(), '$tipe_mounting', $is_mounting_tidak_goyang_berkarat, 
            $is_mounting_standard_bounding_ground, $is_ballast_terpasang, $is_tegak_lurus, '$polaris', '$azimuth', 
            '$elevasi', $is_antena_bounding_ground, $is_reflector_tidak_lobang_kotor_kencang, 
            $is_feed_support_tidak_berkarat_kencang, $is_feed_support_tidak_bocor_berembun, '$tipe_kabel_ifl', 
            '$panjang_kabel_ifl', '$tahanan_short_kabel_ifl', $is_splicing_konektor_kabel_ifl, 
            $is_system_rf_bounding_ground, '$temuan_outdor_area') ";

        $file_photo_final = "";
        if (!empty($extension)) {
            $file_photo_final = $SPK_SID.".".$extension;
        }

        if (isset($_FILES['file_photo'])) {
            if ($_FILES['file_photo']['error'] == 0) {
                move_uploaded_file($_FILES['file_photo']['tmp_name'], '../../upload/photo/'.$file_photo_final);
            }
        }

        $str_vsat_3 = "INSERT INTO rpt_vsat_informasi 
            (sid, spk_sid, tanggal, file_photo, catatan) VALUES 
            ('$id3', '$SPK_SID', now(), '$file_photo_final', '$catatan') ";

        $str_vsat_4 = "INSERT INTO rpt_vsat_data_perangkat_terpasang 
            (sid, spk_sid, tanggal, existing_nama_barang, existing_no_reg, existing_serial_number, 
            temuan_tidak_terpakai_nama_barang, temuan_tidak_terpakai_no_reg, 
            temuan_tidak_terpakai_serial_number, cabut_nama_barang, cabut_no_reg, cabut_serial_number, 
            pengganti_nama_barang, pengganti_no_reg, pengganti_serial_number) VALUES 
            ('$id4', '$SPK_SID', now(), '$existing_nama_barang', '$existing_no_reg', 
            '$existing_serial_number', '$temuan_tidak_terpakai_nama_barang', '$temuan_tidak_terpakai_no_reg', 
            '$temuan_tidak_terpakai_serial_number', '$cabut_nama_barang', '$cabut_no_reg', 
            '$cabut_serial_number', '$pengganti_nama_barang', '$pengganti_no_reg', '$pengganti_serial_number')";

        // echo ">>>>>> VSAT 1 ".$str_vsat_1."<br /><br />";
        // echo ">>>>>> VSAT 2 ".$str_vsat_2."<br /><br />";
        // echo ">>>>>> VSAT 3 ".$str_vsat_3."<br /><br />";
        // echo ">>>>>> VSAT 4 ".$str_vsat_4."<br /><br />";

        // $query1 = mysqli_query($conn, $str_vsat_1) or die(mysqli_error($conn));
        // $query2 = mysqli_query($conn, $str_vsat_2) or die(mysqli_error($conn));
        // $query3 = mysqli_query($conn, $str_vsat_3) or die(mysqli_error($conn));
        // $query4 = mysqli_query($conn, $str_vsat_4) or die(mysqli_error($conn));
        mysqli_query($conn, "UPDATE t_surat_perintah_kerja SET status = 'INPROGRESS' WHERE sid = '$SPK_SID'") or die(showDialog("Error!",  mysqli_error($conn), "error", "index.php"));

        if ($query1 and $query2 and $query3 and $query4) {
            $isProses = 1;
            showDialog("Berhasil", "Data Berhasil disimpan !", "success", "index.php");
        } else {
            $isProses = 0;
            showDialog("Maaf!", "Data Gagal disimpan. Silahkan Ulangi !", "error", "index.php");
            $step = 4;
        }
    } 
    // else if (isset($_POST['btn_save_wireless'])) {
    // } else if (isset($_POST['btn_save_wireline'])) {
    // }
?>