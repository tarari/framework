<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/11/18
 * Time: 17:52
 */

namespace Framework\Sys;

/**
 * Class View
 * @package Framework\Sys
 */
class View extends \ArrayObject
{
    /**
     * @var string $output  contains html output
     * @var array $dataTable contais data array table for template transforming
     */

    protected $output;

    protected $dataTable;

   function __construct($dataView=null,$dataTable=null){
       //
    parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS);
    if($dataTable!=null){
        $this->dataTable=$dataTable;
    }
   }
    /**
     * renders template
     * @return void
     */
    function render($filetemplate){
        //initialize output buffer
        ob_start();
        try{
            include APP.'tpl'.DS.$filetemplate;
        }catch (Exception $e){
            echo $e->getMessage();
        }

        //clean and return output buffer
        return ob_get_clean();

    }
    function show(){
        echo $this->output;
    }
}