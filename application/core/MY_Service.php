<?php

/**
 * Created by PhpStorm
 * Project name: ServiceLayer4CodeIgniter
 * File name: MY_Service.php
 * Author: Rick Lu
 * E-mail: acerest.lu@gmail.com
 * Date: 2017/4/17
 * Time: 13:48
 */
class MY_Service
{
    public function __construct()
    {
        log_message('debug', "Service Class Initialized");
    }

    function __get($key)
    {
        $CI =& get_instance();
        return $CI->$key;
    }
}