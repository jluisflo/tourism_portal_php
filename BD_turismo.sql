-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 06:10:25
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `idCategoria` int(11) NOT NULL,
  `cat_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`idCategoria`, `cat_nombre`) VALUES
(2, 'Playas'),
(3, 'Volcanes'),
(4, 'Hoteles'),
(5, 'Sitio Aquelogico'),
(6, 'Zoologico'),
(7, 'Montaña'),
(8, 'Parque Acuatico'),
(11, 'Rio'),
(12, 'Pueblo Historico'),
(13, 'Ciudad'),
(14, 'Lago'),
(15, 'Religion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_contacto`
--

CREATE TABLE `tb_contacto` (
  `idContacto` int(11) NOT NULL,
  `con_nombre` varchar(100) NOT NULL,
  `con_email` varchar(100) NOT NULL,
  `con_asunto` varchar(100) NOT NULL,
  `con_mensaje` text NOT NULL,
  `con_contactante` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Esta tabla guarda los datos de un formulario de contacto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cotizacion`
--

CREATE TABLE `tb_cotizacion` (
  `idCotizacion` int(11) NOT NULL,
  `co_email` varchar(100) NOT NULL,
  `co_nombre` varchar(100) NOT NULL,
  `co_telefono` varchar(12) NOT NULL,
  `co_producto` varchar(250) NOT NULL,
  `co_detalles` text NOT NULL,
  `co_cotizante` varchar(7) NOT NULL,
  `co_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_cotizacion`
--

INSERT INTO `tb_cotizacion` (`idCotizacion`, `co_email`, `co_nombre`, `co_telefono`, `co_producto`, `co_detalles`, `co_cotizante`, `co_fecha`) VALUES
(8, 'jose@jose.com', 'jose', '22577777', 'Visita a playa sunzal', 'Para 20 personas empleados de una empresa', 'anonimo', '2017-06-05 22:56:57'),
(9, 'mail@mail.com', 'inditec', '22222222', 'Hospedaje', '2 noches en el pital  ', '18', '2017-06-05 23:12:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamentos`
--

CREATE TABLE `tb_departamentos` (
  `idDepartamento` int(11) NOT NULL,
  `dep_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Esta tabla guarda los departamentos de un pais';

--
-- Volcado de datos para la tabla `tb_departamentos`
--

INSERT INTO `tb_departamentos` (`idDepartamento`, `dep_nombre`) VALUES
(1, 'Ahuachapán'),
(2, 'Santa Ana'),
(3, 'Sonsonate'),
(4, 'La Libertad'),
(5, 'Chalatenango'),
(6, 'San Salvador'),
(7, 'Cuscatlán'),
(8, 'La Paz'),
(9, 'Cabañas'),
(10, 'San Vicente'),
(11, 'Usulután'),
(12, 'Morazán'),
(13, 'San Miguel'),
(14, 'La Unión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_destinos`
--

CREATE TABLE `tb_destinos` (
  `idDestino` int(11) NOT NULL,
  `des_nombre` varchar(100) NOT NULL,
  `des_descripcion` text NOT NULL,
  `des_idCategoria` int(11) NOT NULL,
  `des_idMunicipio` int(11) NOT NULL,
  `des_dirEspecifica` text NOT NULL,
  `des_imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_destinos`
--

INSERT INTO `tb_destinos` (`idDestino`, `des_nombre`, `des_descripcion`, `des_idCategoria`, `des_idMunicipio`, `des_dirEspecifica`, `des_imagen`) VALUES
(8, 'Playa Los Cóbanos ', 'es una de las playas más visitadas ', 2, 38, 'se encuentra pocos kilómetros después de Kilo 5 .', 'image002.jpg'),
(9, 'Juayúa ', 'Juayúa es un municipio del departamento de Sonsonate, El Salvador. Es parte del recorrido turístico denominado "Ruta de las Flores", en el occidente del país. Según el censo oficial de 2007, tiene una población de 24.465 habitantes.', 12, 43, 'Juayua', 'image001.jpg'),
(10, 'LAGO DE COATEPEQUE', 'El lago Coatepeque es un lago de origen volcánico, situado a 18 km al sur de la ciudad de Santa Ana en el municipio de El Congo. Tiene una altitud de 745 msnm y una superficie de 25.3 km². Además, su profundidad de 115 m', 14, 28, 'situado a 18 km al sur de la ciudad de Santa Ana en el municipio de El Congo.', 'image003.jpg'),
(11, 'CATEDRAL DE SANTA ANA', 'La Catedral de la Señora Santa Ana, es la iglesia principal de la diócesis católica de Santa Ana, en la ciudad de Santa Ana, El Salvador. Este templo tiene la advocación de la Señora Santa Ana, la madre de la Bienaventurada Virgen María.', 15, 34, 'Frente al Parque Libertad,, 1a Avenida Sur, Santa Ana, El Salvador', 'image004.jpg'),
(12, 'CASCADAS DE DON JUAN', 'Las Cascadas de Don Juan, en la Ruta de Las Flores, es un lugar para estar en contacto con la naturaleza, en un clima muy fresco Las cascadas están rodeadas de abundante vegetación, sus aguas frías caen desde una altura de 25 metros y se alimenta del nacimiento de agua que está a 500 metros de lugar, en el río San Juan.', 11, 7, 'Ruta de Las Flores (CA-8) y luego desvío hacia El Rosario/Jujutla, carretera nacional RN15', 'image005.jpg'),
(13, 'APANECA', 'Apaneca es una pequeña villa del departamento de Ahuachapán, es una clara muestra de la hermosura de la zona occidental de El Salvador y su potencial turístico. Cualquiera que sea su rumbo, sea por Santa Ana (vía Los Naranjos), Ahuachapán o Sonsonate, el camino propicia en el viajero un ánimo de increíble paz.', 12, 2, 'apaneca', 'image006.jpg'),
(14, 'Cerro Verde', 'Desde la reapertura del Parque Cerro Verde el 15 de diciembre del año 2002 ofrece a todos los turistas muchos cambios innovadores que con mucho esfuerzo hasta la fecha han sido satisfactorios. El Instituto Salvadoreño de Turismo ha trabajado junto a los "Guías Turísticos" para brindar a los turistas extranjeros y nacionales una interpretación del Reino Natural en una forma educativa y diferente. El proyecto de "Guías Turísticos" fue creado para involucrar a las personas de las comunidades aledañas al Cerro Verde, con el objetivo de brindar a los jóvenes una oportunidad de aprender y dedicar su tiempo en algo diferente al "Trabajo Agrícola".', 5, 28, 'llegar a "El Congo" por Sonsonate en el desvío de "Puerta Roja". Por bus en la terminal de occidente la ruta 201 que va hacia Santa Ana, luego la ruta 248 hacia el Parque Cerro Verde.', 'cerro-verde-volcan-izalco.jpg'),
(15, 'Chalchuapa', 'Chalchuapa es la cabecera del municipio del mismo nombre, situada al Oeste de la ciudad de Santa Ana, en una planicie al norte de la sierra Apaneca-Ilamatepec, siendo su elevación de 700 m SNM. Tiene conexión con San Salvador usando la carretera panamericana (CA- 1) hacia el occidente.', 5, 34, 'situada al Oeste de la ciudad de Santa Ana, en una planicie al norte de la sierra Apaneca-Ilamatepec, siendo su elevación de 700 m SNM. Tiene conexión con San Salvador', 'chalchuapa-church.jpg'),
(16, 'El Pital', 'El Pital es un área que tiene un microclima nebuloso, que en nuestro país solo puede encontrarse en el Parque Nacional Montecristo. La variedad de orquídeas es impresionante debido a los factores climatológicos: alta concentración de humedad, abundancia de vegetación en esa área específica.', 7, 167, 'El Pital esta situado a 93 km al norte de la ciudad de San Salvador y a 7 km de la villa de San Ignacio, en el departamento de Chalatenango.', 'el-pital-road.jpg'),
(17, 'Lago de ilopango', 'El lago de Ilopango es un lago de origen volcánico en El Salvador. Mide 8 x 11 km, tiene una superficie de 72 km² y una profundidad de 230 m.1 Se sitúa a una altitud de 440 msnm a 16 km de la ciudad San Salvador, entre los departamentos de San Salvador, Cuscatlán y La Paz. Es el lago natural más grande de El Salvador. Sus aguas con abundante pesca de mojarras, guapotes y juilines y propio para la navegación a vela o en embarcaciones de motor.', 14, 219, 'sitúa a una altitud de 440 msnm a 16 km de la ciudad San Salvador, entre los departamentos de San Salvador, Cuscatlán y La Paz.', 'image019.jpg'),
(18, 'Volcan de Conchagua', 'Una de las más bellas vistas de la costa salvadoreña la ofrece el Volcán de Conchagua, desde el cuál se puede apreciar las islas del Golfo de Fonseca (Meanguera, Meanguerita, Amapala, entre otras) así como la ciudad de La Unión, y diversas playas.', 3, 126, 'El Volcán de Conchagua se encuentra ubicado en el departamento de la Unión, en el municipio de Conchagua aproximadamente a unos 190 km de San Salvador, con una altura de 1,242 m SNM, formando parte de los paisajes de la costa salvadoreña', 'ConchaguaVolcano.jpg'),
(19, 'Citila', 'Fue el escenario de la última batalla del Cacique Copan Galel y aquí perdió su última batalla después de haber dejado atrás a su ciudad "Copan". Citala en lengua maya-chorti significa "Donde abundan las estrellas " o "Río de estrellas".', 5, 167, 'Geográficamente pertenece al departamento de Chalatenango.', 'citali.jpg'),
(20, 'Armenia', 'Armenia es cuna de la poetisa Carmen Branon, conocida en los círculos artísticos como Claudia Lars, el autor de "El Carbonero" Pancho Lara, Consuelo Suncin de Saint Exuperi, quien estuvo casada con el escritor y piloto Frances Antoinne de Saint Exuperi autor de "El Principito".', 5, 52, 'Armenia pertenece al departamento de Sonsonate.', 'armenia.jpg'),
(21, 'Lago Suchitlan ', 'Lago Suchitlán\r\nLago Suchitlan, también llamado Cerrón Grande, es compartido por cuatro departamentos del centro y norte de El Salvador. El acceso más rápido es por la ciudad de Suchitoto.', 14, 210, 'lugar turístico Lago Suchitlán en Suchitoto, departamento de Cuscatlán, El Salvador.', 'lago-suchitlan.jpg'),
(22, 'El Imposible', 'El Imposible es uno de los últimos bosques secos tropicales de El Salvador, donde podemos ver más de 250 especies de aves (migratorias y endémicas), mamíferos e insectos, además de la vegetación propia del lugar.', 5, 1, 'Departamento de Ahuachapán, El Salvador', 'bosque-el-imposible.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle`
--

CREATE TABLE `tb_detalle` (
  `idDetalle` int(11) NOT NULL,
  `de_idFactura` int(11) NOT NULL,
  `de_idProducto` int(11) NOT NULL,
  `de_cantidad` int(11) NOT NULL,
  `de_precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuesta`
--

CREATE TABLE `tb_encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `pregunta1` text NOT NULL,
  `pregunta2` text NOT NULL,
  `pregunta3` text NOT NULL,
  `pregunta4` text NOT NULL,
  `pregunta5` text NOT NULL,
  `pregunta6` text NOT NULL,
  `pregunta7` text NOT NULL,
  `pregunta8` text NOT NULL,
  `pregunta9` text NOT NULL,
  `pregunta10` text NOT NULL,
  `pregunta11` text NOT NULL,
  `pregunta12` text NOT NULL,
  `pregunta13` text NOT NULL,
  `pregunta14` text NOT NULL,
  `pregunta15` text NOT NULL,
  `pregunta16` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Esta tabla guarda las respuestas de una encuesta.';

--
-- Volcado de datos para la tabla `tb_encuesta`
--

INSERT INTO `tb_encuesta` (`idEncuesta`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`, `pregunta16`) VALUES
(13, 'Femenino', '20 años o menos', '11', 'Si', 'Mensualmente', 'Turismo Cultural,Otro', 'Televisión,Internet', 'Conocer nuevos lugares', 'Si', '100', 'Aveces', 'No', 'Si', 'No', 'Si', 'Porque afecta a la confianza del turista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `idFactura` int(11) NOT NULL,
  `fa_idCliente` int(11) NOT NULL,
  `fa_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fa_idPago` int(11) NOT NULL,
  `fa_departamento` varchar(50) NOT NULL,
  `fa_ciudad` varchar(50) NOT NULL,
  `fa_direccion` varchar(50) NOT NULL,
  `fa_pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipios`
--

CREATE TABLE `tb_municipios` (
  `idMunicipio` int(11) NOT NULL,
  `mu_nombre` varchar(100) NOT NULL,
  `mu_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_municipios`
--

INSERT INTO `tb_municipios` (`idMunicipio`, `mu_nombre`, `mu_idDepartamento`) VALUES
(1, 'Ahuachapán ', 1),
(2, 'Apaneca ', 1),
(3, 'Atiquizaya ', 1),
(4, 'Concepción de Ataco ', 1),
(5, 'El Refugio ', 1),
(6, 'Guaymango ', 1),
(7, 'Jujutla ', 1),
(8, 'San Francisco Menéndez ', 1),
(9, 'San Lorenzo ', 1),
(10, 'San Pedro Puxtla ', 1),
(11, 'Tacuba ', 1),
(12, 'Turín', 1),
(13, 'Ahuachapán', 1),
(14, 'Jujutla', 1),
(15, 'Atiquizaya', 1),
(16, 'Concepción de Ataco', 1),
(17, 'El Refugio', 1),
(18, 'Guaymango', 1),
(19, 'Apaneca', 1),
(20, 'San Francisco Menéndez', 1),
(21, 'San Lorenzo', 1),
(22, 'San Pedro Puxtla', 1),
(23, 'Tacuba', 1),
(24, 'Turín', 1),
(25, 'Candelaria de la Frontera', 2),
(26, 'Chalchuapa', 2),
(27, 'Coatepeque', 2),
(28, 'El Congo', 2),
(29, 'El Porvenir', 2),
(30, 'Masahuat', 2),
(31, 'Metapán', 2),
(32, 'San Antonio Pajonal', 2),
(33, 'San Sebastián Salitrillo', 2),
(34, 'Santa Ana', 2),
(35, 'Santa Rosa Guachipilín', 2),
(36, 'Santiago de la Frontera', 2),
(37, 'Texistepeque', 2),
(38, 'Acajutla', 3),
(39, 'Armenia', 3),
(40, 'Caluco', 3),
(41, 'Cuisnahuat', 3),
(42, 'Izalco', 3),
(43, 'Juayúa', 3),
(44, 'Nahuizalco', 3),
(45, 'Nahulingo', 3),
(46, 'Salcoatitán', 3),
(47, 'San Antonio del Monte', 3),
(48, 'San Julián', 3),
(49, 'Santa Catarina Masahuat', 3),
(50, 'Santa Isabel Ishuatán', 3),
(51, 'Santo Domingo de Guzmán', 3),
(52, 'Sonsonate', 3),
(53, 'Sonzacate', 3),
(54, 'Alegría', 11),
(55, 'Berlín', 11),
(56, 'California', 11),
(57, 'Concepción Batres', 11),
(58, 'El Triunfo', 11),
(59, 'Ereguayquín', 11),
(60, 'Estanzuelas', 11),
(61, 'Jiquilisco', 11),
(62, 'Jucuapa', 11),
(63, 'Jucuarán', 11),
(64, 'Mercedes Umaña', 11),
(65, 'Nueva Granada', 11),
(66, 'Ozatlán', 11),
(67, 'Puerto El Triunfo', 11),
(68, 'San Agustín', 11),
(69, 'San Buenaventura', 11),
(70, 'San Dionisio', 11),
(71, 'San Francisco Javier', 11),
(72, 'Santa Elena', 11),
(73, 'Santa María', 11),
(74, 'Santiago de María', 11),
(75, 'Tecapán', 11),
(76, 'Usulután', 11),
(77, 'Carolina', 13),
(78, 'Chapeltique', 13),
(79, 'Chinameca', 13),
(80, 'Chirilagua', 13),
(81, 'Ciudad Barrios', 13),
(82, 'Comacarán', 13),
(83, 'El Tránsito', 13),
(84, 'Lolotique', 13),
(85, 'Moncagua', 13),
(86, 'Nueva Guadalupe', 13),
(87, 'Nuevo Edén de San Juan', 13),
(88, 'Quelepa', 13),
(89, 'San Antonio del Mosco', 13),
(90, 'San Gerardo', 13),
(91, 'San Jorge', 13),
(92, 'San Luis de la Reina', 13),
(93, 'San Miguel', 13),
(94, 'San Rafael Oriente', 13),
(95, 'Sesori', 13),
(96, 'Uluazapa', 13),
(97, 'Arambala', 12),
(98, 'Cacaopera', 12),
(99, 'Chilanga', 12),
(100, 'Corinto', 12),
(101, 'Delicias de Concepción', 12),
(102, 'El Divisadero', 12),
(103, 'El Rosario (Morazán)', 12),
(104, 'Gualococti', 12),
(105, 'Guatajiagua', 12),
(106, 'Joateca', 12),
(107, 'Jocoaitique', 12),
(108, 'Jocoro', 12),
(109, 'Lolotiquillo', 12),
(110, 'Meanguera', 12),
(111, 'Osicala', 12),
(112, 'Perquín', 12),
(113, 'San Carlos', 12),
(114, 'San Fernando (Morazán)', 12),
(115, 'San Francisco Gotera', 12),
(116, 'San Isidro (Morazán)', 12),
(117, 'San Simón', 12),
(118, 'Sensembra', 12),
(119, 'Sociedad', 12),
(120, 'Torola', 12),
(121, 'Yamabal', 12),
(122, 'Yoloaiquín', 12),
(123, 'La Unión', 14),
(124, 'San Alejo', 14),
(125, 'Yucuaiquín', 14),
(126, 'Conchagua', 14),
(127, 'Intipucá', 14),
(128, 'San José', 14),
(129, 'El Carmen (La Unión)', 14),
(130, 'Yayantique', 14),
(131, 'Bolívar', 14),
(132, 'Meanguera del Golfo', 14),
(133, 'Santa Rosa de Lima', 14),
(134, 'Pasaquina', 14),
(135, 'Anamoros', 14),
(136, 'Nueva Esparta', 14),
(137, 'El Sauce', 14),
(138, 'Concepción de Oriente', 14),
(139, 'Polorós', 14),
(140, 'Lislique', 14),
(141, 'Antiguo Cuscatlán', 4),
(142, 'Chiltiupán', 4),
(143, 'Ciudad Arce', 4),
(144, 'Colón', 4),
(145, 'Comasagua', 4),
(146, 'Huizúcar', 4),
(147, 'Jayaque', 4),
(148, 'Jicalapa', 4),
(149, 'La Libertad', 4),
(150, 'Santa Tecla', 4),
(151, 'Nuevo Cuscatlán', 4),
(152, 'San Juan Opico', 4),
(153, 'Quezaltepeque', 4),
(154, 'Sacacoyo', 4),
(155, 'San José Villanueva', 4),
(156, 'San Matías', 4),
(157, 'San Pablo Tacachico', 4),
(158, 'Talnique', 4),
(159, 'Tamanique', 4),
(160, 'Teotepeque', 4),
(161, 'Tepecoyo', 4),
(162, 'Zaragoza', 4),
(163, 'Agua Caliente', 5),
(164, 'Arcatao', 5),
(165, 'Azacualpa', 5),
(166, 'Cancasque', 5),
(167, 'Chalatenango', 5),
(168, 'Citalá', 5),
(169, 'Comapala', 5),
(170, 'Concepción Quezaltepeque', 5),
(171, 'Dulce Nombre de María', 5),
(172, 'El Carrizal', 5),
(173, 'El Paraíso', 5),
(174, 'La Laguna', 5),
(175, 'La Palma', 5),
(176, 'La Reina', 5),
(177, 'Las Vueltas', 5),
(178, 'Nueva Concepción', 5),
(179, 'Nueva Trinidad', 5),
(180, 'Nombre de Jesús', 5),
(181, 'Ojos de Agua', 5),
(182, 'Potonico', 5),
(183, 'San Antonio de la Cruz', 5),
(184, 'San Antonio Los Ranchos', 5),
(185, 'San Fernando (Chalatenango)', 5),
(186, 'San Francisco Lempa', 5),
(187, 'San Francisco Morazán', 5),
(188, 'San Ignacio', 5),
(189, 'San Isidro Labrador', 5),
(190, 'Las Flores', 5),
(191, 'San Luis del Carmen', 5),
(192, 'San Miguel de Mercedes', 5),
(193, 'San Rafael', 5),
(194, 'Santa Rita', 5),
(195, 'Tejutla', 5),
(196, 'Cojutepeque', 7),
(197, 'Candelaria', 7),
(198, 'El Carmen (Cuscatlán)', 7),
(199, 'El Rosario (Cuscatlán)', 7),
(200, 'Monte San Juan', 7),
(201, 'Oratorio de Concepción', 7),
(202, 'San Bartolomé Perulapía', 7),
(203, 'San Cristóbal', 7),
(204, 'San José Guayabal', 7),
(205, 'San Pedro Perulapán', 7),
(206, 'San Rafael Cedros', 7),
(207, 'San Ramón', 7),
(208, 'Santa Cruz Analquito', 7),
(209, 'Santa Cruz Michapa', 7),
(210, 'Suchitoto', 7),
(211, 'Tenancingo', 7),
(212, 'Aguilares', 6),
(213, 'Apopa', 6),
(214, 'Ayutuxtepeque', 6),
(215, 'Cuscatancingo', 6),
(216, 'Ciudad Delgado', 6),
(217, 'El Paisnal', 6),
(218, 'Guazapa', 6),
(219, 'Ilopango', 6),
(220, 'Mejicanos', 6),
(221, 'Nejapa', 6),
(222, 'Panchimalco', 6),
(223, 'Rosario de Mora', 6),
(224, 'San Marcos', 6),
(225, 'San Martín', 6),
(226, 'San Salvador', 6),
(227, 'Santiago Texacuangos', 6),
(228, 'Santo Tomás', 6),
(229, 'Soyapango', 6),
(230, 'Tonacatepeque', 6),
(231, 'Zacatecoluca', 8),
(232, 'Cuyultitán', 8),
(233, 'El Rosario (La Paz)', 8),
(234, 'Jerusalén', 8),
(235, 'Mercedes La Ceiba', 8),
(236, 'Olocuilta', 8),
(237, 'Paraíso de Osorio', 8),
(238, 'San Antonio Masahuat', 8),
(239, 'San Emigdio', 8),
(240, 'San Francisco Chinameca', 8),
(241, 'San Pedro Masahuat', 8),
(242, 'San Juan Nonualco', 8),
(243, 'San Juan Talpa', 8),
(244, 'San Juan Tepezontes', 8),
(245, 'San Luis La Herradura', 8),
(246, 'San Luis Talpa', 8),
(247, 'San Miguel Tepezontes', 8),
(248, 'San Pedro Nonualco', 8),
(249, 'San Rafael Obrajuelo', 8),
(250, 'Santa María Ostuma', 8),
(251, 'Santiago Nonualco', 8),
(252, 'Tapalhuaca', 8),
(253, 'Cinquera', 9),
(254, 'Dolores', 9),
(255, 'Guacotecti', 9),
(256, 'Ilobasco', 9),
(257, 'Jutiapa', 9),
(258, 'San Isidro (Cabañas)', 9),
(259, 'Sensuntepeque', 9),
(260, 'Tejutepeque', 9),
(261, 'Victoria', 9),
(262, 'Apastepeque', 10),
(263, 'Guadalupe', 10),
(264, 'San Cayetano Istepeque', 10),
(265, 'San Esteban Catarina', 10),
(266, 'San Ildefonso', 10),
(267, 'San Lorenzo', 10),
(268, 'San Sebastián', 10),
(269, 'San Vicente', 10),
(270, 'Santa Clara', 10),
(271, 'Santo Domingo', 10),
(272, 'Tecoluca', 10),
(273, 'Tepetitán', 10),
(274, 'Verapaz', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pago`
--

CREATE TABLE `tb_pago` (
  `idPago` int(11) NOT NULL,
  `pag_monto` decimal(19,2) NOT NULL,
  `pag_tarjeta` int(11) NOT NULL,
  `pag_nombre` varchar(50) NOT NULL,
  `pag_ccv` int(11) NOT NULL,
  `pag_expira` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paquetes`
--

CREATE TABLE `tb_paquetes` (
  `idPaquete` int(11) NOT NULL,
  `pa_titulo` varchar(250) NOT NULL,
  `pa_descripcion` text NOT NULL,
  `pa_precio` decimal(19,2) NOT NULL,
  `pa_idDestino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_paquetes`
--

INSERT INTO `tb_paquetes` (`idPaquete`, `pa_titulo`, `pa_descripcion`, `pa_precio`, `pa_idDestino`) VALUES
(1, 'Viaje al pital12', '# noches con todos los gastos de comida12', '12.00', 7),
(3, 'Paseo safari', 'Todo la visita guiada con expertos', '125.00', 7),
(5, 'Surf con profesionales', 'Disfruta del club de surf rodeado de surfistas profesionales.', '19.99', 8),
(6, 'Viaje natural, Laguna verde', 'Se visitaran los lugares ecologicos como son Laguna Verde y realizar actividades como Canopy', '25.00', 13),
(7, 'Delicias Gastronicas', 'Visita una de las ciudades que conforma la Ruta de las Flores, famosa por sus festivales gastronómicos cada fin de semana.', '20.00', 9),
(8, 'Viaje a la Ciudad Morena', 'Visita de una de las edificaciones mas significativas de nuestro pais, Parroquia construida entre 1975 y1576.', '25.00', 11),
(9, 'Disfruta de un paseo por todo el pueblo', 'Todo incluido, transporte y entradas a lugares del mismo lugar', '19.99', 13),
(10, 'Paseo en bote', 'Muchas sorpresas mas, ademas contamos con guía turistico.', '5.00', 17),
(11, 'Paseo en bote en lago suchitlan', 'Con total seguridad y guía incluido.', '6.99', 21),
(12, 'Camping 3 dias con guias', 'Personal de seguridad incluido y transporte.', '10.00', 16),
(13, 'Caminata increíble con guia', 'Vamos hasta la cima del volcan.', '8.00', 18),
(14, 'Camping con accesorios para camping incluidos', 'Todo incluido menos alimentos', '10.00', 22),
(15, 'Visita guiada por todo chalchuapa', 'Conoceremos todos los lugares preciosos de chalchuapa', '10.00', 15),
(16, 'Conoce armenia lugar increible', 'Disfrutaremos de todos ', '9.99', 20),
(17, 'Visita juayúa y sus hermosos lugares', 'Visitaremos la parroquia, ferias gastronomicas y rios.', '9.99', 9),
(18, 'Conoce todo citilia por 4 dias', 'Transporte y hotel', '20.00', 19),
(19, 'Caminata por el cerro verdo', 'Seguridad, transporte y accesorios para la caminata', '15.00', 14),
(20, 'Paseo en bote y fiesta abordo', 'Artista abordo y muchas sorpresas mas. ', '19.00', 10),
(21, 'Camping cerca de las cascadas don juan', 'Tienda para acampar, transporte y personal guia y de seguridad incluida', '11.99', 12),
(22, 'Comida ilimitada en restaurante ilopaneca', 'Artistas invitados', '25.00', 17),
(23, 'Fiesta con artistas invitados en rancho cobanos', 'Estará increíble con aperitivos y bebidas ilimitadas', '20.00', 8),
(24, 'Camping y fiesta gastronómica ', 'Con muchas sorpresas todo incluido con transporte y alimentación.', '25.00', 22),
(25, 'Fiesta con comida ilimitada', 'Artistas invitados', '20.00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `u_nombre` varchar(100) NOT NULL,
  `u_apellido` varchar(100) NOT NULL,
  `u_usuario` varchar(100) NOT NULL,
  `u_clave` varchar(100) NOT NULL,
  `u_tipoCuenta` varchar(25) NOT NULL,
  `u_fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`idUsuario`, `u_nombre`, `u_apellido`, `u_usuario`, `u_clave`, `u_tipoCuenta`, `u_fechaRegistro`) VALUES
(1, 'user', 'default', 'admin', '123456', 'administrador', '2017-04-11 01:50:14'),
(4, 'JOSE LUIS', 'FLORES VASQUEZ', '2533982015@mail.utec.edu.sv', '2533982015', 'normal', '2017-05-22 21:41:14'),
(5, 'MANUEL AQUILES', 'CRUZ UMAÑA', '2520052015@mail.utec.edu.sv', '2520052015', 'normal', '2017-04-12 05:57:24'),
(6, 'JOSE SAUL', 'UMAÑA JULIAN', '2528482015@mail.utec.edu.sv', '2528482015', 'normal', '2017-04-12 05:57:24'),
(7, 'SOFIA BEATRIZ', 'MORALES MIRANDA', '1532612010@mail.utec.edu.sv', '1532612010', 'normal', '2017-04-12 05:57:24'),
(8, 'CRISSIA ESMERALDA', 'PAREDES RIVAS', '1525252012@mail.utec.edu.sv', '1525252012', 'normal', '2017-04-12 05:57:24'),
(9, 'LUIS RICARDO', 'PALACIOS PORTILLO', '2540942015@mail.utec.edu.sv', '2540942015', 'normal', '2017-04-12 05:57:24'),
(18, 'Tomas', 'Urbina', 'tomas.urbina@mail.utec.edu.sv', 'tomas', 'normal', '2017-06-09 04:00:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `tb_contacto`
--
ALTER TABLE `tb_contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `tb_cotizacion`
--
ALTER TABLE `tb_cotizacion`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `id_destino` (`co_producto`);

--
-- Indices de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `tb_destinos`
--
ALTER TABLE `tb_destinos`
  ADD PRIMARY KEY (`idDestino`),
  ADD KEY `idMunicipio` (`des_idMunicipio`),
  ADD KEY `id_Categoria` (`des_idCategoria`);

--
-- Indices de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `tb_encuesta`
--
ALTER TABLE `tb_encuesta`
  ADD PRIMARY KEY (`idEncuesta`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `idDepartamento` (`mu_idDepartamento`);

--
-- Indices de la tabla `tb_pago`
--
ALTER TABLE `tb_pago`
  ADD PRIMARY KEY (`idPago`);

--
-- Indices de la tabla `tb_paquetes`
--
ALTER TABLE `tb_paquetes`
  ADD PRIMARY KEY (`idPaquete`),
  ADD KEY `idDestino` (`pa_idDestino`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tb_contacto`
--
ALTER TABLE `tb_contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_cotizacion`
--
ALTER TABLE `tb_cotizacion`
  MODIFY `idCotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tb_destinos`
--
ALTER TABLE `tb_destinos`
  MODIFY `idDestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tb_encuesta`
--
ALTER TABLE `tb_encuesta`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT de la tabla `tb_pago`
--
ALTER TABLE `tb_pago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_paquetes`
--
ALTER TABLE `tb_paquetes`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
