<?php
function setActive($path)
{
    if($path == 'home'){
        if(!Request::is('*planning*') && !Request::is('*settings*') && !Request::is('*family*')){
            return 'active';
        }
        else{
            return '';
        }
    }
    return Request::is($path . '*') ? 'active' :  '';
}
function setActiveImage($path)
{
    if(setActive($path) == 'active'){
        return '-active';
    }
    return '';

}
