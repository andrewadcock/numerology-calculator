<?php

class Numerology_Calculator
{

    protected $loader;

    protected $plugin_slug;

    protected $version;

    public function __construct()
    {

        $this->plugin_slug = 'numerology-calculator-slug';
        $this->version = '0.0.1';

        $this->load_dependencies();
        $this->define_admin_hooks();

    }

    private function load_dependencies()
    {

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-numerology-calculator-admin.php';

        require_once plugin_dir_path(__FILE__) . 'class-numerology-calculator-loader.php';

        $this->loader = new Numerology_Calculator_Loader();
    }

    private function define_admin_hooks()
    {
        $admin = new Numerology_Calculator_Admin($this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles');
        //$this->loader->add_action('admin_menu', $admin, 'add_option_page');
    }

    public function run()
    {
        $this->loader->run();
    }

    public function get_version()
    {
        return $this->version;
    }

}