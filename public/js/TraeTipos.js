$(document).ready(function()
{
    
    $.ajax({
        dataType:"json",
        type:"get",
        url:"/recupera/tipos/habitaciones",
        
        success:function(data)
        {
            debugger;
            for(let i=0;i<data.length;i++)
            {
                
                $("#select_tipo_habitaciones").append($("<option>",{
                    value:i,
                    text:data[i].Nombre
                }));
            }
            
        }
    })
})