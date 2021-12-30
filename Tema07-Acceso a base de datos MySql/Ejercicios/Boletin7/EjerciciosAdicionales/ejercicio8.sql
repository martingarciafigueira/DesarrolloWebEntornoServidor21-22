#
# Estructura de tabla para la tabla `votos`
#

CREATE TABLE votos (
  id tinyint(3) unsigned NOT NULL auto_increment,
  votos1 int(10) unsigned NOT NULL default '0',
  votos2 int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
);

#
# Volcar la base de datos para la tabla `votos`
#

INSERT INTO votos VALUES (1, 49, 12);

    

    
