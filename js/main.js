    var map = L.map('mapa').setView([19.2327,-99.6740], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([19.2327,-99.6740]).addTo(map)
          .bindPopup('Aqui estoy.')
          .openPopup();
    


$(function(){

    // lettering
    $('.nombre-sitio').lettering();

    // agregar clase al menu
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitado")').addClass('activo');


    // menu fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
       var scroll = $(window).scrollTop(); 
       if (scroll > windowHeight) {
           $('.barra').addClass('fixed');
           $('body').css({'margin-top': barraAltura+'px'});
       }else{
        $('.barra').removeClass('fixed');
        $('body').css({'margin-top': '0px'});
       }
    });

    // menu responsive
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });
   
    // programa conferencias 
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    })

    // animacion de conferencias
    var resumenLista = $('.resumen-evento');
    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function(){
            $('.resumen-evento li:nth-child(1) p').animateNumber({number:6}, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({number:15}, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({number:3}, 1500);
            $('.resumen-evento li:nth-child(4) p').animateNumber({number:9}, 1500);
        },{offset: '60%'});
    }

    // cuenta regresiva
    $('.cuenta-regresiva').countdown('2019/12/22 01:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    // colorbox
    $('.invitado-info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});

});