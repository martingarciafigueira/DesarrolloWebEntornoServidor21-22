--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `numemp` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `contrato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`numemp`, `nombre`, `apellidos`, `edad`, `contrato`) VALUES
(1, 'Martin', 'Garcia', 29, '0000-00-00'),
(2, 'Ramon', 'Rios', 31, '0000-00-00'),
(3, 'Fran', 'Rocha', 32, '0000-00-00'),
(4, 'Enrique', 'Enrique', 33, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Bouzas', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto a la noria', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en Samil', 'En la playa de Samil, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el Sireno', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Cangas', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(8, 'Luces de Navidad', 'Las luces de Navidad de Vigo superan a las de Nueva York en visitantes                           ', 'ofertas', '2019-12-04', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE `oficinas` (
  `oficina` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`oficina`, `region`, `ciudad`) VALUES
(1, 'Galicia', 'Vigo'),
(2, 'Galicia', 'Santiago'),
(3, 'Madrid', 'Madrid'),
(4, 'Cataluña', 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numpedido` int(11) NOT NULL,
  `fab` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`numpedido`, `fab`, `producto`, `cantidad`, `importe`) VALUES
(1, 1, 'Cocacolas', 10, 3.5),
(2, 2, 'Pepsis', 10, 3),
(3, 1, 'Kases', 10, 2.8),
(4, 2, 'Fantas', 10, 2.7),
(5, 3, 'Aguas', 10, 1.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idfab` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL DEFAULT '',
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idfab`, `idproducto`, `descripcion`, `precio`) VALUES
(1, 1, 'Coca-Cola', 0.35),
(2, 2, 'Pepsi', 0.3),
(1, 3, 'Kas', 0.28),
(2, 4, 'Fanta', 0.27),
(3, 5, 'Agua de Mondariz', 0.15);


------------------------------------------------------------------------------------------------------------------------------------------------------

# Obtener una lista de todos los productos indicando para cada uno su idfab, idproducto, descripción, precio y precio con IVA incluido (16% más)

SELECT productos.idfab AS IdFAB, productos.idproducto AS ID_Producto, 
       productos.descripcion AS Descripcion, productos.precio AS Precio, 
       (productos.precio * 1.16) AS Precio_IVA
FROM productos

# De cada pedido, queremos saber su número de pedido, fab, producto, cantidad, precio unitario e importe

SELECT pedidos.numpedido AS Numero_Pedido, pedidos.fab AS Fabricante, 
       pedidos.producto AS Producto, pedidos.cant AS Cantidad, 
       (pedidos.importe / pedidos.cant) AS Precio_Unitario, pedidos.importe AS Importe
FROM pedidos

# Listar de cada empleado su nombre, nº de días que lleva trabajando en la empresa y su año de nacimiento (suponiendo que este año ya se ha cumplido). Curdate() -> aaaa-mm-dd.

SELECT empleados.nombre, curdate()-empleados.contrato AS Dias_en_Empresa, 
       year(curdate())-edad AS Año_Nacimiento 
FROM empleados

# Obtener las oficinas ordenadas por orden alfabético de región y dentro de cada región por ciudad, si hay más de una oficina en la misma ciudad, aparecerá primero la que tenga el número de oficina mayor.

SELECT *
FROM oficinas
ORDER BY region, ciudad, oficina ASC

# Obtener los pedidos ordenados por fecha de pedido

SELECT *
FROM pedidos
ORDER BY pedidos.fechapedido

# Listar las cuatro líneas de pedido más caras (las de mayor importe)

SELECT *
FROM pedidos
ORDER BY importe DESC

# Obtener las mismas columnas que en el ejercicio 2 pero sacando unicamente las 5 líneas de pedido de menor precio unitario

SELECT pedidos.numpedido, pedidos.cant, pedidos.importe/pedidos.cant AS Precio_Unitario, importe
FROM pedidos
ORDER BY Precio_unitario ASC

# Listar toda la información de los pedidos de marzo

SELECT *
FROM pedidos
WHERE MONTH(fechapedido)=3

# Listar los datos de las oficinas de las regiones de Galicia y Madrid

SELECT *
FROM oficinas
WHERE region='Galicia' OR region='Madrid'
ORDER BY region DESC

# Listar los empleados de nombre Ramon

SELECT *
FROM empleados 
WHERE nombre LIKE 'Ramon%'   # -> El % equivale a "resto de caracteres"