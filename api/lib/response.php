<?php
namespace Api\Lib;
use Api\Lib\ResponseJson;

/**
 * Response class factory.
 * 
 * @package api-framework
 * @author  Toni Jimenez <@>
 */
class Response
{
    /**
     * Constructor.
     *
     * @param string $data
     * @param string $format
     */
    public static function create($data, $format)
    {
        switch ($format) {
            case 'application/json':
            default:
                $obj = new ResponseJson($data);
            break;
        }
        return $obj;
    }
}