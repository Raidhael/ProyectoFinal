$(function () {
    ss_eliminar_pelicula();
    edita_pelicula();
});

function ss_eliminar_pelicula (){
    $('#borrar').click(function () {
        var id = $('.ss-grid-edita-peliculas').find('figure').attr('id');
        $.ajax({
            url: '/backend/includes/ajax/ss-eliminar-pelicula.ajax.php',
            type: 'post',
            dataType:'text',
            data: {'id':id},
            complete: function (data){
                if (data){
                $('#new-navigation').find('.ss-slider-navigation-right').trigger('click');
                $('.ss-main-container').find('.alert').remove().append('<div class="alert alert-success">Se ha insertado correctamente la película</div>');
                
                }else
                $('.ss-main-container').find('.alert').remove().append('<div class="alert alert-danger"> ¡Ups! No se ha podido eliminar la película</div>');
                $('#borrado').modal('toggle');    
            }
        });
    });
}

function edita_pelicula () {
    $('#edicion').click(function (){
        $('#editaPelicula input, #editaPelicula textarea').off();
        $titulo = $('.ss-item-titulo h4').text();
        $specs = $('.ss-item-specs h5').text();
        $duracion = $('.ss-item-duracion h5').text();
        $duracion = $duracion.split('min')[0];
        $sipnopsis = $('.ss-item-sipnopsis').text();
        $('#titulo_edita').val($titulo);
        $('#tipo_edita').val($specs);
        $('#duracion_edita').val($duracion);
        $('#sipnopsis_edita').val($sipnopsis);
        $('#identificador').val($('.ss-img-slider').attr('id'));
        edita_campos_pelicula();
    });
}


function edita_campos_pelicula(){
    $('#ss-editar-pelicula').click(function (){
            var formData = new FormData(document.getElementById("editaPelicula"));
            $.ajax({
                url: '/backend/includes/ajax/ss-edita-pelicula.ajax.php',
                data: formData,
                dataType: 'json',
                type: 'post',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data){
                    console.log(data);
                    $('#ss-edicion-pelicula').modal('hide');
                    $('.ss-item-titulo h4').text(data['titulo']);
                    $('.ss-item-specs h5').text(data['tipo']);
                    $('.ss-item-duracion h5').text(data['duracion']+'min');
                    $('.ss-item-sipnopsis').text(data['sipnopsis']);
                    $('.ss-img-slider img').attr('src',data['img_pelicula']);
                    $('.ss-grid-edita-peliculas').addClass('ss-fade-in');
                },
                error: function(){
                    console.log('error ajax edita');
                }
            });
    });
}

























