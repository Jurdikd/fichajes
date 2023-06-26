-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 15:00:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fichajes_fedeav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abecedario`
--

CREATE TABLE `abecedario` (
  `id_abc` int(11) NOT NULL,
  `letra_abc` varchar(2) NOT NULL,
  `nro_abc` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `abecedario`
--

INSERT INTO `abecedario` (`id_abc`, `letra_abc`, `nro_abc`) VALUES
(1, 'a', '01'),
(2, 'b', '02'),
(3, 'c', '03'),
(4, 'd', '04'),
(5, 'e', '05'),
(6, 'f', '06'),
(7, 'g', '07'),
(8, 'h', '08'),
(9, 'i', '09'),
(10, 'j', '10'),
(11, 'k', '11'),
(12, 'l', '12'),
(13, 'll', '13'),
(14, 'm', '14'),
(15, 'n', '15'),
(16, 'ñ', '16'),
(17, 'o', '17'),
(18, 'p', '18'),
(19, 'q', '19'),
(20, 'r', '20'),
(21, 's', '21'),
(22, 't', '22'),
(23, 'u', '23'),
(24, 'v', '24'),
(25, 'w', '25'),
(26, 'x', '26'),
(27, 'y', '27'),
(28, 'z', '28'),
(29, 'ch', '29'),
(30, 'bl', '30'),
(31, 'br', '31'),
(32, 'cl', '32'),
(33, 'cr', '33'),
(34, 'dr', '34'),
(35, 'fl', '35'),
(36, 'fr', '36'),
(37, 'pl', '37'),
(38, 'pr', '38'),
(39, 'tl', '39'),
(40, 'tr', '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id_accesos` int(11) NOT NULL,
  `vista_inicio` tinyint(1) NOT NULL,
  `vista_cargos` tinyint(1) NOT NULL,
  `vista_roles` tinyint(1) NOT NULL,
  `vista_usuarios` tinyint(1) NOT NULL,
  `fk_acceso_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id_accesos`, `vista_inicio`, `vista_cargos`, `vista_roles`, `vista_usuarios`, `fk_acceso_cargo`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 0, 0, 0, 0, 3),
(3, 1, 0, 0, 0, 4),
(4, 1, 0, 1, 0, 2),
(5, 1, 0, 0, 0, 6),
(6, 1, 0, 0, 0, 7),
(7, 1, 0, 0, 1, 8),
(8, 1, 0, 0, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(90) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_cargo` text COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_cargo` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `descripcion_cargo`, `codigo_cargo`) VALUES
(1, 'Supervisor', 'Supervisa el manejo de la plataforma y empleados', 'C2123'),
(2, 'Editor', 'Edita del sitio web (información y demás)', 'C0504'),
(3, 'Pedagogo', 'Se encarga de crear clases', 'C1805'),
(4, 'Editor del sitio', 'Se encarga de agregar o editar el sitio web', 'C0504'),
(6, 'Editor de clases', 'Se encarga de las clases', 'C0504'),
(7, 'Supervisor de sitio', 'Supervisa el manejo de la plataforma y empleados sobre el sitio', 'C2123'),
(8, 'Supervisor pedagogos', 'gdsfsdfsdfsdfsfsdfsdfsdfsdfse', 'C2123'),
(9, 'fiel', 'lkajdkljasd', 'C0609');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crear_patron`
--

CREATE TABLE `crear_patron` (
  `id_patron` int(11) NOT NULL,
  `id_usuario_patron` int(11) NOT NULL,
  `patron_temporal` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `url_secreta_patron` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_hora_patron` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `name_disciplina` varchar(255) NOT NULL,
  `name_short_disciplina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `name_disciplina`, `name_short_disciplina`) VALUES
(1, 'Ajedrez', 'ajedrez'),
(2, 'Baloncesto', 'baloncesto'),
(3, 'Billar', 'billar'),
(4, 'Bolas criollas', 'bolas_criollas'),
(5, 'Boliche', 'boliche'),
(6, 'Dominó', 'domino'),
(7, 'Fútbol sala', 'futbol_sala'),
(8, 'Kickingball', 'kickingball'),
(9, 'Maratón', 'maraton'),
(10, 'Natación', 'natacion'),
(11, 'Softball', 'softball'),
(12, 'Tenis de campo', 'tenis_de_campo'),
(13, 'Tenis de mesa', 'tenis_de_mesa'),
(14, 'Tiro', 'tiro'),
(15, 'Toros coleados', 'toros_coleados'),
(16, 'Voleibol', 'voleibol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisa`
--

CREATE TABLE `divisa` (
  `id_divisa` int(11) NOT NULL,
  `nombre_divisa` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `iso_divisa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_divisa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `divisa`
--

INSERT INTO `divisa` (`id_divisa`, `nombre_divisa`, `iso_divisa`, `codigo_divisa`) VALUES
(1, 'Afgani afgano', 'AFN', 971),
(2, 'Ariary malgache', 'MGA', 969),
(3, 'BAD UNIDAD DE CUENTAS', 'XUA', 965),
(4, 'Baht', 'THB', 764),
(6, 'Balboa', 'PAB', 590),
(7, 'Birr etíope', 'ETB', 230),
(8, 'Boliviano', 'BOB', 68),
(9, 'Bolívar Soberano', 'VES', 928),
(10, 'Cedi', 'GHS', 936),
(11, 'Chelín keniano', 'KES', 404),
(12, 'Chelín somalí', 'SOS', 706),
(13, 'Chelín tanzano', 'TZS', 834),
(14, 'Chelín ugandés', 'UGX', 800),
(15, 'Colón', 'SVC', 222),
(16, 'Colón costarricense', 'CRC', 188),
(17, 'Corona danesa', 'DKK', 208),
(18, 'Corona islandesa', 'ISK', 352),
(19, 'Corona noruega', 'NOK', 578),
(20, 'Corona sueca', 'SEK', 752),
(21, 'Czech Koruna', 'CZK', 203),
(22, 'Córdoba oro', 'NIO', 558),
(23, 'Dalasi', 'GMD', 270),
(24, 'Dinar', 'MKD', 807),
(25, 'Dinar argelino', 'DZD', 12),
(26, 'Dinar bareiní', 'BHD', 48),
(27, 'Dinar iraquí', 'IQD', 368),
(28, 'Dinar jordano', 'JOD', 400),
(29, 'Dinar kuwaití', 'KWD', 414),
(30, 'Dinar libio', 'LYD', 434),
(31, 'Dinar serbio', 'RSD', 941),
(32, 'Dinar tunecino', 'TND', 788),
(33, 'Dirham DE EAU', 'AED', 784),
(34, 'Dirham marroquí', 'MAD', 504),
(35, 'Dobra', 'STD', 678),
(36, 'Dong', 'VND', 704),
(37, 'Dram armenio', 'AMD', 51),
(38, 'Dírham marroquí', 'MAD', 504),
(39, 'Dólar australiano', 'AUD', 36),
(40, 'Dólar bahameño', 'BSD', 44),
(41, 'Dólar beliceño', 'BZD', 84),
(42, 'Dólar bermudeño', 'BMD', 60),
(43, 'Dólar canadiense', 'CAD', 124),
(44, 'Dólar de Barbados', 'BBD', 52),
(45, 'Dólar de Brunei', 'BND', 96),
(46, 'Dólar de Hong Kong', 'HKD', 344),
(47, 'Dólar de Islas Salomón', 'SBD', 90),
(48, 'Dólar de la Islas Cook', 'NZD', 554),
(49, 'Dólar de las Islas Cayman', 'KYD', 136),
(50, 'Dólar de Namibia', 'NAD', 516),
(51, 'Dólar de Singapur', 'SGD', 702),
(52, 'Dólar de Surinam', 'SRD', 968),
(53, 'Dólar de Trinidad y Tobago', 'TTD', 780),
(54, 'Dólar del Caribe Oriental', 'XCD', 951),
(55, 'Dólar estadounidense', 'USD', 840),
(56, 'Dólar estadounidense  (Next day)', 'USN', 997),
(57, 'Dólar fiyiano', 'FJD', 242),
(58, 'Dólar guyanés', 'GYD', 328),
(59, 'Dólar jamaiquino', 'JMD', 388),
(60, 'Dólar liberiano', 'LRD', 430),
(61, 'Dólar neozelandés', 'NZD', 554),
(62, 'Dólar tuvaluano', 'AUD', 36),
(63, 'Dólar zimbabuense', 'ZWL', 932),
(64, 'Escudo caboverdiano', 'CVE', 132),
(65, 'Euro', 'EUR', 978),
(66, 'Florín arubeño', 'AWG', 533),
(67, 'Florín holandés', 'ANG', 532),
(68, 'Forinto húngaro', 'HUF', 348),
(69, 'Franco burundés', 'BIF', 108),
(70, 'Franco CFA de África Central', 'XAF', 950),
(71, 'Franco CFA de África Occidental', 'XOF', 952),
(72, 'Franco CFP', 'XPF', 953),
(73, 'Franco comorense', 'KMF', 174),
(74, 'Franco congoleño', 'CDF', 976),
(75, 'Franco guineano', 'GNF', 324),
(76, 'Franco ruandés', 'RWF', 646),
(77, 'Franco suizo', 'CHF', 756),
(78, 'Franco WIR', 'CHW', 948),
(79, 'Franco yibutiano', 'DJF', 262),
(80, 'Gourde', 'HTG', 332),
(81, 'Grivnia', 'UAH', 980),
(82, 'Guaraní', 'PYG', 600),
(83, 'Kina', 'PGK', 598),
(84, 'Kip laosiano', 'LAK', 418),
(85, 'Kuna', 'HRK', 191),
(86, 'Kwacha malauí', 'MWK', 454),
(87, 'Kwacha zambiano', 'ZMW', 967),
(88, 'Kwanza angoleño', 'AOA', 973),
(89, 'Kyat birmano', 'MMK', 104),
(90, 'Lari', 'GEL', 981),
(91, 'Lek', 'ALL', 8),
(92, 'Lempira', 'HNL', 340),
(93, 'Leone', 'SLL', 694),
(94, 'Leu Moldavo', 'MDL', 498),
(95, 'Leu rumano', 'RON', 946),
(96, 'Lev', 'BGN', 975),
(97, 'Libra de Santa Helena', 'SHP', 654),
(98, 'Libra egipcia', 'EGP', 818),
(99, 'Libra esterlina', 'GBP', 826),
(100, 'Libra gibraltareña', 'GIP', 292),
(101, 'Libra libanesa', 'LBP', 422),
(102, 'Libra malvinense', 'FKP', 238),
(103, 'Libra siria', 'SYP', 760),
(104, 'Libra sudanesa', 'SDG', 938),
(105, 'Libra sursudanesa', 'SSP', 728),
(106, 'Lilangeni', 'SZL', 748),
(107, 'Lira turca', 'TRY', 949),
(108, 'Loti', 'LSL', 426),
(109, 'Manat azerbaiyano', 'AZN', 944),
(110, 'Manat turcomano', 'TMT', 934),
(111, 'Marco bosnioherzegovino', 'BAM', 977),
(112, 'Metical mozambiqueño', 'MZN', 943),
(113, 'Mvdol', 'BOV', 984),
(114, 'Naira', 'NGN', 566),
(115, 'Nakfa', 'ERN', 232),
(116, 'Ngultrum butanés', 'BTN', 64),
(117, 'Nuevo dólar de Taiwán', 'TWD', 901),
(118, 'Peso mexicano', 'MXN', 484),
(119, 'Peso argentino', 'ARS', 32),
(120, 'Peso chileno', 'CLP', 152),
(121, 'Peso colombiano', 'COP', 170);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_paises`
--

CREATE TABLE `estados_paises` (
  `id_estado_pais` int(11) NOT NULL,
  `estado_nom` varchar(30) NOT NULL,
  `iso_pais` varchar(3) NOT NULL,
  `fk_pais` int(11) DEFAULT NULL,
  `status_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados_paises`
--

INSERT INTO `estados_paises` (`id_estado_pais`, `estado_nom`, `iso_pais`, `fk_pais`, `status_estado`) VALUES
(524, 'Amazonas', 'VE', 232, 1),
(525, 'Anzoátegui', 'VE', 232, 1),
(526, 'Apure', 'VE', 232, 1),
(527, 'Aragua', 'VE', 232, 1),
(528, 'Barinas', 'VE', 232, 1),
(529, 'Bolívar', 'VE', 232, 1),
(530, 'Carabobo', 'VE', 232, 1),
(531, 'Cojedes', 'VE', 232, 1),
(532, 'Delta Amacuro', 'VE', 232, 1),
(533, 'Distrito Capital', 'VE', 232, 1),
(534, 'Falcón', 'VE', 232, 1),
(535, 'Guárico', 'VE', 232, 1),
(536, 'Lara', 'VE', 232, 1),
(537, 'Mérida', 'VE', 232, 1),
(538, 'Miranda', 'VE', 232, 1),
(539, 'Monagas', 'VE', 232, 1),
(540, 'Nueva Esparta', 'VE', 232, 1),
(541, 'Portuguesa', 'VE', 232, 1),
(542, 'Sucre', 'VE', 232, 1),
(543, 'Táchira', 'VE', 232, 1),
(544, 'Trujillo', 'VE', 232, 1),
(545, 'Vargas', 'VE', 232, 1),
(546, 'Yaracuy', 'VE', 232, 1),
(547, 'Zulia', 'VE', 232, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL,
  `nombre_estatus` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_hora_estatus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `nombre_estatus`, `fecha_hora_estatus`) VALUES
(1, 'Activo', NULL),
(2, 'Confirmando', NULL),
(3, 'Deshabilitado', NULL),
(4, 'Despedido', NULL),
(5, 'Retirado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais_origen` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre_pais` varchar(80) DEFAULT NULL,
  `divisa_pais` int(11) DEFAULT NULL,
  `codigo_area` varchar(4) NOT NULL,
  `status_pais` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais_origen`, `iso`, `nombre_pais`, `divisa_pais`, `codigo_area`, `status_pais`) VALUES
(1, 'AF', 'Afganistán', 1, '+93', 0),
(2, 'AX', 'Islas Gland', NULL, '+358', 0),
(3, 'AL', 'Albania', NULL, '+355', 0),
(4, 'DE', 'Alemania', NULL, '+49', 0),
(5, 'AD', 'Andorra', NULL, '+376', 0),
(6, 'AO', 'Angola', NULL, '+244', 0),
(7, 'AI', 'Anguilla', NULL, '+1', 0),
(8, 'AQ', 'Antártida', NULL, '+672', 0),
(9, 'AG', 'Antigua y Barbuda', NULL, '+1', 0),
(10, 'AN', 'Antillas Holandesas', NULL, '+599', 0),
(11, 'SA', 'Arabia Saudí', NULL, '+966', 0),
(12, 'DZ', 'Argelia', NULL, '+213', 0),
(13, 'AR', 'Argentina', 119, '+54', 0),
(14, 'AM', 'Armenia', NULL, '+374', 0),
(15, 'AW', 'Aruba', NULL, '+297', 0),
(16, 'AU', 'Australia', NULL, '+61', 0),
(17, 'AT', 'Austria', NULL, '+43', 0),
(18, 'AZ', 'Azerbaiyán', NULL, '+994', 0),
(19, 'BS', 'Bahamas', NULL, '+1', 0),
(20, 'BH', 'Bahréin', NULL, '+973', 0),
(21, 'BD', 'Bangladesh', NULL, '+880', 0),
(22, 'BB', 'Barbados', NULL, '+1', 0),
(23, 'BY', 'Bielorrusia', NULL, '+375', 0),
(24, 'BE', 'Bélgica', NULL, '+32', 0),
(25, 'BZ', 'Belice', NULL, '+501', 0),
(26, 'BJ', 'Benin', NULL, '+229', 0),
(27, 'BM', 'Bermudas', NULL, '+1', 0),
(28, 'BT', 'Bhután', NULL, '+975', 0),
(29, 'BO', 'Bolivia', NULL, '+591', 0),
(30, 'BA', 'Bosnia y Herzegovina', NULL, '+387', 0),
(31, 'BW', 'Botsuana', NULL, '+267', 0),
(32, 'BV', 'Isla Bouvet', NULL, '+47', 0),
(33, 'BR', 'Brasil', NULL, '+55', 0),
(34, 'BN', 'Brunéi', NULL, '+673', 0),
(35, 'BG', 'Bulgaria', NULL, '+359', 0),
(36, 'BF', 'Burkina Faso', NULL, '+226', 0),
(37, 'BI', 'Burundi', NULL, '+257', 0),
(38, 'CV', 'Cabo Verde', NULL, '+238', 0),
(39, 'KY', 'Islas Caimán', NULL, '+1', 0),
(40, 'KH', 'Camboya', NULL, '+855', 0),
(41, 'CM', 'Camerún', NULL, '+237', 0),
(42, 'CA', 'Canadá', NULL, '+1', 0),
(43, 'CF', 'República Centroafricana', NULL, '+236', 0),
(44, 'TD', 'Chad', NULL, '+235', 0),
(45, 'CZ', 'República Checa', NULL, '+420', 0),
(46, 'CL', 'Chile', 120, '+54', 0),
(47, 'CN', 'China', NULL, '+86', 0),
(48, 'CY', 'Chipre', NULL, '+357', 0),
(49, 'CX', 'Isla de Navidad', NULL, '+61', 0),
(50, 'VA', 'Ciudad del Vaticano', NULL, '+379', 0),
(51, 'CC', 'Islas Cocos', NULL, '+61', 0),
(52, 'CO', 'Colombia', 121, '+57', 0),
(53, 'KM', 'Comoras', NULL, '+269', 0),
(54, 'CD', 'República Democrática del Congo', NULL, '+243', 0),
(55, 'CG', 'Congo', NULL, '+242', 0),
(56, 'CK', 'Islas Cook', NULL, '+682', 0),
(57, 'KP', 'Corea del Norte', NULL, '+850', 0),
(58, 'KR', 'Corea del Sur', NULL, '+82', 0),
(59, 'CI', 'Costa de Marfil', NULL, '+255', 0),
(60, 'CR', 'Costa Rica', NULL, '+506', 0),
(61, 'HR', 'Croacia', NULL, '+385', 0),
(62, 'CU', 'Cuba', NULL, '+53', 0),
(63, 'DK', 'Dinamarca', NULL, '+45', 0),
(64, 'DM', 'Dominica', NULL, '+1', 0),
(65, 'DO', 'República Dominicana', NULL, '+1', 0),
(66, 'EC', 'Ecuador', NULL, '+593', 0),
(67, 'EG', 'Egipto', NULL, '+20', 0),
(68, 'SV', 'El Salvador', NULL, '+503', 0),
(69, 'AE', 'Emiratos Árabes Unidos', NULL, '+971', 0),
(70, 'ER', 'Eritrea', NULL, '+291', 0),
(71, 'SK', 'Eslovaquia', NULL, '+421', 0),
(72, 'SI', 'Eslovenia', NULL, '+386', 0),
(73, 'ES', 'España', 65, '+34', 0),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', NULL, '+1', 0),
(75, 'US', 'Estados Unidos', 55, '+1', 0),
(76, 'EE', 'Estonia', NULL, '+372', 0),
(77, 'ET', 'Etiopía', NULL, '+251', 0),
(78, 'FO', 'Islas Feroe', NULL, '+298', 0),
(79, 'PH', 'Filipinas', NULL, '+63', 0),
(80, 'FI', 'Finlandia', NULL, '+358', 0),
(81, 'FJ', 'Fiyi', NULL, '+679', 0),
(82, 'FR', 'Francia', 65, '+33', 0),
(83, 'GA', 'Gabón', NULL, '+241', 0),
(84, 'GM', 'Gambia', NULL, '+220', 0),
(85, 'GE', 'Georgia', NULL, '+995', 0),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', NULL, '+500', 0),
(87, 'GH', 'Ghana', NULL, '+233', 0),
(88, 'GI', 'Gibraltar', NULL, '+350', 0),
(89, 'GD', 'Granada', NULL, '+1', 0),
(90, 'GR', 'Grecia', NULL, '+30', 0),
(91, 'GL', 'Groenlandia', NULL, '+299', 0),
(92, 'GP', 'Guadalupe', NULL, '+590', 0),
(93, 'GU', 'Guam', NULL, '+1', 0),
(94, 'GT', 'Guatemala', NULL, '+502', 0),
(95, 'GF', 'Guayana Francesa', NULL, '+594', 0),
(96, 'GN', 'Guinea', NULL, '+224', 0),
(97, 'GQ', 'Guinea Ecuatorial', NULL, '+240', 0),
(98, 'GW', 'Guinea-Bissau', NULL, '+245', 0),
(99, 'GY', 'Guyana', NULL, '+592', 0),
(100, 'HT', 'Haití', NULL, '+509', 0),
(101, 'HM', 'Islas Heard y McDonald', NULL, '+0', 0),
(102, 'HN', 'Honduras', NULL, '+504', 0),
(103, 'HK', 'Hong Kong', NULL, '+852', 0),
(104, 'HU', 'Hungría', NULL, '+36', 0),
(105, 'IN', 'India', NULL, '+91', 0),
(106, 'ID', 'Indonesia', NULL, '+62', 0),
(107, 'IR', 'Irán', NULL, '+98', 0),
(108, 'IQ', 'Iraq', NULL, '+964', 0),
(109, 'IE', 'Irlanda', NULL, '+353', 0),
(110, 'IS', 'Islandia', NULL, '+354', 0),
(111, 'IL', 'Israel', NULL, '+972', 0),
(112, 'IT', 'Italia', NULL, '+39', 0),
(113, 'JM', 'Jamaica', NULL, '+1', 0),
(114, 'JP', 'Japón', NULL, '+81', 0),
(115, 'JO', 'Jordania', NULL, '+962', 0),
(116, 'KZ', 'Kazajstán', NULL, '+7', 0),
(117, 'KE', 'Kenia', NULL, '+254', 0),
(118, 'KG', 'Kirguistán', NULL, '+996', 0),
(119, 'KI', 'Kiribati', NULL, '+686', 0),
(120, 'KW', 'Kuwait', NULL, '+965', 0),
(121, 'LA', 'Laos', NULL, '+856', 0),
(122, 'LS', 'Lesotho', NULL, '+266', 0),
(123, 'LV', 'Letonia', NULL, '+371', 0),
(124, 'LB', 'Líbano', NULL, '+961', 0),
(125, 'LR', 'Liberia', NULL, '+231', 0),
(126, 'LY', 'Libia', NULL, '+218', 0),
(127, 'LI', 'Liechtenstein', NULL, '+423', 0),
(128, 'LT', 'Lituania', NULL, '+370', 0),
(129, 'LU', 'Luxemburgo', NULL, '+352', 0),
(130, 'MO', 'Macao', NULL, '+853', 0),
(131, 'MK', 'ARY Macedonia', NULL, '+389', 0),
(132, 'MG', 'Madagascar', NULL, '+261', 0),
(133, 'MY', 'Malasia', NULL, '+60', 0),
(134, 'MW', 'Malawi', NULL, '+265', 0),
(135, 'MV', 'Maldivas', NULL, '+960', 0),
(136, 'ML', 'Malí', NULL, '+223', 0),
(137, 'MT', 'Malta', NULL, '+356', 0),
(138, 'FK', 'Islas Malvinas', NULL, '+500', 0),
(139, 'MP', 'Islas Marianas del Norte', NULL, '+1', 0),
(140, 'MA', 'Marruecos', NULL, '+212', 0),
(141, 'MH', 'Islas Marshall', NULL, '+692', 0),
(142, 'MQ', 'Martinica', NULL, '+596', 0),
(143, 'MU', 'Mauricio', NULL, '+230', 0),
(144, 'MR', 'Mauritania', NULL, '+222', 0),
(145, 'YT', 'Mayotte', NULL, '262', 0),
(146, 'MX', 'Mexico', 118, '+52', 0),
(147, 'FM', 'Micronesia', NULL, '+691', 0),
(148, 'MD', 'Moldavia', NULL, '+373', 0),
(149, 'MC', 'Mónaco', NULL, '+377', 0),
(150, 'MN', 'Mongolia', NULL, '+976', 0),
(151, 'MS', 'Montserrat', NULL, '+1', 0),
(152, 'MZ', 'Mozambique', NULL, '+258', 0),
(153, 'MM', 'Myanmar', NULL, '+95', 0),
(154, 'NA', 'Namibia', NULL, '+264', 0),
(155, 'NR', 'Nauru', NULL, '+674', 0),
(156, 'NP', 'Nepal', NULL, '+977', 0),
(157, 'NI', 'Nicaragua', NULL, '+505', 0),
(158, 'NE', 'Níger', NULL, '+227', 0),
(159, 'NG', 'Nigeria', NULL, '+234', 0),
(160, 'NU', 'Niue', NULL, '+683', 0),
(161, 'NF', 'Isla Norfolk', NULL, '+672', 0),
(162, 'NO', 'Noruega', NULL, '+47', 0),
(163, 'NC', 'Nueva Caledonia', NULL, '+687', 0),
(164, 'NZ', 'Nueva Zelanda', NULL, '+64', 0),
(165, 'OM', 'Omán', NULL, '+968', 0),
(166, 'NL', 'Países Bajos', NULL, '+31', 0),
(167, 'PK', 'Pakistán', NULL, '+92', 0),
(168, 'PW', 'Palau', NULL, '+680', 0),
(169, 'PS', 'Palestina', NULL, '+970', 0),
(170, 'PA', 'Panamá', NULL, '+507', 0),
(171, 'PG', 'Papúa Nueva Guinea', NULL, '+675', 0),
(172, 'PY', 'Paraguay', NULL, '+595', 0),
(173, 'PE', 'Perú', NULL, '+51', 0),
(174, 'PN', 'Islas Pitcairn', NULL, '+64', 0),
(175, 'PF', 'Polinesia Francesa', NULL, '+689', 0),
(176, 'PL', 'Polonia', NULL, '+48', 0),
(177, 'PT', 'Portugal', NULL, '+351', 0),
(178, 'PR', 'Puerto Rico', NULL, '+1', 0),
(179, 'QA', 'Qatar', NULL, '+974', 0),
(180, 'GB', 'Reino Unido', NULL, '+44', 0),
(181, 'RE', 'Reunión', NULL, '+262', 0),
(182, 'RW', 'Ruanda', NULL, '+250', 0),
(183, 'RO', 'Rumania', NULL, '+40', 0),
(184, 'RU', 'Rusia', NULL, '+7', 0),
(185, 'EH', 'Sahara Occidental', NULL, '+212', 0),
(186, 'SB', 'Islas Salomón', NULL, '+677', 0),
(187, 'WS', 'Samoa', NULL, '+685', 0),
(188, 'AS', 'Samoa Americana', NULL, '+1', 0),
(189, 'KN', 'San Cristóbal y Nevis', NULL, '+1', 0),
(190, 'SM', 'San Marino', NULL, '+378', 0),
(191, 'PM', 'San Pedro y Miquelón', NULL, '+508', 0),
(192, 'VC', 'San Vicente y las Granadinas', NULL, '+1', 0),
(193, 'SH', 'Santa Helena', NULL, '+290', 0),
(194, 'LC', 'Santa Lucía', NULL, '+1', 0),
(195, 'ST', 'Santo Tomé y Príncipe', NULL, '+239', 0),
(196, 'SN', 'Senegal', NULL, '+221', 0),
(197, 'CS', 'Serbia y Montenegro', NULL, '+381', 0),
(198, 'SC', 'Seychelles', NULL, '+248', 0),
(199, 'SL', 'Sierra Leona', NULL, '+232', 0),
(200, 'SG', 'Singapur', NULL, '+65', 0),
(201, 'SY', 'Siria', NULL, '+963', 0),
(202, 'SO', 'Somalia', NULL, '+252', 0),
(203, 'LK', 'Sri Lanka', NULL, '+94', 0),
(204, 'SZ', 'Suazilandia', NULL, '+268', 0),
(205, 'ZA', 'Sudáfrica', NULL, '+27', 0),
(206, 'SD', 'Sudán', NULL, '+249', 0),
(207, 'SE', 'Suecia', NULL, '+46', 0),
(208, 'CH', 'Suiza', NULL, '+41', 0),
(209, 'SR', 'Surinam', NULL, '+597', 0),
(210, 'SJ', 'Svalbard y Jan Mayen', NULL, '+47', 0),
(211, 'TH', 'Tailandia', NULL, '+66', 0),
(212, 'TW', 'Taiwán', NULL, '+886', 0),
(213, 'TZ', 'Tanzania', NULL, '+255', 0),
(214, 'TJ', 'Tayikistán', NULL, '+992', 0),
(215, 'IO', 'Territorio Británico del Océano Índico', NULL, '+246', 0),
(216, 'TF', 'Territorios Australes Franceses', NULL, '+262', 0),
(217, 'TL', 'Timor Oriental', NULL, '+270', 0),
(218, 'TG', 'Togo', NULL, '+228', 0),
(219, 'TK', 'Tokelau', NULL, '+690', 0),
(220, 'TO', 'Tonga', NULL, '+676', 0),
(221, 'TT', 'Trinidad y Tobago', NULL, '+1', 0),
(222, 'TN', 'Túnez', NULL, '+216', 0),
(223, 'TC', 'Islas Turcas y Caicos', NULL, '+1', 0),
(224, 'TM', 'Turkmenistán', NULL, '+993', 0),
(225, 'TR', 'Turquía', NULL, '+90', 0),
(226, 'TV', 'Tuvalu', NULL, '+688', 0),
(227, 'UA', 'Ucrania', NULL, '+380', 0),
(228, 'UG', 'Uganda', NULL, '+256', 0),
(229, 'UY', 'Uruguay', NULL, '+598', 0),
(230, 'UZ', 'Uzbekistán', NULL, '+998', 0),
(231, 'VU', 'Vanuatu', NULL, '+678', 0),
(232, 'VE', 'Venezuela', 9, '+58', 1),
(233, 'VN', 'Vietnam', NULL, '+84', 0),
(234, 'VG', 'Islas Vírgenes Británicas', NULL, '+1', 0),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', NULL, '+1', 0),
(236, 'WF', 'Wallis y Futuna', NULL, '+681', 0),
(237, 'YE', 'Yemen', NULL, '+967', 0),
(238, 'DJ', 'Yibuti', NULL, '+253', 0),
(239, 'ZM', 'Zambia', NULL, '+260', 0),
(240, 'ZW', 'Zimbabue', NULL, '+263', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recupercion_clave`
--

CREATE TABLE `recupercion_clave` (
  `id_recuperar_clave` int(11) NOT NULL,
  `id_usuario_clave` int(11) NOT NULL,
  `url_secreta_clave` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_recuperacion_calve` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_disciplinas_users`
--

CREATE TABLE `registro_disciplinas_users` (
  `id_disciplinas_users` int(11) NOT NULL,
  `fk_disciplina` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_usuario_delegado` int(11) NOT NULL,
  `registro_disciplinas_users` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_disciplinas_users`
--

INSERT INTO `registro_disciplinas_users` (`id_disciplinas_users`, `fk_disciplina`, `fk_usuario`, `fk_usuario_delegado`, `registro_disciplinas_users`) VALUES
(1, 1, 2, 1, '2023-06-26 01:43:18'),
(2, 2, 2, 1, '2023-06-26 01:43:18'),
(5, 2, 1, 2, '2023-06-26 03:55:20'),
(42, 3, 33, 2, '2023-06-26 04:37:36'),
(43, 4, 33, 2, '2023-06-26 04:37:36'),
(44, 5, 33, 2, '2023-06-26 04:37:36'),
(45, 1, 34, 2, '2023-06-26 04:42:19'),
(46, 2, 34, 2, '2023-06-26 04:42:19'),
(47, 3, 34, 2, '2023-06-26 04:42:19'),
(48, 4, 34, 2, '2023-06-26 04:42:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuarios`
--

CREATE TABLE `registro_usuarios` (
  `id_registro_usuarios` int(11) NOT NULL,
  `fk_usuario_insertado` int(11) DEFAULT NULL,
  `fk_usuario_registro` int(11) DEFAULT NULL,
  `fecha_registro_usuario` datetime NOT NULL,
  `codigo_registro` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registro_usuarios`
--

INSERT INTO `registro_usuarios` (`id_registro_usuarios`, `fk_usuario_insertado`, `fk_usuario_registro`, `fecha_registro_usuario`, `codigo_registro`) VALUES
(50, 33, 2, '2023-06-26 04:37:36', '546-64994e5004a1e-16325468-terror-64994e5011d61'),
(51, 34, 2, '2023-06-26 04:42:19', '546-64994f6bab900-2122-terror-64994f6bbcc5f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_rol` text COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_rol` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`, `codigo_rol`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema a capacidades exclusivas', 'R0102'),
(2, 'Empleado', 'Acceso a capacidades moderadas dependiendo de la accesibilidad de los cargos', 'R0513'),
(3, 'Fichado', 'Sin Accesos', 'R0519'),
(4, 'Agencia delivery', 'Una agencia de delivery es organizada, sabe administrar los horarios y cuidar lo que ofrecen para otorgar el mejor servicio de mensajería posible.', 'R0104'),
(5, 'Negocio', 'Ocupación, actividad o trabajo que se realiza para obtener un beneficio, especialmente el que consiste en realizar operaciones comerciales, comprando y vendiendo mercancías o servicios.', 'R1605'),
(6, 'General', 'Acceso a areas generales como usuario comun', 'R0705');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `id_sexo` int(11) NOT NULL,
  `iso_sexo` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_sexo` varchar(9) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id_sexo`, `iso_sexo`, `nombre_sexo`) VALUES
(1, 'F', 'FEMENINO'),
(2, 'M', 'MASCULINO'),
(3, 'O', 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre2` varchar(225) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` text COLLATE utf8_spanish2_ci NOT NULL,
  `fk_sexo` int(11) NOT NULL DEFAULT 3,
  `fecha_nacimiento` date NOT NULL,
  `usuario` text COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_empleado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `inpre_abogado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fk_pais` int(11) NOT NULL DEFAULT 232,
  `fk_estado` int(11) NOT NULL,
  `clave` text COLLATE utf8_spanish2_ci NOT NULL,
  `patron` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_rol` int(11) NOT NULL DEFAULT 3,
  `fk_cargo` int(11) NOT NULL DEFAULT 4,
  `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  `fk_estatus` int(11) NOT NULL DEFAULT 3,
  `ultimo_login` datetime DEFAULT NULL,
  `edicion_u` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `registro_u` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `nombre2`, `apellido1`, `apellido2`, `cedula`, `fk_sexo`, `fecha_nacimiento`, `usuario`, `codigo_empleado`, `inpre_abogado`, `celular`, `correo`, `fk_pais`, `fk_estado`, `clave`, `patron`, `fk_rol`, `fk_cargo`, `imagen`, `fk_estatus`, `ultimo_login`, `edicion_u`, `registro_u`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '00000', 3, '1997-04-22', 'admin', '0', '', 'admin', 'admin', 232, 546, '$2a$07$asxx54ahjppf45sd87a5auP6B3tNcJoZA7LSAvd/JeANhDDO.7SKm', '$2a$07$asxx54ahjppf45sd87a5au.eEV.HpA/07Hzs2txw/vzZcEMXlkksi', 1, 1, 'img/img-usuarios/user-defecto/user.png', 1, NULL, '2023-06-24 18:02:45', '2020-11-02 17:54:17'),
(2, 'Jesús', 'Abraham', '', '', 'CI-58585', 2, '1997-04-22', 'terror', '5f10794b9c97c', '', '+584245649007', 'jesuscovo@gmail.com', 232, 546, '$2a$07$asxx54ahjppf45sd87a5au\\/k4FRqJVCYK8P.oWZNuDf\\/1iaWHS7Ky', '$2a$07$asxx54ahjppf45sd87a5auR3SilVI/sWNN.QBKO4Y3a3Wvyw1D40e', 1, 1, 'img/img-usuarios/Terror/terror.jpg', 1, NULL, '2023-06-26 08:59:53', '2020-11-14 14:30:29'),
(33, 'GUSTAVO', 'RAMON', 'LAYA', 'RARO', '16325468', 2, '2023-05-30', '546-64994e5004a1e-16325468', '546-64994e5004a1e', '1212', '424564905151', 'RSRSRSR@kskad.com', 232, 546, '', NULL, 3, 4, 'public/img/users/546-64994e5004a1e-16325468/546-64994e5004a1e-16325468.jpg', 3, NULL, NULL, '2023-06-26 04:37:36'),
(34, 'ANTON', 'RAMON', 'SAMORA', 'RARO', '2122', 2, '2023-06-06', '546-64994f6bab900-2122', '546-64994f6bab900', '1212', '1551654564', 'RSRSRSR@kskad.com', 232, 546, '', NULL, 3, 4, 'public/img/users/546-64994f6bab900-2122/546-64994f6bab900-2122.jpg', 3, NULL, NULL, '2023-06-26 04:42:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abecedario`
--
ALTER TABLE `abecedario`
  ADD PRIMARY KEY (`id_abc`);

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id_accesos`),
  ADD UNIQUE KEY `fk_acceso_rol` (`fk_acceso_cargo`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `crear_patron`
--
ALTER TABLE `crear_patron`
  ADD PRIMARY KEY (`id_patron`),
  ADD KEY `id_usuario` (`id_usuario_patron`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Indices de la tabla `divisa`
--
ALTER TABLE `divisa`
  ADD PRIMARY KEY (`id_divisa`);

--
-- Indices de la tabla `estados_paises`
--
ALTER TABLE `estados_paises`
  ADD PRIMARY KEY (`id_estado_pais`),
  ADD KEY `iso_pais` (`iso_pais`),
  ADD KEY `fk_pais` (`fk_pais`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais_origen`),
  ADD KEY `divisa_pais` (`divisa_pais`);

--
-- Indices de la tabla `recupercion_clave`
--
ALTER TABLE `recupercion_clave`
  ADD PRIMARY KEY (`id_recuperar_clave`),
  ADD KEY `id_usuario` (`id_usuario_clave`);

--
-- Indices de la tabla `registro_disciplinas_users`
--
ALTER TABLE `registro_disciplinas_users`
  ADD PRIMARY KEY (`id_disciplinas_users`),
  ADD UNIQUE KEY `fk_disciplina` (`fk_disciplina`,`fk_usuario`,`fk_usuario_delegado`),
  ADD KEY `registro_disciplina_users_ibfk_2` (`fk_usuario`),
  ADD KEY `registro_disciplina_users_ibfk_3` (`fk_usuario_delegado`);

--
-- Indices de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  ADD PRIMARY KEY (`id_registro_usuarios`),
  ADD KEY `fk_usuario_insertado` (`fk_usuario_insertado`),
  ADD KEY `fk_usuario_registro` (`fk_usuario_registro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_cargo` (`fk_cargo`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `fk_estatus` (`fk_estatus`),
  ADD KEY `fk_pais` (`fk_pais`),
  ADD KEY `fk_sexo` (`fk_sexo`),
  ADD KEY `fk_estado` (`fk_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abecedario`
--
ALTER TABLE `abecedario`
  MODIFY `id_abc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id_accesos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `crear_patron`
--
ALTER TABLE `crear_patron`
  MODIFY `id_patron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `divisa`
--
ALTER TABLE `divisa`
  MODIFY `id_divisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `estados_paises`
--
ALTER TABLE `estados_paises`
  MODIFY `id_estado_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais_origen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `recupercion_clave`
--
ALTER TABLE `recupercion_clave`
  MODIFY `id_recuperar_clave` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_disciplinas_users`
--
ALTER TABLE `registro_disciplinas_users`
  MODIFY `id_disciplinas_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  MODIFY `id_registro_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `accesos_ibfk_1` FOREIGN KEY (`fk_acceso_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `crear_patron`
--
ALTER TABLE `crear_patron`
  ADD CONSTRAINT `crear_patron_ibfk_1` FOREIGN KEY (`id_usuario_patron`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estados_paises`
--
ALTER TABLE `estados_paises`
  ADD CONSTRAINT `paises_estados` FOREIGN KEY (`fk_pais`) REFERENCES `paises` (`id_pais_origen`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`divisa_pais`) REFERENCES `divisa` (`id_divisa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recupercion_clave`
--
ALTER TABLE `recupercion_clave`
  ADD CONSTRAINT `recuperacion_clave_ibfk_1` FOREIGN KEY (`id_recuperar_clave`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_disciplinas_users`
--
ALTER TABLE `registro_disciplinas_users`
  ADD CONSTRAINT `registro_disciplina_users_ibfk_1` FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplinas` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_disciplina_users_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_disciplina_users_ibfk_3` FOREIGN KEY (`fk_usuario_delegado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  ADD CONSTRAINT `registro_usuarios_ibfk_1` FOREIGN KEY (`fk_usuario_insertado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_usuarios_ibfk_2` FOREIGN KEY (`fk_usuario_registro`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_cargo`) REFERENCES `cargo` (`id_cargo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`fk_estatus`) REFERENCES `estatus` (`id_estatus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_5` FOREIGN KEY (`fk_pais`) REFERENCES `paises` (`id_pais_origen`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_8` FOREIGN KEY (`fk_sexo`) REFERENCES `sexos` (`id_sexo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_9` FOREIGN KEY (`fk_estado`) REFERENCES `estados_paises` (`id_estado_pais`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
