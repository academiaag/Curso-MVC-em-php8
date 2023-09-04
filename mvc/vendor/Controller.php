<?php 
class Controller{

	public function __construct(){

		$this->view = new stdClass();
	}



	function ver($data){

		$most = get_class($this);
		$pasta = strtolower(str_replace('Controller', '', $most));
		$tema = theme;
		$ficheiro = $data;
		$titulo = (ucfirst($pasta) == 'Index') ? 'Página Incial' : ucfirst($pasta);
		include "app/themes/{$tema}/extra/cima.phtml";
		include "app/themes/{$tema}/{$pasta}/{$ficheiro}.phtml";
		include "app/themes/{$tema}/extra/baixo.phtml";
	}

	function mostrar($data){
		$tema = theme;
		if(file_exists("app/themes/{$tema}/index.phtml")){
			include "app/themes/{$tema}/index.phtml";
		}else{
			include "vendor/tema.php";
		}

	}

}