-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2017 a las 14:20:42
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sk8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_Categoria` int(11) NOT NULL,
  `nom_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_Categoria`, `nom_categoria`) VALUES
(1, 'Patineta'),
(2, 'Ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_chat`
--

CREATE TABLE `tb_chat` (
  `idchat` int(11) NOT NULL,
  `fecha_hora_E` datetime NOT NULL,
  `mensaje` longtext NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fk_usuariodocumento` varchar(20) NOT NULL,
  `fk_usuariodocumento1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ciudad`
--

CREATE TABLE `tb_ciudad` (
  `id_Ciudad` int(11) NOT NULL,
  `nom_Ciudad` varchar(45) DEFAULT NULL,
  `tb_Departamento_id_Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `id_Departamento` int(11) NOT NULL,
  `nom_departamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle`
--

CREATE TABLE `tb_detalle` (
  `id_Detalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tb_Pedido_id_Pedido` int(11) NOT NULL,
  `tb_Producto_id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalleplantilla`
--

CREATE TABLE `tb_detalleplantilla` (
  `id_detallleplant` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `fk_plantilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detallepromocion`
--

CREATE TABLE `tb_detallepromocion` (
  `descuento` float NOT NULL,
  `preciopromocion` float NOT NULL,
  `fk_promocion` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entrada`
--

CREATE TABLE `tb_entrada` (
  `id_entradas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrada` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL,
  `fk_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_pedido`
--

CREATE TABLE `tb_estado_pedido` (
  `id_estado_Pedido` int(11) NOT NULL,
  `nom_estado` varchar(45) DEFAULT NULL,
  `descripcion_pedido` varchar(45) DEFAULT NULL,
  `tb_Pedido_id_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_marca`
--

CREATE TABLE `tb_marca` (
  `id_Marca` int(11) NOT NULL,
  `nom_marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_marca`
--

INSERT INTO `tb_marca` (`id_Marca`, `nom_marca`) VALUES
(1, 'Girl'),
(2, 'Venture');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_Pedido` int(11) NOT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `estadoventa` varchar(45) DEFAULT NULL,
  `tb_Ciudad_id_Ciudad` int(11) NOT NULL,
  `tb_Usuario_documento` varchar(20) NOT NULL,
  `tb_Promocion_id_Promocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_plantilla`
--

CREATE TABLE `tb_plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `caracterizacion` varchar(45) NOT NULL,
  `total` int(11) NOT NULL,
  `fk_detalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `id_Producto` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `stockMinimo` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `estado_producto` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `tb_Categoria_id_Categoria` int(11) NOT NULL,
  `Tallas_idtallas` int(11) NOT NULL,
  `tb_Marca_id_Marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_promocion`
--

CREATE TABLE `tb_promocion` (
  `id_Promocion` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proovedor`
--

CREATE TABLE `tb_proovedor` (
  `id_Proovedor` int(11) NOT NULL,
  `nom_proveedor` varchar(45) DEFAULT NULL,
  `nom_contacto` varchar(45) DEFAULT NULL,
  `tel_contacto` varchar(45) DEFAULT NULL,
  `estado_proveedor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_publicacion`
--

CREATE TABLE `tb_publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fechacreacion` date NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `lugarevento` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fk_usuarios` varchar(20) NOT NULL,
  `fk_tipopubli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `id_rol` int(11) NOT NULL,
  `nom_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`id_rol`, `nom_rol`) VALUES
(1, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sub_cate`
--

CREATE TABLE `tb_sub_cate` (
  `id_sub` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fk_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_sub_cate`
--

INSERT INTO `tb_sub_cate` (`id_sub`, `nombre`, `fk_categoria`) VALUES
(1, 'maderos', 1),
(2, 'trucks', 1),
(3, 'camisa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tallas`
--

CREATE TABLE `tb_tallas` (
  `idtallas` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tb_tipoTalla_id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tallas`
--

INSERT INTO `tb_tallas` (`idtallas`, `nombre`, `tb_tipoTalla_id_tipo`) VALUES
(1, '8Pulgadas', 1),
(2, '150cm ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipodocumento`
--

CREATE TABLE `tb_tipodocumento` (
  `id_TipoDocumento` int(11) NOT NULL,
  `nom_TipoDocumento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tipodocumento`
--

INSERT INTO `tb_tipodocumento` (`id_TipoDocumento`, `nom_TipoDocumento`) VALUES
(1, 'Cedula (C.C)'),
(2, 'Tarjeta de Identidad (T.I)'),
(3, 'Cédula de Extranjería.'),
(4, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipotalla`
--

CREATE TABLE `tb_tipotalla` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tipotalla`
--

INSERT INTO `tb_tipotalla` (`id_tipo`, `nombre`) VALUES
(1, 'patinetas'),
(2, 'Madero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_publicacion`
--

CREATE TABLE `tb_tipo_publicacion` (
  `id_Tipo_Publicacion` int(11) NOT NULL,
  `nom_Tipo_Publicacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `documento` varchar(20) NOT NULL,
  `tb_TipoDocumento_id_TipoDocumento` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido_1` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefonoFijo` varchar(20) DEFAULT NULL,
  `telefonoMovil` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `tb_Rol_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Indices de la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `fk_usuariodocumento` (`fk_usuariodocumento`);

--
-- Indices de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD PRIMARY KEY (`id_Ciudad`,`tb_Departamento_id_Departamento`),
  ADD KEY `fk_tb_Ciudad_tb_Departamento1_idx` (`tb_Departamento_id_Departamento`);

--
-- Indices de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`id_Departamento`);

--
-- Indices de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD PRIMARY KEY (`id_Detalle`,`tb_Pedido_id_Pedido`,`tb_Producto_id_Producto`),
  ADD KEY `fk_tb_Detalle_tb_Pedido1_idx` (`tb_Pedido_id_Pedido`),
  ADD KEY `fk_tb_Detalle_tb_Producto1_idx` (`tb_Producto_id_Producto`);

--
-- Indices de la tabla `tb_detalleplantilla`
--
ALTER TABLE `tb_detalleplantilla`
  ADD PRIMARY KEY (`id_detallleplant`);

--
-- Indices de la tabla `tb_detallepromocion`
--
ALTER TABLE `tb_detallepromocion`
  ADD KEY `fk_promocion` (`fk_promocion`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD PRIMARY KEY (`id_entradas`),
  ADD KEY `id_entradas` (`id_entradas`),
  ADD KEY `fk_proveedor` (`fk_proveedor`),
  ADD KEY `fk_proveedor_2` (`fk_proveedor`);

--
-- Indices de la tabla `tb_estado_pedido`
--
ALTER TABLE `tb_estado_pedido`
  ADD PRIMARY KEY (`id_estado_Pedido`,`tb_Pedido_id_Pedido`),
  ADD KEY `fk_tb_estado_Pedido_tb_Pedido1_idx` (`tb_Pedido_id_Pedido`);

--
-- Indices de la tabla `tb_marca`
--
ALTER TABLE `tb_marca`
  ADD PRIMARY KEY (`id_Marca`);

--
-- Indices de la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_Pedido`,`tb_Ciudad_id_Ciudad`,`tb_Usuario_documento`,`tb_Promocion_id_Promocion`),
  ADD KEY `fk_tb_Pedido_tb_Ciudad1_idx` (`tb_Ciudad_id_Ciudad`),
  ADD KEY `fk_tb_Pedido_tb_Usuario1_idx` (`tb_Usuario_documento`),
  ADD KEY `fk_tb_Pedido_tb_Promocion1_idx` (`tb_Promocion_id_Promocion`);

--
-- Indices de la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD KEY `fk_detalle` (`fk_detalle`);

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`id_Producto`,`tb_Categoria_id_Categoria`,`Tallas_idtallas`,`tb_Marca_id_Marca`),
  ADD UNIQUE KEY `id_Producto` (`id_Producto`),
  ADD KEY `fk_tb_Producto_tb_Categoria1_idx` (`tb_Categoria_id_Categoria`),
  ADD KEY `fk_tb_Producto_Tallas1_idx` (`Tallas_idtallas`),
  ADD KEY `fk_tb_Producto_tb_Marca1_idx` (`tb_Marca_id_Marca`);

--
-- Indices de la tabla `tb_promocion`
--
ALTER TABLE `tb_promocion`
  ADD PRIMARY KEY (`id_Promocion`);

--
-- Indices de la tabla `tb_proovedor`
--
ALTER TABLE `tb_proovedor`
  ADD PRIMARY KEY (`id_Proovedor`),
  ADD KEY `id_Proovedor` (`id_Proovedor`);

--
-- Indices de la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `fk_usuarios` (`fk_usuarios`),
  ADD KEY `fk_tipopubli` (`fk_tipopubli`),
  ADD KEY `fk_usuarios_2` (`fk_usuarios`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_sub_cate`
--
ALTER TABLE `tb_sub_cate`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `fk_categoria` (`fk_categoria`);

--
-- Indices de la tabla `tb_tallas`
--
ALTER TABLE `tb_tallas`
  ADD PRIMARY KEY (`idtallas`,`tb_tipoTalla_id_tipo`),
  ADD KEY `fk_Tallas_tb_tipoTalla1_idx` (`tb_tipoTalla_id_tipo`);

--
-- Indices de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  ADD PRIMARY KEY (`id_TipoDocumento`);

--
-- Indices de la tabla `tb_tipotalla`
--
ALTER TABLE `tb_tipotalla`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tb_tipo_publicacion`
--
ALTER TABLE `tb_tipo_publicacion`
  ADD PRIMARY KEY (`id_Tipo_Publicacion`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`documento`,`tb_TipoDocumento_id_TipoDocumento`,`tb_Rol_id_rol`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD KEY `fk_tb_Usuario_tb_TipoDocumento_idx` (`tb_TipoDocumento_id_TipoDocumento`),
  ADD KEY `fk_tb_Usuario_tb_Rol1_idx` (`tb_Rol_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_detalleplantilla`
--
ALTER TABLE `tb_detalleplantilla`
  MODIFY `id_detallleplant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  MODIFY `id_entradas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `Tallas_idtallas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tallas`
--
ALTER TABLE `tb_tallas`
  MODIFY `idtallas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`fk_usuariodocumento`) REFERENCES `tb_usuario` (`documento`);

--
-- Filtros para la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD CONSTRAINT `fk_tb_Ciudad_tb_Departamento1` FOREIGN KEY (`tb_Departamento_id_Departamento`) REFERENCES `tb_departamento` (`id_Departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD CONSTRAINT `fk_tb_Detalle_tb_Pedido1` FOREIGN KEY (`tb_Pedido_id_Pedido`) REFERENCES `tb_pedido` (`id_Pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Detalle_tb_Producto1` FOREIGN KEY (`tb_Producto_id_Producto`) REFERENCES `tb_producto` (`id_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_detalleplantilla`
--
ALTER TABLE `tb_detalleplantilla`
  ADD CONSTRAINT `tb_detalleplantilla_ibfk_1` FOREIGN KEY (`id_detallleplant`) REFERENCES `tb_plantilla` (`id_plantilla`);

--
-- Filtros para la tabla `tb_detallepromocion`
--
ALTER TABLE `tb_detallepromocion`
  ADD CONSTRAINT `tb_detallepromocion_ibfk_1` FOREIGN KEY (`fk_producto`) REFERENCES `tb_producto` (`id_Producto`),
  ADD CONSTRAINT `tb_detallepromocion_ibfk_2` FOREIGN KEY (`fk_promocion`) REFERENCES `tb_promocion` (`id_Promocion`);

--
-- Filtros para la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD CONSTRAINT `tb_entrada_ibfk_1` FOREIGN KEY (`id_entradas`) REFERENCES `tb_producto` (`id_Producto`),
  ADD CONSTRAINT `tb_entrada_ibfk_2` FOREIGN KEY (`fk_proveedor`) REFERENCES `tb_proovedor` (`id_Proovedor`);

--
-- Filtros para la tabla `tb_estado_pedido`
--
ALTER TABLE `tb_estado_pedido`
  ADD CONSTRAINT `fk_tb_estado_Pedido_tb_Pedido1` FOREIGN KEY (`tb_Pedido_id_Pedido`) REFERENCES `tb_pedido` (`id_Pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `fk_tb_Pedido_tb_Ciudad1` FOREIGN KEY (`tb_Ciudad_id_Ciudad`) REFERENCES `tb_ciudad` (`id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Pedido_tb_Promocion1` FOREIGN KEY (`tb_Promocion_id_Promocion`) REFERENCES `tb_promocion` (`id_Promocion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Pedido_tb_Usuario1` FOREIGN KEY (`tb_Usuario_documento`) REFERENCES `tb_usuario` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  ADD CONSTRAINT `tb_plantilla_ibfk_1` FOREIGN KEY (`fk_detalle`) REFERENCES `tb_detalle` (`id_Detalle`);

--
-- Filtros para la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD CONSTRAINT `fk_tb_Producto_tb_Categoria1` FOREIGN KEY (`tb_Categoria_id_Categoria`) REFERENCES `tb_categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Producto_tb_Marca1` FOREIGN KEY (`tb_Marca_id_Marca`) REFERENCES `tb_marca` (`id_Marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_producto_ibfk_1` FOREIGN KEY (`Tallas_idtallas`) REFERENCES `tb_tallas` (`idtallas`);

--
-- Filtros para la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  ADD CONSTRAINT `tb_publicacion_ibfk_1` FOREIGN KEY (`fk_usuarios`) REFERENCES `tb_usuario` (`documento`),
  ADD CONSTRAINT `tb_publicacion_ibfk_2` FOREIGN KEY (`fk_tipopubli`) REFERENCES `tb_tipo_publicacion` (`id_Tipo_Publicacion`);

--
-- Filtros para la tabla `tb_sub_cate`
--
ALTER TABLE `tb_sub_cate`
  ADD CONSTRAINT `tb_sub_cate_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `tb_categoria` (`id_Categoria`);

--
-- Filtros para la tabla `tb_tallas`
--
ALTER TABLE `tb_tallas`
  ADD CONSTRAINT `tb_tallas_ibfk_1` FOREIGN KEY (`tb_tipoTalla_id_tipo`) REFERENCES `tb_tipotalla` (`id_tipo`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_Usuario_tb_Rol1` FOREIGN KEY (`tb_Rol_id_rol`) REFERENCES `tb_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Usuario_tb_TipoDocumento` FOREIGN KEY (`tb_TipoDocumento_id_TipoDocumento`) REFERENCES `tb_tipodocumento` (`id_TipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
