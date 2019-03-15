<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 07/03/19
 * Time: 16:55
 */

namespace Api\Lib;


interface Methods
{
    public function get($request);
    public function post($request);
    public function put($request);
    public function delete($request);

}