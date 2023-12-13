<?php 


function decimal($number){
    return number_format($number, 2, '.', '');
}

function firstName($name){
    $name_parts = explode(" ", $name);
    if(isset($name_parts[0])){
        return $name_parts[0];
    }else{
        return '';
    }
}

function lastName($name){
    $name_parts = explode(" ", $name);
    if(isset($name_parts[1])){
        return $name_parts[1];
    }else{
        return '';
    }
}