-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 05:22:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicamentos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_emp` (IN `vidEmpleado` INT)  BEGIN
    SELECT
        idEmpleado,cedula,nombres,apellidos,correo,usuario,password
    FROM
        Empleado
    WHERE
    	vidEmpleado = idEmpleado
    ORDER BY
        idEmpleado ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_inv` (`vidInventario` INT)  BEGIN
    SELECT
        idInventario,
        nombreInv,
        descripcionInv,
        fechaVen,
        cantidad,
        fechaFab,
        precio,
        Empleado_idEmpleado,
        Laboratorio_idLaboratorio
    FROM
        Inventario
    WHERE
        vidInventario = idInventario
    ORDER BY
        idInventario ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_cliente` (IN `vidcliente` INT)  BEGIN
	select idCliente,nombres,apellidos from Cliente order by idCliente;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_ventas` (IN `vidiventa` INT)  BEGIN
SELECT v.fecha_venta as fecha,v.valor_total as valor,concat(c.nombres,' ',c.apellidos) as cliente,
        concat(e.nombres,' ',e.apellidos) as empleado from venta v 
        inner join cliente c on c.idCliente=v.Cliente_idCliente 
        inner join empleado e on e.idEmpleado=v.Empleado_idEmpleado;
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lista_empleados` ()  BEGIN
    SELECT
        idEmpleado,
        cedula,
        nombres,
        apellidos,
        correo,
        usuario,
        PASSWORD
    FROM
        Empleado
    ORDER BY
        idEmpleado ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lista_inventarios` ()  BEGIN
    SELECT
        idInventario, nombreInv, descripcionInv, fechaVen, cantidad, fechaFab, precio, nombres, nombreLab
    FROM
        Inventario I
    JOIN Empleado E ON
        E.idEmpleado = I.Empleado_idEmpleado
    JOIN Laboratorio L ON
        L.idLaboratorio = I.Laboratorio_idLaboratorio
    ORDER BY
        idInventario ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lista_laboratorios` ()  BEGIN
    SELECT
        idLaboratorio, nombreLab, descripcionLab
    FROM
        Laboratorio
    ORDER BY
        idLaboratorio ;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `devuelve` (`vid` INT, `vcant` INT) RETURNS INT(1) NO SQL
BEGIN
    DECLARE
        res INT DEFAULT 0 ;
UPDATE
    inventario
SET
    cantidad = vcant
WHERE
    idInventario = vid ;
SET res = 1 ;
 RETURN res ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminar_emp` (`vidEmpleado` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Funcion que elimina un empleado'
BEGIN
    DECLARE
        res INT DEFAULT 0 ; IF EXISTS(
        SELECT
            Empleado_idEmpleado
        FROM
            Empleado E
        JOIN Inventario I ON
            E.idEmpleado = I.Empleado_idEmpleado
            WHERE vidEmpleado <> I.Empleado_idEmpleado
    ) THEN
  DELETE
FROM
    Empleado
WHERE
    idEmpleado = vidEmpleado ;
SET
    res = 1 ;
    
 ELSE 
 SET res = 2;

END IF ; RETURN res ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_cliente` (`vnombres` VARCHAR(45), `vapellidos` VARCHAR(45), `vcedula` INT, `vgenero` VARCHAR(45), `vedad` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Funcion que guarda el cliente'
BEGIN
DECLARE res INT DEFAULT 0;
IF NOT EXISTS(SELECT cedula FROM cliente where cedula=vcedula)
THEN
INSERT INTO cliente(nombres,apellidos,cedula,genero,edad) VALUES
(vnombres,vapellidos,vcedula,vgenero,vedad);
SET res = 1;
END IF;
RETURN RES;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_emp` (`vcedula` INT, `vnombres` VARCHAR(45), `vapellidos` VARCHAR(45), `vcorreo` VARCHAR(70), `vusuario` VARCHAR(45), `vpassword` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Funcion que almacena un empleado'
BEGIN
    DECLARE
        res INT DEFAULT 0 ; IF NOT EXISTS(
        SELECT
            idEmpleado
        FROM
            Empleado
        WHERE
            usuario = vusuario OR cedula = vcedula
    ) THEN
INSERT INTO Empleado(
    cedula,
    nombres,
    apellidos,
    correo,
    usuario,
    PASSWORD
)
VALUES(
    vcedula,
    vnombres,
    vapellidos,
    vcorreo,
    vusuario,
    vpassword
) ;
SET
    res = 1 ;
END IF ; RETURN res ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_inv` (`vidInventario` INT, `vnombreInv` VARCHAR(45), `vdescripcionInv` VARCHAR(45), `vfechaVen` DATE, `vcantidad` INT, `vfechaFab` DATE, `vprecio` INT, `vEmpleado_idEmpleado` INT, `vLaboratorio_idLaboratorio` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Funcion que almacena un inventario'
BEGIN
    DECLARE
        res INT DEFAULT 0 ; IF NOT EXISTS(
        SELECT
            idInventario
        FROM
            Inventario
        WHERE
            idInventario = vidInventario
    ) THEN
INSERT INTO Inventario(
    nombreInv,
    descripcionInv,
    fechaVen,
    cantidad,
    fechaFab,
    precio,
    Empleado_idEmpleado,
    Laboratorio_idLaboratorio
)
VALUES(
    vnombreInv,
    vdescripcionInv,
    vfechaVen,
    vcantidad,
    vfechaFab,
    vprecio,
    vEmpleado_idEmpleado,
    vLaboratorio_idLaboratorio
) ;
SET
    res = 1 ;
END IF ; RETURN res ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardar_venta` (`vtotal` INT, `vcliente` INT, `vempleado` INT, `vinv` VARCHAR(100), `vcant` VARCHAR(100)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Funcion que guarda una venta'
BEGIN
DECLARE res INT DEFAULT 0;
DECLARE inv INT DEFAULT -1;
DECLARE can INT DEFAULT -1;
DECLARE id_ven INT DEFAULT -1;
DECLARE inv_old INT DEFAULT 0;
DECLARE inv_update INT;
insert into venta(valor_Total,Cliente_idCliente,Empleado_idEmpleado)
VALUES (vtotal, vcliente, vempleado);

WHILE (LOCATE(',', vinv) > 0) DO

SET inv = ELT(1, vinv);
SET can = ELT(1, vcant);



SET inv_old = (SELECT cantidad FROM inventario where idInventario = inv);
SET inv_update = inv_old - can;

SET id_ven = (SELECT MAX(idVenta) from Venta where Cliente_idCliente=vcliente and Empleado_idEmpleado=vempleado);

SET vinv = SUBSTRING(vinv, LOCATE(',',vinv) + 1);
SET vcant = SUBSTRING(vcant, LOCATE(',',vcant) + 1);

IF inv <> ',' THEN
INSERT INTO detalleventa(cantidad, idVenta, inventario) VALUES (can, id_ven, inv);
UPDATE inventario SET cantidad = inv_update WHERE idInventario = inv;
END IF;
END WHILE;
SET res = 1;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificar_empl` (`vidEmpleado` INT, `vcedula` INT, `vnombres` VARCHAR(45), `vapellidos` VARCHAR(45), `vcorreo` VARCHAR(70), `vusuario` VARCHAR(45), `vpassword` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Modifica un empleado'
BEGIN
    DECLARE
        res INT DEFAULT 0 ; IF NOT EXISTS(
        SELECT
            nombres
        FROM
            Empleado
        WHERE
            idEmpleado <> vidEmpleado AND cedula = vcedula
    ) THEN
UPDATE
    Empleado
SET
    cedula = vcedula,
    nombres = vnombres,
    apellidos = vapellidos,
    correo = vcorreo,
    usuario = vusuario,
    password = vpassword
WHERE
    idEmpleado = vidEmpleado ;
SET
    res = 1 ;
END IF ; RETURN res ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificar_inv` (`vidInventario` INT, `vnombreInv` VARCHAR(45), `vdescripcionInv` VARCHAR(45), `vfechaVen` DATE, `vcantidad` INT, `vfechaFab` DATE, `vprecio` INT, `vEmpleado_idEmpleado` INT, `vLaboratorio_idLaboratorio` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'Modifica un inventario'
BEGIN
    DECLARE
        res INT DEFAULT 0 ;
UPDATE
    Inventario
SET
    nombreInv = vnombreInv,
    descripcionInv = vdescripcionInv,
    fechaVen = vfechaVen,
    cantidad = vcantidad,
    fechaFab = vfechaFab,
    precio = vprecio,
    Empleado_idEmpleado = vEmpleado_idEmpleado,
    Laboratorio_idLaboratorio = vLaboratorio_idLaboratorio
WHERE
    idInventario = vidInventario ;
SET
    res = 1 ; 
    RETURN res ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `apellidos`, `cedula`, `genero`, `edad`) VALUES
(1, 'Alejandro', 'garcia', 10000, 'Masculino', 30),
(2, 'Sebastian', 'Palacio', 11101010, 'Femenino', 30),
(3, 'Mabel', 'Navarro', 12331231, 'Femenino', 8),
(4, 'Nuevo', 'nuievito', 123123, 'Femenino', 22),
(5, 'asd', 'asd', 11, 'Masculino', 222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `inventario` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`idDetalleVenta`, `cantidad`, `inventario`, `idVenta`) VALUES
(1, 1, 3, 1),
(2, 1, 2, 1),
(3, 1, 1, 1),
(4, 1, 1, 2),
(5, 2, 3, 2),
(6, 3, 2, 2),
(7, 1, 3, 3),
(8, 10, 1, 3),
(9, 10, 6, 3),
(10, 3, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `cedula`, `nombres`, `apellidos`, `correo`, `usuario`, `password`) VALUES
(1, 1097032965, 'Jairo', 'Salazar', 'jairos1301', '1234', '1234'),
(2, 1097407622, 'alejooooo', 'garrrr', 'asdas@das', 'alejillo', 'aaa'),
(3, 10101010, 'Johnny', 'Salazar', 'jasalar@eam.edu.', 'jhonny', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `nombreInv` varchar(45) NOT NULL,
  `descripcionInv` varchar(45) NOT NULL,
  `fechaVen` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaFab` date NOT NULL,
  `precio` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `Laboratorio_idLaboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `nombreInv`, `descripcionInv`, `fechaVen`, `cantidad`, `fechaFab`, `precio`, `Empleado_idEmpleado`, `Laboratorio_idLaboratorio`) VALUES
(1, 'Acetaminofen', 'asddddd', '2020-08-23', 15, '2019-10-24', 2500, 1, 3),
(2, 'Dolex', 'sadsadsa', '2020-02-14', 6, '2020-02-13', 4000, 1, 3),
(3, 'Esomeprazol', 'no tiene descripcion', '2020-01-01', 0, '2019-04-05', 3600, 1, 1),
(4, 'Scott', '1asd', '2020-03-12', 0, '2020-03-20', 2500, 1, 3),
(5, 'Pastillas ', 'sadas', '2020-05-23', 9, '2020-03-01', 1800, 1, 6),
(6, 'Ibuprofeno', 'dolores de cabeza', '2020-03-28', 10, '2020-03-01', 3000, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idLaboratorio` int(11) NOT NULL,
  `nombreLab` varchar(45) NOT NULL,
  `descripcionLab` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`idLaboratorio`, `nombreLab`, `descripcionLab`) VALUES
(1, 'Genfar', 'jwlkdfjwlk'),
(2, 'LaSante', 'fvfvf'),
(3, 'Laboratorios Neo', 'rcrcvrv'),
(4, 'LaRoche', 'frvtv'),
(5, 'Johnson & Johnson', '4r4f'),
(6, 'Pfizer', 'frfrtgt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fecha_Venta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_Total` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fecha_Venta`, `valor_Total`, `Cliente_idCliente`, `Empleado_idEmpleado`) VALUES
(1, '2020-03-03 15:38:03', 10100, 1, 1),
(2, '2020-03-03 15:39:21', 21700, 1, 1),
(3, '2020-03-04 17:56:29', 58600, 1, 3),
(4, '2020-03-04 18:06:54', 10800, 4, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`idDetalleVenta`,`inventario`,`idVenta`),
  ADD KEY `fk_DetalleVenta_Inventario1_idx` (`inventario`),
  ADD KEY `fk_DetalleVenta_Venta1_idx` (`idVenta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`,`Empleado_idEmpleado`,`Laboratorio_idLaboratorio`),
  ADD KEY `fk_Inventario_Empleado_idx` (`Empleado_idEmpleado`),
  ADD KEY `fk_Inventario_Laboratorio1_idx` (`Laboratorio_idLaboratorio`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`idLaboratorio`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`,`Cliente_idCliente`,`Empleado_idEmpleado`),
  ADD KEY `fk_Venta_Cliente1_idx` (`Cliente_idCliente`),
  ADD KEY `fk_Venta_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idLaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `fk_DetalleVenta_Inventario1` FOREIGN KEY (`inventario`) REFERENCES `inventario` (`idInventario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleVenta_Venta1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_Inventario_Empleado` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Inventario_Laboratorio1` FOREIGN KEY (`Laboratorio_idLaboratorio`) REFERENCES `laboratorio` (`idLaboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
