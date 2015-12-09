-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 10:12 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facturacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `factura_detalle`
--

CREATE TABLE IF NOT EXISTS `factura_detalle` (
  `id` int(11) NOT NULL,
  `numero_orden` varchar(255) DEFAULT NULL,
  `codigo_producto` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `factura_maestra`
--

CREATE TABLE IF NOT EXISTS `factura_maestra` (
  `id` int(11) NOT NULL,
  `numero_orden` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `documento` varchar(255) NOT NULL,
  `ncf` varchar(100) NOT NULL,
  `subtotal` double NOT NULL,
  `monto` double DEFAULT NULL,
  `itbis` int(11) NOT NULL,
  `tipo` enum('factura','cotizacion','','') NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `precio` int(11) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `estado` enum('Activo','Inactivo','Borrado','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`codigo`, `nombre`, `descripcion`, `precio`, `existencia`, `estado`) VALUES
(1, 'Escopeta Tuna', 'Descripcion', 15000, 10, 'Activo'),
(2, 'Escopeta Pegaso', 'Descripcion', 15001, 11, 'Activo'),
(3, 'Escopeta Movir', 'Descripcion', 15002, 12, 'Activo'),
(4, 'Escopeta Maverich', 'Descripcion', 15003, 13, 'Activo'),
(5, 'Combo  Escopeta Maverich', 'Descripcion', 15004, 14, 'Activo'),
(6, 'Pistola Bersa Mini Turbe', 'Descripcion', 15005, 15, 'Activo'),
(7, 'Pistola Taurus', 'Descripcion', 15006, 16, 'Activo'),
(8, 'Pistola Taurus Milenium', 'Descripcion', 15007, 17, 'Activo'),
(9, 'Pistola C2 Mod 110', 'Descripcion', 15008, 18, 'Activo'),
(10, 'Pistola  Vereta', 'Descripcion', 15009, 19, 'Activo'),
(11, 'Pistola Prieto Vereta', 'Descripcion', 15010, 20, 'Activo'),
(12, 'Pistola Bronix 360', 'Descripcion', 15011, 21, 'Activo'),
(13, 'Pistola Bronix ', 'Descripcion', 15012, 22, 'Activo'),
(14, 'Pistola Bronix Cod .33', 'Descripcion', 15013, 23, 'Activo'),
(15, 'Pistola Versa 380', 'Descripcion', 15014, 24, 'Activo'),
(16, 'Pistola Versa ', 'Descripcion', 15015, 25, 'Activo'),
(17, 'Pistola M Wasson 915', 'Descripcion', 15016, 26, 'Activo'),
(18, 'Pistola M Wasson ', 'Descripcion', 15017, 27, 'Activo'),
(19, 'Pistola Hs', 'Descripcion', 15018, 28, 'Activo'),
(20, 'Revolver (1)', 'Descripcion', 15019, 29, 'Activo'),
(21, 'Revolver (2)', 'Descripcion', 15020, 30, 'Activo'),
(22, 'Revolver (3)', 'Descripcion', 15021, 31, 'Activo'),
(23, 'Gorra Pn', 'Descripcion', 15022, 32, 'Activo'),
(24, 'Riche', 'Descripcion', 15023, 33, 'Activo'),
(25, 'Culata(1)', 'Descripcion', 15024, 34, 'Activo'),
(26, 'Culata(2)', 'Descripcion', 15025, 35, 'Activo'),
(27, 'Culata(3)', 'Descripcion', 15026, 36, 'Activo'),
(28, 'Cañones', 'Descripcion', 15027, 37, 'Activo'),
(29, 'Correa', 'Descripcion', 15028, 38, 'Activo'),
(30, 'Estuche De Saga', 'Descripcion', 15029, 39, 'Activo'),
(31, 'Estuche De Escopeta', 'Descripcion', 15030, 40, 'Activo'),
(32, 'Caja De Cartuchos Carga  Completa', 'Descripcion', 15031, 41, 'Activo'),
(33, 'Caja De Cartuchos 1/2 Carga', 'Descripcion', 15032, 42, 'Activo'),
(34, 'Caja De Cartuchos De Goma', 'Descripcion', 15033, 43, 'Activo'),
(35, 'Caja De Tiro Calibre 25', 'Descripcion', 15034, 44, 'Activo'),
(36, 'Caja De Tiro Calibre 38', 'Descripcion', 15035, 45, 'Activo'),
(37, 'Caja De Tiro 9 Mm', 'Descripcion', 15036, 46, 'Activo'),
(38, 'Tiro 9 Mm', 'Descripcion', 15037, 47, 'Activo'),
(39, 'Cajas Tiro 9 Mm Aguila', 'Descripcion', 15038, 48, 'Activo'),
(40, 'Cajas Tiro 380 Aguila', 'Descripcion', 15039, 49, 'Activo'),
(41, 'Cajas De Limpiador', 'Descripcion', 15040, 50, 'Activo'),
(42, 'Chaquetera', 'Descripcion', 15041, 51, 'Activo'),
(43, 'Insignia De Sargento', 'Descripcion', 15042, 52, 'Activo'),
(44, 'Insignia De 2do Teniente', 'Descripcion', 15043, 53, 'Activo'),
(45, 'Insignia De 1er Teniente', 'Descripcion', 15044, 54, 'Activo'),
(46, 'Insignia De Capitan', 'Descripcion', 15045, 55, 'Activo'),
(47, 'Insignia De Mayor', 'Descripcion', 15046, 56, 'Activo'),
(48, 'Insignia De Tte. Coronel', 'Descripcion', 15047, 57, 'Activo'),
(49, 'Insignia De Coronel', 'Descripcion', 15048, 58, 'Activo'),
(50, 'Insignia De Alistado', 'Descripcion', 15049, 59, 'Activo'),
(51, 'Botas Vibrar', 'Descripcion', 15050, 60, 'Activo'),
(52, 'Insignia De Capitan', 'Descripcion', 15051, 61, 'Activo'),
(53, 'Apellidos', 'Descripcion', 15052, 62, 'Activo'),
(54, 'Spray Gas Pimienta', 'Descripcion', 15053, 63, 'Activo'),
(55, 'Sellos (1)', 'Descripcion', 15054, 64, 'Activo'),
(56, 'Sellos (2)', 'Descripcion', 15055, 65, 'Activo'),
(57, 'Sellos (3)', 'Descripcion', 15056, 66, 'Activo'),
(58, 'Cargadores Ruger', 'Descripcion', 15057, 67, 'Activo'),
(59, 'Cargadores Bersa 18', 'Descripcion', 15058, 68, 'Activo'),
(60, 'Cargadores Largos', 'Descripcion', 15059, 69, 'Activo'),
(61, 'Chamaco Verde', 'Descripcion', 15060, 70, 'Activo'),
(62, 'Esposas', 'Descripcion', 15061, 71, 'Activo'),
(63, 'Canana De Revolver Reversible', 'Descripcion', 15062, 72, 'Activo'),
(64, 'Canana De Pistola', 'Descripcion', 15063, 73, 'Activo'),
(65, 'Porta Tiro', 'Descripcion', 15064, 74, 'Activo'),
(67, 'Kit De  Limpieza', 'Descripcion', 15066, 76, 'Activo'),
(68, 'Mira De Glock', 'Descripcion', 15067, 77, 'Activo'),
(69, 'Keyboard Cordless', 'Keyboard.', 1500, 10, 'Activo'),
(70, 'Web cam Logitec Pro 5000', 'Descripcion', 5000, 10, 'Activo'),
(71, 'Mouse Cordless', 'Cordeless Mouse.', 1500, 20, 'Activo'),
(72, 'Printer Canno 1500', 'Printer.', 3000, 1, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `ncf`
--

CREATE TABLE IF NOT EXISTS `ncf` (
  `id` int(11) NOT NULL,
  `numero` text,
  `descripcion` text NOT NULL,
  `estado` enum('activo','inactivo','borrado','') NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaUsado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncf`
--

INSERT INTO `ncf` (`id`, `numero`, `descripcion`, `estado`, `fechaCreacion`, `fechaUsado`) VALUES
(1, 'A010010010100000001', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A010010010100000002', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'A010010010100000003', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'A010010010100000004', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'A010010010100000004', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'A010010010100000006', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'A010010010100000007', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'A010010010100000008', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'A010010010100000009', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'A010010010100000010', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'A010010010100000011', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'A010010010100000012', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'A010010010100000013', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'A010010010100000014', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'A010010010100000015', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'A010010010100000016', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'A010010010100000017', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'A010010010100000018', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'A010010010100000019', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'A010010010100000020', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'A010010010100000021', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'A010010010100000022', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'A010010010100000023', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'A010010010100000024', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'A010010010100000025', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'A010010010100000026', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'A010010010100000027', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'A010010010100000028', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'A010010010100000029', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'A010010010100000030', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'A010010010100000031', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'A010010010100000032', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'A010010010100000033', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'A010010010100000034', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'A010010010100000035', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'A010010010100000036', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'A010010010100000037', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'A010010010100000038', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'A010010010100000039', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'A010010010100000040', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'A010010010100000041', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'A010010010100000042', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'A010010010100000043', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'A010010010100000044', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'A010010010100000045', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'A010010010100000046', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'A010010010100000047', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'A010010010100000048', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'A010010010100000049', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'A010010010100000050', '', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `negocio_settings`
--

CREATE TABLE IF NOT EXISTS `negocio_settings` (
  `nombre` varchar(255) DEFAULT NULL,
  `rnc` varchar(50) DEFAULT NULL,
  `direccion` text,
  `telefono1` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `itbis` double DEFAULT NULL,
  `moneda` varchar(5) DEFAULT NULL,
  `nota_factura` text,
  `nota_factura2` text NOT NULL,
  `showFax` enum('0','1') NOT NULL,
  `showWhatsapp` enum('0','1') NOT NULL,
  `showEmail` enum('0','1') NOT NULL,
  `showHeader` enum('0','1') NOT NULL,
  `showFooter` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negocio_settings`
--

INSERT INTO `negocio_settings` (`nombre`, `rnc`, `direccion`, `telefono1`, `fax`, `whatsapp`, `email`, `itbis`, `moneda`, `nota_factura`, `nota_factura2`, `showFax`, `showWhatsapp`, `showEmail`, `showHeader`, `showFooter`) VALUES
('Armeria MICROSPORT', '114-015608', 'C/Francia No.103 Santo Domingo, Gazcue D.N', '809-221-3948', '809-221-3948', '809-221-3948', 'armeriamicrosport@hotmail.com', 12, 'RD$', 'Ventas y Compras de Armas de Fuego & Accesorios en General', 'Gracias por su compra.\n<br /> \nFeliz Navidad !', '0', '0', '1', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factura_maestra`
--
ALTER TABLE `factura_maestra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_orden` (`numero_orden`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `ncf`
--
ALTER TABLE `ncf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `factura_maestra`
--
ALTER TABLE `factura_maestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `ncf`
--
ALTER TABLE `ncf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
