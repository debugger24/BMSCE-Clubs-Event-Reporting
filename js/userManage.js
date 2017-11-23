var login = function login() {
    var errorSpan = $('.loginError');
    var navBtnLogin = $('#navBtnLogin');
    var navUser = $('#navUser');
    var navUserName = $('#navUserName');
    var loginModal = $('#loginModal');

    $.ajax({
        url: "api/login.php",
        type: "post",
        data: $('#loginForm').serialize(),
        success: function(result){
            result = JSON.parse(result);
            if (result.status == "true") {
                navBtnLogin.css("display", "none");
                navUser.css("display", "inline");
                navUserName.html(result.displayname);
                loginModal.modal('hide');
            }
            else {
                errorSpan.css("display", "inline");
            }
        }
    });
}
