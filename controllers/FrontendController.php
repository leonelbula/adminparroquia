<?php

class frontendController{

    public function Index(){
        
        require_once 'views/login/login.php';
        
    }
    public function Principal(){

        require_once 'views/layout/menu.php';        
        require_once 'views/layout/principal.php';

    }
    
}