<?PHP

// -----------------------------------------------------------------
// Biblioteca de variables y funciones para el manejo de fechas
// -----------------------------------------------------------------

// -----------------------------------------------------------------
// Tabla de meses
// -----------------------------------------------------------------
   $meses = array ("enero", "febrero", "marzo", "abril",
                   "mayo", "junio", "julio", "agosto",
                   "septiembre", "octubre", "noviembre", "diciembre");

// -----------------------------------------------------------------
// Convertir fecha a cadena
// -----------------------------------------------------------------
function date2string ($date)
{
   // Formato: día del mes (número, sin ceros) /
   //          mes del año (número, sin ceros) /
   //          año (cuatro dígitos)
   // Ejemplo: 7/11/2002
   $string = date ("j/n/Y", strtotime($date));
   return ($string);
}

// -----------------------------------------------------------------
// Convertir (dia, mes, año) en fecha
// -----------------------------------------------------------------
function dmy2date ($dia, $mes, $anyo)
{
   $meses = array ("enero", "febrero", "marzo", "abril", "mayo",
                   "junio", "julio", "agosto", "septiembre",
                   "octubre", "noviembre", "diciembre");
   $i=0;
   $enc=0;
   while ($i<12 && !$enc)
   {
      if ($meses[$i] == $mes)
         $enc = 1;
      else
         $i++;
   }
   $fecha = date ("Y-m-d", mktime (0, 0, 0, $i+1, $dia, $anyo));
   return ($fecha);
}

// -----------------------------------------------------------------
// Obtener el día del mes de una fecha
// -----------------------------------------------------------------
function dayofdate ($date)
{
   $dia = date ("j", strtotime($date));
   return ($dia);
}

// -----------------------------------------------------------------
// Obtener el mes del año de una fecha
// -----------------------------------------------------------------
function monthofdate ($date)
{
   $mes = date ("n", strtotime($date));
   return ($mes);
}

// -----------------------------------------------------------------
// Obtener el año de una fecha
// -----------------------------------------------------------------
function yearofdate ($date)
{
   $anyo = date ("Y", strtotime($date));
   return ($anyo);
}

// -----------------------------------------------------------------
// Obtener la fecha de hoy
// -----------------------------------------------------------------
function today ()
{
   $todayDate = date("Y-m-d");
   return ($todayDate);
}

// -----------------------------------------------------------------
// Obtener el número de días de un mes dado de un año dado
// -----------------------------------------------------------------
function daysofMonth ($month, $year)
{
   $ndays = date ("t", mktime (0, 0, 0, 1, $month, $year));
   return ($ndays);
}

?>