<?php

class Documentation extends Application {

    function __construct() {}

    function index() {
        // Will be static content for now...
        $this->loadView('documentation_view');
    }
    
}