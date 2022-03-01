$(document).ready(function()
{
    $.ajax({
        dataType:"json",
        type:"get",
        url:"/recupera/tipos/habitaciones",
        success:function(data)
        {
            for(let i=0;i<data[0].length;i++)
            {
                debugger;
                $("#select_tipo_habitaciones").append($("<option>",{
                    value:i,
                    text:data[0][i].Nombre
                }));
            }
            
        }
    })
})