<?php
session_start();
include "app/Conetor.php";
include "bibliotecas/constantes.php";
include "bibliotecas/funcoes.php";
/*Autoload*/
spl_autoload_register(function ($classe){

	//app

	if(file_exists("app/controllers/{$classe}.php")){
		include "app/controllers/{$classe}.php";
	}
	if(file_exists("app/models/{$classe}.php")){
		include "app/models/{$classe}.php";
	}
	if(file_exists("bibliotecas/{$classe}.php")){
		include "bibliotecas/{$classe}.php";
	}

	if(file_exists("vendor/{$classe}.php")){
		include "vendor/{$classe}.php";
	}


});


$app = new App;
