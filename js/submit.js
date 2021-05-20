function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Por favor, ingresa tu nombre.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Por favor, ingresa tu email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Por favor, ingresa un email válido.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Por favor, ingresa un mensaje.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('.statusMsg').html('<span style="color:red;">Ocurrió algún problema.<br>Vuelve a intentarlo.</span>');
                }else{
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green; font-weight:bold;">Gracias por contactarnos.<br>Tu mensaje ha sido enviado!!!</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}