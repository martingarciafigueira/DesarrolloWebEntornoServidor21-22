<?php
class CabeceraPagina {
  private $titulo;
  private $ubicacion;
  public function __construct($tit,$ubi)
  {
    $this->titulo=$tit;
    $this->ubicacion=$ubi;
  }
  public function graficar()
  {
    echo '<div style="font-size:40px;text-align:'.$this->ubicacion.'">';
    echo $this->titulo;
    echo '</div>';
  }
}

$cabecera=new CabeceraPagina('Ouh mama','center');
$cabecera->graficar();
?>
</body>
</html>