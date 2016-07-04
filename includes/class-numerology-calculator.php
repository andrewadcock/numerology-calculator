<?php

class Numerology_Calculator {

    protected $loader;

    protected $plugin_slug;

    protected $version;

    public function __construct() {

        $this->plugin_slug = 'numerology-calculator-slug';
        $this->version = '0.0.1';

    }

    private function load_dependencies() {

    }

    private function define_admin_hooks() {

    }

    public function run() {

    }

    public function get_version() {
        return $this->version;
    }

}