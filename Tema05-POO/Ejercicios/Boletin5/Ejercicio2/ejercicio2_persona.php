<?php
//Uso de constructores e da clase DateTime

class Persona {
    private $nombre;
    private $fechaNacimiento;
    private $sexo;
    
    public function __construct($nom, $nac, $sexo='H')
    { 
        $this->nombre=$nom;
        $this->fechaNacimiento=$nac;
        $this->sexo=$sexo;
    }
    public function diasvivo() { 
        $hoy = new DateTime ('now'); 
        $cumpleaños = new DateTime ($this->fechaNacimiento); 
        $diasvivo = $cumpleaños->diff ($hoy); 
        return $diasvivo-> format('%y anos, %m meses, %d días, 
                                      un total de %a días.'); 
    } 
    public function getNombre() {
        return $this->nombre;
    }
    public function getSexo() {
        if ($this->sexo=='H') {
            return 'hombre';
        } elseif ($this->sexo=='M') {
            return 'mujer';
        } else {
            return 'desconocido';
        }
    }
}
?>
