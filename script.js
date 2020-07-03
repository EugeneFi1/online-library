$(document).ready(function(){
    

    $('#in').keyup(function(){
        $('.show').text($(this).val());
    });
});

function addUser() {
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
        url: 'function.php',
        type: 'GET',
        data: { 'login': login, 'pass': pass},
        dataType: 'html',
        cache: false,       
        success: function(data) {
            $(".main").load("page.php?" + "login=" + login);
        }
    });
};