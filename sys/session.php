<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 12/12/18
 * Time: 17:07
 */

namespace Framework\Sys;


class Session
{
    static function init(){
        session_start();
        self::set('id',session_id());
    }

    static function set($key,$value){
        $_SESSION[$key]=$value;
    }

    static function get($key){
        if(self::exists($key)){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }
    private static function exists($key){
        if(array_key_exists($key,$_SESSION)){
            return true;
        }else{
            return false;
        }

    }
    static function del($key){
        if (self::exists($key)){
            unset($_SESSION[$key]);
        }
    }

    static function destroy(){
        session_destroy();
    }

}