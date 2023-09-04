<?php
class Con{

	public static function ectar(){

		try{

			$bd_nome = 'bd';
			$bd_usuario = 'usuario';
			$bd_host = 'localhost';
			$bd_passe = 'passe';

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