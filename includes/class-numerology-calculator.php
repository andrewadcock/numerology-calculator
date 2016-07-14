<?php
/**
 * The Numerology Calculator is the core plugin responsible for including and
 * instantiating all of the code that composes the plugin
 *
 * @package NMCL
 */

/**
 * The Numerology Calculator is the core plugin responsible for including and
 * instantiating all of the code that composes the plugin.
 *
 * The Numerology Calculator includes an instance to the Numerology Calculator
 * Loader which is responsible for coordinating the hooks that exist within the
 * plugin.
 *
 * It also maintains a reference to the plugin slug which can be used in
 * internationalization, and a reference to the current version of the plugin
 * so that we can easily update the version in a single place to provide
 * cache busting functionality when including scripts and styles.
 *
 * @since    0.0.2
 */
class Numerology_Calculator
{

    /**
     * A reference to the loader class that coordinates the hooks and callbacks
     * throughout the plugin.
     *
     * @access protected
     * @var    Numerology_Calculator_Loader $loader Manages hooks between the WordPress hooks and the callback functions.
     */
    protected $loader;

    /**
     * Represents the plugin slug so that it can be used throughout the plugin
     * for internationalization and other purposes.
     *
     * @access protected
     * @var    string $plugin_slug The single, hyphenated string used to identify this plugin.
     */
    protected $plugin_slug;

    /**
     * Maintains the current version of the plugin so that we can use it throughout
     * the plugin.
     *
     * @access protected
     * @var    string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Instantiates the plugin by setting up the core properties and loading
     * all necessary dependencies and defining the hooks.
     *
     * The constructor will define both the plugin slug and the verison
     * attributes, but will also use internal functions to import all the
     * plugin dependencies, and will leverage the Numerology_Calculator_Loader
     * for registering the hooks and the callback functions used throughout
     * the plugin.
     */
    public function __construct()
    {

        $this->plugin_slug = 'numerology-calculator-slug';
        $this->version = '0.0.3';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_common_hooks();

    }

    /**
     * Imports the Options page administration classes, and the Numerology Calculator Loader.
     *
     * The Numerology Calculator administration class defines all unique functionality for
     * introducing custom functionality into the WordPress dashboard, e.g. the options page.
     *
     * The Numerology Calculator Loader is the class that will coordinate the hooks and callbacks
     * from WordPress and the plugin. This function instantiates and sets the reference to the
     * $loader class property.
     *
     * @access    private
     */
    private function load_dependencies()
    {

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-numerology-calculator-admin.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'common/class-numerology-calculator-common.php';

        require_once plugin_dir_path(__FILE__) . 'class-numerology-calculator-loader.php';

        $this->loader = new Numerology_Calculator_Loader();
    }

    /**
     * Defines the hooks and callback functions that are used for setting up the plugin stylesheets
     * and the plugin options page.
     *
     * This function relies on the Numerology Calculator Admin class and the Numerology Calculator
     * Loader class property.
     *
     * @access    private
     */
    private function define_admin_hooks()
    {
        $admin = new Numerology_Calculator_Admin($this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles');
        $this->loader->add_action('admin_menu', $admin, 'add_options_pages');
        $this->loader->add_action('admin_init', $admin, 'admin_init');

    }

    /**
     * Defines the hooks and callback functions that are used for setting up the plugin stylesheets
     * and the plugin frontend functionality.
     *
     * This function relies on the Numerology Calculator Common class and the Numerology Calculator
     * Loader class property.
     *
     * @access    private
     */
    private function define_common_hooks()
    {
        $common = new Numerology_Calculator_Common($this->get_version());


        $this->loader->add_action('wp_enqueue_scripts', $common, 'enqueue_styles');

    }

    /**
     * Initiates the class
     *
     * Executes the plugin by calling the run method of the loader class which will
     * register all of the hooks and callback functions used throughout the plugin
     * with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * Returns the current version of the plugin to the caller.
     *
     * @return    string    $this->version    The current version of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

}