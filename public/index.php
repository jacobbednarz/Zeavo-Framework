<?php
 
/**
 * Zeavo Framework
 *
 * Copyright (c) 2012 by Zeavo
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

class registry {
    
    const ERR_PROPERTY_NON_EXISTANT = 1;
    public static $instance;
    private $registry;
    
    public function __construct($registry)
    {
        if ( ! is_array($registry)) 
        {
            $this->registry = array();
        }
        else
        {
            $this->registry = $registry;
        }
    }
    
    public static function get_registry($registry = false) 
    {
        if ( ! isset(self::$instance)) 
        {
            self::$instance = new self($registry);
        }
        return self::$instance;
    }
    
    public function __get($property) 
    {
        if (isset($this->registry[$property]))
        {
            return $this->registry[$property];
        } 
        else
        {
            throw new Exception('Registry property does not exist.', self::ERR_PROPERTY_NON_EXISTANT);
        }
    }
    
    public function __set($property, $value)
    {
        $this->registry[$property] = $value;
    }
}
 
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(dirname(__FILE__)));
 
require_once APP_PATH . DS . 'config' . DS . 'config.php';
 
if (ENVIRONMENT == 'DEVELOPMENT') 
{
    error_reporting(E_ALL);
}
else
{
    // TODO: Add email logging 
    error_reporting(0);
}
 
$url = $_SERVER['REQUEST_URI'];
$url = str_replace('/zeavo_framework', '', $url);
 
/**
 * Grab the URL and break it into more usable pieces 
 */
$array_tmp_uri = preg_split('[\\/]', $url, -1, PREG_SPLIT_NO_EMPTY);
 
@$array_uri['controller'] = $array_tmp_uri[0];
@$array_uri['method'] = $array_tmp_uri[1]; 
@$array_uri['vars'] = array_slice($array_tmp_uri, 2);

// Get the singleton pattern ready and setup the URI
$r = registry::get_registry();
$r->uri = $array_uri;
 
/**
 * Include the application bootstrap. Magic happens here! 
 */
require_once APP_PATH . DS . 'library' . DS . 'bootstrap.php';
 
/**
 * Create a new instance of the application
 */
if ($array_uri['controller'] == '') 
{
    header('Location: ./' . DEFAULT_CONTROLLER);
    exit;
}
else
{
    $application = new Application($array_uri);
    $application->load_controller($array_uri['controller']);
}
