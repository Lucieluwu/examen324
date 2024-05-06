-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2024 a las 23:02:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juanbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `codcuenta` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `condicion` varchar(50) DEFAULT NULL,
  `codUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`codcuenta`, `monto`, `tipo`, `condicion`, `codUsuario`) VALUES
(1000000, 97.49, 'Cuenta corriente', 'ACTIVA', 8),
(1000001, 83.53, 'Cuenta de ahorros', 'ACTIVA', 1),
(1000002, 91.86, 'Cuenta de inversión', 'ACTIVA', 2),
(1000003, 8.69, 'Cuenta corriente', 'ACTIVA', 3),
(1000004, 67.88, 'Cuenta de ahorros', 'ACTIVA', 4),
(1000005, 13.34, 'Cuenta de inversión', 'ACTIVA', 5),
(1000006, 63.07, 'Cuenta corriente', 'ACTIVA', 6),
(1000007, 75.32, 'Cuenta de ahorros', 'ACTIVA', 7),
(1000008, 87.38, 'Cuenta de inversión', 'ACTIVA', 8),
(1234560, 40.47, 'Cuenta de ahorros', 'ACTIVA', 4),
(1234567, 63.20, 'Cuenta de ahorros', 'ACTIVA', 1),
(1234568, 94.93, 'Cuenta de inversión', 'ACTIVA', 2),
(1234569, 85.05, 'Cuenta corriente', 'ACTIVA', 3),
(1234571, 47.18, 'Cuenta de inversión', 'ACTIVA', 5),
(1234572, 130.36, 'Cuenta corriente', 'ACTIVA', 6),
(1234573, 30.92, 'Cuenta de ahorros', 'ACTIVA', 7),
(1234574, 11.13, 'Cuenta de inversión', 'ACTIVA', 8),
(3000000, 241.61, 'Cuenta de inversión', 'ACTIVA', 1),
(4000000, 92.50, 'Cuenta corriente', 'ACTIVA', 2),
(5000000, 29.71, 'Cuenta de ahorros', 'ACTIVA', 3),
(6000000, 71.06, 'Cuenta de inversión', 'ACTIVA', 4),
(7000000, 66.19, 'Cuenta corriente', 'ACTIVA', 5),
(8000000, 17.74, 'Cuenta de ahorros', 'ACTIVA', 6),
(9000000, 216.97, 'Cuenta de inversión', 'ACTIVA', 7);

--
-- Disparadores `cuenta`
--
DELIMITER $$
CREATE TRIGGER `after_insert_cuenta` AFTER INSERT ON `cuenta` FOR EACH ROW BEGIN
    INSERT INTO transaccion (codcuenta, tipo, cantidad)
        	VALUES (NEW.codcuenta, "CREACION DE CUENTA", NEW.monto);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_monto_cuenta` AFTER UPDATE ON `cuenta` FOR EACH ROW BEGIN
    IF OLD.monto != NEW.monto THEN

    	IF OLD.monto < NEW.monto THEN
        	INSERT INTO transaccion (codcuenta, tipo, cantidad)
        	VALUES (OLD.codcuenta,  "AUMENTA", NEW.monto-OLD.monto);

        ELSE
        	INSERT INTO transaccion (codcuenta, tipo, cantidad)
        	VALUES (OLD.codcuenta,  "DISMINUYE", OLD.monto-NEW.monto);
        END IF;

    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `carnet` varchar(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`carnet`, `nombre`, `apellido`, `ciudad`) VALUES
('111111111', 'Ana', 'López', 'La Paz'),
('222222222', 'Pedro', 'Ramírez', 'Santa Cruz de la Sierra'),
('333333333', 'Laura', 'Gutiérrez', 'Cochabamba'),
('444444444', 'Diego', 'Sánchez', 'Sucre'),
('555555555', 'Marta', 'Martínez', 'Oruro'),
('666666666', 'Luis', 'García', 'Tarija'),
('777777777', 'Lucía', 'Fernández', 'Potosí'),
('888888888', 'Jorge', 'Díaz', 'Beni');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `codTransaccion` int(11) NOT NULL,
  `codcuenta` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`codTransaccion`, `codcuenta`, `tipo`, `cantidad`, `fecha`) VALUES
(1, 1234572, 'AUMENTA', 115.87, '2024-05-05 16:54:39'),
(2, 3000000, 'AUMENTA', 230.69, '2024-05-05 16:54:39'),
(3, 9000000, 'AUMENTA', 126.83, '2024-05-05 16:54:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `carnet` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `usuario`, `cargo`, `contrasena`, `carnet`) VALUES
(1, 'analopez', 'cliente', 'ana1', '111111111'),
(2, 'pedroramirez', 'director', 'pedro2', '222222222'),
(3, 'lauragutierrez', 'gerente', 'laura3', '333333333'),
(4, 'diegosanchez', 'analista', 'diego4', '444444444'),
(5, 'martamartinez', 'cliente', 'marta5', '555555555'),
(6, 'luisgarcia', 'cliente', 'luis6', '666666666'),
(7, 'luciafernandez', 'gerente', 'lucia7', '777777777'),
(8, 'jorgediaz', 'cliente', 'jorge8', '888888888');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`codcuenta`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`carnet`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`codTransaccion`),
  ADD KEY `codcuenta` (`codcuenta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD KEY `carnet` (`carnet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `codcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345675;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `codTransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`codUsuario`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`codcuenta`) REFERENCES `cuenta` (`codcuenta`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`carnet`) REFERENCES `persona` (`carnet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
