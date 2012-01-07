<?php

class Example extends Application {
    
    function __construct() {
        // Load models, etc.        
    }

    function index($queryString = '') {
        $data['pageTitle'] = 'My page title';
        $data['pageHeader'] = 'My awesome MVC header!';
        $data['welcomeParagraph'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        
        /**
         * Utilise singleton pattern for query strings
         * @example
         *      URI: http://domain.com/controller/method/var1/var2
         *      $r = registry::getRegistry();
         *      $data['queryString'] = $r->uri['vars'][1];
         *
         *  Output: var2
         */
        $r = registry::getRegistry();
        $data['queryString'] = @$r->uri['vars'][0]; 

        // Load the required view
        $this->loadView('example_view', $data);
    }

}
