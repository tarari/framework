<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/11/18
 * Time: 17:08
 */

  namespace Framework\Sys;

  trait Singleton{
      private static $instance;
      public static function getInstance(){
          if(!self::$instance instanceof self){
              self::$instance=new self;
          }
          return self::$instance;
      }
  }