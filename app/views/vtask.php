<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 10/01/19
 * Time: 16:20
 */

namespace Framework\App\Views;


use Framework\Sys\View;

class vTask extends View
{
    public function __construct($dataView = null,$dataTable=null)
    {
        parent::__construct($dataView,$dataTable);
        $this->output=$this->render('ttask.php');
    }
}