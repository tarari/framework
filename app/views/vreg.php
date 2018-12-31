<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 11/12/18
 * Time: 20:27
 */





namespace Framework\App\Views;

use Framework\Sys\View;

class vReg extends View{

    public function __construct($dataview = null,$datatable=null)
    {
        parent::__construct($dataview,$datatable);
        $this->output=$this->render('treg.php');
    }

}
