$(function () {
    ss_eliminar_pelicula();
});



function ss_eliminar_pelicula (){
    $('#borrar').click(function () {
        var id = $('.ss-grid-edita-peliculas').find('figure').attr('id');
        $.ajax({
            url: '/backend/includes/ajax/ss-eliminar-pelicula.ajax.php',
            type: 'post',
            dataType:'json',
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