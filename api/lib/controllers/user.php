<?php
	namespace Api\Lib\Controllers;

	use Api\Lib\Spdo;
	use Api\Lib\Methods;

    class User implements Methods {
		protected $gdb=null;
		function __construct(){
				
				$this->gdb= Spdo::singleton();
		}
		private function encrypt($passw,$cost){
            return password_hash($passw,PASSWORD_BCRYPT,['cost'=>$cost]);
        }
		function get($request=null){
			if ($_SERVER['REQUEST_METHOD']!='GET'){
				return array('error'=>'Request not valid');
			}else{

                if($request->parameters==null){
                    $sql="SELECT * from user";
                    $stmt=$this->gdb->prepare($sql);
                    $stmt->execute();
                    $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
                else{
                    $sql=   "SELECT * from user  WHERE id=:id";
                    $id=$request->parameters;
                    $stmt=$this->gdb->prepare($sql);
                    $stmt->bindValue(':id',$id,\PDO::PARAM_INT);
                    $stmt->execute();
                    $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
                if($rows==null){
                    return ['msg'=>'User not found'];
                }
				return $rows;
			}

			
			
		}
		function post($request=null){
			if ($_SERVER['REQUEST_METHOD']!='POST'){
				return array('error'=>'Request not valid');
			}
			if (!empty($request->parameters['username'])&&
                !empty($request->parameters['email'])&&
                !empty($request->parameters['passw'])) {
                $pass_enc = $this->encrypt($request->parameters['passw'], 4);
                $request->parameters['passw']=$pass_enc;

                $sql = "INSERT INTO user(username,email,passw) VALUES(:username,:email,:passw)";
                return $this->gdb->oper($sql,
                    $request,null,
                    ['username','email','passw'],
                    "User created");
                /*
                $stmt = $this->gdb->prepare($sql);
                $stmt->bindValue(':username',$request->parameters['username'] );
                $stmt->bindValue(':email', $request->parameters['email']);
                $stmt->bindValue(':passw', $pass_enc);
                if($stmt->execute()){
                    return ['msg'=>'User created'];
                }else{
                    return ['msg'=>'Cant create user'];
                }
                */


            }else{
			    return ['msg'=>'Bad request'];
            }
		}

        /**
         * Delete resource api/user/id
         * @param $request
         * @return array
         */
		function delete($request){
			if ($_SERVER['REQUEST_METHOD']!='DELETE'){
				return array('error'=>'Request not valid');
			}


			if ($request->parameters==null){
			    return ['msg'=>'User not defined'];
            }else{

			    $id=$request->parameters;
			    $sql="DELETE FROM user WHERE id=:id";
			    $stmt=$this->gdb->prepare($sql);
			    $stmt->bindValue(':id',$id);
			    if($stmt->execute()){
			        return ['msg'=>'User deleted'];
                }else{

			        return ['msg'=>'Error deleting'];
                }


            }

		}

        /**
         * Updates user data: curl -X PUT api/user -d '{"field":"value"}'
         * @param $request
         * @return array
         */
		function put($request){
			if ($_SERVER['REQUEST_METHOD']!='PUT'){
				return array('error'=>'Request not valid');
			}

			else{
			    $id=$request->getId();
			    if(!empty($request->parameters['passw'])){
                    $pass_enc = $this->encrypt($request->parameters['passw'], 4);
                    $request->parameters['passw']=$pass_enc;
                }

			    // update collection
                $sets="";
                foreach ($request->parameters as $field=>$value) {
                    $tmp=($sets=="")?"":",";
                    $sets =$sets.$tmp.$field . '=:' . $field;

                    $sql = "UPDATE user SET " . $sets . " WHERE id=:id";

                    }



                    return $this->gdb->oper($sql,
                        $request,
                        $id,
                        array_keys($request->parameters),
                        "User updated");


                }

            }


	}
