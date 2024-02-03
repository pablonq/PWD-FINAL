<?php
class AbmEntrega{

     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Entrega
     */
    private function cargarObjeto($param){
        //print_r($param);
        $obj = null;
        if( array_key_exists('identrega',$param) and array_key_exists('nombre',$param) and array_key_exists('descripcion',$param)){
            $obj = new Entrega();
            $obj->setear($param['identrega'], $param['nombre'], $param['descripcion']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *  que son claves
     * @param array $param
     * @return Entrega
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['identrega']) ){
            $obj = new Rol();
            $obj->setear($param['identrega'],null);
        }
        return $obj;
    }


     /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['identrega']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['NroDni'] =null;
        $unObjEntrega = $this->cargarObjeto($param);
        if ($unObjEntrega!=null && $unObjEntrega->insertar()){
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
        if ($this->seteadosCamposClaves($param)){
            $unObjEntrega = $this->cargarObjetoConClave($param);
            if ($unObjEntrega!=null && $unObjEntrega->eliminar()){
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
            $unObjEntrega = $this->cargarObjeto($param);
            if($unObjEntrega!=null && $unObjEntrega->modificar()){
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
            if  (isset($param['identrega']))
                $where.=" and identrega = ".$param['identrega'];
            if  (isset($param['nombre']))
                $where.=" and nombre ='".$param['nombre']."'";
            if  (isset($param['descripcion']))
                $where.=" and descripcion ='".$param['descripcion']."'";
        
        }

        $obj = new Entrega();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

}

?>