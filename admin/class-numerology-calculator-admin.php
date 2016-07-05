<?php

class Numerology_Calculator_Admin {

    private $version;

    public function __construct( $version ) {
        $this->version = $version;
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    public function enqueue_styles() {

        wp_enqueue_style(
            'numerology-calculator-admin',
            plugin_dir_url( __FILE__ ) . 'css/numerology-calculator-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }

//    public function add_option_page() {
//
//        $page_title = 'Numerology Options';
//        $menu_title = 'Numerology Options';
//        $capability = 'manage_options';
//        $menu_slug = 'numerology-calculator-options';
//        $function = '';
//
//        add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
//
//    }

    function admin_menu() {
        add_options_page(
            'Numerology Options',
            'Numerology Options',
            'manage_options',
            'numerology-calculator-options',
            array(
                $this,
                'settings_page'
            )
        );
    }

    function  settings_page() {
        echo '<h1>Numerology Calculator Options</h1>';
    }

}