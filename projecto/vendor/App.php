<?php 

class App{

	public function __construct(){
		$this->iniciar();
	}


	 function iniciar($value=''){

	 	//verifique a url
	 	if(isset($_GET['url'])){

	 		$rota = explode('/', $_GET['url']);
		 	define("Controlador", (!isset($rota[0]) || $rota[0] == '') ? 'IndexController' : ucfirst($rota[0]).'Controller');
		 	define("Acao", (!isset($rota[1]) || $rota[1] == '') ? 'index' : $rota[1]);
		 	define("Id", (!isset($rota[2]) || $rota[2] == '') ? 'index' : $rota[2]);

		 	$controlador = Controlador;
		 	$acao = Acao;

		 	if(method_exists($controlador, $acao)){

		 		$class = new $controlador;
		 		$class->$acao();

		 	}else{
		 		include "vendor/404.php";
		 	}

	 	}else{

	 		$class = new IndexController;
	 		$class->index();
	 	}
	 	
	}

}