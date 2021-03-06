$(function () {
validaFormulario();
envioFormulario();


$('a#login').click(function () {
    if ($('#ss-sesion').hasClass('active')) $('#ss-sesion').removeClass('active');
    $('#ss-registrate').addClass('active');
});
animationControl($('#ss-animation-control').val());

});


function validaFormulario(){
  $('#ss-registro .form-group input').change(function () {
        var id = $(this).attr('id');    
        if (id == 'nickname') {

            pattern = /^[\w\s]{4,16}$/i;
            if (!$(this).val().match(pattern)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Nikname incorrecto, porfavor introduce un nick valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                
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
                
            }else{
                $(this).removeClass('has-error');
                $(this).addClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
            };
        }else if (id == 'dni') {
            var val = $(this).val();
            var  pattern = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]{1}$/i;
            if (!val.match(pattern)){
                alert('No coincide');
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> DNI incorrecto, porfavor introduce un DNI valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                
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
                        
                   }

                }else{
                    $(this).removeClass('is-correct');
                    $(this).addClass('has-error');
                    if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                    var alerta = '<span id="alerta-'+id+'"> DNI incorrecto, porfavor introduce un DNI valido.</span>';
                    $(this).parent().append(alerta);
                    
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
                
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }else if (id == 'email') {
            var val = $(this).val();
            pattern = /^[^0-9][a-zA-Z0-9_.]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;
            if (!val.match(pattern) || !campoUnico(id,val)){
                $(this).removeClass('is-correct');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                var alerta = '<span id="alerta-'+id+'"> Email incorrecto, porfavor introduce un Email valido.</span>';
                $(this).parent().append(alerta);
                $(this).addClass('has-error');
                
            }else{

                var correcto = campoUnico(id,val);
                if (correcto){
                    $(this).removeClass('has-error');
                    if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                    $(this).addClass('is-correct');
                }else{
                    
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
                
            }else{
                $(this).removeClass('has-error');
                if ($(this).parent().find('#alerta-'+id)) $('#alerta-'+id).remove();
                $(this).addClass('is-correct');
            };
        }
        
        $('#TermConditions').click(function (){
            if($(this).prop('checked')) $(this).val(1);
            else $(this).val(0);
        });
        
    });
    
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
  var $todoOk =  $('#ss-registro').submit( function (e){
        e.preventDefault();
        var $validacion = true;
        $('#ss-registro :input').each(function () {

            $(this).trigger('change');
        },
        $('#ss-registro :input').each(function () {

            if ($(this).hasClass('has-error'))  $validacion = false;
        }));

        if ($('#TermConditions').val() == 0) {
            $('#TermConditions').next('span').css('color','red');
        }
        if ($validacion && $('#TermConditions').val() == 1){   
            var nickname = $('#nickname').val();
            var pwd = $('#pwd').val();
            var dni = $('#dni').val();
            var nombre = $('#nombre').val();
            var ape_1 = $('#ape_1').val();
            var ape_2 = $('#ape_2').val();
            var email = $('#email').val();
            var date = $('#date').val();
            $.ajax({
                url: 'includes/ajax/validaFormulario.ajax.php',
                type: 'post',
                dataType: 'json',
                data: {'nickname':nickname, 'password':pwd,'dni':dni,'nombre':nombre, 'ape_1':ape_1, 'ape_2':ape_2,'email': email,
                'fecha': date},
                success: function (data){
                    if (data) {
                        $correcto = '<div class="alert alert-success"><strong>¡BIENVENIDO!</strong> ¡YA PUEDES INICIAR SESIÓN!</div>';
                        
                        $('body').prepend($correcto);
                        $('#ss-sesion>a').trigger('click');

                    }
                },
                error: function () {
                    alert('No va');
                }
            });   
        }
    });
}

function animationControl (val){
    if (val > 0){
        $('.ss-registro-wrapper').addClass('ss-login-error');
        var $alerta = '<span class="alerta">¡Negative! Algún campo no coincide</span>';
        $('#ss-login div.form-group').append($alerta);
    }
}