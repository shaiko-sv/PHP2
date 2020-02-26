"use strict";

$(document).ready(function () {

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

const app = new Vue({
    el: '#app',
    methods: {
        getJson(url){
            console.log(url);
            return fetch(url)
                .then(result => result.json())
                .catch(error => this.$refs.error.setText(error))
        },
        JQueryAXAJ(url, table){
            $.ajax({
                url: url,
                dataType: "json",
                methods: "GET",
                data: {"table": table},
                success: function (data) {
                    console.log(data)
                }
            })
        }
    },
});