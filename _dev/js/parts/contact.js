Main.Contact = {
    init:function(){
        Main.Contact.set_submit_event();
        Main.Contact.attr_current_page_title();
        Main.Contact.attr_user_ip();
    },
    set_submit_event:function(){
        $('#contact_form').submit(function(e){
            e.preventDefault();
            var response = grecaptcha.getResponse();
            if(response.length == 0 || Main.Contact.verify_if_fields_are_blank() == false){
                swal("Falha no envio", "Por favor verifique se preencheu todos os campos do formulário.", "error");
            }
            else{
                var data = $(this).serializeArray();
                $.post(
                    ajaxurl,
                    {
                        'action': 'send_mail',
                        'data': data,
                    },
                    function(r){
                        swal("Sucesso", "A sua mensagem foi enviada, prometemos ser breves na resposta.", "success");
                    }
                );
            }

        });
    },
    attr_current_page_title:function(){
        var current_location = window.location.href;
        $('.page_title').val(current_location);
    },
    attr_user_ip:function(){
        $.getJSON("http://jsonip.com/?callback=?", function (data) {
            $('.user_ip').val(data.ip);
        });
    },
    verify_if_fields_are_blank:function(){
        var is_ok = true;
        $('#contact_form .message_field').each(function(){
            if(!$(this).val()){
                is_ok = false;
            }
        });
        return is_ok;
    }
}
