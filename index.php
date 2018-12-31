<?php

    error_reporting(E_ALL);
    ini_set('display_errors','On');
    
    use \Framework\Sys\Kernel;
    use \Framework\Sys\Autoload;
    use \Framework\Sys\Session;
    //predefine constants

    include 'config.inc.php';
    //config file
    require_once __DIR__.'/sys/autoload.php';
    //metodos de autocarga
    $load=new Autoload();
    $load->register();
    $load->addNamespace('Framework\Sys','sys');
    $load->addNamespace('Framework\App','app');
    $load->addNamespace('Framework\App\Controllers','app/controllers');
    $load->addNamespace('Framework\App\Models','app/models');
    $load->addNamespace('Framework\App\Views','app/views');


    //inicio de sesion
    Session::init();
    
    //inicio de front-controller
    
    Kernel::init();
