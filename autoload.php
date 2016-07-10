<?php



function __autoload($class_name){

	if(file_exists('controllers/'.$class_name.'.php')){
       require_once 'controllers/'.$class_name.'.php';
    }

    if(file_exists('models/'.$class_name.'.php')){
        require_once 'models/'.$class_name.'.php';
    }

	
}




?>