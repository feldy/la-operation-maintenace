-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2016 at 11:09 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_perintah_kerja`
--

CREATE TABLE IF NOT EXISTS `t_surat_perintah_kerja` (
  `sid` varchar(36) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `id_pelanggan` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `cp_nama` varchar(100) NOT NULL,
  `cp_telepon` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_spk` (`no_spk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
