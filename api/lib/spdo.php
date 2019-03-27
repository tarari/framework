<?php

namespace Api\Lib;

class Spdo extends \PDO {
	
	static  $instance;
	static $config=array();
	function __construct(){
	    $config=json_decode(file_get_contents(ROOT.'config.json'),true);

		$dsn = $config['dbconf']['driver'].':dbname='.$config['dbconf']['dbname'].';host='.$config['dbconf']['dbhost'];
		$usr =$config['dbconf']['dbuser'];
		$pwd = $config['dbconf']['dbpass'];
		try{
		 		parent::__construct($dsn,$usr,$pwd);
		 	}catch(PDOException $e){
		 		echo $e->getMessage();
		 	}
	}
	function getConfig(){
	    // extract config DB array
	    //todo
    }

	static function singleton(){
		if(!(self::$instance instanceof  self)){
		 		self::$instance=new self();
		 		
		 	} 
		 	return self::$instance;
	}
	function oper($sql,$request,$id=null,$params,$msg){
        $stmt = self::$instance->prepare($sql);

        //
        if($id!=null){
            $request->parameters=array_merge($request->parameters,['id'=>$id]);
        }
        $params[]='id';

        foreach ($params as $param){
            $stmt->bindValue(':'.$param,$request->parameters[$param]);
        }
       $stmt->debugDumpParams();
        if($stmt->execute()){
            return ['msg'=>$msg];
        }
        else{
            return ['msg'=> 'Failed operation'];
        }

    }
}