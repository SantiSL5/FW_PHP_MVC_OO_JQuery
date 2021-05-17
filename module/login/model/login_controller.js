function login() {
    $('#login-btn').on('click', function() {
        friendlyURL('?page=login&op=login').then(function(url) {
            ajaxPromise(url, 'POST', 'JSON',{'username_login':$('#user-login').val(),'password_login':$('#password-login').val()}).then(function(data) {
                
                if (data['username_created'] == true && data['correct_password'] == true) {
                    alert("Logueado Correctamente");
                    localStorage.removeItem('token');
                    localStorage.setItem('token', data['token']);
                    window.location.href = '/home';
                }else {
                    if (data['username_created'] == false) {
                        $('#error-user-login').text('El usuario introducido no se encuentra registrado');

                        if (data['correct_password'] == false) {
                            $('#error-password-login').text('La contraseña introducida no es correcta');
                        }else{
                            $('#error-password-login').text('');
                        }
                    }else{
                        $('#error-user-login').text('');
                    }
                }
            }).catch(function() {
                // window.location.href = 'index.php?page=503';
            });
        }); 
    });
}

function registerbtn_change() {
    $('#register-option').on('click', function() {
        friendlyURL('?page=login&op=listregister').then(function(url) {
            window.location.href = url;
        }); 
    });
}


$(document).ready(function() {
    login();
    registerbtn_change();
});