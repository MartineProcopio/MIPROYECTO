<?php

/**
 * description of autoload
 * 
 * @autor Martin Procopio
 **/

class productos{
    protected $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria;
    private $exist = false;
    
    
    function __construct($id) {
        $db = new base_datos("mysql","miproyecto","127.0.0.1","root","");
        $resp = $db->select("productos", "id=?", array($id));
        if(isset($resp[0]['id'])){
            
            $this->id=$resp[0]['id'];
            $this->nombre=$resp[0]['nombre_producto'];
            $this->descripcion=$resp[0]['descripcion'];
            $this->precio=$resp[0]['precio'];
            $this->categoria=$resp[0]['categoria_id'];
            $this->exist=true;
        }
    }
    public function mostrar() {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
    public function guardar(){
        if($this->exist){
            return $this->actualizar();
            
        } else {
            return $this->insertar();
        }
    }
    public function eliminar() {
        $db = new base_datos("mysql","miproyecto","127.0.0.1","root","");
        return $db->delete("productos","id ".$this->id);
    }
    public function insertar() {
        $db = new base_datos("mysql","miproyecto","127.0.0.1","root","");
        $resp = $db->insert("productos","nombre_productos=?, descripcion=?,precio=?,categoria_id","?,?,?,?",
                array($this->nombre,$this->descripcion,$this->nombreprecio,$this->categoria));
    }
    public function listar() {
        $db = new base_datos("mysql","miproyecto","127.0.0.1","root","");
        return $db->select('productos');
    }
}


