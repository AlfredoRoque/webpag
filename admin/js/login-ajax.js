$(document).ready(function(){

// Inicio de sesion de administrador
$('#login-admin').on('submit', function(e){
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
         // si es exitoso
         success: function(data){
            var resultado = data;
            if(resultado.respuesta == 'exitoso'){
                swal(
                     'Correcto',
                     'El admin '+resultado.usuario +' se conecto',
                     'success'
                     
                )
                
                // redireccionar al area de administrador
                setTimeout(function () {
                    window.location.href = 'admin-area.php'
                }, 2000);
            }else{
                swal({
                    type: 'error',
                    title: 'Ora2!!',
                    text: 'Something went wrong!'
                  })
            }
        }
    })
});
});