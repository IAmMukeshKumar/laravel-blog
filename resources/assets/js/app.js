/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

import 'select2';
jQuery(".category-select").select2({});

var Quill = require('quill');

var editor = new Quill('#post-editor', {
    modules: { toolbar: '#post-toolbar' },
    theme: 'snow'
});

