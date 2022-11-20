  <?php
    try {
        $conector = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
        echo "coneccion exitosa";
} catch (Exception $exc) {
    echo "Fallo de coneccion".$exc->getMessage();
    
}

class base_datos{
    
    private $gbd;
    
    function __construct($driver,$base_datos,$host,$user,$pass) {
        $conection = $driver."dename=".$base_datos."host=$host";
        $this->gbd = new PDO($conection,$user,$pass);
        
        if($this->gbd){
          throw new Exeption("No se a podido realizar la coneccion") ;  
        }
    }
    
}