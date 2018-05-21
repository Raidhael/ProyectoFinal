$(function () {
    ss_editable();
    
});


function ss_editable(){
    $('.btn').click(function (){
        if ($(this).parent().hasClass('img-perfil'))
        var $id = $(this).parent().find('.ss-perfil-titulo').attr('id');
        else
        var $id = $(this).parent().find('.ss-perfil-datos').attr('id');
        ss_editar($id);
    })
}


function ss_editar(id){
    var val=$('#'+id).html();
    alert(val);
}