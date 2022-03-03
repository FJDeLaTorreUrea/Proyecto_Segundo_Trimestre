$(document).ready(function()
{
    var id_usuario=$("#id_usuario").val();
    









    restaFechas = function(f1,f2)
    {
    var aFecha1 = f1.split('/');
    var aFecha2 = f2.split('/');
    var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
    var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
    }




    var dato=window.location.href;
    var datos=dato.split("/")
    var datoUrl=datos[4];
    
   
    var dia_inicio=datos[5].substring(0,2);
    var mes_inicio=datos[5].substring(2,4);
    var ano_inicio=datos[5].substring(4,8);

    var dia_fin=datos[6].substring(0,2);
    var mes_fin=datos[6].substring(2,4);
    var ano_fin=datos[6].substring(4,8);

    var fecha_inicio_base_datos=mes_inicio+"/"+dia_inicio+"/"+ano_inicio;
    var fecha_fin_base_datos=mes_fin+"/"+dia_fin+"/"+ano_fin;

    var fecha_inicio=dia_inicio+"/"+mes_inicio+"/"+ano_inicio;
    var fecha_fin=dia_fin+"/"+mes_fin+"/"+ano_fin;
    var dias=restaFechas(fecha_inicio,fecha_fin);
    
    var form=new FormData();
    form.append("id",datoUrl);

    
    $.ajax({
        data:form,
        contentType:false,
        processData:false,
        url:"/recupera/datos/habitacion/",
        dataType:"json",
        type:"POST",
        success:function(data)
        {
            
            $("#Numero_habitacion").val(data[0].nHabitacion);
            $("#tipo").val(data[0].Tipo.nombre);
            $("#fecha_inicio").val(fecha_inicio);
            $("#fecha_fin").val(fecha_fin);
            $("#adultos").val(data[0].Adultos);
            $("#menores").val(data[0].Menores);
            $("#precio").text((((data[0][definePrecio()])-0)*dias)+" euros")
            function definePrecio()
            {
                var fecha_actual=new Date();
                for(let i=0;i<data[1].length;i++)
                {
                    
                    
                    let DateInicio=new Date(data[1][i].fechaInicio.timestamp*1000);
                    let DateFin=new Date(data[1][i].fechaFin.timestamp*1000);

                    let diaInicio=DateInicio.getDate();
                    let mesInicio=DateInicio.getMonth();
                    let diaFin=DateFin.getDate();
                    let mesFin=DateFin.getMonth();
                    let DateModIni=new Date(fecha_actual.getFullYear(),mesInicio,diaInicio)
                    let DateModFin=new Date(fecha_actual.getFullYear(),mesFin,diaFin)
                    if(fecha_actual>=DateModIni && fecha_actual<=DateModFin)
                    {
                        debugger;
                        var temporada=data[1][i].Nombre;
                        var temporada_arr=temporada.split("_");
                        var temp_final="precio"+temporada_arr[0]+temporada_arr[1];
                        console.log(temp_final);
                        return temp_final;
                        
                    }

                    
                }

        }
        $("#reservar").on("click",function(ev)
        {
            ev.preventDefault();
            var form=new FormData();
            form.append("id_habitacion",data[0].id);
            form.append("id_usuario",id_usuario)
            form.append("fecha_inicio",fecha_inicio_base_datos);
            form.append("fecha_fin",fecha_fin_base_datos);
            form.append("precio",((data[0][definePrecio()])-0)*dias);
            form.append("adultos",data[0].Adultos);
            form.append("menores",data[0].Menores);

            $.ajax({
                data:form,
                contentType:false,
                processData:false,
                url:"/inserta/reserva",
                dataType:"json",
                type:"POST",
                success:function()
                {
                    alert("reserva");
                }
    
    
    
    
            })
        })

        
        



    }})

    









})