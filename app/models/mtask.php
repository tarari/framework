<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/12/18
 * Time: 19:50
 */

namespace Framework\App\Models;


use Framework\Sys\Model;

class mtask extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getTasks(){
        $sql="SELECT * from task";
        $this->query($sql);
        $res=$this->execute();
        if($res){
           $data=$this->resultSet();
           return $data;
        }
        return null;
    }
}