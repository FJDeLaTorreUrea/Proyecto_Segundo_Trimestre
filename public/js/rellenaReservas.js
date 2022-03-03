$(document).ready(function()
{
    var tabla=$("#tabla");
    var bodytabla=$("#tbody");
    var id_usuario=$("#id_usuario").val();
    var form=new FormData();
    form.append("id",id_usuario)
    $.ajax({
        data:form,
                contentType:false,
                processData:false,
                url:"/devuelve/reservas",
                dataType:"json",
                async:"true",
                type:"POST",
                success:function(data)
                {
                    debugger;
                    for(let i=0;i<data.length;i++)
                    {
                        $(".dataTables_empty").remove();
                        bodytabla.append("<tr><td>"+data[i].habitacion_id+"</td><td>"+data[i].precio_final+"</td><td>"+data[i].fecha_reserva+"</td><td>"+data[i].fecha_inicio+"</td><td>"+data[i].fecha_fin+"</td><td>"+data[i].adultos+"</td><td>"+data[i].menores+"</td></tr>");
                    }
                    
                    
                }

    })
})