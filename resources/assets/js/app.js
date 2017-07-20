/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

import 'select2';
jQuery(".category-select").select2({});

require('trumbowyg');
import icons from "trumbowyg/dist/ui/icons.svg"
$.trumbowyg.svgPath = icons;
$('.post-editor').trumbowyg({
    autogrow: true
});

