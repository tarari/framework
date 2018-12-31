<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework\Sys;

/**
 * Process REQUEST_URI
 *
 * @author Me <t.jimene<@escolesnuria.cat>
 */
class Request {
        static private $query=array();
        
        /**
         * 
         * @return void
         */
        static function exploding(){
        //echo $_SERVER['REQUEST_URI'].'<br>';
        $array_query=explode('/',$_SERVER['REQUEST_URI']);
        // left trim and rght too
        array_shift($array_query);
        if(end($array_query)==""){
            array_pop($array_query);
        }
        self::$query=$array_query;
       
    }
    /**
     *  Extract item from request uri
     * 
     * @return string
     */
    static function extract():?string{
        return array_shift(self::$query);
    }
    
    /**
     * extract array parameters from request uri
     * 
     * 
     * @return array associative array
     */
    static function getParams(){
        if(count(self::$query)>0){
            if((count(self::$query)%2)==0){
                for($i=0;$i<count(self::$query);$i++){
                    if(($i%2)==0){
                        $key[]=self::$query[$i];
                    }
                    else{
                        $value[]=self::$query[$i];
                    }
                }
                $result=array_combine($key, $value);
                return $result;
            }
        }
    }
    
}
