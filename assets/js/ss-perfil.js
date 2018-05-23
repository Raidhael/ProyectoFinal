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

        $($boton).addClass('ss-fade-out').css('display','none');

        if ($id == 'img_perfil'){
            $.get({
                url: 'includes/ajax/botonesPerfil-img.ajax.php',
                success: function (data){
                    $($boton).parent().append(data);
                },
                complete: function () {
                    //BOTONES
                    ss_campo_editable($id);
                    ss_form_input($id);
                    ss_button_cancel($id);
                    ss_button_done($id);
                    ss_button_upload($id);
                },
                error: function () {
                    console.log('error ajax');
                }
            }); 
        }else{
            $.get({
                url: 'includes/ajax/botonesPerfil.ajax.php',
                success: function (data){
                    $($boton).parent().append(data);
                },
                complete: function () {
                    //BOTONES
                    ss_campo_editable($id);
                    ss_form_input($id);
                    ss_button_cancel($id);
                    ss_button_done($id);
                },
                error: function () {
                    console.log('error ajax');
                }
            }); 
        }

    });
}

/*FUNCIONES*/
function ss_editar(id){
    
if (id == 'clave'){
    var pass_actual = $('#input-'+id+'-actual').val();
    var pass_nueva = $('#input-'+id+'-nueva').val();
    var pass_repetida = $('#input-'+id+'-repite').val();
if (pass_actual != '' && pass_nueva != '' && pass_repetida != ''){
    if (pass_nueva == pass_repetida){
        $.ajax({
            url: 'includes/ajax/validaDatosPerfil.ajax.php',
            data: {'clave-actual':pass_actual,'clave-nueva':pass_nueva, 'clave-repetida':pass_repetida},
            dataType: 'json',
            type: 'post',
            success: function (data){
                $('#formulario-'+id+' input').removeClass('has-error');
                if (data['bandera'] == false){
                    var $alerta = '<span class="alerta">¡Ooopss!<br>¡No se ha podido completar la solicitud, pruebe mas tarde!</span>';
                    if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
                    $('#formulario-'+id).prepend($alerta);
                    $('#formulario-'+id+' input').removeClass('has-error');
                    $('#formulario-'+id+' input').addClass('has-error');
                } 
                if (data['acceso']== false){
                    var $alerta = '<span class="alerta">¡La clave introducida es erronea!</span>';
                    if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
                    $('#formulario-'+id).prepend($alerta);
                    $('#formulario-'+id+' input').removeClass('has-error');
                    $('#input-'+id+'-actual').addClass('has-error');
                }
                if (data['coinciden'] == false){
                    var $alerta = '<span class="alerta">¡Las claves no coinciden!</span>';
                    if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
                    $('#input-'+id+'-nueva, #input-'+id+'-repite').addClass('has-error').parent().append($alerta);
                }
                if (data['seguridad'] == false){
                    var $alerta = '<span class="alerta">¡La nueva clave no cumple los requisitos de seguridad!</span>';
                    if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
                    $('#formulario-'+id).prepend($alerta);
                    $('#formulario-'+id+' input').removeClass('has-error');
                    $('#input-'+id+'-nueva').addClass('has-error');
                }
            },
            error: function(){
                console.log('error ajax edita');
            }
        });
    }else{
        var $alerta = '<span class="alerta">¡Las claves no coinciden!</span>';
        if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
        $('#formulario-'+id+' input').removeClass('has-error');
        $('#input-'+id+'-nueva, #input-'+id+'-repite').addClass('has-error').parent().append($alerta);
        
    }
}else{
    var $alerta = '<span class="alerta">¡Todos los campos deben ser rellenados!</span>';
    if ($('#formulario-'+id).find('.alerta')) $('#formulario-'+id).find('.alerta').remove();
    $('#formulario-'+id).prepend($alerta);
    $('#formulario-'+id+' input').removeClass('has-error');
    $('#formulario-'+id+' input').addClass('has-error');
}
}else if (id == 'img_perfil'){
    var formData = new FormData(document.getElementById("formulario-"+id));
    
    console.log(val);
    $.ajax({
        url: 'includes/ajax/validaDatosPerfil.ajax.php',
        data: formData,
        dataType: 'json',
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data){
            console.log(data);
        },
        error: function(){
            console.log('error ajax edita');
        }
    });
}else{
var val=$('#input-'+id).val();
    $.ajax({
        url: 'includes/ajax/validaDatosPerfil.ajax.php',
        data: {'id':id,'valor':val},
        dataType: 'json',
        type: 'post',
        success: function (data){
            
            if (data){
                $('#formulario-'+id).remove();
                $('#'+id).parent().find('.acciones').addClass('ss-fade-out').remove();
                $('#'+id).html(val);
                $('#'+id).css('display','inline-block').removeClass('ss-fade-out').addClass('ss-fade-in');
                $('#'+id).parent().find('.btn').removeClass('ss-fade-out').addClass('ss-fade-in').css('display','inline-block');
            }else{
                var $alerta = '<span class="alerta">¡Dato invalido!</span>';
                $('#formulario-'+id).append($alerta);
                $('#formulario-'+id+ ' input').addClass('has-error');
            }
        },
        error: function(){
            console.log('error ajax edita');
        }
    });
  }      
}

function ss_campo_editable(id){
    if (id == 'img_perfil'){
        $('#'+id).addClass('ss-fade-out').css('display','none');
        $formulario = ('<form action="#" id="formulario-'+id+'" method="post" enctype="multipart/form-data"><input type="file" name="'+id+'" id="input-'+id+'"></form>');
        $('#'+id).parent().append($formulario).addClass('ss-fade-in');
    }else if(id == 'clave'){
        $('#'+id).addClass('ss-fade-out').css('display','none');
        $formulario = ('<form action="#" id="formulario-'+id+'"><label for ="input-'+id+'-actual">Clave actual:</label><input type="password" name="'+id+'-actual" id="input-'+id+'-actual"><label for ="input-'+id+'-nueva">Nueva clave:</label><input type="password" name="'+id+'" id="input-'+id+'-nueva"><label for ="input-'+id+'-repite">Repite clave:</label><input type="password" name="'+id+'" id="input-'+id+'-repite"></form>');
        $('#'+id).parent().append($formulario).addClass('ss-fade-in');
    }else{
        var val=$('#'+id).html();
        
        $('#'+id).addClass('ss-fade-out').css('display','none');
        $formulario = ('<form action="#" id="formulario-'+id+'"><input type="text" name="'+id+'" id="input-'+id+'" value="'+val+'"></form>');
        $('#'+id).parent().append($formulario).addClass('ss-fade-in');
    }
        
}

function ss_file_input(id){
    $('#input-'+id).change(function (){
        var val = $(this).val();
    });
}


function ss_form_input(id){
    $('#formulario-'+id+' input').keypress(function (e){
        $('#formulario-'+id).submit(function (e){
            e.preventDefault();
        });
        if (e.keyCode == 13){
            $('#formulario-'+id).parent().find('.done').trigger('click');
        }
    });
}
function ss_button_cancel (id){
    $('#'+id).parent().find('.cancel').click(function(){
        $('#'+id).parent().find('.btn').css('display','inline-block').removeClass('ss-fade-out').addClass('ss-fade-in');
        $('#'+id).css('display','inline-block').removeClass('ss-fade-out').addClass('ss-fade-in');
        $('#formulario-'+id).remove();
        var $Padre=$(this).parent().parent().attr('class');                    
        $Padre = $Padre.split(' ')[0];
        $('.'+$Padre).find('.acciones').addClass('ss-fade-out').remove();
    });
}

function ss_button_done(id){
    $('#'+id).parent().find('.done').click( function (){
        ss_editar(id);        
     });
}

function ss_button_upload(id){
    $('#'+id).parent().find('.upload').click( function (){
        $('#input-'+id).trigger('click');
     });

     $('#input-'+id).change(function (){
        var val = $(this).val();
        val = val.split("\\")[2];
        if($('#'+id).parent().find('.ss-img-subida'))$('#'+id).parent().find('.ss-img-subida').remove();
        $fotoSubida = '<span class="ss-img-subida">'+val+'</span>';
        $('#'+id).parent().find('.acciones').prepend($fotoSubida);
        console.log(val);
     });
}