<?php

/**
 * description of autoload
 * 
 * @autor Martin Procopio
 **/

//include '..class/data_base.php';
//include '..class/categorias.php';

include '../class/autoload.php';

if(isset($_POST['accion']) && $_POST['accion']=='guardar') {
    
    $miProducto = new productos();
    $miProductos->nombre = $_POST['producto'];
    $miProductos->descripcion = $_POST['descripcion'];
    $miProductos->precio = $_POST['precio'];
    $miProductos->categoria = $_POST['categoria'];
    $miCategoria->guardar();
    
}elseif (isset ($_GET['add'])) {
    include 'views/productos.html';
    die();
}
$lista_pro = productos::listar();
    include 'views/lista_productos.html';    
