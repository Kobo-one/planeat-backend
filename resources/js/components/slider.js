'use strict';

const $document = $(document);
const $body = $('body');
const $slider = $('.js-slider');
const $today = $slider.find('.selected').parents('.slide__item');
var $scrollElem;

if ($today.text().indexOf('Mo') > -1) {
    $scrollElem = $today;
} else {
    $scrollElem = $today.nextAll(":contains(Mo):first");
}

if(!$scrollElem.html()){
    $scrollElem= $today.nextAll(":last");
    if(!$scrollElem.html()){
        $scrollElem = $today;
    }
}

$slider.scrollTo($scrollElem);






