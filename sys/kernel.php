<?php


namespace Framework\Sys;
use Framework\Sys\Request;
use Framework\App\Controllers\Error;

/**
 * Application kernel
 *
 * @author Me
 */
class kernel {

    
    /**
     *   This methode allows initialize application
     *     Fronted Controlles
     *   @return void
     */
    static private $controller;
    static private $action;
    static private $params;
    static private $controller_array=[];


    public static function init(){
        
        
        //process the REQUEST_URI
        Request::exploding();
        // attributes extraction
        self::$controller=Request::extract();
        self::$action=Request::extract();
        self::$params=Request::getParams();


        //call to Router applying 
        self::router();
        // controller and action
        
    }
    private static function controllersArray(){
        $d=dir(APP.'controllers');
        while (!false==($entry = $d->read() )) {
            if($entry!='.'&&$entry!='..') {
                self::$controller_array[] = explode('.',$entry)[0];
            }

        }


        return self::$controller_array;
    }

    /**
     * looks for controller and action
     * instantiate controller and calls the action
     *
     * @return void
     */
    static function router(){

        //default controller and action
        self::$controller=(self::$controller!="")?self::$controller:'home';
        self::$action=(self::$action!="")?self::$action:'home';
        //complete controllers array
        self::controllersArray();
        //default  controller classes
        foreach (self::$controller_array as $item) {
            $classes[]='\\Framework\App\Controllers\\'.ucfirst($item);
        }

        $class='\\Framework\App\Controllers\\'.ucfirst(self::$controller);

        //if exists file controller and class controller
        if (in_array($class,$classes)){
            //if(self::$controller!='error'){
                self::$controller= new $class(self::$params);
                if(!is_callable(array(self::$controller,self::$action))) {
                    self::$action = 'error';
                }
                call_user_func(array(self::$controller,self::$action));
                }
        else{

            self::$controller=new \Framework\App\Controllers\Error(self::$params);

        }
            }








}
