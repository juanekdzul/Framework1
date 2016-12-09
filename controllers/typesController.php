<?php 

class TypesController extends AppController { 


	public function __construct(){
		parent::__construct();
	}

   /*
    *metodo index
    *metodo 
*/
	public function index(){
		//opcion 1
		$options= array(
			"conditions"=>"users.type_id=types.id"
			);

		$this->set("users", 
			$this->types->find(
				"users, types", 
				"all", 
				$options
				)
			);
		$this->set("usersCount", $this->types->find("users", "count"));


		//opcion 2
		// $users =  $this->users->find("users", "all", $options);
		// $this->set("users",$users);

	}
       /*
    *metodo add
    *metodo  para anadir un tipo de usuario
*/
	public function add(){
	if ($_SESSION["type_name"]=="Administradores") {
		if ($_POST) {
			$pass =new Password();
			$_POST["password"] = $pass->getPassword($_POST["password"]);
			if ($this->types->save("users", $_POST)){
				$this->redirect(array("controller"=>"users"));
			}else{
				$this->redirect(array("controller"=>"users","method"=>"add"));				
			}
		}$this->set("types", $this->types->find("types"));
	}else{
		$this->redirect(array("controller"=>"users"));
	}

		
	}
       /*
    *metodo edit
    *metodo  que permite edita al tipo
*/
	public function edit($id){
		if ($_POST) {


			if ($this->types->update("types", $_POST)) {
				$this->redirect(array("controller"=> "types"));
			}else{
				$this->redirect(
					array(
						"controller"=> "types",
						"method"=>"edit/".$_POST["id"])
					);
			}
		}
		$options = array(
			"conditions"=>"id=".$id
			);
		$this->set(
			"user",
			$this->types->find("users", "first", $options)
		);
		$this->set("types", $this->types->find("types"));
		
	}
       /*
    *metodo delete
    *metodo  que permite eliminar un tipo
*/
	public function delete($id){
		$options = "users.id=".$id;
		if($this->types->delete("users", $options)){
			$this->redirect(array("controller"=>"users"));
		}

	}
	/**
	*metodo login
	*metodo que permite validad 
	*/

	public function login(){
		$this->_view->setLayout("login");

		if ($_POST) {
			$pass = new Password();
			$filter = new validations();
			$auth = new Authorization();

			$username = $filter->sanitizeText($_POST["username"]);	
			$password = $filter->sanitizeText($_POST["password"]);

			$options = array(
				"field"=>
				     "users.id as user_id,
				     users.password as password,
				     users.username as username,
				     types.name as type_name",
				    "conditions"=>"username='$username' and users.type_id=types.id");
			$user = $this->users->find("users, types", 'first', $options);

			if ($pass->passwordVerify($password, $user["password"])) {
				$auth->login($user);
				$this->redirect(array("controller"=>"users"));
			}else{
				echo "Usuario no valido";
			}	
		}
	}
     /** metodo logout
     *metodo que permite cerra una seccion
     *
     */
	public function logout(){
		$auth = new Authorization();
		$auth->logout();
	}

}
 


?>