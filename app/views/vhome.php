<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 28/11/18
 * Time: 17:34
 */

namespace Framework\App\Views;

use Framework\Sys\View;

class vHome extends View{

    public function __construct($dataView = null,$dataVable=null)
    {
        parent::__construct($dataView,$dataVable);
        $this->output=$this->render('thome.php');
    }

}
