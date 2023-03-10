<?php 
/**
* @package Cherki Hamza Plugin Dev
*/
namespace Inc\Base;

/**
* 
*/
class SettingsLinks
{

    protected $plugin;
    
    public function __construct(){
       $this->plugin = PLUGIN;
    }


    public function register(){
        // add link setting for the plugin
        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }

     // the setting link function of dashboard admin
    function settings_link($links){
      $settings_link = '<a href="admin.php?page=cherki_hamza_plugin" >Settings</a>';
      array_push($links , $settings_link );
      return $links;
    }

}    