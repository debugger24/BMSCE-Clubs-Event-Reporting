var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var getMonthName = function getMonthName(month) {
    var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return monthNames[month];
}

var hideLoginButton = function hideLoginButton() {
    var navBtnLogin = $('#navBtnLogin');
    navBtnLogin.css("display", "none");
}

var showLoginButton = function showLoginButton() {
    var navBtnLogin = $('#navBtnLogin');
    navBtnLogin.css("display", "block");
}

var hideLoginUser = function hideLoginUser()  {
    var navUser = $('#navUser');
    var navUserName = $('#navUserName');

    navUser.css("display", "none");
    navUserName.html("");
}

var showLoginUser = function showLoginUser(username)  {
    var navUser = $('#navUser');
    var navUserName = $('#navUserName');

    navUser.css("display", "block");
    navUserName.html(username);
}
