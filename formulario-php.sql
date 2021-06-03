-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 21:54:29
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario-php`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_usuarios` ()  SELECT CONCAT(codigo,id) codigo, id, ci, nombre, apellido, telefono, correo, direccion, fecha_nacimiento, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, fecha_ingreso, estado FROM datos_usuarios WHERE estado = 'activo' ORDER BY id DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_usuarios_completos` ()  SELECT CONCAT(codigo,id) codigo, id, ci, nombre, apellido, telefono, correo, direccion, fecha_nacimiento, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, fecha_ingreso, estado, archivo FROM datos_usuarios ORDER BY id = '$id' DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `codigo` varchar(250) NOT NULL DEFAULT 'cod-',
  `id` int(11) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(200) NOT NULL DEFAULT 'activo',
  `archivo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`codigo`, `id`, `ci`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`, `fecha_nacimiento`, `fecha_ingreso`, `estado`, `archivo`) VALUES
('cod-', 1, '5224071', 'Diego Andres', 'Benitez Mendoza', '0982172373', 'andres.intech94@gmail.com', 'Ypane Barrio San Francisco', '1994-11-24', '2021-03-31 16:35:38', 'activo', '../archivos/31-03-21-18-35-38-20180322_194414.jpg'),
('cod-', 2, '1048292', 'Esmelda Nanci', 'Benitez Mendoza', '0981755163', 'esmelda1960@gmail.com.py', 'Ypane Barrio San Francisco De Asis', '1960-07-19', '2021-03-31 16:40:12', 'activo', '../archivos/31-03-21-18-40-12-images.jpg'),
('cod-', 3, '5220222', 'Gustavo Adolfo', 'Benitez Villamayor', '0982172374', 'gus@gmail.com.py', 'Ypane Barrio Cicloncito', '1983-01-16', '2021-04-01 20:33:18', 'activo', '../archivos/01-04-21-22-33-18-174861739-612x612.jpg'),
('cod-', 4, '1700852', 'Julio Osvaldo', 'Dominguez Dibb', '098100000', 'julio@odd.com.py', 'Asuncion Barrio San Jose', '1990-04-05', '2021-04-02 15:52:45', 'activo', '../archivos/02-04-21-17-52-45-8322.jpg'),
('cod-', 5, '1077555', 'Guillermo Enrique', 'Lopez Nuñez', '0992540658', 'guille.lopez@gmail.com.py', 'San Antonio Barrio Pechugon', '1994-03-24', '2021-04-03 17:49:23', 'activo', '../archivos/03-04-21-19-49-23-8322.jpg'),
('cod-', 6, '2589632', 'Gilberto Andres', 'Centurion Zayas', '0985302014', 'gilberto.199@gmail.com.py', 'Ypane Barrio San Isidro 404', '1988-02-01', '2021-04-06 01:09:18', 'activo', '../archivos/06-04-21-03-09-18-UploadFotoPath.do.jpg'),
('cod-', 7, '2589632', 'Pedro Pablo', 'Castillo Sanabria', '0984220047', 'pedro.ventas@ufinet.com.py', 'ñemby Barrio La Lomita Kennedy', '1992-01-05', '2021-04-06 18:05:16', 'activo', '../archivos/06-04-21-20-05-16-20180322_194414.jpg'),
('cod-', 8, '4589621', 'Dayhana Cristina', 'Torres Vier', '0981252525', 'dayto.too@gmail.com.py', 'Ypane Barrio San Francisco', '1992-12-31', '2021-04-09 19:44:18', 'activo', '../archivos/09-04-21-21-44-18-foto-carnet-fondo-celeste.jpg'),
('cod-', 9, '5212369', 'Vicente Ignacio', 'Iturbe Troche', '0974172373', 'vicente@teisa.com.py', 'Asuncion Barrio San Jorge', '1990-04-12', '2021-04-14 14:44:25', 'activo', '../archivos/14-04-21-16-44-25-hombres_maridables_sam_worthington.jpg'),
('cod-', 10, '1047896', 'Maria Angelica', 'Galeano Perrone', '0987125789', 'maria@ventas.com.py', 'Asuncion Barrio Loma Pyta', '1987-04-06', '2021-04-16 19:01:32', 'activo', '../archivos/16-04-21-21-01-32-foto-carnet-fondo-celeste.jpg'),
('cod-', 11, '1478963', 'Maria Mercedes', 'Rojas Ayala', '0981808080', 'maria.rojas@tarjeta.com.py', 'Ypane Barrio San Luis Campo Alto', '1950-11-06', '2021-04-20 18:22:33', 'activo', '../archivos/20-04-21-20-22-32-foto-carnet-fondo-celeste.jpg'),
('cod-', 12, '4200369', 'Jose Saturnino', 'Cardozo Pereira', '098455889', 'jose.delantero@toluca.com.mx', 'Toluca 1359', '1980-02-06', '2021-04-21 18:30:53', 'activo', '../archivos/21-04-21-20-30-53-ed2ea302d102aa3cfe1c88d446ac16.png'),
('cod-', 13, '1047893', 'Analia Ines Soledad', 'Morinigo Benitez', '0981147896', 'analia.rivas@ufinet.com.py', 'Asuncion Barrio San Antonio', '1970-01-06', '2021-04-21 19:39:46', 'activo', '../archivos/21-04-21-21-39-46-images.jpg'),
('cod-', 14, '2589632', 'Oscar Andres', 'Rivas Ayala', '0983552200', 'oscar.ventas@ufinet.com.py', 'Fernando De La Mora Zona Norte', '1969-02-05', '2021-04-21 20:03:52', 'activo', '../archivos/21-04-21-22-03-52-ed2ea302d102aa3cfe1c88d446ac16.png'),
('cod-', 15, '5898201', 'Perla Elizabeth', 'Morinigo Ayala', '0985223390', 'perla@ventas.com.py', 'Villeta Barrio Avay 1320', '1994-12-14', '2021-04-21 20:05:58', 'activo', '../archivos/21-04-21-22-05-58-tumblr_l4urbu3evH1qzh6sbo1_1280.jpg'),
('cod-', 16, '3852963', 'Julio David', 'Rolon Vicioso', '0992147852', 'julio@ventas.com.py', 'Ypane Barrio Santa Librada', '1980-04-05', '2021-04-23 15:35:56', 'activo', '../archivos/23-04-21-17-35-56-Stephen-Amell-16-1024x1473.jpg'),
('cod-', 17, '1258963', 'Julio Cesar', 'Falcioni Mendez', '0971258555', 'julioprofe@gmail.com.ar', 'Buenos Aires Barrio Comodoro', '1950-06-06', '2021-04-24 17:58:28', 'activo', '../archivos/24-04-21-19-58-28-541269016-612x612.jpg'),
('cod-', 18, '1047899', 'Hugo Javier', 'Aquino Rojas', '0983550056', 'hugo.ventas@teisa.com.py', 'Asuncion Barrio Los Nogales', '1989-04-13', '2021-04-24 19:57:15', 'activo', '../archivos/24-04-21-21-57-15-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 19, '5224780', 'Pedro Daniel', 'Osvaldo Matiauda', '0971205887', 'pedro.ventas@teisa.com.py', 'Asuncion Barrio Los Cedrales', '1988-04-06', '2021-04-24 19:59:43', 'activo', '../archivos/24-04-21-21-59-43-Stephen-Amell-16-1024x1473.jpg'),
('cod-', 20, '3258582', 'Damian', 'Baez', '0981258741', 'damian.comercial@ufinet.com.py', 'Ypane Barrio San Francisco', '2000-04-13', '2021-04-24 20:02:20', 'activo', '../archivos/24-04-21-22-02-20-istockphoto-913062404-612x612.jpg'),
('cod-', 24, '2589632', 'Pablo Daniel', 'Ayala Rojas', '0981258364', 'pablo.ayala@citycenter.com', 'Asuncion Barrio Las Mercedes', '1988-02-06', '2021-04-24 20:10:56', 'activo', '../archivos/24-04-21-22-10-56-20180322_194414.jpg'),
('cod-', 25, '4258001', 'Walter Damian', 'Campuzano Rejala', '0991201111', 'walter@transporte.com.py', 'Ypane Barrio San Jose', '1998-04-06', '2021-04-24 20:12:50', 'activo', '../archivos/24-04-21-22-12-50-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 26, '4520963', 'Alberto Daniel', 'Ayala Garcia', '0982104783', 'albert.ventas@ufinet.com.py', 'Asuncion Barrio Zeballos Cue', '1986-01-13', '2021-04-24 23:07:18', 'activo', '../archivos/25-04-21-01-07-18-Stephen-Amell-16-1024x1473.jpg'),
('cod-', 27, '2005639', 'Juan Fernando', 'Quintero Morales', '0983411147', 'juanfer@fmn.com.py', 'Villa Elisa Villa Bonita', '1992-01-06', '2021-04-28 16:33:20', 'activo', '../archivos/28-04-21-18-33-19-Stephen-Amell-16-1024x1473.jpg'),
('cod-', 28, '3222025', 'Alberto Bolli', 'Moreno', '0987528962', 'bolli.moreno@ccp1912.com.py', 'Asuncion Barrio Obrero', '1990-04-05', '2021-04-29 15:03:41', 'activo', '../archivos/29-04-21-17-03-41-images.jpg'),
('cod-', 29, '4214710', 'Osmar Daniel', 'Asad', '0987147236', 'osmar.turco@velez.com.py', 'Asuncion Barrio Vista Alegre', '1988-06-04', '2021-05-03 16:40:10', 'activo', '../archivos/03-05-21-18-40-10-541269016-612x612.jpg'),
('cod-', 30, '2369852', 'Jaime Uriel', 'Rodriguez Alonso', '0984123654', 'jaime.ventas@ufinet.com.py', 'Asuncion Barrio Las Colinas', '1988-12-11', '2021-05-04 19:19:39', 'activo', '../archivos/04-05-21-21-19-39-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 31, '6214412', 'Carlos Arturo', 'Chavez Soilan', '0981552297', 'falconmasters@gmail.com.mx', 'Mexico Df', '1990-02-04', '2021-05-08 19:16:46', 'activo', '../archivos/08-05-21-21-16-46-174861739-612x612.jpg'),
('cod-', 32, '2478963', 'Vicente Daniel', 'Sanchez Nuñez', '0987142589', 'vicente@nuñez.com.py', 'Asuncion Barrio Recoleta', '1980-02-04', '2021-05-08 19:33:37', 'activo', '../archivos/08-05-21-21-33-37-foto-carnet1.jpg'),
('cod-', 35, '4582236', 'Jacinto Antonio', 'Pereira Lopez', '0983440079', 'jacinto.ventas@ufinet.com.py', 'Asuncion Barrio Jara 1250', '1980-02-07', '2021-05-10 15:50:35', 'activo', '../archivos/10-05-21-17-50-35-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 36, '2014368', 'Luis Andres', 'Sanchez Pereira', '0981223380', 'luis.ventas@vidriocar.com.py', 'San Lorenzo Barrio Lucerito', '1970-05-05', '2021-05-11 16:31:53', 'activo', '../archivos/11-05-21-18-31-53-Stephen-Amell-16-1024x1473.jpg'),
('cod-', 37, '6258369', 'Pedro Antonio', 'Lopez Moreira', '0984552030', 'pedro.soporte@hotmail.com.py', 'Fernando De La Mora Zona Sur', '1990-01-12', '2021-05-11 21:53:22', 'activo', '../archivos/11-05-21-23-53-22-UploadFotoPath.do.jpg'),
('cod-', 43, '09821478524', 'Elias', 'Arge??o', '09841234700', 'argeo@hotmail.com.py', 'Ma??an Halis', '1970-05-04', '2021-05-18 20:01:25', 'inactivo', '../archivos/18-05-21-22-01-25-453256953-612x612.jpg'),
('cod-', 45, '3258963', 'Nelson', 'Mora Nu??ez', '0984258963', 'nelsondacka@gmail.com', 'Ypane', '1980-05-05', '2021-05-20 23:24:11', 'inactivo', '../archivos/21-05-21-01-24-11-4494673_249px.jpg'),
('cod-', 56, '3202023', 'Oscar', 'Nu??ez', '0981', 'oscar10@oscar.com.py', 'Ypane', '2021-05-03', '2021-05-21 04:30:41', 'inactivo', '../archivos/21-05-21-06-30-41-hombres_maridables_sam_worthington.jpg'),
('cod-', 57, '2001009', 'Walter', 'Nuñez', '0981202090', 'walter@tupi.com.py', 'Fernando De La Mora', '2021-05-04', '2021-05-21 14:24:56', 'activo', '../archivos/21-05-21-16-24-56-541269016-612x612.jpg'),
('cod-', 58, '2102107', 'Narciso', 'Fernández Nuñez', '0981455450', 'narciso.ventas@ccp.com', 'San Lorenzo Calle\'i', '1980-05-04', '2021-05-21 14:26:23', 'activo', '../archivos/21-05-21-16-26-22-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 59, '1789000', 'Karl', 'Estupiñan', '0982', 'karl@teisa.com.py', 'Itaugua Barrio Itaugua Poty', '1950-01-05', '2021-05-21 15:20:30', 'activo', '../archivos/21-05-21-17-20-30-foto-carnet1.jpg'),
('cod-', 60, '1111222', 'Julián', 'álvarez', '099841258962', 'juliam@ccpcom.com', 'ñemby La Lomita', '1994-05-04', '2021-05-21 19:31:37', 'activo', '../archivos/21-05-21-21-31-37-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 61, '7522014', 'Juan Antonio', 'Báez Nuñez', '0991258369', 'juan.ventas@tecnoedil.com.py', 'Fernando De La Mora Barrio Ipvu', '2000-05-04', '2021-05-21 20:17:23', 'activo', '../archivos/21-05-21-22-17-23-8322.jpg'),
('cod-', 62, '2300300', 'Pedro Damián', 'Bobadilla Sánchez', '0985203093', 'pedro@carsa.com', 'Asuncion Barrio San Agustin', '1980-05-12', '2021-05-22 02:12:39', 'activo', '../archivos/22-05-21-04-12-39-depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg'),
('cod-', 63, '4023250', 'Guido Virgilio', 'Benítez Mendoza', '0985123456', 'mago.ccp@hotmail.com', 'Ita Barrio San Miguel', '1955-05-10', '2021-05-24 01:36:33', 'activo', '../archivos/24-05-21-03-36-33-ed2ea302d102aa3cfe1c88d446ac16.png'),
('cod-', 64, '1047200', 'Sergio Antonio', 'Amarilla', '0981220030', 'sergio.ventas@ufinet.com.py', 'Asuncion Barrio Jara', '1994-05-03', '2021-05-25 15:38:32', 'activo', '../archivos/25-05-21-17-38-32-4494673_249px.jpg'),
('cod-', 65, '3258002', 'Bruno Daniel', 'Perez Ayala', '0992104780', 'bruno.ventas@ufinet.com.py', 'Asuncion Barrio Las Mercedes', '1990-10-10', '2021-05-31 15:52:19', 'activo', '../archivos/31-05-21-17-52-19-UploadFotoPath.do.jpg'),
('cod-', 66, '2369008', 'Osvaldo', 'Caceres', '0981200018', 'ovi.caceres@hotmail.com.xs', 'ñemby Barrio La Lomita', '1990-09-11', '2021-05-31 23:52:32', 'activo', '../archivos/01-06-21-01-52-32-174861739-612x612.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_login`
--

CREATE TABLE `usuarios_login` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'data_entry',
  `registro_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_login`
--

INSERT INTO `usuarios_login` (`id`, `nombre`, `usuario`, `contrasena`, `rol`, `registro_fecha`) VALUES
(14, 'Diego Benitez', 'andres', '$2y$12$NT46Mfpnk7VeDY0upPmrJ.7hs6crFj7AyhQutsN2gjLrpCkwu5Qs.', 'admin', '2021-04-20 19:59:07'),
(16, 'Guillermo Lopez', 'guishe', '$2y$12$YDy3LoZqSWvmqQK/pqwchu7JP7jJ82DAtbh7pULkwLcfgwIs7.Hpu', 'data_entry', '2021-05-03 18:06:46'),
(17, 'nestor antonio ramos', 'Nestor123456', '$2y$12$MIneHvCQrR.ETS0.lDuW8Og9QCe1GycP.Nxax3uzcdUElFy7NLJtm', 'data_entry', '2021-05-11 19:55:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
