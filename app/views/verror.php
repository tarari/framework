<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 28/11/18
 * Time: 17:34
 */

namespace Framework\App\Views;

use Framework\Sys\View;

class vError extends View{

    public function __construct($dataview = null,$datatable=null)
    {
        parent::__construct($dataview,$datatable);
        $this->output=$this->render('terror.php');
    }

}
