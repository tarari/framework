<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/12/18
 * Time: 19:38
 */

namespace Framework\App\Controllers;

use Framework\Sys\Controller;


class Task extends Controller
{
    function __construct($params = null, $dataView = null)
    {
        parent::__construct($params, $dataView);
    }

    function home(){
        $this->view->show();
    }
}