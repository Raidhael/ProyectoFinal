$(function () {
    ss_muestraPeliculas();
})


/*Cartelera FUNCIONES*/
function ss_Paginacion_Cartelera(){
    $('.ss-cartelera-paginacion a').click(function (e) {
        e.preventDefault();
        var pag = $(this).html();
        alert(pag);
        $('#pag').val(pag);
        alert($('#pag').val());
        ss_muestraPeliculas();

    });
}
function ss_muestraPeliculas(){
        if ($('#pag').val() != null) var pag = $('#pag').val();
        else   var pag = 0;
        if (window.matchMedia('(max-width: 1080px)').matches) var device = 0;
        else var device = 1;


        $.ajax({
            url: './includes/ajax/cartelera.ajax.php',
            type: 'post',
            data: {'pag':pag, 'device':device},
            beforeSend: function () {
                alert('Valor de la pagina ='+  pag);
            },
            success: function (data){
                alert('hecho');
                $('#contenido').html(data);
    
            },
            complete: function () {
                ss_Paginacion_Cartelera();
            },
            error: function () {
                $('ss-grid-cartelera').append('<h4> ¡Ups! Ha ocurrido un error. Porfavor regargue la pagina en en unos mintuos, si el error persiste, contacte con nosotros.</h4>')
            }
        });
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