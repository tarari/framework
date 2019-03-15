<?php
namespace Api\Lib;
/**
 * JSON response class.
 * 
 * @package api-framework
 * @author  Toni Jimenez 
 * */

class ResponseJson
{
    /**
     * Response data.
     *
     * @var string
     */
    protected $data;
    
    protected $status;
    
    /**
     * Constructor.
     *
     * @param string $data
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Render the response as JSON.
     * 
     * @return string
     */
    public function render()
    {
        // Allow CORS
        header("Acces-Control-Allow-Origin: *");
        header("Acces-Control-Allow-Methods: *");
        header('Content-Type: application/json');
        return json_encode($this->data);
    }
}