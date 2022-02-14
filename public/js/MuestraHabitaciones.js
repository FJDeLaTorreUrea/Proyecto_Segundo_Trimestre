
console.log("hola");



$(document).ready(function(){
    debugger;
    $.getJSON("/habitaciones/todas",function(data){
        
        $("#imagen1").attr("src","imagenes/"+data.Nombre)
    })
})