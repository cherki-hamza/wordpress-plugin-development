<?php 
/**
* @package Cherki Hamza Plugin Dev
*/
namespace Inc\Base;

/**
* 
*/
class Enqueue
{

    public function register(){
        // enqueue the admin backend scripts and styles 
        add_action( 'admin_enqueue_scripts', [$this , 'enqueue_admin_plugins'] );
        // enqueue the frontend scrips and styles
        add_action( 'wp_enqueue_scripts', [$this , 'enqueue_frontend_plugins'] );
    }

	 function enqueue_admin_plugins(){
        wp_enqueue_style('my_bootstrap_style' , PLUGIN_URL . 'assets/css/bootstrap.min.css');
        wp_enqueue_style('my_style' , PLUGIN_URL . 'assets/css/mystyle.css');
        wp_enqueue_script('my_bootstrap_script', PLUGIN_URL . 'assets/js/bootstrap.min.js');
    }

    function enqueue_frontend_plugins(){
        wp_enqueue_style('my_frontend_style' , PLUGIN_URL . 'assets/css/frontend.css');
        wp_enqueue_style('my_bootstrap_style' , PLUGIN_URL . 'assets/css/bootstrap.min.css');
        wp_enqueue_script('my_bootstrap_script', PLUGIN_URL . 'assets/js/bootstrap.min.js');
    }
}
