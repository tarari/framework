<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 22/11/18
 * Time: 17:31
 */

namespace Framework\App\Controllers;


use Framework\Sys\Controller;
use Framework\App\Views\vError;
use Framework\App\Models\mError;

class Error extends Controller
{
    function __construct($params)
    {

        parent::__construct($params);
        $this->addData([
            'page'=>'Error',

        ]);
        $this->view=new vError($this->dataView,$this->dataTable);
        $this->view->show();



    }
    function home(){}
    function error(){
        $this->addData(['error'=>'Acció no existeix']);
        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();

    }
}