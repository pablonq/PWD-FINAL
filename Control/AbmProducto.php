<?php


class AbmProducto
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idproducto', $param)) {

            $obj = new Producto();
            $obj->setear( $param['idproducto'],$param['pronombre'],$param['prodetalle'],$param['procantstock'],$param['tipo'],$param['imagenproducto']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *  que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idproducto'])) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null, null, null,null, null);
        }
        return $obj;
    }

      /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
     private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idproducto']))
            $resp = true;
        return $resp;
    }
  

     /**
     * 
     * @param array $param
     */
    public function alta($param){
   
        $resp = false;
        $param['idproducto'] = null;
        $obj = $this->cargarObjeto($param);
           //verEstructura($obj);
        if ($obj != null and $obj->insertar()) {
            $resp = true;
        }
        return $resp;   
    }

     /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjetoConClave($param);
            if ($obj != null and $obj->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

        /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $unObjProd=$this->cargarObjeto($param);
            if($unObjProd!=null && $unObjProd->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

      /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>null){
          if  (isset($param['idproducto']))
            $where.=" and idproducto = ".$param['idproducto']; 
        if  (isset($param['pronombre']))
                $where.=" and pronombre = '".$param['pronombre']."'";
        if  (isset($param['prodetalle']))
                $where.=" and prodetalle = '".$param['prodetalle']."'";
        if  (isset($param['procantstock']))
                $where.=" and procantstock = '".$param['procantstock']."'";
        if  (isset($param['tipo']))
                $where.=" and tipo = '".$param['tipo']."'";
        if  (isset($param['imagenproducto']))
        $where.=" and imagenproducto='".$param['imagenproducto']."'";  
        }

        $obj = new Producto();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    public function agregarProducto($datos){
        $resp = false;
        $param['idproducto'] = 0;
        $param['pronombre'] = $datos['pronombre'];
        $param['prodetalle'] = $datos['prodetalle'];
        $param['procantstock'] = $datos['procantstock'];
        $param['tipo'] = $datos['tipo'];
        $param['imagenproducto'] = $datos['imagenproducto'];
        /* verEstructura($param); */

        $objProducto = new AbmProducto();
        $exito = $objProducto->alta($param);
        if($exito){
            $resp = true;
        }
        return $resp;
    }

    public function agregarProductosExcel($datos){
      $resp = false;
      $dirDestino = '../Vista/Deposito/uploads';
      $documentoRecibido = $_FILES['excel']['tmp_name'];
      
      
      
      if(isset($_FILES['excel']) && $_FILES['excel']['size'] > 0){
        $nombre_archivo = $_FILES['excel']['name'];
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
        $extensiones_permitidas = array('xls', 'xlsx');
        if(in_array(strtolower($extension), $extensiones_permitidas)) {
          // El archivo tiene una extensión permitida, procede con la carga y procesamiento
          
          $mime_type = mime_content_type($documentoRecibido);
          
          $documento = PhpOffice\PhpSpreadsheet\IOFactory::load($documentoRecibido);//cargo el archivo
            
          //uso la primera hoja del excel
             $hojaExcel = $documento->getSheet(0);
             //obtengo la cantidad de filas que tienen datos
             $cantFilas = $hojaExcel->getHighestDataRow();
             
             
             $objProducto = new AbmProducto();
             

             for($i=2; $i<=$cantFilas;$i++){
               $param['idproducto'] = 0;
               $param['pronombre'] = $hojaExcel->getCell('A'.$i)->getValue();
               $param['prodetalle'] = $hojaExcel->getCell('B'.$i)->getValue();
               $param['procantstock'] = $hojaExcel->getCell('C'.$i)->getValue();
               $param['tipo'] = $hojaExcel->getCell('D'.$i)->getValue();
               $param['imagenproducto'] = $hojaExcel->getCell('E'.$i)->getValue();

               $exito  = $objProducto->alta($param);
               if($exito){
                $resp = true;
                
             }
             }
      }
      }
      
      return $resp;
        }
      
    

    /**
     * Esta función recibe un valor que representa una cantidad y un id de producto
     * y devuelve true si esa cantidad no excede el stock del producto o falso en caso contrario
     * @param int $cantidad
     * @param int $idproducto
     * @return boolean
     */
    public function controlarStock($cantidad, $idproducto){
        $resultado = false;
        
        $param['idproducto'] = $idproducto;
        $producto = new AbmProducto();
        $colProducto = $producto->buscar($param);

        if(count($colProducto) > 0){

            $producto = $colProducto[0];
            $stock = $producto->getProCantstock();

            if($cantidad <= $stock){

                $resultado = true;
            }
        }
        return $resultado;
    }

}