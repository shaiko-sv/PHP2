"use strict";

const app = new Vue({
    el: '#app',
    methods: {
        getJson(url){
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