<?php
class Con{

	public static function ectar(){

		try{

			$bd_nome = 'mvc';
			$bd_usuario = 'root';
			$bd_host = 'localhost';
			$bd_passe = '';

			$con = new PDO(
				"mysql:host=".$bd_host.";dbname=".$bd_nome.";charset=utf8",
				$bd_usuario,
				$bd_passe 
			);
			return $con;
		}catch(PDOException $e){
			return "Erro na conexão";
		}
	}
}