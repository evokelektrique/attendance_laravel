require('./bootstrap');

import "@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css";
import "@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js";

// Date Picker
const date_picker_options = {
    separatorChar: "-",
};

jalaliDatepicker.startWatch(date_picker_options);

