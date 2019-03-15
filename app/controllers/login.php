<?php
namespace Framework\App\Controllers;


use Framework\Sys\Controller;
use Framework\App\Views\vLogin;
use Framework\App\Models\mLogin;
use Framework\Sys\Session;

class Login extends Controller
{
    function __construct($params)
    {
        parent::__construct($params);
        $this->addData([
        'page'=>'Login'
        ]);
        $this->model=new mLogin();
        $this->view=new vLogin($this->dataView,$this->dataTable);

    }
    function home(){
        $this->view->show();

    }
    function log(){
        $email=trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL));
        $passw=trim(filter_input(INPUT_POST,'passw',FILTER_SANITIZE_STRING));

        if(!empty($email)&& !empty($passw)){
              $user=$this->model->log($email,$passw);

              if($user){

                  Session::set('user',$user);
                  $this->ajax(['redir'=>'task']);
              }
        }
    }
    function error(){

    }
}