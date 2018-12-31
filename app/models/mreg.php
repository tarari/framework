<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 13/12/18
 * Time: 15:24
 */

namespace Framework\App\Models;


use Framework\Sys\Model;

class mReg extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function reg($username,$email,$passw){

        try {
            $this->query('INSERT INTO user(username,email,passw) 
              VALUES(:username,:email,:passw)');
            $this->bind(':email', $email);
            $this->bind(':username', $username);
            $this->bind(':passw', $passw);

            $res = $this->execute();
        }catch (\PDOException $e){
            echo $e->getMessage();
            var_dump($e);
        }
        if($res){
            return true;
        }
        else{
            return false;
        }

    }

    /**
     *  Returns true if email exists in database
     * @param $em email
     * @return bool
     */
    function validate_email($em){
        echo $em;

            $this->query("SELECT email FROM user ");
            //$this->bind(':email', $em);
            $res=$this->execute();
            $elements=$this->singleSet();
            var_dump($elements);
            if ($res){
                $total = $this->rowCount();
            }

            if($total==1){
                return true;
        }
        else{ return false;}
    }

}