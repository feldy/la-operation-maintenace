-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2016 at 11:37 PM
-- Server version: 5.5.47-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lintas_arta`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_pelanggan`
--

CREATE TABLE IF NOT EXISTS `m_pelanggan` (
  `sid` varchar(36) NOT NULL,
  `no_jaringan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_jaringan` (`no_jaringan`)
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

CREATE TABLE IF NOT EXISTS `m_team_detail` (
  `sid` varchar(36) NOT NULL,
  `team_header_sid` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
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

CREATE TABLE IF NOT EXISTS `m_team_header` (
  `sid` varchar(36) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `nama_team` (`nama_team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_team_header`
--

INSERT INTO `m_team_header` (`sid`, `nama_team`, `leader`, `tanggal`, `no_handphone`) VALUES
('c783bd3e-da38-11e5-9443-485b398462d1', 'Quatro 1', 'Okta Wota', '2016-02-23', '0987654323456');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `sid` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `username` (`username`)
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
-- Table structure for table `rpt_vsat_data_perangkat_terpasang`
--

CREATE TABLE IF NOT EXISTS `rpt_vsat_data_perangkat_terpasang` (
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
  `pengganti_serial_number` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `spk_sid` (`spk_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_indoor_area_checklist`
--

CREATE TABLE IF NOT EXISTS `rpt_vsat_indoor_area_checklist` (
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
  `temuan_indor_area` text NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `spk_sid` (`spk_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_informasi`
--

CREATE TABLE IF NOT EXISTS `rpt_vsat_informasi` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `file_photo` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `spk_sid` (`spk_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_vsat_outdoor_area_checklist`
--

CREATE TABLE IF NOT EXISTS `rpt_vsat_outdoor_area_checklist` (
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
  `temuan_outdor_area` text NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `spk_sid` (`spk_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_data_perangkat_terpasang`
--

CREATE TABLE IF NOT EXISTS `rpt_wireless_data_perangkat_terpasang` (
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

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_indoor_area_checklist`
--

CREATE TABLE IF NOT EXISTS `rpt_wireless_indoor_area_checklist` (
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

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_informasi`
--

CREATE TABLE IF NOT EXISTS `rpt_wireless_informasi` (
  `sid` varchar(36) NOT NULL,
  `spk_sid` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `file_photo` varchar(50) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_wireless_outdoor_area_checklist`
--

CREATE TABLE IF NOT EXISTS `rpt_wireless_outdoor_area_checklist` (
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

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_perintah_kerja`
--

CREATE TABLE IF NOT EXISTS `t_surat_perintah_kerja` (
  `sid` varchar(36) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `id_pelanggan` varchar(36) NOT NULL,
  `tanggal` datetime NOT NULL,
  `cp_nama` varchar(100) NOT NULL,
  `cp_telepon` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_spk` (`no_spk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
