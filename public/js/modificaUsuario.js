$(document).ready(function()
    {
        var Id=$("#id");
        var Nombre=$("#nombre");
        var Apellido=$("#apellido");
        var Telefono=$("#telefono");
        var Direccion=$("#direccion");

        var Id_default=$("#id").val();
        var Nombre_default=Nombre.val();
        var Apellido_default=Apellido.val();
        var Telefono_default=Telefono.val();
        var Direccion_default=Direccion.val();

        var Nombre_cambiado=false;
        var Apellido_cambiado=false;
        var Telefono_cambiado=false;
        var Direccion_cambiada=false;

        
        Nombre.on("change",function()
        {
            if(Nombre.val()==Nombre_default)
            {
               
                Nombre_cambiado=false;
                if(Nombre_cambiado==false && Apellido_cambiado==false && Telefono_cambiado==false && Direccion_cambiada==false)
                {
                    $("#Guardar").attr("disabled","");
                }
            }
            else
            {
                
                $("#Guardar").removeAttr("disabled");
                Nombre_cambiado=true;
                console.log(Id_default);
                
            }
            
        })

        Apellido.on("change",function()
        {
            if(Apellido.val()==Apellido_default)
            {
                
                Apellido_cambiado=false;
                if(Nombre_cambiado==false && Apellido_cambiado==false && Telefono_cambiado==false && Direccion_cambiada==false)
                {
                    $("#Guardar").attr("disabled","");
                }
            }
            else
            {
               
                $("#Guardar").removeAttr("disabled");
                Apellido_cambiado=true;
                
            }
            
        })

        Telefono.on("change",function()
        {
            if(Telefono.val()==Telefono_default)
            {
               
                Telefono_cambiado=false;
                if(Nombre_cambiado==false && Apellido_cambiado==false && Telefono_cambiado==false && Direccion_cambiada==false)
                {
                    $("#Guardar").attr("disabled","");
                }
            }
            else
            {
                
                $("#Guardar").removeAttr("disabled");
                Telefono_cambiado=true;
                
            }
            
        })

        Direccion.on("change",function()
        {
            if(Direccion.val()==Direccion_default)
            {
                Direccion_cambiada=false;
                if(Nombre_cambiado==false && Apellido_cambiado==false && Telefono_cambiado==false && Direccion_cambiada==false)
                {
                    $("#Guardar").attr("disabled","");
                }
            }
            else
            {
                $("#Guardar").removeAttr("disabled");
                Direccion_cambiada=true;
                
                
            }
            
        })



        

        $("#Guardar").on("click",function(ev)
        {
            ev.preventDefault();

            var form = new FormData();
            form.append("id",Id_default);
            form.append("Nombre",Nombre.val());
            form.append("Apellidos",Apellido.val());
            form.append("Telefono",Telefono.val());
            form.append("Direccion",Direccion.val());

            $.ajax({
                data:form,
                contentType:false,
                processData:false,
                url:"/perfil/datos/modifica/usuario/consul/",
                type:"POST",
                success:function()
                {
                    location.reload();
                }



            })
            
            
            

        })
    }
    
    
)