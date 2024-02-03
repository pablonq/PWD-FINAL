<?php
class Entrega {
    
 private $identrega;
 private $nombre;
 private $descripcion;
 private $mensajeoperacion;

 
 public function __construct()
 {
    $this->identrega="";
    $this->nombre="";
    $this->descripcion= "";
 }



 /* Medodos get y set para $identrega*/ 
  public function getIdEntrega() {
   return $this->identrega;
  }
 
  public function setIdEntrega($identrega){
   $this->identrega = $identrega;
  }

   /* Medodos get y set para $nombre*/ 
   public function getNombre(){
    return $this->nombre;
   }
   public function setNombre($nombre){
    $this->nombre = $nombre;
   }
 
  /* Medodos get y set para $descripcion*/ 

  public function getDescripcion(){
   return $this->descripcion;
  }
  public function setDescripcion($descripcion){
   $this->descripcion = $descripcion;
  }

  /* Medodos get y set para mensajeoperacion*/ 

  public function getMensajeOperacion(){
    return $this->mensajeoperacion;
  }
  public function setMensajeOperacion($valor){
    $this->mensajeoperacion = $valor;
  }

  public function setear($identrega, $nombre, $descripcion) {
    $this->setIdCompra($identrega);
    $this->setCoFecha($nombre);
    $this->setObjUsuario($descripcion);
  }



  	/**
	 * Recupera los datos de una entrega por identrega
	 * @param int $identrega
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
	public function cargar(){
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM entrega WHERE identrega = '".$this->getIdRol()."'";
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $resp = true;
                $row = $base->Registro();
                $this->setear($row['identrega'], $row['nombre'], $row['descripcion']);
            }
        }
    } else {
        $this->setmensajeoperacion("Entrega->listar: ".$base->getError());
    }
    return $resp;    
}

/**
 * Esta función lee los valores actuales de los atributos del objeto e inserta un nuevo
 * registro en la base de datos a partir de ellos.
 * Retorna un booleano que indica si le operación tuvo éxito
 * 
 * @return boolean
 */
public function insertar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="INSERT INTO entrega(identrega, nombre, descripcion) 
 VALUES('".$this->getIdEntrega()."','".$this->getNombre()."','".$this->getDescripcion()."');";
     
     if ($base->Iniciar()){

        if ($elId = $base->Ejecutar($sql)) {
          $this->setIdRol($elId);
          $resp = true;
        } else {
            $this->setMensajeoperacion("Entrega->insertar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("Entrega->insertar: ".$base->getError());
    }
    return $resp;
}

/**
 * Esta función lee los valores actuales de los atributos del objeto y los actualiza en la
 * base de datos.
 * Retorna un booleano que indica si le operación tuvo éxito
 * 
 * @return boolean
 */
public function modificar(){
    $resp = false;
    $base=new BaseDatos();
    
    $sql = "UPDATE entrega SET nombre = '".$this->getNombre()."', descripcion = '".$this->getDescripcion()."' WHERE identrega = ".$this->getIdEntrega();

    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("Entrega->modificar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("Entrega->modificar: ".$base->getError());
    }
    return $resp;
}

  /**
 * Esta función lee el id actual del objeto y si puede lo borra de la base de datos
 * Retorna un booleano que indica si le operación tuvo éxito
 * 
 * @return boolean
 */
public function eliminar(){
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM entrega WHERE identrega = ".$this->getIdEntrega();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("Entrega->eliminar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("Entrega->eliminar: ".$base->getError());
    }
    return $resp;
}

/**
 * Esta función recibe condiciones de busqueda en forma de consulta sql para obtener
 * los registros requeridos.
 * Si por parámetro se envía el valor "" se devolveran todos los registros de la tabla
 * 
 * La función devuelve un arreglo compuesto por todos los objetos que cumplen la condición indicada
 * por parámetro
 * 
 * @return array
 */
public function listar($parametro=""){
    $arreglo = array();
    $base=new BaseDatos();
    $sql="SELECT * FROM entrega ";
    if ($parametro!="") {
        $sql .= ' WHERE '.$parametro;
    }
    
    $res = $base->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            
            while ($row = $base->Registro()){
                $obj= new Entrega();
                $obj->setear($row['identrega'],$row['nombre'],$row['descripcion']);
                array_push($arreglo, $obj);
            }  
        }
        
    } else {
        $this->setMensajeoperacion("Entrega->listar: ".$base->getError());
    }

    return $arreglo;
}

/**
 * Esta función lee todos los valores de todos los atributos del objeto y los devuelve
 * en un arreglo asociativo
 * 
 * @return array
 */
public function __toString(){
  return "id Entrega: ".$this->getIdEntrega()."\nNombre: ".$this->getNombre()."\nDescripcion: ".$this->getDescripcion()."\n\n";
  
}
}

?>