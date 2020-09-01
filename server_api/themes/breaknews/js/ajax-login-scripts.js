 
 jQuery('form#user_login').on('submit', function(e){
        jQuery('form#user_login div#status').show().text(ajax_login_object.loadingmessage);
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: {
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': jQuery('form#user_login #user_email').val(),
                'password': jQuery('form#user_login #user_pass').val(),
                'security': jQuery('form#user_login #security').val() },
            success: function(data){
                /*jQuery('form#user_login div#status').text(data.message);
                if (data.loggedin === true){
                    //document.location.href = ajax_login_object.redirecturl;
                    alert('successful');
                }*/
                alert(data);
            }
        });
        e.preventDefault();
    });