-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2022 at 09:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(10, 'Indomie', 'Indomie Biasa', 'Indomie', 6000, 10, '1153px-Indomie_Mie_Goreng_Iga_Penyet_1.jpg'),
(11, 'Hotang', 'Hotang Sosis Moza', 'Corndog', 12000, 9, '53561693_207312486892392_4564783880800377398_n.jpg'),
(12, 'Risol Mayo', 'Risol Mayo Isi 4', 'Cemilan', 10000, 14, '117169612-648580029084907-5117323138954386815-n-df5471bf987765800216859eace03d04_600x400.jpg'),
(13, 'Dimsum', 'Dimsum Isi 4', 'Cemilan', 13500, 10, '1325218210_(2).jpg'),
(14, 'Spagethi', 'Spagethi Bolognese', 'Makanan Utama', 15000, 10, 'a7514551648a1dfc985f510526564999.jpg'),
(15, 'Aqua', 'Air Mineral', 'Minuman', 4000, 10, 'Aqua.jpg'),
(16, 'Chiken Cordon ', 'Chiken Cordon Bleu', 'Makanan Utama', 27000, 10, 'Chicken_Cordon_Bleu.jpg'),
(17, 'Chiken Steak', 'Chiken Steak', 'Makanan Utama', 25000, 10, 'Chicken_Steak.jpg'),
(18, 'Cireng Crispy', 'Cireng Ayam Isi 5', 'Cemilan', 15000, 10, 'Cireng_Crispy.jpg'),
(19, 'Corndog', 'Corndog', 'Corndog', 12000, 10, 'corndogvskoreancorndog2.jpg'),
(20, 'Risol', 'Risol Sayur Isi 5', 'Cemilan', 10000, 10, 'dapur_palma_risoles1_(2).jpg'),
(21, 'Es Jeruk', 'Es Jeruk', 'Minuman', 6000, 10, 'Es_Jeruk.jpg'),
(22, 'Es Teh Manis', 'Es Teh Manis', 'Minuman', 4000, 10, 'Es_Teh_Manis.jpg'),
(23, 'Kentang Goreng', 'Kentang Goreng', 'Cemilan', 12000, 10, 'kentang-goreng-original.jpg'),
(24, 'Es Milo', 'Milo Susu', 'Minuman', 5000, 10, 'Milo_Susu.jpg'),
(25, 'Es Milo', 'Milo 3in1', 'Minuman', 8000, 10, 'Milo3in1.jpeg'),
(26, 'Otak-Otak', 'Otak-Otak Goreng', 'Cemilan', 12000, 10, 'otak-otak-goreng-foto-resep-utama.jpg'),
(27, 'Pisang Bakar', 'Pisang Bakar', 'Cemilan', 10000, 10, 'Pisang_Bakar.jpg'),
(28, 'Corndog', 'Corndog Full Moza', 'Corndog', 12000, 10, 'resep_corn_dog_gampang.jpg'),
(29, 'Roti Bakar', 'Roti Bakar', 'Cemilan', 10000, 10, 'Roti_Bakar.jpg'),
(30, 'Rujak Cireng', 'Rujak Cireng Isi 20', 'Cemilan', 20000, 10, 'Rujak_Cireng.jpg'),
(31, 'Sosis Bakar', 'Sosis Bakar', 'Cemilan', 10000, 10, 'Sosis_Bakar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hape` varchar(20) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `id_user`, `no_invoice`, `nama`, `alamat`, `no_hape`, `tgl_pesan`, `batas_bayar`, `is_paid`) VALUES
(114, 2, '20220416015056', 'arya', 'Depok', '08123456789', '2022-04-16 01:50:56', '2022-04-17 01:50:56', 0),
(115, 2, '20220416051536', 'arya', 'Depok', '08123456789', '2022-04-16 05:15:36', '2022-04-17 05:15:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_user`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(24, 0, 114, 11, 'Hotang', '1', '12000'),
(25, 0, 115, 12, 'Risol Mayo', '1', '10000');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN 
UPDATE tb_barang SET stok = stok-NEW.jumlah
WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tripay`
--

CREATE TABLE `tb_tripay` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `reference` varchar(120) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `merchant_ref` varchar(120) DEFAULT NULL,
  `payment_method` varchar(120) DEFAULT NULL,
  `payment_name` varchar(120) DEFAULT NULL,
  `customer_name` varchar(120) DEFAULT NULL,
  `customer_email` varchar(120) DEFAULT NULL,
  `customer_phone` varchar(120) DEFAULT NULL,
  `amount` varchar(120) DEFAULT NULL,
  `fee_merchant` varchar(120) DEFAULT NULL,
  `fee_customer` varchar(120) DEFAULT NULL,
  `amount_received` varchar(120) DEFAULT NULL,
  `pay_code` varchar(120) DEFAULT NULL,
  `checkout_url` varchar(120) DEFAULT NULL,
  `expired_time` varchar(120) DEFAULT NULL,
  `qr_string` varchar(120) DEFAULT NULL,
  `qr_url` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tripay`
--

INSERT INTO `tb_tripay` (`id`, `id_user`, `reference`, `status`, `merchant_ref`, `payment_method`, `payment_name`, `customer_name`, `customer_email`, `customer_phone`, `amount`, `fee_merchant`, `fee_customer`, `amount_received`, `pay_code`, `checkout_url`, `expired_time`, `qr_string`, `qr_url`) VALUES
(2, 4, 'DEV-T1072440823UPB0M', 'PAID', '20220402032549', 'ALFAMART', 'Alfamart', 'Muhammad Arya Nurarif', 'emailpelanggan@domain.com', '081284451622', '15000', '6000', '0', '9000', '904152741964799', 'https://tripay.co.id/checkout/DEV-T1072440823UPB0M', '1648931089', NULL, NULL),
(3, 4, 'DEV-T1072440824KG1QD', 'UNPAID', '20220402032626', 'INDOMARET', 'Indomaret', 'Aryaa', 'emailpelanggan@domain.com', '082135888258', '22000', '3500', '0', '18500', '454294457347742', 'https://tripay.co.id/checkout/DEV-T1072440824KG1QD', '1648931186', NULL, NULL),
(4, 4, 'DEV-T1072440848COJVQ', 'UNPAID', '20220402153557', 'QRISC', 'QRIS (Customizable)', 'Aminah Khansa Kamila', 'emailpelanggan@domain.com', '081284451622', '32500', '978', '0', '31522', NULL, 'https://tripay.co.id/checkout/DEV-T1072440848COJVQ', '1648974897', 'SANDBOX MODE', 'https://tripay.co.id/qr/DEV-T1072440848COJVQ'),
(6, 4, 'DEV-T1072440854VSDAO', 'UNPAID', '20220402184413', 'QRISD', 'QRIS (DANA)', 'Nadiya', 'emailpelanggan@domain.com', '081284451622', '12000', '834', '0', '11166', NULL, 'https://tripay.co.id/checkout/DEV-T1072440854VSDAO', '1648986193', 'SANDBOX MODE', 'https://tripay.co.id/qr/DEV-T1072440854VSDAO'),
(7, 3, 'DEV-T1072442387VFLCA', 'UNPAID', '20220412234246', 'QRISD', 'QRIS (DANA)', 'arya', 'emailpelanggan@domain.com', '082135888258', '6000', '792', '0', '5208', NULL, 'https://tripay.co.id/checkout/DEV-T1072442387VFLCA', '1649868107', 'SANDBOX MODE', 'https://tripay.co.id/qr/DEV-T1072442387VFLCA'),
(8, 2, 'DEV-T1072442524EDO6N', 'UNPAID', '20220414103912', 'QRISD', 'QRIS (DANA)', 'arya', 'emailpelanggan@domain.com', NULL, '13500', '845', '0', '12655', NULL, 'https://tripay.co.id/checkout/DEV-T1072442524EDO6N', '1649993892', 'SANDBOX MODE', 'https://tripay.co.id/qr/DEV-T1072442524EDO6N'),
(9, 2, 'DEV-T1072442670BD01Q', 'UNPAID', '20220415214026', 'QRISD', 'QRIS (DANA)', 'arya', 'emailpelanggan@domain.com', '082135888258', '6000', '792', '0', '5208', NULL, 'https://tripay.co.id/checkout/DEV-T1072442670BD01Q', '1650119967', 'SANDBOX MODE', 'https://tripay.co.id/qr/DEV-T1072442670BD01Q');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'Arya', 'Arya112', '123', 2),
(4, 'Arya', 'aryaNurarif', 'arya1122', 2),
(5, 'AryaNurarif', 'arya112', 'arya1122', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tripay`
--
ALTER TABLE `tb_tripay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_tripay`
--
ALTER TABLE `tb_tripay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
