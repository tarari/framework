<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 22/11/18
 * Time: 17:31
 */

namespace Framework\App\Controllers;


use Framework\Sys\Controller;
use Framework\App\Views\vHome;
use Framework\App\Models\mHome;

class Home extends Controller
{
  function __construct($params)
  {

      parent::__construct($params);
      $this->addData([
          'page'=>'Inicio'

      ]);
      $this->model=new mHome();
      $this->view=new vHome($this->dataView,$this->dataTable);




  }
  function home(){
      $this->view->show();

  }
}