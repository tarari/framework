<?php

namespace Api\Lib;
/**
 * Request class.
 * 
 * @package api-framework
 * @author  Toni Jimenez <@>
 */
class Request
{
    /**
     * URL elements.
     *
     * @var array
     */
    public $url_elements = array();
    
    /**
     * The HTTP method used.
     *
     * @var string
     */
    public $method;
    
    /**
     * Any parameters sent with the request.
     *
     * @var array
     */
    public $parameters;

    public function getId(){
        if(count($this->url_elements)>1){
            return $this->url_elements[1];
        }else{
            return null;
        }

    }
    public function getParameters(){
        return $this->parameters;
    }
}
