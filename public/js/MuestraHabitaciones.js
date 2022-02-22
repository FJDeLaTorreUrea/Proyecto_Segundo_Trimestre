
console.log("hola");









$.ajax({

})

$(document).ready(function(){
    
    $.ajax({
        dataType: "json",
        type:"get",
        url: "/habitaciones/todas/1",
        data: "",
        beforeSend: function()
        {
            $("#loading").css({
                "display": "block",
                "width": "100%"
            })
        }, 
        success: function(data)
        {
            debugger;
            $("#loading").css({
                "display": "none"
            })
            
            for(let i=0;i<6;i++)
            {
                $("#contenimagen"+i).css({
                    "position":"relative",
                    "background-image":"url('imagenes/"+data[0][i].nombre+"')",
                    "width":"1000px",
                    "height":"360px"
                })
                $("#tipo"+i).text(data[3][i].Nombre);
            }
        }




    })









    
    /*$ .getJSON("/habitaciones/todas",function(data){
        console.log("url(imagenes/"+data[0].Nombre+")");
        debugger;
        for(let i=0;i<6;i++)
        {
            $("#contenimagen"+i).css({
                "position":"relative",
                "background-image":"url('imagenes/"+data[0][i].Nombre+"')",
                "width":"1000px",
                "height":"360px"
            })
            $("#tipo"+i).text(data[1][i].tipo.nombre);
        }
        
        
    }) */
})