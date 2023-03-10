<?php

/**
*  uninstall plugin
* @package Cherki Hamza Dev
* @category Core
*/

if(!define('WP_UNINSTALL_PLUGIN', true)){
    die('Error: Uninstall plugin is disabled.');
}

// clear database stored data
/* $books = get_posts([
    'post_type' => 'book',
     'numberposts' => -1 
]);

foreach($books as $book){
    wp_delete_post($book->ID, true);
} */


// Access the database via sql
global $wpdb;

$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book' ");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts) ");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts) ");