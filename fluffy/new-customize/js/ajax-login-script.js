jQuery(document).ready(function($) {
    // $( "#form-login p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('.bar-status').hide();
    $('#form-login').on('submit', function(e){      
        // $('#form-login p.status').show().text(login_system_params.loadingmessage);       
        event.preventDefault();
        // var email = $("#username").val();
        // var password = $("#password").val();
        var form = "#form-login";
        var myacc = {
            'action': 'login_system', //calls wp_ajax_nopriv_ajaxlogin
            'username': $('#username').val(), 
            'password': $('#password').val(), 
            // 'posts': login_system_params.posts,
            //     'page' : login_system_params.current_page
            
        };
        jQuery.ajax({   
            url: login_system_params.ajaxurl + "?action=login_system",
            data: jQuery(form).serialize(),
            type: 'POST',
            // dataType: 'json',
            success: function(objectresult){
                var data = $.parseJSON(objectresult);
                var wizards = data.results;
                
                if (data.results !='') {
                  wizards.forEach(function (wizard) {
                    if (wizard.loggedin == 'true') {  
                        // console.log(objectresult);
                        $("#form-login input").prop('disabled', true);
                        $("#form-login button").prop('disabled', true);
                        $('.bar-status').removeClass('warning-box');
                        $('.bar-status').show().addClass('success-box');
                        $('.bar-status p.status').show().text(wizard.message);                     
                            document.location.href = login_system_params.redirecturl;                                
                    }else{
                        // $('.bar-status').removeClass('success-box');
                        $('.bar-status').show().addClass('warning-box');
                        $('.bar-status p.status').show().text(wizard.message); 
                    }
                  });
                }
            },
            error: function(req, err){
                console.log('my message: ' + err);
                // try {
                //     var output = JSON.parse(data);
                //     alert(output);
                // } catch (e) {
                //     alert("Output is not valid JSON: " + data);
                // }
            }
        });
        e.preventDefault();
    });

});