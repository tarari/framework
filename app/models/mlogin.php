<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 04/12/18
 * Time: 17:29
 */

namespace Framework\App\Models;

use Framework\Sys\Model;

class mLogin extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function log($email,$passw){

        $sql="SELECT * FROM user WHERE email=:email";
        $this->query($sql);
        $this->bind(":email",$email);
        $res=$this->execute();

        $user=$this->singleSet();

        if($this->rowCount()!=0){

            if(password_verify($passw,$user['passw'])){

                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}