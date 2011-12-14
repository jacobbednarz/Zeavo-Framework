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

/**
 * Yes, before you start, I know this should be type
 * casted as a numeric value but there will be letters
 * included for minor builds, hence the string.
 */
define('VERSION', '1.0.0'); 

/**
 * Purely for direct file access check 
 */
define('DIRECT_CHECK', 'cd9a2f417e4fe69a9884222643c4c91d');

/**
 * Administrator options. These will be mainly used for debugging purposes only.
 */
define('ADMIN_EMAIL', 'jacob.bednarz@gmail.com');

/**
 * Environment variables for application
 */
define('ENVIRONMENT', 'DEVELOPMENT');