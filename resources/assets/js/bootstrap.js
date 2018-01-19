import Vue from "vue";

import swal from "sweetalert2";



import Popper from "popper.js";

window.Popper= Popper;
window.Vue=Vue;

window.$ = window.jQuery = require('jquery-slim');

window.swal=swal;

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


require("bootstrap");

window.events= new Vue();

window.flash = function(message,title="Great",type='success'){
    swal({
        title: title,
        text: message,
        type: type,
        confirmButtonText:"Okay ",
        confirmButtonClass: "btn btn-primary",
        showCancelButton:false,
        buttonsStyling: false
    })

};

window.confirm=function(text, title = "Are you sure") {
        return new Promise((resolve, reject) => {
            swal({
                title: title,
                html: text,
                type: "question",
                showCancelButton: true,
                confirmButtonText: " Yes !",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-primary",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).then(
                () => resolve(),
                error => {
                    if (!reject) {
                        reject(error);
                    }
                }
            );
        });
    }

