<?php
namespace Framework\App\Controllers;


use Framework\Sys\Controller;
use Framework\App\Views\vLogin;
use Framework\App\Models\mLogin;

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
        $this->view->show();
    }
    function home(){


    }
    function error(){

    }
}