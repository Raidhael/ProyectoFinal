$(function () {
    ss_editable();
    
});


function ss_editable(){
    $('.btn').click(function (){
        var $boton = $(this);
        if ($($boton).parent().hasClass('img-perfil'))
        var $id = $($boton).parent().find('.ss-perfil-titulo').attr('id');
        else
        var $id = $($boton).parent().find('.ss-perfil-datos').attr('id');

        $($boton).addClass('ss-fade-out');
        $.get({
            url: 'includes/ajax/botonesPerfil.ajax.php',
            success: function (data){
                $($boton).parent().append(data);
            },
            complete: function () {
                $($boton).css('display','none');
                $('#acciones').addClass('ss-fade-in');

                $('.done').click(ss_editar($id));
                $('.cancel').click(function(){
                    $($boton).css('display','inline-block').removeClass('ss-fade-out').addClass('ss-fade-in');
                    $('#acciones').remove();
                });

            }
        })
        
    })
}

/*FUNCIONES*/
function ss_editar(id){
    if (id == 'img_perfil')
        var val =$('#'+id+'~figure img').attr('src');
    else
        var val=$('#'+id).html();


        alert(val);
}