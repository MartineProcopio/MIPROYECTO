/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

$(document).ready(function(){
   alert('Listo'); 
});

$("#form").submit(function(){
    
    var nombre = $("#categorias").val();
    
    if($.trim(nombre) === '') {
        alert("Agregue una Categoria\nMartin Procopio");
        return false;
    }
    return true;
});

$("#form").submit(function(){
    
    var nombre = $("#nombre").val();
    var id = $("#id").val();
    var precio = $("#precio").val();
    var categoria = $("#categoria").val();
    var descripcion = $("#descripcion").val();
    var imagen = $("#imagen").val();
    var errores = [];
    
    
    if($.trim(nombre) === '') {
        errores.push("Agregue el Nombre del Producto");
    };
    if($.trim(id) === '') {
        errores.push("Agregue el ID del Producto");
    };
    if($.trim(precio) === '') {
        errores.push("Agregue el Precio del Producto");
    };
    if($.trim(categoria) === '') {
        errores.push("Agregue la Categoria del Producto");
    };
    if($.trim(descripcion) === '') {
        errores.push("Agregue la descripcion del Producto");
    };
    if($.trim(imagen) === '') {
        errores.push("Agregue la imagen del Producto");
    };
    if(errores.length > 0){
        errores.push("Martin Procopio");
        alert(errores.join("\n"));
        return false;
    };
    return true;
 
 });
