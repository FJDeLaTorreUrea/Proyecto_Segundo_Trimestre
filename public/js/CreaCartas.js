    $(document).ready(function (){
        $("#spinner").css({
            "display":"none"
        });
        $("#Comprobar").on("click",function(ev)
        {
            ev.preventDefault();
            var fecha_inicio=$(".calendario1").val();
            var fecha_fin=$(".calendario2").val();

            var fecha_inicio_sep=fecha_inicio.split("/");
            console.log(fecha_inicio_sep);
            var mes_inicio=fecha_inicio_sep[0];
            var dia_inicio=fecha_inicio_sep[1];
            var ano_inicio=fecha_inicio_sep[2];
            var fecha_inicio_mod=dia_inicio+mes_inicio+ano_inicio;

            var fecha_fin_sep=fecha_fin.split("/");
            console.log(fecha_fin_sep);
            var mes_fin=fecha_fin_sep[0];
            var dia_fin=fecha_fin_sep[1];
            var ano_fin=fecha_fin_sep[2];
            var fecha_fin_mod=dia_fin+mes_fin+ano_fin;
            








            var adultos=$("#adultos option:selected").text();
            var menores=$("#menores option:selected").text();
            var tipo=$("#select_tipo_habitaciones option:selected").text();

            var form= new FormData();
            form.append("fecha_inicio",fecha_inicio);
            form.append("fecha_fin",fecha_fin);
            form.append("adultos",adultos);
            form.append("menores",menores);
            form.append("tipo",tipo);
            $.ajax({
                data:form,
                contentType:false,
                processData:false,
                url:"/habitaciones/todas/",
                dataType:"json",
                type:"POST",
                beforeSend:function()
                {
                    $("#spinner").css({
                        "display":"block"
                    })
                },
                success:function(data)
                {
                    $("#contenedor_habitaciones").children().remove();
                    $("#paginador").children().remove();
                    if(data[0].length==0)
                    {
                        $("#contenedor_habitaciones").append("<div class'row'><div class='col-md-12'><h2>No se han encontrado resultados</h2></div></div>");
                    }
                    debugger;
                    $("#spinner").css({
                        "display":"none"
                    })
                    var paginas=data[1].substr(-1);

                    for(let i=0;i<paginas;i++)
                    {
                    
                    let numero=$("<span class='numero_pagina'>"+(i+1)+"</span>")
                        
                    $("#paginador").append(numero)          
                    $(".numero_pagina").css(
                    {
                        "font-size": "1.7rem",
                        "border-left":"1px",
                        "border-right":"1px",
                        "border-color":"black",
                        "padding":"9px",
                        "border-collapse":"true",
                        "color":"black",
                        "cursor":"pointer",
                    }
                    )
                    $("#paginador").css(
                    {
                        "text-aling":"center",
                        
                        "border":"2px solid #FFBA5A",
                        "background-color":"#FFBA5A"
                    })
                    } 

                    for(let i=0;i<data[0].length;i++)
                            {
                                let contenedor=$("#contenedor_habitaciones");
                                let fila=$("<div class='row'></div>");
                                let carta=$("<div class='card mb-12' style='max-width:800px; min-width:800px; cursor:pointer; '></div>");
                                carta.on("click",function()
                                {
                                    
                                    $(location).attr('href',"/reserva/"+data[0][i].n_habitacion+"/"+fecha_inicio_mod+"/"+fecha_fin_mod);
                                })
                                let gut=$("<div class='row no-gutters'></div>")
                                let columImagen=$("<div class='col-md-4'></div>")
                                let imagen=$("<img width=265.99px  height=182.4px src='../imagenes/"+defineImagen()+"' class='imagen'></img>")
                    
                                function defineImagen()
                                {
                                    for(let i=0;i<data[0].length;i++)
                                    {
                                        for(let j=0;j<data[3].length;j++)
                                        {
                                            if(data[0][i].n_habitacion==data[3][j].habitacion.nHabitacion)
                                            {
                                                let imagen=data[3][j].Nombre;
                                                
                                                console.log(imagen);
                                                return imagen;
                                            }
                                        }
                                    }
                                }

                                function defineTipo()
                                {
                                    for(let i=0;i<data[0].length;i++)
                                    {
                                        for(let j=0;j<data[3].length;j++)
                                        {
                                            if(data[0][i].n_habitacion==data[3][j].habitacion.nHabitacion)
                                            {
                                                let tipo=data[3][j].habitacion.tipo.nombre;
                                                
                                                console.log(imagen);
                                                return tipo;
                                            }
                                        }
                                    }
                                }

                                
                                
                                
                                
                                
                                
                                
                                let precio=$("<div class='col-md-6'></div>")
                                paginas=data[1].substr(-1)-0;
                    
                                /* function devuelvePaginas()
                                {
                                    let paginas=data[4].substr(-1)-0;
                                    return paginas;
                                }  */
                    
                                function definePrecio()
                                {
                                    var fecha_actual=new Date();
                                    for(let i=0;i<data[2].length;i++)
                                    {
                                        
                                        
                                        let DateInicio=new Date(data[2][i].fechaInicio.timestamp*1000);
                                        let DateFin=new Date(data[2][i].fechaFin.timestamp*1000);
                    
                                        let diaInicio=DateInicio.getDate();
                                        let mesInicio=DateInicio.getMonth();
                                        let diaFin=DateFin.getDate();
                                        let mesFin=DateFin.getMonth();
                                        let DateModIni=new Date(fecha_actual.getFullYear(),mesInicio,diaInicio)
                                        let DateModFin=new Date(fecha_actual.getFullYear(),mesFin,diaFin)
                                        if(fecha_actual>=DateModIni && fecha_actual<=DateModFin)
                                        {
                                            
                                            var temporada=data[2][i].Nombre.toLowerCase();
                                            
                                            
                                            
                                            return temporada;
                                            
                                        }
                    
                                        
                                    }
                                    
                                }
                                let precioInsertado=data[0][i][definePrecio()];
                                
                                let columContenido=$("<div class='col-md-6'></div>")
                                let bodycarta=$("<div class='card-body'></div>")
                                let titulocarta=$("<h5 class='card-title'>"+defineTipo()+" nº:"+data[0][i].n_habitacion+"</h5>")
                                let textocarta=$("<p class='card-text'>"+data[0][i].descripcion+"</br> Adultos: "+data[0][i].adultos+" &nbsp; Menores: "+data[0][i].menores+"&nbsp;&nbsp;&nbsp;<span id='precio'><h5> desde "+precioInsertado+" euros</h5></span></p>")
                                $(".card-text").css({
                                    "padding-right":"300px"
                                })
                                fila.append(carta);
                                carta.append(gut);
                                gut.append(columImagen);
                                gut.append(columContenido);
                                columImagen.append(imagen);
                                columContenido.append(bodycarta);
                                bodycarta.append(titulocarta);
                                bodycarta.append(textocarta);
                    
                                
                    
                    
                    
                                fila.append()
                                contenedor.append(fila);
                                $("#precio h5").css({
                                    "color": "#FFBA5A"
                                })
                                    
                                
                    
                                
                            }



















                }
            })
        }
        
    )});

    







    





