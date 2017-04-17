<?php

/**
 * Created by PhpStorm
 * Project name: ServiceLayer4CodeIgniter
 * File name: MY_Loader.php
 * Author: Rick Lu
 * E-mail: acerest.lu@gmail.com
 * Date: 2017/4/17
 * Time: 13:48
 */
class MY_Loader extends CI_Loader
{
    /**
     * List of loaded services
     *
     * @var array
     * @access protected
     */
    protected $_ci_services = array();
    /**
     * List of paths to load services from
     *
     * @var array
     * @access protected
     */
    protected $_ci_service_paths = array();

    /**
     * Constructor
     *
     * Set the path to the Service files
     */
    public function __construct()
    {

        parent::__construct();
        load_class('Service', 'core');
        $this->_ci_service_paths = array(APPPATH);
    }

    /**
     * Service Loader
     *
     * This function lets users load and instantiate classes.
     * It is designed to be called from a user's app controllers.
     *
     * @param    string    the name of the class
     * @param    mixed    the optional parameters
     * @param    string    an optional object name
     * @return    object|bool
     */
    public function service($service = '', $params = NULL, $object_name = NULL)
    {
        if (is_array($service)) {
            foreach ($service as $class) {
                $this->service($class, $params);
            }

            return $this;
        }

        if ($service == '' or isset($this->_ci_services[$service])) {
            return FALSE;
        }

        if (!is_null($params) && !is_array($params)) {
            $params = NULL;
        }

        $subdir = '';

        // Is the service in a sub-folder? If so, parse out the filename and path.
        if (($last_slash = strrpos($service, '/')) !== FALSE) {
            // The path is in front of the last slash
            $subdir = substr($service, 0, $last_slash + 1);

            // And the service name behind it
            $service = substr($service, $last_slash + 1);
        }

        foreach ($this->_ci_service_paths as $path) {

            $filepath = $path . 'services/' . $subdir . $service . '.php';

            if (!file_exists($filepath)) {
                continue;
            }

            include_once($filepath);
            $service = strtolower($service);

            if (empty($object_name)) {
                $object_name = $service;
            }

            $service = ucfirst($service);
            $CI =& get_instance();
            if ($params !== NULL) {
                $CI->$object_name = new $service($params);
            } else {
                $CI->$object_name = new $service();
            }

            $this->_ci_services[] = $object_name;

            return $this;
        }
    }
}