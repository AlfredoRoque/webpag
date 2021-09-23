// guarda y actualiza registros sin llevar a la pagina de accion
$(document).ready(function(){
    $('#guardar-registro').on('submit', function(e){
        // evita que habra el archivo y solo envia los datos
        e.preventDefault();
        // Guardar los datos recividos
        var datos = $(this).serializeArray();

        // llamado ajax
        $.ajax({
            // tipo de request(ya sea post o get)
            type: $(this).attr('method'),
            // datos recividos
            data: datos,
            // a donde se enviaran
            url: $(this).attr('action'),
            // tipo de dato
            dataType: 'json',
            // si es exitoso
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    )
                    if(resultado.tipo == "evento"){
                        window.location = "lista-evento.php";
                    }else if(resultado.tipo == "categoria"){
                        window.location = "lista-categoria.php";
                    }else if(resultado.tipo == "invitado"){
                        window.location = "lista-invitados.php";
                    }else if(resultado.tipo == "registrado"){
                        window.location = "lista-registrados.php";
                    }else if(resultado.tipo == "admin"){
                        window.location = "lista-admin.php";
                    }
                }else{
                    swal({
                        type: 'error',
                        title: 'Algo salio mal!!',
                        text: 'Revise que toda la información sea correcta',
                      })
                }
            }
        })
    });

    // se ejecuta cuando hay un archivo
    $('#guardar-registro-archivo').on('submit', function(e){
        // evita que habra el archivo y solo envia los datos
        e.preventDefault();
        // Guardar los datos recividos
        var datos = new FormData(this);

        // llamado ajax
        $.ajax({
            // tipo de request(ya sea post o get)
            type: $(this).attr('method'),
            // datos recividos
            data: datos,
            // a donde se enviaran
            url: $(this).attr('action'),
            // tipo de dato
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            // si es exitoso
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    )
                    if(resultado.tipo == "evento"){
                        window.location = "lista-evento.php";
                    }else if(resultado.tipo == "categoria"){
                        window.location = "lista-categoria.php";
                    }else if(resultado.tipo == "invitado"){
                        window.location = "lista-invitados.php";
                    }else if(resultado.tipo == "registrado"){
                        window.location = "lista-registrados.php";
                    }else if(resultado.tipo == "admin"){
                        window.location = "lista-admin.php";
                    }
                }else{
                    swal({
                        type: 'error',
                        title: 'Algo salio mal!!',
                        text: 'Revise que toda la información sea correcta',
                      })
                }
            }
        })
    });

    // eliminar un registro
    $('.borrar-registro').on('click', function(e){
        
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        swal({
            title: 'Estas seguro?',
            text: "No podras revertir los cambios!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar',
            cancelButtonText: 'Cancelar'
            }).then(function(e) {
                if(e.value){
                    console.log(id);
                $.ajax({
                    type: 'post',
                    data:{
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success:function (data) {
                        var resultado = JSON.parse(data);
                        if(resultado.respuesta == 'exito'){
                            swal(
                                'Borrado!',
                                'Registro eliminado.',
                                'success'
                              )
                              jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                        }else{
                            swal(
                                'Error!',
                                'No se pudo eliminar.',
                                'error'
                              )
                        }
                        
                    }
                })
              }
            });
    });


});