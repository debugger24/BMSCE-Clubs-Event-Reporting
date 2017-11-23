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

var logout = function logout() {
    var navBtnLogin = $('#navBtnLogin');
    var navUser = $('#navUser');
    var navUserName = $('#navUserName');
    var loginModal = $('#loginModal');

    $.ajax({
        url: "api/logout.php",
        type: "post",
        data: $('#loginForm').serialize(),
        success: function(result){
            result = JSON.parse(result);
            if (result.status == "true") {
                navBtnLogin.css("display", "block");
                navUser.css("display", "none");
                navUserName.html("");
            }
            else {
                alert("Failed to logout");
            }
        }
    });
}
