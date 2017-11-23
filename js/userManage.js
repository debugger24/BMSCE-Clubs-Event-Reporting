var login = function login() {
    var errorSpan = $('.loginError');
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
                hideLoginButton();
                showLoginUser(result.displayname);
                loginModal.modal('hide');
            }
            else {
                errorSpan.css("display", "inline");
            }
        }
    });
}

var logout = function logout() {
    var loginModal = $('#loginModal');

    $.ajax({
        url: "api/logout.php",
        type: "post",
        data: $('#loginForm').serialize(),
        success: function(result){
            result = JSON.parse(result);
            if (result.status == "true") {
                showLoginButton();
                hideLoginUser();
            }
            else {
                alert("Failed to logout");
            }
        }
    });
}
