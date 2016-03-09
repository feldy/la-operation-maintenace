-- phpMyAdmin SQL Dump
-- version 4.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2016 at 10:33 PM
-- Server version: 5.5.47-0ubuntu0.12.04.1
-- PHP Version: 5.6.18-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lintas_arta`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_pelanggan`
--

CREATE TABLE `m_pelanggan` (
  `sid` varchar(36) NOT NULL,
  `no_jaringan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pelanggan`
--

INSERT INTO `m_pelanggan` (`sid`, `no_jaringan`, `nama_pelanggan`, `alamat`, `no_telepon`) VALUES
('00c9ed29-da39-11e5-9443-485b398462d1', '001201601', 'Feldy Yusuf', 'Depok 2 Timur', '08786543643'),
('753a4383-da49-11e5-9443-485b398462d1', '12345678', 'Rizky Pratama', 'Tanah Abang', '345234564');

-- --------------------------------------------------------

--
-- Table structure for table `m_team_detail`
--

CREATE TABLE `m_team_detail` (
  `sid` varchar(36) NOT NULL,
  `team_header_sid` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_team_detail`
--

INSERT INTO `m_team_detail` (`sid`, `team_header_sid`, `nama`) VALUES
('e200cd54-da38-11e5-9443-485b398462d1', 'c783bd3e-da38-11e5-9443-485b398462d1', 'Jeffri');

-- --------------------------------------------------------

--
-- Table structure for table `m_team_header`
--

CREATE TABLE `m_team_header` (
  `sid` varchar(36) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `no_handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_team_header`
--

INSERT INTO `m_team_header` (`sid`, `nama_team`, `leader`, `tanggal`, `no_handphone`) VALUES
('0c45f35b-dbc9-11e5-8c66-485b398462d1', 'Quatro 8', 'Endra', '2016-02-25', '0987753656'),
('c783bd3e-da38-11e5-9443-485b398462d1', 'Quatro 1', 'Okta Wota', '2016-02-23', '0987654323456'),
('d21c758e-dd69-11e5-b450-485b398462d1', 'Intel Atom', 'Syaiiful', '2016-02-02', '324234234234');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `sid` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`sid`, `username`, `password`, `role`, `nama`) VALUES
('4b8598c2-da38-11e5-9443-485b398462d1', 'admin', 'admin', 'admin', 'Endra Krisna'),
('4b85aa5d-da38-11e5-9443-485b398462d1', 'team', 'team', 'team', 'Robby Zemi'),
('88561735-da38-11e5-9443-485b398462d1', 'manager', 'manager', 'manager', 'Agus Supryatna'),
('a0bb230e-da38-11e5-9443-485b398462d1', 'noc', 'noc', 'noc', 'Syaiful Epul');

-- --------------------------------------------------------

--
-- Table structure for table `m_user_team`
--

CREATE TABLE `m_user_team` (
  `sid` varchar(36) NOT NULL,
  `id_team_header` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user_team`
--

INSERT INTO `m_user_team` (`sid`, `id_team_header`, `username`, `password`, `role`) VALUES
('3cce788b-dbc9-11e5-8c66-485b398462d1', '0c45f35b-dbc9-11e5-8c66-485b398462d1', 'team_endra', 'team_endra', 'team'),
('9ecac66b-dd6a-11e5-b450-485b398462d1', 'd21c758e-dd69-11e5-b450-485b398462d1', 'intel', 'intel', 'team'),
('c3a61e4c-db16-11e5-b6e3-485b398462d1', 'c783bd3e-da38-11e5-9443-485b398462d1', 'team', 'team', 'team');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_data_perangkat_terpasang`
--

CREATE TABLE `rpt_vsat_data_perangkat_terpasang` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `existing_nama_barang` varchar(100) NOT NULL,
  `existing_no_reg` varchar(100) NOT NULL,
  `existing_serial_number` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_nama_barang` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_no_reg` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_serial_number` varchar(100) NOT NULL,
  `cabut_nama_barang` varchar(100) NOT NULL,
  `cabut_no_reg` varchar(100) NOT NULL,
  `cabut_serial_number` varchar(100) NOT NULL,
  `pengganti_nama_barang` varchar(100) NOT NULL,
  `pengganti_no_reg` varchar(100) NOT NULL,
  `pengganti_serial_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_vsat_data_perangkat_terpasang`
--

INSERT INTO `rpt_vsat_data_perangkat_terpasang` (`sid`, `spk_sid`, `tanggal`, `existing_nama_barang`, `existing_no_reg`, `existing_serial_number`, `temuan_tidak_terpakai_nama_barang`, `temuan_tidak_terpakai_no_reg`, `temuan_tidak_terpakai_serial_number`, `cabut_nama_barang`, `cabut_no_reg`, `cabut_serial_number`, `pengganti_nama_barang`, `pengganti_no_reg`, `pengganti_serial_number`) VALUES
('e78fc92d-4c1e-4f25-9834-a149fd5672dc', '85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c', '2016-02-28', '1,a,b', '2,c,d', '3,e,f', '4', '5', '6', '7', '8', '9', '10', '11', '12');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_indoor_area_checklist`
--

CREATE TABLE `rpt_vsat_indoor_area_checklist` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `merk_ups` varchar(50) NOT NULL,
  `kapasitas_ups` varchar(50) NOT NULL,
  `v_output_pn_pg_ng` varchar(50) NOT NULL,
  `jenis_ups` varchar(50) NOT NULL,
  `is_menggunakan_ups` tinyint(1) NOT NULL,
  `is_bebas_debu` tinyint(1) NOT NULL,
  `is_terpasang_groundbar_mdp` tinyint(1) NOT NULL,
  `suhu_ruangan` varchar(50) NOT NULL,
  `catuan_input_modem` varchar(50) NOT NULL,
  `lokasi_lantai_ruang_rak` varchar(50) NOT NULL,
  `is_bertumpuk` tinyint(1) NOT NULL,
  `v_input_modem_pn` varchar(50) NOT NULL,
  `v_input_modem_ng` varchar(50) NOT NULL,
  `is_suhu_casing_panas` tinyint(1) NOT NULL,
  `is_terbounding_ke_ground_kencang` tinyint(1) NOT NULL,
  `is_splicing_konektor_kabel_ifl` tinyint(1) NOT NULL,
  `pemilik_perangkat_cpe` varchar(50) NOT NULL,
  `jenis_perangkat_cpe` varchar(50) NOT NULL,
  `is_perangkat_cpe_catuan_sama_dengan_modem` tinyint(1) NOT NULL,
  `is_perangkat_cpe_bounding_sama_dengan_modem` tinyint(1) NOT NULL,
  `temuan_indor_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_vsat_indoor_area_checklist`
--

INSERT INTO `rpt_vsat_indoor_area_checklist` (`sid`, `spk_sid`, `tanggal`, `merk_ups`, `kapasitas_ups`, `v_output_pn_pg_ng`, `jenis_ups`, `is_menggunakan_ups`, `is_bebas_debu`, `is_terpasang_groundbar_mdp`, `suhu_ruangan`, `catuan_input_modem`, `lokasi_lantai_ruang_rak`, `is_bertumpuk`, `v_input_modem_pn`, `v_input_modem_ng`, `is_suhu_casing_panas`, `is_terbounding_ke_ground_kencang`, `is_splicing_konektor_kabel_ifl`, `pemilik_perangkat_cpe`, `jenis_perangkat_cpe`, `is_perangkat_cpe_catuan_sama_dengan_modem`, `is_perangkat_cpe_bounding_sama_dengan_modem`, `temuan_indor_area`) VALUES
('f328d193-2cfe-441a-82f9-e357c6a4e81c', '85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c', '2016-02-28', 'UPS VSAT', '20000', 'IT|12|13|14', 'Continu', 1, 1, 1, '10', 'IT', '2, 705A, B07', 1, '225', '0.76', 1, 1, 1, 'Lintas Arta', 'Tutup', 0, 0, '&lt;span style=&quot;font-weight: bold;&quot;&gt;Banyak Sampah bro&lt;/span&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_informasi`
--

CREATE TABLE `rpt_vsat_informasi` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `file_photo` varchar(50) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_vsat_informasi`
--

INSERT INTO `rpt_vsat_informasi` (`sid`, `spk_sid`, `tanggal`, `file_photo`, `catatan`) VALUES
('18ec2848-ae84-4c8c-9ae2-a4b2b3bbc0d8', '85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c', '2016-02-28', '85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c.jpg', 'Oke Beresssss');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_outdoor_area_checklist`
--

CREATE TABLE `rpt_vsat_outdoor_area_checklist` (
  `sid` int(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_mounting` varchar(30) NOT NULL,
  `is_mounting_tidak_goyang_berkarat` tinyint(1) NOT NULL,
  `is_mounting_standard_bounding_ground` tinyint(1) NOT NULL,
  `is_ballast_terpasang` tinyint(1) NOT NULL,
  `is_tegak_lurus` tinyint(1) NOT NULL,
  `polaris` int(10) NOT NULL,
  `azimuth` int(5) NOT NULL,
  `elevasi` int(5) NOT NULL,
  `is_antena_bounding_ground` tinyint(1) NOT NULL,
  `is_reflector_tidak_lobang_kotor_kencang` tinyint(1) NOT NULL,
  `is_feed_support_tidak_berkarat_kencang` tinyint(1) NOT NULL,
  `is_feed_support_tidak_bocor_berembun` tinyint(1) NOT NULL,
  `tipe_kabel_ifl` varchar(50) NOT NULL,
  `panjang_kabel_ifl` varchar(5) NOT NULL,
  `tahanan_short_kabel_ifl` varchar(5) NOT NULL,
  `is_splicing_konektor_kabel_ifl` tinyint(1) NOT NULL,
  `is_system_rf_bounding_ground` tinyint(1) NOT NULL,
  `temuan_outdor_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_vsat_outdoor_area_checklist`
--

INSERT INTO `rpt_vsat_outdoor_area_checklist` (`sid`, `spk_sid`, `tanggal`, `tipe_mounting`, `is_mounting_tidak_goyang_berkarat`, `is_mounting_standard_bounding_ground`, `is_ballast_terpasang`, `is_tegak_lurus`, `polaris`, `azimuth`, `elevasi`, `is_antena_bounding_ground`, `is_reflector_tidak_lobang_kotor_kencang`, `is_feed_support_tidak_berkarat_kencang`, `is_feed_support_tidak_bocor_berembun`, `tipe_kabel_ifl`, `panjang_kabel_ifl`, `tahanan_short_kabel_ifl`, `is_splicing_konektor_kabel_ifl`, `is_system_rf_bounding_ground`, `temuan_outdor_area`) VALUES
(57, '85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c', '2016-02-28', 'Special', 0, 1, 0, 1, 0, 12, 15, 1, 0, 1, 0, 'Conscope', '14', '15', 1, 1, '&lt;span style=&quot;font-weight: bold;&quot;&gt;gak ada ini&lt;/span&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_data_perangkat_terpasang`
--

CREATE TABLE `rpt_wireless_data_perangkat_terpasang` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `existing_nama_barang` varchar(100) NOT NULL,
  `existing_no_reg` varchar(100) NOT NULL,
  `existing_serial_number` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_nama_barang` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_no_reg` varchar(100) NOT NULL,
  `temuan_tidak_terpakai_serial_number` varchar(100) NOT NULL,
  `cabut_nama_barang` varchar(100) NOT NULL,
  `cabut_no_reg` varchar(100) NOT NULL,
  `cabut_serial_number` varchar(100) NOT NULL,
  `pengganti_nama_barang` varchar(100) NOT NULL,
  `pengganti_no_reg` varchar(100) NOT NULL,
  `pengganti_serial_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_wireless_data_perangkat_terpasang`
--

INSERT INTO `rpt_wireless_data_perangkat_terpasang` (`sid`, `spk_sid`, `tanggal`, `existing_nama_barang`, `existing_no_reg`, `existing_serial_number`, `temuan_tidak_terpakai_nama_barang`, `temuan_tidak_terpakai_no_reg`, `temuan_tidak_terpakai_serial_number`, `cabut_nama_barang`, `cabut_no_reg`, `cabut_serial_number`, `pengganti_nama_barang`, `pengganti_no_reg`, `pengganti_serial_number`) VALUES
('6fdcbd0b-4941-4817-8d9f-2413e2c7e053', '248d5cc8-7537-4a84-bc29-90d9f661688a', '2016-02-28', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_indoor_area_checklist`
--

CREATE TABLE `rpt_wireless_indoor_area_checklist` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `merk_ups` varchar(50) NOT NULL,
  `kapasitas_ups` varchar(50) NOT NULL,
  `v_output_pn_pg_ng` varchar(50) NOT NULL,
  `jenis_ups` varchar(50) NOT NULL,
  `is_menggunakan_ups` tinyint(1) NOT NULL,
  `is_bebas_debu` tinyint(1) NOT NULL,
  `is_terpasang_groundbar_mdp` tinyint(1) NOT NULL,
  `suhu_ruangan` varchar(50) NOT NULL,
  `catuan_input_modem` varchar(50) NOT NULL,
  `lokasi_lantai_ruang_rak` varchar(50) NOT NULL,
  `is_bertumpuk` tinyint(1) NOT NULL,
  `v_input_modem_pn` varchar(50) NOT NULL,
  `v_input_modem_ng` varchar(50) NOT NULL,
  `is_suhu_casing_panas` tinyint(1) NOT NULL,
  `is_terbounding_ke_ground_kencang` tinyint(1) NOT NULL,
  `is_splicing_konektor_kabel_ifl` tinyint(1) NOT NULL,
  `pemilik_perangkat_cpe` varchar(50) NOT NULL,
  `jenis_perangkat_cpe` varchar(50) NOT NULL,
  `is_perangkat_cpe_catuan_sama_dengan_modem` tinyint(1) NOT NULL,
  `is_perangkat_cpe_bounding_sama_dengan_modem` tinyint(1) NOT NULL,
  `temuan_indor_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_wireless_indoor_area_checklist`
--

INSERT INTO `rpt_wireless_indoor_area_checklist` (`sid`, `spk_sid`, `tanggal`, `merk_ups`, `kapasitas_ups`, `v_output_pn_pg_ng`, `jenis_ups`, `is_menggunakan_ups`, `is_bebas_debu`, `is_terpasang_groundbar_mdp`, `suhu_ruangan`, `catuan_input_modem`, `lokasi_lantai_ruang_rak`, `is_bertumpuk`, `v_input_modem_pn`, `v_input_modem_ng`, `is_suhu_casing_panas`, `is_terbounding_ke_ground_kencang`, `is_splicing_konektor_kabel_ifl`, `pemilik_perangkat_cpe`, `jenis_perangkat_cpe`, `is_perangkat_cpe_catuan_sama_dengan_modem`, `is_perangkat_cpe_bounding_sama_dengan_modem`, `temuan_indor_area`) VALUES
('4e38f7a7-8491-4d47-8581-0de032a3626c', '248d5cc8-7537-4a84-bc29-90d9f661688a', '2016-02-28', 'UPS Wireless', '6054', 'PLN/Gedung|50|87|88', 'Sinus', 1, 1, 1, '5', 'Stabilizer', '4, 66m, 780', 1, '5', '4', 0, 1, 1, 'Pelanggan', 'r125', 1, 1, '&lt;span style=&quot;font-weight: bold;&quot;&gt;Ada banyak orang&lt;/span&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_informasi`
--

CREATE TABLE `rpt_wireless_informasi` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `file_photo` varchar(50) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_wireless_informasi`
--

INSERT INTO `rpt_wireless_informasi` (`sid`, `spk_sid`, `tanggal`, `file_photo`, `catatan`) VALUES
('7f62eb60-da04-4c34-9bbe-e5a9fc010746', '248d5cc8-7537-4a84-bc29-90d9f661688a', '2016-02-28', '248d5cc8-7537-4a84-bc29-90d9f661688a.jpg', 'Bahaya 1');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_outdoor_area_checklist`
--

CREATE TABLE `rpt_wireless_outdoor_area_checklist` (
  `sid` int(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_mounting` varchar(30) NOT NULL,
  `tinggi_mounting` varchar(40) NOT NULL,
  `tipe_penangkal_petir` varchar(50) NOT NULL,
  `is_mounting_tidak_goyang_berkarat` tinyint(1) NOT NULL,
  `is_tegak_lurus` tinyint(1) NOT NULL,
  `is_ada_penangkal_petir` varchar(50) NOT NULL,
  `is_sudut_mounting_penangkal_petir_kurang_45` tinyint(1) NOT NULL,
  `polaris` int(10) NOT NULL,
  `altitude` int(5) NOT NULL,
  `elevasi` int(5) NOT NULL,
  `is_antena_bounding_ground` tinyint(1) NOT NULL,
  `is_antena_sejajar_dengan_air` tinyint(1) NOT NULL,
  `tipe_kabel_ifl` varchar(50) NOT NULL,
  `panjang_kabel_ifl` varchar(5) NOT NULL,
  `tahanan_short_kabel_ifl` varchar(5) NOT NULL,
  `is_terpasang_arrestor_ground` tinyint(1) NOT NULL,
  `is_splicing_konektor_kabel_ifl` tinyint(1) NOT NULL,
  `temuan_outdor_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_wireless_outdoor_area_checklist`
--

INSERT INTO `rpt_wireless_outdoor_area_checklist` (`sid`, `spk_sid`, `tanggal`, `tipe_mounting`, `tinggi_mounting`, `tipe_penangkal_petir`, `is_mounting_tidak_goyang_berkarat`, `is_tegak_lurus`, `is_ada_penangkal_petir`, `is_sudut_mounting_penangkal_petir_kurang_45`, `polaris`, `altitude`, `elevasi`, `is_antena_bounding_ground`, `is_antena_sejajar_dengan_air`, `tipe_kabel_ifl`, `panjang_kabel_ifl`, `tahanan_short_kabel_ifl`, `is_terpasang_arrestor_ground`, `is_splicing_konektor_kabel_ifl`, `temuan_outdor_area`) VALUES
(0, '248d5cc8-7537-4a84-bc29-90d9f661688a', '2016-02-28', 'Tower', '50', 'Pasif', 1, 1, '1', 1, 0, 1234, 32, 1, 0, 'LMR 240', '', '', 1, 1, 'werwerwer&lt;span style=&quot;font-style: italic;&quot;&gt;werwer&lt;/span&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireline`
--

CREATE TABLE `rpt_wireline` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `lantai_posisi_modem` varchar(36) NOT NULL,
  `ruang` varchar(36) NOT NULL,
  `output_tegangan_ke_modem` varchar(36) NOT NULL,
  `grounding_bar_koneksi` varchar(36) NOT NULL,
  `is_ada_ac` tinyint(1) NOT NULL,
  `suhu_ruangan` varchar(36) NOT NULL,
  `existing_nama_barang` varchar(50) NOT NULL,
  `existing_no_reg` varchar(50) NOT NULL,
  `existing_serial_number` varchar(50) NOT NULL,
  `temuan_tidak_terpakai_nama_barang` varchar(50) NOT NULL,
  `temuan_tidak_terpakai_no_reg` varchar(50) NOT NULL,
  `temuan_tidak_terpakai_serial_number` varchar(50) NOT NULL,
  `cabut_nama_barang` varchar(50) NOT NULL,
  `cabut_no_reg` varchar(50) NOT NULL,
  `cabut_serial_number` varchar(50) NOT NULL,
  `pengganti_nama_barang` varchar(50) NOT NULL,
  `pengganti_no_reg` varchar(50) NOT NULL,
  `pengganti_serial_number` varchar(50) NOT NULL,
  `catatan_soltem_ljm` text NOT NULL,
  `file_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpt_wireline`
--

INSERT INTO `rpt_wireline` (`sid`, `spk_sid`, `tanggal`, `lantai_posisi_modem`, `ruang`, `output_tegangan_ke_modem`, `grounding_bar_koneksi`, `is_ada_ac`, `suhu_ruangan`, `existing_nama_barang`, `existing_no_reg`, `existing_serial_number`, `temuan_tidak_terpakai_nama_barang`, `temuan_tidak_terpakai_no_reg`, `temuan_tidak_terpakai_serial_number`, `cabut_nama_barang`, `cabut_no_reg`, `cabut_serial_number`, `pengganti_nama_barang`, `pengganti_no_reg`, `pengganti_serial_number`, `catatan_soltem_ljm`, `file_photo`) VALUES
('98c468f9-9da7-4bfd-a9e1-1875ddf8a098', '945104a9-e152-4fa8-9c17-5bb51311cee0', '2016-02-28', '5', '671', 'PLN/Gedung|55|54|52', 'CPE/Router', 1, '16', '11', '22', '33', '44', '55', '66', '77', '88', '99', '1010', '1111', '1212', '&lt;span style=&quot;font-weight: bold;&quot;&gt;sotem jukl&lt;/span&gt;', '945104a9-e152-4fa8-9c17-5bb51311cee0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_perintah_kerja`
--

CREATE TABLE `t_surat_perintah_kerja` (
  `sid` varchar(36) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `id_pelanggan` varchar(36) NOT NULL,
  `id_team` varchar(36) NOT NULL,
  `tanggal` datetime NOT NULL,
  `cp_nama` varchar(100) NOT NULL,
  `cp_telepon` varchar(20) NOT NULL,
  `masalah` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `akses` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lampiran_file` varchar(50) NOT NULL,
  `lampiran_keterangan` text NOT NULL,
  `access_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_perintah_kerja`
--

INSERT INTO `t_surat_perintah_kerja` (`sid`, `no_spk`, `id_pelanggan`, `id_team`, `tanggal`, `cp_nama`, `cp_telepon`, `masalah`, `catatan`, `akses`, `status`, `lampiran_file`, `lampiran_keterangan`, `access_date`) VALUES
('0397eea8-c033-4479-b7f9-a4716fa46737', '0004/JAR/2016', '00c9ed29-da39-11e5-9443-485b398462d1', '0c45f35b-dbc9-11e5-8c66-485b398462d1', '2016-03-05 14:58:38', 'FFF', '235435', 'fgfh', '&lt;p&gt;dfg&lt;/p&gt;', 'WIRELESS', 'CANCELED', '', '', '2016-03-05 18:03:44'),
('248d5cc8-7537-4a84-bc29-90d9f661688a', '0002/JAR/2016', '753a4383-da49-11e5-9443-485b398462d1', '0c45f35b-dbc9-11e5-8c66-485b398462d1', '2016-02-28 22:10:29', 'Syaiful', '0987345625362', 'Gak tau', '&lt;p&gt;Gak tau Kenapa&lt;/p&gt;', 'WIRELESS', 'INPROGRESS', '248d5cc8-7537-4a84-bc29-90d9f661688a.jpg', '<p>Haloooooo</p>', '2016-03-29 00:00:00'),
('85b7fc9c-e4c2-4c6e-9592-3ec06488ef7c', '0001/JAR/2016', '00c9ed29-da39-11e5-9443-485b398462d1', 'c783bd3e-da38-11e5-9443-485b398462d1', '2016-02-28 22:10:29', 'Feldy Yusuf', '98765678767', 'Kena Petir', '&lt;p&gt;cek Kabelnya&lt;/p&gt;', 'VSAT', 'INPROGRESS', '', '', '2016-03-15 00:00:00'),
('8b01ffe3-08dc-45c2-9283-5bfe5e2145fb', '0006/JAR/2016', '00c9ed29-da39-11e5-9443-485b398462d1', '0c45f35b-dbc9-11e5-8c66-485b398462d1', '2016-03-09 21:36:59', 'RERE', '234234', 'sdfsdf', '&lt;p&gt;sdfsdfsdf&lt;/p&gt;', 'VSAT', 'NEW', '', '', NULL),
('945104a9-e152-4fa8-9c17-5bb51311cee0', '0003/JAR/2016', '00c9ed29-da39-11e5-9443-485b398462d1', 'd21c758e-dd69-11e5-b450-485b398462d1', '2016-02-28 22:10:29', 'Saepul Jamil', '567845333', 'Belum Tahu', '&lt;p&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;wewewe&lt;/span&gt;&lt;/p&gt;', 'WIRELINE', 'INPROGRESS', '', '', '2016-03-08 00:00:00'),
('9a4489c9-cbc3-42a2-8253-28a76c3ff989', '0005/JAR/2016', '00c9ed29-da39-11e5-9443-485b398462d1', 'd21c758e-dd69-11e5-b450-485b398462d1', '2016-03-05 16:00:50', 'ererer', '2342', '234234', '&lt;p&gt;werwerer&lt;/p&gt;', 'WIRELINE', 'CANCELED', '', '', '2016-03-05 18:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `no_jaringan` (`no_jaringan`);

--
-- Indexes for table `m_team_detail`
--
ALTER TABLE `m_team_detail`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `m_team_header`
--
ALTER TABLE `m_team_header`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `nama_team` (`nama_team`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `m_user_team`
--
ALTER TABLE `m_user_team`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `id_team_header` (`id_team_header`);

--
-- Indexes for table `rpt_vsat_data_perangkat_terpasang`
--
ALTER TABLE `rpt_vsat_data_perangkat_terpasang`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_vsat_indoor_area_checklist`
--
ALTER TABLE `rpt_vsat_indoor_area_checklist`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_vsat_informasi`
--
ALTER TABLE `rpt_vsat_informasi`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_vsat_outdoor_area_checklist`
--
ALTER TABLE `rpt_vsat_outdoor_area_checklist`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_wireless_data_perangkat_terpasang`
--
ALTER TABLE `rpt_wireless_data_perangkat_terpasang`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_wireless_indoor_area_checklist`
--
ALTER TABLE `rpt_wireless_indoor_area_checklist`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_wireless_informasi`
--
ALTER TABLE `rpt_wireless_informasi`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_wireless_outdoor_area_checklist`
--
ALTER TABLE `rpt_wireless_outdoor_area_checklist`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `rpt_wireline`
--
ALTER TABLE `rpt_wireline`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spk_sid` (`spk_sid`);

--
-- Indexes for table `t_surat_perintah_kerja`
--
ALTER TABLE `t_surat_perintah_kerja`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `no_spk` (`no_spk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
