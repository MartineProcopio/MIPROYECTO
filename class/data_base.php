  <?php
  
  /**
 * description of autoload
 * 
 * @autor Martin Procopio
 **/
  
try {
        $conector = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
        
} catch (Exception $ex) {
    echo "Fallo de coneccion".$ex->getMessage();
    
}

class base_datos {
    
    private $gbd;
    
    function __construct($driver,$base_datos,$host,$user,$pass) {
        $conection = $driver . ":dbname=" . $base_datos . ";host=$host";
        $this->gbd = new PDO($conection,$user,$pass);
        
        if(!$this->gbd){
          throw new Exception("No se a podido realizar la coneccion") ;  
        }
    }
    
    function select($tabla, $filtros = null, $arr_prepare = null, $orden = null, $limit = null){
    $sql = "SELECT * FROM ". $tabla;

    if($filtros!=null){
        $sql .="WHERE".$filtros;
    }
    if($orden!=null){
        $sql .= "ORDEN BY".$orden;
    }
    if($limit!=null){
        $sql .="LIMIT".$limit;
    }
    $resource = $this->gbd->prepare($sql);
    $resource->execute($arr_prepare);
    if($resource){
        return $resource->fetchAll(PDO::FETCH_ASSOC);
    } else {
        throw Exception("No se pudo Realizar la consulta de seleccion");
    }        
  }

  function delete($tabla,$filtros=null,$arr_prepare=null){
    $sql = "delete from".$tabla."where".$filtros;
    
    $resouce = $this->gbd->prepare($sql);
    $resouce->excecute($arr_prepare);
    if($resouce){
        return true;
    } else {
        throw Exception("No se pudo Realizar la consulta de selccion");
    }    
 }

   function insert($tabla,$campos,$valores,$arr_prepare=null){
    $sql = "insert into".$tabla."(".$campos.") values ($valores)";
    
    $resource = $this->gbd->prepare($sql);
    $resource->excecute($arr_prepare);
    if($resource){
        return $this->gbd->lastInsertID();
    } else {
        echo '<pre>';
        print_r($resource->errorInfo());
        echo '</pre>';
        throw Exception("No se pudo Realizar la consulta de selccion");
    }    
 }

  function update($tabla,$campos,$filtros,$arr_prepare=null){
    $sql = "update".$tabla."set".$campos."where".$filtros;
    
    $resouce = $this->gbd->prepare($sql);
    $resouce->excecute($arr_prepare);
    if($resouce){
        return true;
    } else {
        echo '<pre>';
        print_r($resouce->errorInfo());
        echo '</pre>';
        throw Exception("No se pudo Realizar la consulta de selccion");
    }    
 }
    
}

