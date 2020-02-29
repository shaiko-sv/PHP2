"use strict";

$(document).ready(function () {

   $("#form-reg").submit(function (e) {
        e.preventDefault();

        var fullName = $.trim($("#regFullName").val());
        var login = $.trim($("#regLogin").val());
        var password = $.trim($("#regPassword").val());
        var email = $.trim($("#regEmail").val());
        if(fullName == '' || login == '' || password == '' || email == '') {
            $("img.profile-img").attr("src", "/img/icons/user-error.png");
        } else {
            $("img.profile-img").attr("src", "/img/icons/user-ok.png");
            $(this).unbind().submit();
        }
   });

    $("#form-signin").submit(function (e) {
        e.preventDefault();

        var login = $.trim($("#login").val());
        var password = $.trim($("#password").val());
        if(login == '' || password == '') {
            $("img.profile-img").attr("src", "/img/icons/user-error.png");
        } else {
            $("img.profile-img").attr("src", "/img/icons/user-ok.png");
            $(this).unbind().submit();
        }
    });

});