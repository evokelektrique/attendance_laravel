require('./bootstrap');

import "@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css";
import "@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js";

// Date Picker
const date_picker_options = {
    separatorChar: "-",
};
jalaliDatepicker.startWatch(date_picker_options);

// Navbar Burger Toggle
(function () {
    var burger = document.querySelector('.navbar-burger');
    var menu = document.querySelector('#' + burger.dataset.target);
    burger.addEventListener('click', function () {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();
