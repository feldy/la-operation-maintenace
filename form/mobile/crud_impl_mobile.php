<?php
	include("../config/configuration.php");
    // if ($_POST['step'] == "btn_save_vsat") {
        //generat sid
        $id = gen_uuid();

        $final_v_output_pn_pg_ng = $v_output_pn_pg_ng."|".$v_output_pn."|".$v_output_pg."|".$v_output_ng;
        $str = "INSERT INTO rpt_vsat_indoor_area_checklist (sid, spk_sid, tanggal, merk_ups, kapasitas_ups, 
                v_output_pn_pg_ng, jenis_ups, is_menggunakan_ups, is_bebas_debu, is_terpasang_groundbar_mdp, 
                suhu_ruangan, catuan_input_modem, lokasi_lantai_ruang_rak, is_bertumpuk, v_input_modem_pn, 
                v_input_modem_ng, is_suhu_casing_panas, is_terbounding_ke_ground_kencang, 
                is_splicing_konektor_kabel_ifl, pemilik_perangkat_cpe, jenis_perangkat_cpe, 
                is_perangkat_cpe_catuan_sama_dengan_modem, is_perangkat_cpe_bounding_sama_dengan_modem, 
                temuan_indor_area) VALUES 
                ('$id', '$SPK_SID', now(), '$merk_ups', '$kapasitas_ups', '$final_v_output_pn_pg_ng', 
                '$jenis_ups', $is_menggunakan_ups, $is_bebas_debu, $is_terpasang_groundbar_mdp, '$suhu_ruangan',
                '$catuan_input_modem', '$lokasi_lantai_ruang_rak', $is_bertumpuk, '$v_input_modem_pn', 
                '$v_input_modem_ng', $is_suhu_casing_panas, $is_terbounding_ke_ground_kencang, 
                $is_splicing_konektor_kabel_ifl, '$pemilik_perangkat_cpe', '$jenis_perangkat_cpe', 
                $is_perangkat_cpe_catuan_sama_dengan_modem, $is_perangkat_cpe_bounding_sama_dengan_modem, 
                '$temuan_indor_area' )";

        echo ">>>>>>".$str;
    // } else if (isset($_POST['btn_save_wireless'])) {
    // } else if (isset($_POST['btn_save_wireline'])) {
    // }
?>