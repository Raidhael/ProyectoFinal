$( function () {
    /*control de eventos*/
    controlaEventos();

    $(window).resize(controlaEventos);
   
    ss_slider_peliculas_active();

    ss_$GET();
});

/*FUNCIONES*/ 
/*control de eventos*/

function controlaEventos () {
 
    ss_navegationBar_active();
    ss_mobile_navigation_heigth();
    /* Eventos resolucion 1080 */
    if (window.matchMedia('(max-width: 1080px)').matches){
        ss_mobile_navigation();
         if ($(window).scrollTop()!=0) $('.ss-navigation').parent().addClass('ss-navBar-movimiento');

         $('.ss-grid-cartelera *:not(:first-child)').removeClass('ss-grid-cartelera-item').addClass('ss-grid-cartelera-item-mobile');
    }
    else {
        //ss_remove_mobile_navigation()
        $('.ss-grid-cartelera *:not(:first-child)').removeClass('ss-grid-cartelera-item-mobile').addClass('ss-grid-cartelera-item');
    };

    /*Se añaade evento de movimiento*/
  
}
function ss_navegationBar_active (){
        var ruta = window.location.pathname;
            ruta = ruta.split('/')[1];
            ruta = ruta.split('.')[0];
            $('#ss-navBar-'+ruta).addClass('ss-navBar-active');
}
function ss_mobile_navigation() {
        //FUNCION DE NAVEGACION NAVBAR + CONTROL DE EVENTO
        if (window.matchMedia('(max-width: 1080px)').matches){
            $('.ss-navigation').click(function (){

                if ( $(window).scrollTop() != 0){
                    $(this).parent().toggleClass('ss-navBar-movimiento');
                };
                
                $(this).toggleClass('ss-navBar-animation');
                $('.ss-navBar ul').toggleClass('ss-navBar-oculto');
                $('.ss-navBar >ul li').toggleClass('ss-navBar-contenido-oculto').delay(1000);
            })
        }
}

function ss_remove_mobile_navigation(){
    $('.ss-navigation').off().removeClass('ss-navBar-animation');
    $('.ss-navBar ul').removeClass('ss-navBar-oculto');
    $('.ss-navBar >ul li').removeClass('ss-navBar-contenido-oculto');
}


function ss_mobile_navigation_heigth(){
    if (window.matchMedia('(min-width: 1080px)').matches){
        $('.ss-navBar').removeClass('ss-navBar-movimiento');
        $(window).off('scroll');
        $(window).scroll(function (){
            var scroll = $(window).scrollTop();
            if ($(window).scrollTop()){
                if (scroll >150) $('.ss-navBar').css({'top':'0', 'heigth':'100vh'});
            }else {
                if (scroll < 300) $('.ss-navBar').css('top','5px');
            }
        });
    }else{
        $(window).scroll(function () {
            if ($(window).scrollTop()) $('.ss-navBar').addClass('ss-navBar-movimiento');
            else $('.ss-navBar').removeClass('ss-navBar-movimiento');
        });
    }
}


/*Funciones slider ultimas peliculas*/


function ss_slider_peliculas_active () {
    $('.ss-slider-navigation-right').click( function (){
        $('.ss-slider-navigation-right svg').toggleClass('ss-rotacion-slider-nav');
        var id = $('.ss-img-slider').attr('id');
        
        $.ajax({
            url: './includes/ajax/sliderPeliculas.ajax.php',
            type: 'post',
            dataType:'json',
            data: {'id':id, 'action':'next'},
            beforeSend : function (){
                $('.ss-grid-ultimas-peliculas *:not(h2):not(.ss-slider-new-navigation):not(.ss-slider-new-navigation *)').removeClass('ss-fade-in').addClass('ss-fade-out');
            },
            success: function (data){
               $('figure.ss-img-slider').attr('id',data['id_pelicula']);
               $('figure.ss-img-slider img').attr('src', data['img_pelicula']).attr('alt',data['titulo']);
               $('div.ss-item-titulo h4').html(data['titulo']);
               $('div.ss-item-specs h5').html(data['tipo']);
               $('div.ss-item-duracion h5').html(data['duracion']+'min');
               $('div.ss-item-sipnopsis').html(data['sipnopsis']);

            },
            complete: function () {
                $('.ss-grid-ultimas-peliculas *:not(h2):not(.ss-slider-new-navigation):not(.ss-slider-new-navigation *)').removeClass('ss-fade-out').addClass('ss-fade-in');
            }
        });
    });

    $('.ss-slider-navigation-left').click( function (){
        $('.ss-slider-navigation-left svg').toggleClass('ss-rotacion-slider-nav');
        var id = $('.ss-img-slider').attr('id');
        $.ajax({
            url: './includes/ajax/sliderPeliculas.ajax.php',
            type: 'post',
            dataType:'json',
            data: {'id':id, 'action':'prev'},
            beforeSend : function (){
                $('.ss-grid-ultimas-peliculas *:not(h2):not(.ss-slider-new-navigation):not(.ss-slider-new-navigation *)').removeClass('ss-fade-in').addClass('ss-fade-out');
            },
            success: function (data){
               $('figure.ss-img-slider').attr('id',data['id_pelicula']);
               $('figure.ss-img-slider img').attr('src', data['img_pelicula']).attr('alt',data['titulo']);
               $('div.ss-item-titulo h4').html(data['titulo']);
               $('div.ss-item-specs h5').html(data['tipo']);
               $('div.ss-item-duracion h5').html(data['duracion']+'min');
               $('div.ss-item-sipnopsis').html(data['sipnopsis']);

            },
            complete: function () {
                $('.ss-grid-ultimas-peliculas *:not(h2):not(.ss-slider-new-navigation):not(.ss-slider-new-navigation *)').removeClass('ss-fade-out').addClass('ss-fade-in');
            }
        });
    });
}


/*FIN funciones slider ultimas peliculas*/


/*$GET FUNCIONES*/
function ss_varsOnUrl(){
    var variables = location.search.replace('?', '').split('&');
    if (variables[0] != ""){
        valores = [];
        variables.forEach(function (element){
        texto = element.split('=');
        valores[texto[0]] = texto[1];
        })
    }else{
        valores = [0];
    }
        return valores;
}


function ss_$GET(){
    var $GET = ss_varsOnUrl();
    pag = 1;
    device = 0;
    if (window.matchMedia('(min-width: 1080px)').matches) device = 1;        
    if ($GET.length != 1){

        if ($GET['pag'].length){
            pag = $GET['pag'];
        }
        $.ajax({
            url: './includes/ajax/cartelera.ajax.php',
            type: 'post',
            data: {'pag':pag, 'device':device},
            success: function (data){
                $('.ss-grid-cartelera-main').html(data);
    
            },
            complete: function () {
                alert('hi');
            },
            error: function () {
                $('ss-grid-cartelera-main').append('<h4> ¡Ups! Ha ocurrido un error. Porfavor regargue la pagina en en unos mintuos, si el error persiste, contacte con nosotros.</h4>')
            }
        });
    }

}

function ss_img_popUp(id){
    $.ajax({
        url: './includes/ajax/popUpCartelera.ajax.php',
        type: 'post',
        dataType:'json',
        data: {'id':id},
        success: function (data){


        },
        complete: function () {
            $('#pelicula').modal('show');
        }
    });
}