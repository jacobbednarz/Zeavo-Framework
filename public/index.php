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

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(dirname(__FILE__)));

require_once APP_PATH . DS . 'config' . DS . 'config.php';

if (ENVIRONMENT == 'DEVELOPMENT') {
    error_reporting(E_ALL);
} else {
    // TODO: Add email logging 
    error_reporting(0);
}

$url = $_SERVER['REQUEST_URI'];
$url = str_replace('/zeavo_framework', '', $url);
	
/**
 * Grab the URL and break it into more usable pieces 
 * TODO: Maybe rework this to be a bit cleaner
 */
$array_tmp_uri = preg_split('[\\/]', $url, -1, PREG_SPLIT_NO_EMPTY);

@$array_uri['controller'] = $array_tmp_uri[0];
@$array_uri['method'] = $array_tmp_uri[1]; 
@$array_uri['var'] = $array_tmp_uri[2]; 
	
/**
 * Include the application bootstrap. Magic happens here! 
 */
require_once APP_PATH . DS . 'library' . DS . 'bootstrap.php';
	
/**
 * Create a new instance of the application
 */
$application = new Application($array_uri);
$application->loadController($array_uri['controller']);
