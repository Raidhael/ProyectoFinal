$(function () {
validaFormulario();
envioFormulario();
});


function validaFormulario(){
  var valida =  $('#ss-registro .form-group input').change(function () {
        var flag = true;

        var id = $(this).attr('id');
        
        if (id == 'nikname') {

            pattern = /^[\w\s]{4,16}$/;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Nikname incorrecto, porfavor introduce un nick valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                $(this).addClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
            };
        }else if (id == 'pwd') {

            pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&\]|[^ ]){8,16}$/;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Clave incorrecta, porfavor introduce una clave valida.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                $(this).addClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
            };
        }else if (id == 'dni') {
            var val = $(this).val();
            pattern = /[\d]{8}[A-Z]{1}/;
            if (!val.match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> DNI incorrecto, porfavor introduce un DNI valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                letraDNI = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
                var dni = $(this).val();
                letra = dni.charAt(dni.length-1);
                dni = dni.substring(0,8);
                resto = dni % 23;
                if (letraDNI[resto] == letra) {
                    
                   var correcto = campoUnico(id,val);
         
                   if (correcto){
                        $(this).removeClass('has-error');
                        if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                        $(this).addClass('is-correct');
                   }else{

                        $(this).removeClass('is-correct');
                        $(this).addClass('has-error');
                        if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                        var alerta = '<span id="alerta-'+id+'"> DNI incorrecto, porfavor introduce un DNI valido.</span>';
                        $(this).parent().append(alerta);
                        flag = false;
                   }

                }else{
                    $(this).removeClass('is-correct');
                    $(this).addClass('has-error');
                    if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                    var alerta = '<span id="alerta-'+id+'"> DNI incorrecto, porfavor introduce un DNI valido.</span>';
                    $(this).parent().append(alerta);
                    flag = false;
                };

                
            };
        }else if (id == 'nombre') {

            pattern = /^[a-z A-Z\s]{2,25}$/;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Nombre incorrecto, porfavor introduce un nombre valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }else if (id == 'ape_1') {

            pattern = /^[a-z A-Z\s]{2,25}$/;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Apellido incorrecto, porfavor introduce un apellido valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }else if (id == 'ape_2') {

            pattern = /^[a-z A-Z\s]{0,25}$/;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Apellido incorrecto, porfavor introduce un apellido valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }else if (id == 'email') {
            var val = $(this).val();
            pattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
            if (!val.match(pattern) && !campoUnico(id,val)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Email incorrecto, porfavor introduce un Email valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{

                var correcto = campoUnico(id,val);
                if (correcto){
                    $(this).removeClass('has-error');
                    if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                    $(this).addClass('is-correct');
                }else{
                    flag = false;
                    $(this).removeClass('is-correct');
                    if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                    var alerta = '<span id="alerta-'+id+'"> Email incorrecto, porfavor introduce un Email valido.</span>';
                    $(this).parent().append(alerta);
                    $(this).addClass('has-error');
                }
            };
        }else if (id == 'date') {
            var date = new Date();
            var actualYear = date.getFullYear();
            var fecha = $(this).val().split('-')[0];
            if (fecha > 0) var edad = parseInt(actualYear - fecha);
            else var edad = 0;
     
           if (edad < 7){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Fecha incorrecta, es necesario ser mayor de 7 años para registrarse.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                flag = false;
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }
        return flag;
    });

    return valida;
}

function campoUnico(id, val){
   var correcto = $.ajax({
        url: 'includes/ajax/campoUnico.ajax.php',
        type: 'post',
        dataType: 'json',
        data: {'id' : id, 'valor': val},
        success: function (data){
            return data;
        }
    });

    return correcto;
};


function envioFormulario () {
    $('#ss-registro').submit( function (e){
        e.preventDefault();
        var fomulario = $(this).serialize();
        var $correcto =$.ajax({
            url: 'includes/ajax/validaFormulario.ajax.php',
            type: 'post',
            dataType: 'json',
            data: {formulario},
            success: function (data){
                return data;
            }
        });
    });
}