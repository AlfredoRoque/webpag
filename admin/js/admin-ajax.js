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
                }else{
                    swal({
                        type: 'error',
                        title: 'Ora',
                        text: 'Something went wrong!',
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
                }else{
                    swal({
                        type: 'error',
                        title: 'Ora',
                        text: 'Something went wrong!',
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
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar',
            cancelButtonText: 'Cancelar'
            }).then(function(e) {
                if(e.value){
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
                                'Deleted!',
                                'Archivo eliminado.',
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