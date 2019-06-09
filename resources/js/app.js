/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('bootstrap')
masonry = require('masonry-layout');
window.$ = require("jquery");
require('jquery.scrollto');
require('./components/slider');

var Masonry = require('masonry-layout');

$(window).bind("load", function() {
    var masonry = new Masonry( '.masonry', {
        itemSelector: '.masonry__item',
    });

    $('.js-toggle-popup').click(function (e) {
        e.preventDefault();
        $('.popup').slideToggle();
    });

    $('.js-toggle-planning-list').click(function (e) {
        e.preventDefault();
        $('.popup').slideToggle();
        $('input[name="planning"]').val($(this).data('planning'));
    });
});



