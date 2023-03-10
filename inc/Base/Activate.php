<?php

/**
*  activate plugin manager
* @package Cherki Hamza Plugin Dev
* @category Core
*/
namespace Inc\Base;

class Activate{

    public static function activate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }

}