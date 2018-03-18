$(document).ready(function () {

    $(".login-button").on('click', function () {
        var login = {};
        login.username = $('input[name="username"]').val();
        login.password = $('input[name="password"]').val();
        $.get('phps/login.php', login).done(function (data) {
            if (data == "boys") {
                window.location.replace("pages/boys/");
            } else if(data == "girls"){
                window.location.replace("pages/girls/");
            } else if(data == "reception"){
                window.location.replace("pages/reception/");
            } else if(data == "wrong"){
                alert("Invalid Username or Password");
            }
        });
    });
});