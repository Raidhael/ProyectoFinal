$( function () {
    /*control de eventos*/
    controlaEventos();

    $(window).resize(controlaEventos);
   

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
    $('.ss-navBar ul li a').click( function (e){
        e.preventDefault();
        $('li').removeClass('ss-navBar-active');
        $(this).parent().addClass('ss-navBar-active');
    })
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
                console.log(scroll);
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