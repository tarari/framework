<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 05/12/18
 * Time: 20:28
 */

namespace Framework\App\Controllers;

use Framework\Sys\Controller;
use Framework\App\Views\vReg;
use Framework\App\Models\mReg;

class Reg extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->addData([
            'page'=>'Reg'

        ]);
        $this->model=new mReg();
        $this->view=new vReg($this->dataView,$this->dataTable);

    }
    function home(){
        $this->view->show();
    }
    function reg(){
        //comprobacion de formulario

        $email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $password1=filter_input(INPUT_POST,'password1');
        $password2=filter_input(INPUT_POST,'password2');
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);

        if ($password1==$password2){
            $passw_enc=password_hash($password1,PASSWORD_BCRYPT,['cost'=>4]);
            $res=$this->model->reg($username,$email,$passw_enc);

            if ($res){
                $this->ajax(['redir'=>'home',
                    'msg'=>'ok, please sign in']);
            }else{
                $this->ajax(['redir'=>'reg',
                    'msg'=>'Review your data']);
            }
        }else{
            $this->ajax(['redir'=>'reg',
                'msg'=>'Passwords does not match']);
        }


    }
    function valemail(){
        $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $res=$this->model->validate_email($email);

        if($res){
            $this->ajax(['msg'=>'Email in use']);
        }else{
            $this->ajax(['msg'=>'Correct']);
        }
    }

    function testemail(){
        if (isset($this->params['email'])){
            echo 'yeah';
        }
        $email=rawurlencode(filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL));
        $res=$this->model->validate_email($email);

        if($res){
            $this->ajax(['msg'=>'Email in use']);
        }else{
            $this->ajax(['msg'=>'Correct']);
        }
    }

    function error(){
        echo "ERROR";
    }

}