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

function childNav($path){
    if($path == 'home'){
        if(!Request::is('*quests*') && !Request::is('*goals*') && !Request::is('*hero*')){
            return 'selected';
        }
        else{
            return '';
        }
    }
    if ($path == 'subhero'){
        return Request::is('*/hero') ? 'selected' :  '';
    }

    return Request::is('*/'.$path . '*') ? 'selected' :  '';
}
