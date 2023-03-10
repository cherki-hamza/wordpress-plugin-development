<?php

/**
*  deactivate plugin manager
* @package Cherki Hamza Plugin Dev
* @category Core
*/
namespace Inc\Base;

class Deactivate{

    public static function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }
    
}