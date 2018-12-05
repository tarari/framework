<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 29/11/18
 * Time: 16:22
 */

namespace Framework\Sys;


interface DBAdapter
{

    function connect();
    function disconnect();
    function query();
    function fetch();
    function select($table,$conditions='',$fields='*',$order='',$limit=null,$offset=null);
    function insert($table,array $data);
    function update($table,array $data);
    function delete();
    function getInsertId();
    function countRows();

}