-- Estructura de la tabla `entregas`
CREATE TABLE `entregas` (
  `rut` varchar(20) NOT NULL,
  `cod_producto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL
);

-- Datos de la tabla `entregas`
INSERT INTO `entregas` (`rut`, `cod_producto`, `cantidad`, `fecha_entrega`) VALUES
('19.976.780-1', '103', 4, '2024-08-13');

-- Estructura de la tabla `personal`
CREATE TABLE `personal` (
  `rut` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
);

-- Datos de la tabla `personal`
INSERT INTO `personal` (`rut`, `nombre`, `apellido`, `cargo`, `contraseña`) VALUES
('19.432.271-2', 'Mariam', 'Caceres', 'Admin', '$2y$10$U0zx/IH39WCNiE//SKkLYeMjaZiKAHZIoptucsj3deuk.rgqMlUPm'),
('19.976.780-1', 'Christian', 'Caceres', 'Bodega', '$2y$10$jJHPL2CGtHRHBtAdDqaNq.eqKd6pYVclSn9pjfpOaMVn9HjaeIYtC'),
('20.216.980-5', 'Cristian', 'Fritis', 'Bodega', '$2y$10$5tXQsrhff52j6eg27S2wnuEuHtyu9eQRUgREkRdbDiSZT8Pkc77z6'),
('20.248.430-1', 'Pamela', 'Muñoz', 'Admin', '$2y$10$E.tJ4Y6grg02ek3n9zktGe5dL.S0mhQQTDQWPeLNp/Ey56UNSnr4m');

-- Estructura de la tabla `productos`
CREATE TABLE `productos` (
  `cod_producto` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL
);

-- Datos de la tabla `productos`
INSERT INTO `productos` (`cod_producto`, `descripcion`, `stock`, `proveedor`, `fecha_ingreso`) VALUES
('100', 'Casco de seguridad', 50, 'Vicsa S.A', '2016-04-20'),
('101', 'Guantes de seguridad', 50, 'Fesam LTDA', '2016-04-22'),
('102', 'Calzado de seguridad', 50, 'Litios S.A', '2016-04-22'),
('103', 'Falopita Rika', 10, 'Felipe S.A.', '2024-08-13');

-- Índices y restricciones
ALTER TABLE `entregas`
  ADD KEY `rut` (`rut`),
  ADD KEY `cod_producto` (`cod_producto`);

ALTER TABLE `personal`
  ADD PRIMARY KEY (`rut`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`);

ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `personal` (`rut`),
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`);

COMMIT;