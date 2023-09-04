<?php 
class IndexController extends Controller{


	function index(){

		$usuarios = new UsuarioModel;

		if(isset($_GET['q'])){

			$usuarios->__set('nome', $_GET['q']);
			$usuarios->read_like();

		}else{
			$usuarios->read();
		}
		

		$this->view->row = $usuarios->row;
		$this->view->usuarios = $usuarios->todos;

		echo $this->mostrar('inicio');
	}

	
}