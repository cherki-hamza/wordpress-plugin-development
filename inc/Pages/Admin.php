<?php

/**
* @package Cherki Hamza Plugin Dev
*/
namespace Inc\Pages;


use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

   public $settings;
   public $pages = [];
   public $subpages = [];

   function __construct(){

      $this->settings = new SettingsApi();

      $this->pages = [
            [
              'page_title' => 'Cherki Hamza Plugin', 
              'menu_title' => 'CherkiHamza', 
              'capability' => 'manage_options', 
              'menu_slug' => 'cherki_hamza_plugin', 
              'callback' => function() { echo '<h1>cherki hamza plugin</h1>'; }, 
              'icon_url' => 'dashicons-store', 
              'position' => 110
            ]
      ];

      $this->subpages = array(
			array(
				'parent_slug' => 'cherki_hamza_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'cherki_hamza_cpt', 
				'callback' => function() { echo '<h1>CPT Manager</h1>'; }
			),
			array(
				'parent_slug' => 'cherki_hamza_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'cherki_hamza_taxonomies', 
				'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
			),
			array(
				'parent_slug' => 'cherki_hamza_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'cherki_hamza_widgets', 
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
			)
		);

   }

   public function register(){
        
    //$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->register();

    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

   }

}