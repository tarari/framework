<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/12/18
 * Time: 19:38
 */

namespace Framework\App\Controllers;

use Framework\Sys\Controller;
use Framework\Sys\Session;


class Task extends Controller
{
    function __construct($params = null)
    {
        parent::__construct($params);
        $this->addData(['page'=>'Tasks']);
        $this->model=new \Framework\App\Models\mTask();
        $this->view=new \Framework\App\Views\vTask();
    }

    function home(){
        //take data from the model
        $data=$this->model->getTasks();
        $this->addData($data);
        $this->view->_construct($this->dataView,$this->dataTable);
        $this->view->show();
    }
}