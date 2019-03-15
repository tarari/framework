<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 28/11/18
 * Time: 19:18
 */

namespace Framework\Sys;

use Framework\Sys\Registry;
use \PDO;


class DB extends PDO
{
   use Singleton;

    public function __construct()
   {
       $config=Registry::getInstance();
       $dbconf=(array)$config->dbconf;

       //$dsn driver:host=
       $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
      
       $username=$dbconf['dbuser'];
       $passwd=$dbconf['dbpass'];
       try {
           parent::__construct($dsn, $username, $passwd);
       }catch(\PDOException $e){
           echo 'Fallo en la conexión';
       }
   }


}