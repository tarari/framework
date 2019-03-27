<?php

	namespace Api\Lib;

	use Api\Lib\Request;
	
	class Rest {
	    protected $response_str;

	    protected function setResponse_Str($resp){
	        $this->response_str=$resp;
        }

        function getResponse_Str(){
	        return $this->response_str;
        }
		
		function __construct(){
			$request = new Request();

			if (isset($_SERVER['REQUEST_URI'])) {
			    $req=explode('/',trim($_SERVER['REQUEST_URI'],'/'));
			    array_shift( $req);

                $request->url_elements = $req;

			}
			$request->method = strtoupper($_SERVER['REQUEST_METHOD']);
			switch ($request->method) {
			    case 'GET':
			        $request->parameters = (count($request->url_elements)>1)?$request->url_elements[1]:$_GET;
			    break;
			    case 'POST':
                    $request->parameters=json_decode(file_get_contents('php://input'),true);
			    break;
			    case 'PUT':
                    $request->parameters=json_decode(file_get_contents('php://input'),true);
			    break;
			    case 'DELETE':
                    $request->parameters = (count($request->url_elements)>1)?$request->url_elements[1]:$_GET;
			    break;
                default:
                    header('HTTP/1.1 405 Method not allowed');
                    header('Allow: GET, PUT, POST and DELETE');
                    break;
			    
			}
			
			/**
			 * Route the request.
			 */
			if (!empty($request->url_elements)) {
			    $controller_name = ucfirst($request->url_elements[0]);
			    //$file=strtolower(LIB.'controllers'.DS.$controller_name.'.php');

			   
			   try{
			    	
			    	$name='\Api\Lib\Controllers\\'.$controller_name;
			    	//var_dump($name);
			        $controller = new $name;
			        $action_name = strtolower($request->method);

			        $this->response_str = call_user_func_array(array($controller, $action_name), array($request));
			    }
			    catch (Exception $e) {
			        header('HTTP/1.1 404 Not Found');
			        $this->response_str = 'Unknown request: ' . $request->url_elements[0];
			    }
			}
			else {
			    $this->response_str = 'Unknown request';
			}
			/**
			 * Send the response to the client.
			 */

		}

	}