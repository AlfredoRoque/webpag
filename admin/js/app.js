$(document).ready(function () {
    $('.sidebar-menu').tree()
    // 
    $('#registros').DataTable({
    //   numero de paginas
      'paging'      : true,
    //  tamaño predeterminado de registros que muestra por pagina
      'pageLength'  :8,
    //   Cambiar el numero de registros mostrados
      'lengthChange': false,
    //   Buscador
      'searching'   : true,
    //   boton para cambiar el oreden
      'ordering'    : true,
    //   iforma cuantos registros se muestran
      'info'        : true,
    //   
      'autoWidth'   : false,
    //   idioma
      'language'    :{
        //   para el control de paginas
          paginate: {
              next: 'Siguiente',
              previous: 'Anterior',
              last: 'Ultima',
              first: 'Primera'
          },
        // informacion  
          info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        //   buscador
          search: 'Buscar',
        //   tabla vacia
          emptyTable: 'No hay registros',
          infoEmpty: 'Sin registros'
      }
    })


  // deshabilitar el boton mientras no coincidan las contraseñas
$('#crear_registro_admin').attr('disabled', true);

// Comprobar la contraseña dos veces
// con blur comprueba al final y con input es en tiempo real
$('#repetir-password').on('input', function(){
  var password_nuevo = $('#password').val();

  if($(this).val() == password_nuevo){
    $('#resultado-password').text('Correcto');
    $('#resultado-password').parents('.form-group').addClass('has-success').removeClass('has-error');
    $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
    // habolitar el boton 
    $('#crear_registro_admin').attr('disabled', false);
  }else{
    $('#resultado-password').text('No coinciden');
    $('#resultado-password').parents('.form-group').addClass('has-error').removeClass('has-success');
    $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
    $('#crear_registro_admin').attr('disabled', true);
  }
})

//opciones de la fecha
$('#fecha').datepicker({
  autoclose: true
})

    //mostrar opciones de seleccion
    $('.seleccionar').select2();

    // opciones de la hora
$('.timepicker').timepicker({
  showInputs: false
  })

  //opciones de icono
  $('#icono').iconpicker(); 


  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })

  // LINE CHART
  // actualiza la grafica automaticamente con el json recibido
  $.getJSON('servicio-registrados.php', function(dato){
  var line = new Morris.Line({
    element: 'grafica-registros',
    resize: true,
    data: dato,
    xkey: 'fecha',
    ykeys: ['cantidad'],
    labels: ['Item 1'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'
  });
});
});