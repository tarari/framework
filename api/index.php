<?php
  namespace Api;
  	
     use \Api\Lib\Rest;
     use \Api\Lib\Response;

     ini_set('display_errors','on');
    define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(dirname(__FILE__)).DS);
	//to access filesystem
	define('LIB',ROOT.'lib'.DS);
    require_once __DIR__ . '/lib/autoload.php';

	$loader = new \Api\Lib\Autoload;
	
	$loader->register();
	$loader->addNamespace('Api\Lib', 'lib');
	$loader->addNamespace('Api\Lib\Controllers', 'lib/controllers');

   
   


    $app=new Rest();
    $resp=$app->getResponse_Str();
    $response_obj = Response::create($resp, $_SERVER['HTTP_ACCEPT']);
    echo $response_obj->render();
