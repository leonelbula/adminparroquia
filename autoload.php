<?php

function controller_autocarga($classname){
    
    include 'controllers/'.$classname.'.php';

}
spl_autoload_register('controller_autocarga');