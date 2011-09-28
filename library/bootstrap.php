<?php

/**
 * Zeavo Framework
 *
 * Copyright (c) 2011 by Zeavo
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * @author Jacob BEDNARZ
 * @package Zeavo Framework
 * @version 1.0.0
 */

if (!defined('DIRECT_CHECK')) exit('Direct file access is not allowed.');
	
class Application {

    var $uri;
    var $model;

    /**
     * Plain old constructor method
     */
    function __construct($uri) {
        $this->uri = $uri;
    }

    /**
     * loadController
     *
     * Used for loading controller files from the controller directory.
     *
     * @access public
     * @param string $class The name of the controller class you wish to load.
     * @since 1.0.0
     */
    public function loadController($class) {
        $file = APP_PATH . DS . 'application' . DS . 'controllers' . DS . $this->uri['controller'] . '.php';
        
        // Make sure the file exists prior to attempting use of it
        if (!file_exists($file)) die();
        
        require_once $file;
        
        $controller = new $class();
        
        if (method_exists($controller, $this->uri['method'])) {
            $controller->{$this->uri['method']}($this->uri['var']);
        } else {
            $controller->index();	
        }
    }

    /**
     * loadView
     *
     * Method for loading views as well as passing data from the controller.
     *
     * @access public
     * @param string $view The name of the view file you wish to render.
     * @param array $vars An array of information you wish to pass to the view file to utilise within the file.
     * @since 1.0.0
     */
    public function loadView($view, $vars = '') {
        if (is_array($vars) && count($vars) > 0) {
            extract($vars, EXTR_PREFIX_SAME, "wddx");
        }
        
        require_once APP_PATH . DS . 'application' . DS . 'views' . DS . $view . '.php';
    }

    /**
     * loadModel
     *
     * Load and instantiate model file/class for use within the application
     *
     * @access public
     * @param string $model The name of the model file to use.
     * @todo [JB 21-09-11] This probably shouldn't be as open as it is - lock it down a little more. 
     */
    public function loadModel($model) {
        require_once APP_PATH . DS . 'application' . DS . 'models' . DS . $model . '.php';
        $this->$model = new $model;
    }
    
}