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

var hideLoginRegisterButton = function hideLoginRegisterButton() {
    var navBtnLogin = $('#navBtnLogin');
    var navBtnRegister = $('#navBtnRegister');

    navBtnLogin.css("display", "none");
    navBtnRegister.css("display", "none");
}

var showLoginRegisterButton = function showLoginRegisterButton() {
    var navBtnLogin = $('#navBtnLogin');
    var navBtnRegister = $('#navBtnRegister');

    navBtnLogin.css("display", "block");
    navBtnRegister.css("display", "block");
}

var showManageButton = function showManageButton() {
    var navBtnManage = $('#navBtnManage');
    navBtnManage.css("display", "block");
}

var hideManageButton = function hideManageButton() {
    var navBtnManage = $('#navBtnManage');
    navBtnManage.css("display", "none");
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
