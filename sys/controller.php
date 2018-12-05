<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/11/18
 * Time: 17:37
 */

namespace Framework\Sys;

use Framework\Sys\Registry;
/**
 * Class Controller
 *
 * @package Framework\Sys
 */
abstract class Controller
{
    protected $model;
    protected $view;
    protected $params;
    protected $conf; //object app configuration
    protected $app; 
    protected $dataView=array();
    protected $dataTable=array();

    function __construct($params=null,$dataView=null)
    {
        $this->params=$params;
        $this->conf=Registry::getInstance();
        //access to app data config
        $this->app=(array)$this->conf->app;
        $this->dataView=$dataView;
        $this->addData($this->app);
    }

    /**
     * Adds data array to dataView property
     * 
     * @param $array
     * @return void
     */
    protected function addData(Array $array){
        if(is_array($array)){
            if($this->is_single($array)){
                $this->dataView=array_merge((array)$this->dataView,$array);
            }else{
                $this->dataTable=$array;
            }
        }
    }

    /**
     *  determines if is multilevel array or not
     * @param array $data
     * @return boolean
     */
    protected function is_single($data){
        foreach($data as $value){
            if(is_array($value)) {
                return false;
            }
        }
        return true;
    }
}