// define the use of autoload
use Inc\Activate;
use Inc\Deactivate;

require_once plugin_dir_path(__FILE__) . 'inc/Admin/AdminPages.php';

// start check if class already exists
if (!class_exists('Cherki_Hamza_Plugin')) {

class Cherki_Hamza_Plugin
{
    public $plugin;
    function __construct(){
        $this->plugin = plugin_basename(__FILE__); 
         /* $path = untrailingslashit(__FILE__).'\inc\cherki_hamza_plugin_activate.php';
        echo '<center>';
         echo $path;
        echo '</center>'; */
    }

    function register(){
        // initialize the custom post type
         $this->create_custom_post_type(__FILE__);
         // enqueue the admin backend scripts and styles 
         add_action( 'admin_enqueue_scripts', [$this , 'enqueue_admin_plugins'] );
         // enqueue the frontend scrips and styles
         add_action( 'wp_enqueue_scripts', [$this , 'enqueue_frontend_plugins'] );

         // add Admin Menu in dashboard
         add_action( 'admin_menu', [$this , 'add_admin_pages' ]);

         // add link setting for the plugin
         add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);

    }

    // the setting link function
    function settings_link($links){
      $settings_link = '<a href="admin.php?page=cherki_hamza_plugin" >Settings</a>';
      array_push($links , $settings_link );
      return $links;
    }

    // function to add admin pages
    public function add_admin_pages(){
        add_menu_page('Cherki Hamza Plugin', 'CherkiHamza','manage_options','cherki_hamza_plugin' , 
                        [$this,'admin_index'],'dashicons-store',110);

    }
    // function for get the admin pages index
    public function admin_index(){

       require_once untrailingslashit(plugin_dir_path(__FILE__)).'\templates\admin-page.php';

    }

    protected function create_custom_post_type(){
          add_action('init', array($this, 'custom_post_type'));
    }

    function custom_post_type(){
        register_post_type( 'book' , ['public' => true , 'label'=>'Books'] );
        register_post_type( 'product' , ['public' => true , 'label'=>'Products'] );
    }

    function enqueue_admin_plugins(){
        wp_enqueue_style('my_bootstrap_style' , plugins_url('/assets/css/bootstrap.min.css', __FILE__ ));
        wp_enqueue_style('my_style' , plugins_url('/assets/css/mystyle.css', __FILE__ ));
        wp_enqueue_script('my_bootstrap_script', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
    }

    function enqueue_frontend_plugins(){
        wp_enqueue_style('my_frontend_style' , plugins_url('/assets/css/frontend.css', __FILE__ ));
        wp_enqueue_style('my_bootstrap_style' , plugins_url('/assets/css/bootstrap.min.css', __FILE__ ));
        wp_enqueue_script('my_bootstrap_script', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
    }

    function activate(){
        Activate::activate();
    }

    public static function print(){
         echo '<center>';
           echo 'just test test';
         echo '</center>';
    }

    function deactivate(){
        Deactivate::deactivate();
    }

} // end of class


}// end if of class_exists


$cherki_hamza_dev = new Cherki_Hamza_Plugin();
$cherki_hamza_dev->register();

/* $cherki_hamza_dev::print(); */



// activation
/* $path = untrailingslashit(plugin_dir_path(__FILE__)).'\inc\cherki_hamza_plugin_activate.php';
 */
//register_activation_hook(plugin_dir_path(__FILE__) , ['Activate', 'activate']);
register_activation_hook( __FILE__ , [$cherki_hamza_dev, 'activate']);

// deactivation
register_deactivation_hook(plugin_dir_path(__FILE__), [ 'Deactivate', 'deactivate' ]);
//register_deactivation_hook( __FILE__, [ $cherki_hamza_dev, 'deactivate' ] );
 