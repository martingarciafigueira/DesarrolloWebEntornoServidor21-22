#
# Estructura de tabla para la tabla `noticias`
#

CREATE TABLE noticias (
  id smallint(5) unsigned NOT NULL auto_increment,
  titulo varchar(100) NOT NULL default '',
  texto text NOT NULL,
  categoria enum('promociones','ofertas','costas') NOT NULL default 'promociones',
  fecha date NOT NULL default '0000-00-00',
  imagen varchar(100) default NULL,
  PRIMARY KEY  (id)
);

#
# Volcar la base de datos para la tabla `noticias`
#

INSERT INTO noticias VALUES (1, 'Nueva promocion en Bouzas', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL);
INSERT INTO noticias VALUES (2, 'Ultimas viviendas junto a la noria', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL);
INSERT INTO noticias VALUES (3, 'Apartamentos en Samil', 'En la playa de Samil, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg');
INSERT INTO noticias VALUES (4, 'Casa reformada en el Sireno', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL);
INSERT INTO noticias VALUES (5, 'Promocion en Cangas', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg');
    