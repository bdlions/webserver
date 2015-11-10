<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Utils
 * Requirements: PHP5 or above
 *
 */
class Utils {
    public function __construct() {
        
    }
    
    public function __get($var) {
        return get_instance()->$var;
    }

    /*
     * This method will return a random string based on given length
     * @param $lendth, random string length
     * @author nazmul hasan on 19th August 2015
     */

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
