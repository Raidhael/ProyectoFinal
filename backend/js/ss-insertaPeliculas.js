$(function () {
    ss_eliminar_pelicula();
    $('.btn-success').click(function (){
        $('#new-navigation').find('.ss-slider-navigation-right').trigger('click');
    });
});



function ss_eliminar_pelicula (){
    $('.btn-danger').click(function () {
        var id = $(this).parent().parent().find('figure').attr('id');
        
        $.ajax({
            url: '/backend/includes/ajax/ss-eliminar-pelicula.ajax.php',
            type: 'post',
            dataType:'json',
            data: {'id':id},
            complete: function (data){
                if (data)
                $('#new-navigation').find('.ss-slider-navigation-right').trigger('click');
            }
        });
    });
}