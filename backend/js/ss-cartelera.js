$(function () {
    ss_muestraPeliculas();
})


/*Cartelera FUNCIONES*/
function ss_Paginacion_Cartelera(){
    $('.ss-cartelera-paginacion a').click(function (e) {
        e.preventDefault();
        var numPag = parseInt($('#pag').val());
        if ($(this).hasClass('ss-prev-pag'))var pag = parseInt(numPag -1);     
        else if ($(this).hasClass('ss-next-pag'))var pag = parseInt($('#pag').val()) + 1;
        else var pag = $(this).text();    
        $('#pag').val(pag)
        ss_muestraPeliculas();

    });
}
function ss_muestraPeliculas(){
        var pag = $('#pag').val();

        
        $.ajax({
            url: '/includes/ajax/cartelera.ajax.php',
            type: 'post',
            data: {'pag':pag},
            success: function (data){
                $('#contenido').html(data);
    
            },
            complete: function () {
                ss_Paginacion_Cartelera();
                $('.ss-grid-cartelera-item').click(function(){
                    var id = $(this).find('figure').attr('id');
                    ss_img_popUp(id);
                });
                if ($('#id').val() != '') ss_img_popUp($('#id').val());
            },
            error: function () {
                $('ss-grid-cartelera').append('<h4> ¡Ups! Ha ocurrido un error. Porfavor regargue la pagina en en unos mintuos, si el error persiste, contacte con nosotros.</h4>')
            }
        });
    }

function ss_img_popUp(id){
    $.ajax({
        url: '/includes/ajax/popUpCartelera.ajax.php',
        type: 'post',
        dataType:'json',
        data: {'id':id},
        success: function (data){
            $('.modal-title').text(data['titulo']);
            $('.ss-img-cartelera img').attr('src',data['img_pelicula']).attr('alt',data['titulo']);
            $('ss-item-titulo-cartelera h4').text(data['titulo']);
            $('.ss-item-specs-cartelera h5').text(data['tipo']);
            $('.ss-item-duracion-cartelera h5').text(data['duracion']+'min');
            $('.ss-item-sipnopsis-cartelera').text(data['sipnopsis']);

        },
        complete: function () {
            $('#pelicula').modal('show');
        }
    });
}