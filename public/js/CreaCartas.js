

    $(document).ready(function (){
        //console.log("/habitaciones/todas/"+definePagina());
        
        
        function pintaPaginador()
        {
            
            $.ajax({
                dataType:"json",
                type:"get",
                url:"/habitaciones/todas/1",
                data:"",
                beforeSend:function()
                {
                    $("#spinner").css({
                        "display":"block"
                    })
                },
                success: function(data)
                {
                    $("#spinner").css({
                        "display":"none"
                    })
                    var paginas=data[4].substr(-1);
               
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
               
               
           
            for(let i=0;i<data[1].length;i++)
                            {
                                let contenedor=$("#contenedor_habitaciones");
                                let fila=$("<div class='row'></div>");
                                let carta=$("<div class='card mb-12' style='max-width:800px; min-width:800px;'></div>");
                                let gut=$("<div class='row no-gutters'></div>")
                                let columImagen=$("<div class='col-md-4'></div>")
                                let imagen=$("<img width=265.99px  height=182.4px src='../imagenes/"+data[0][i].nombre+"' class='imagen'></img>")
                                let precio=$("<div class='col-md-6'></div>")
                                paginas=data[4].substr(-1)-0;
                    
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
                                let precioInsertado=data[1][i][definePrecio()];
                                function defineTipo()
                                {
                                    let iden=data[1][i].tipo_id;
                                    for (let j=0;j<data[3].length;j++)
                                    {
                                        if(data[3][j].id==iden)
                                        {
                                            return data[3][j].Nombre;
                                        }
                                    }
                                }
                                let columContenido=$("<div class='col-md-6'></div>")
                                let bodycarta=$("<div class='card-body'></div>")
                                let titulocarta=$("<h5 class='card-title'>"+defineTipo()+"</h5>")
                                let textocarta=$("<p class='card-text'>"+data[1][i].descripcion+"</br> Adultos: "+data[1][i].adultos+" &nbsp; Menores: "+data[1][i].menores+"&nbsp;&nbsp;&nbsp;<span id='precio'><h5> desde "+precioInsertado+" euros</h5></span></p>")
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
        pintaPaginador();
        
        

            
        $(document.body).on("click",".numero_pagina",function()
        {


            
            
                    $("#paginador").attr("pagina",$(this).text())
                    $.ajax({
                        dataType:"json",
                        type:"get",
                        url:"/habitaciones/todas/"+$("#paginador").attr("pagina"),
                        data:"",
                        beforeSend: function()
                        {
                            
                            $("#spinner").css({
                                "display":"block"
                            })
                            $("#contenedor_habitaciones").children().remove();
                        },
                        success: function(data)
                        {
                            
                            $("#spinner").css({
                                "display":"none"
                            })
                            
                            
                            for(let i=0;i<data[1].length;i++)
                        {
                            let contenedor=$("#contenedor_habitaciones");
                            let fila=$("<div class='row'></div>");
                            let carta=$("<div class='card mb-12' style='max-width:800px; min-width:800px;'></div>");
                            let gut=$("<div class='row no-gutters'></div>")
                            let columImagen=$("<div class='col-md-4'></div>")
                            let imagen=$("<img width=265.99px  height=182.4px src='../imagenes/"+data[0][i].nombre+"' class='imagen'></img>")
                            let precio=$("<div class='col-md-6'></div>")
                            paginas=data[4].substr(-1)-0;
                
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
                            let precioInsertado=data[1][i][definePrecio()];
                            function defineTipo()
                            {
                                let iden=data[1][i].tipo_id;
                                for (let j=0;j<data[3].length;j++)
                                {
                                    if(data[3][j].id==iden)
                                    {
                                        return data[3][j].Nombre;
                                    }
                                }
                            }
                            let columContenido=$("<div class='col-md-6'></div>")
                            let bodycarta=$("<div class='card-body'></div>")
                            let titulocarta=$("<h5 class='card-title'>"+defineTipo()+"</h5>")
                            let textocarta=$("<p class='card-text'>"+data[1][i].descripcion+"</br> Adultos: "+data[1][i].adultos+" &nbsp; Menores: "+data[1][i].menores+"&nbsp;&nbsp;&nbsp;<span id='precio'><h5> desde "+precioInsertado+" euros</h5></span></p>")
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
                    

                    $('html, body').animate({
                        scrollTop: $("#next").offset().top
                    }, 500);
                
        });



        
        /* function definePagina()
         {
            $.getJSON("/habitaciones/todas/"+1,function(data){
            
                let n_paginas=data[4].substr(-1)
                 function pagina(pagina)
                {
                    return pagina-0;
                } 
                debugger;
                
                for(let i=0;i<n_paginas;i++)
                {
                    let numero=$("<span class='numero_pagina'>"+(i+1)+"</span>")
    
                    $("#paginador").append(numero)

                    pagina=$(".numero_pagina").on("click",function()
                    {
                        
                        
                        pagina=$(this).text()-0;

                        $("#paginador").attr("pagina",pagina)
                        
                        
                    })
                    
                }
                

            })
         } */
        
    
    
    });

    







    





