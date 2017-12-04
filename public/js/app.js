webpackJsonp([1],{

/***/ "./node_modules/trumbowyg/dist/ui/icons.svg":
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/trumbowyg/dist/ui/icons.svg?4ac194c41f46a5ad9a3d9e380894c5eb";

/***/ }),

/***/ "./resources/assets/js/app.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery, jQuery, $) {/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_select2__ = __webpack_require__("./node_modules/select2/dist/js/select2.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_select2___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_select2__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_trumbowyg_dist_ui_icons_svg__ = __webpack_require__("./node_modules/trumbowyg/dist/ui/icons.svg");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_trumbowyg_dist_ui_icons_svg___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_trumbowyg_dist_ui_icons_svg__);
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = __webpack_provided_window_dot_jQuery = __webpack_require__("./node_modules/jquery/dist/jquery.js");

__webpack_require__("./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js");


jQuery(".category-select").select2({});
jQuery(".tag-select").select2({});
__webpack_require__("./node_modules/trumbowyg/dist/trumbowyg.js");

$.trumbowyg.svgPath = __WEBPACK_IMPORTED_MODULE_1_trumbowyg_dist_ui_icons_svg___default.a;
$('.post-editor').trumbowyg({
    autogrow: true
});

//Add Tags
$(document).ready(function () {

    $(".add-more").click(function () {
        var html = $(".copy").html();
        $(".after-add-more").after(html);
    });

    $("body").on("click", ".remove", function () {
        $(this).parents(".control-group").remove();
    });

    $("body").on("click", ".remove", function () {
        $(this).parent(".input-group").remove();
    });
});
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js"), __webpack_require__("./node_modules/jquery/dist/jquery.js"), __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/app.js");
module.exports = __webpack_require__("./resources/assets/sass/app.scss");


/***/ })

},[0]);