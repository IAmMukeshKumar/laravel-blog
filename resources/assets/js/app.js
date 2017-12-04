/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

import 'select2';
jQuery(".category-select").select2({});
jQuery(".tag-select").select2({});
require('trumbowyg');
import icons from "trumbowyg/dist/ui/icons.svg"
$.trumbowyg.svgPath = icons;
$('.post-editor').trumbowyg({
    autogrow: true
});

//Add Tags
$(document).ready(function() {

    $(".add-more").click(function(){
        var html = $(".copy").html();
        $(".after-add-more").after(html);
    });

    $("body").on("click",".remove",function(){
        $(this).parents(".control-group").remove();
    });

    $("body").on("click",".remove",function(){
        $(this).parent(".input-group").remove();
    });
});

