<?php
function setActive($path)
{
    return Request::is($path . '*') ? 'active' :  '';
}
function setActiveImage($path)
{
    if(setActive($path) == 'active'){
        return '-active';
    }
    return '';

}
