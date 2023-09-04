<?php

	class UsuarioModel{

		public $tb = 'usuario';
		public $rs;
		public $row;
		public $todos;
		private $query;

		public function __set($nome, $valor){

			$this->$nome = $valor;
		}

		public function __get($nome){

			return $this->$nome;
		}

		public function create(){


				$this->query = "INSERT INTO `{$this->tb}` (`nome`, `email`, `pass`) VALUES (:nome, :email, :passe)";

				$tratar = Con::ectar()->prepare($this->query);

				$tratar->bindValue(":nome", $this->__get('nome'));
				$tratar->bindValue(":email", $this->__get('email'));
				$tratar->bindValue(":passe", $this->__get('passe'));


				if($tratar->execute()){

					$this->rs = true;

				}else{

					$this->rs = false;
				}

		}


		function read(){

			$this->query = "SELECT * FROM {$this->tb} ORDER BY nome ASC";

				$tratar = Con::ectar()->prepare($this->query);


				if($tratar->execute()){

					$this->row = $tratar->rowCount();
					$this->todos = $tratar->fetchAll(PDO::FETCH_ASSOC);
					$this->rs = true;

				}else{

					$this->rs = false;
				}

		}


		function read_like(){

			$this->query = "SELECT * FROM {$this->tb} WHERE `nome` LIKE :nome ORDER BY nome ASC";

				$tratar = Con::ectar()->prepare($this->query);
				$tratar->bindValue(":nome", '%'.$this->__get('nome').'%');

				if($tratar->execute()){

					$this->row = $tratar->rowCount();
					$this->todos = $tratar->fetchAll(PDO::FETCH_ASSOC);
					$this->rs = true;

				}else{

					$this->rs = false;
				}

		}

		function read_igual(){

			$this->query = "SELECT * FROM {$this->tb} WHERE `id` = :id ORDER BY nome ASC";

				$tratar = Con::ectar()->prepare($this->query);
				$tratar->bindValue(":id", $this->__get('id'));

				if($tratar->execute()){

					$this->row = $tratar->rowCount();
					$this->unico = $tratar->fetch(PDO::FETCH_ASSOC);
					$this->rs = true;

				}else{

					$this->rs = false;
				}

		}

		function update(){

			$this->query = "UPDATE {$this->tb} SET `nome` = :nome, `email` = :email WHERE `usuario`.`id` = :id";

			$tratar = Con::ectar()->prepare($this->query);

			$tratar->bindValue(":nome", $this->__get('nome'));
			$tratar->bindValue(":email", $this->__get('email'));
			$tratar->bindValue(":id", $this->__get('id'));


			if($tratar->execute()){

				$this->rs = true;

			}else{

				$this->rs = false;
			}
		}


		function delete(){

			$this->query = "DELETE FROM {$this->tb} WHERE `{$this->tb}`.`id` = :id";

			$tratar = Con::ectar()->prepare($this->query);
			$tratar->bindValue(":id", $this->__get('id'));


			if($tratar->execute()){

				$this->rs = true;

			}else{

				$this->rs = false;
			}
		}
	}