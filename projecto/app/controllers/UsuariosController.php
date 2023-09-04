<?php
class UsuariosController extends Controller{

		function index(){

			echo $this->mostrar('inicio');
		}

		function add(){
			
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$passe = $_POST['passe'];

			$usuario = new UsuarioModel;

			$usuario->__set('nome', $nome);
			$usuario->__set('email', $email);
			$usuario->__set('passe', md5($passe));

			$usuario->create();

			if($usuario->rs == true){

				$_SESSION['tp'] = 'sucesso';
				$_SESSION['txt'] = 'Novo usuário adicionado';

			}else{

				$_SESSION['tp'] = 'erro';
				$_SESSION['txt'] = 'Não foi possível adicionar o usuário';
			}

			header('Location:'.link.'usuarios');
			

		}

		function editar(){
			$usuarios = new UsuarioModel;

			$usuarios->__set('id', Id);
			$usuarios->read_igual();

			if($usuarios->row > 0){
				$this->view->usuario = $usuarios->unico;
				echo $this->mostrar('editar');

			}else{

				header('Location:'.link);
			}

		}


		function edt(){

			$nome = $_POST['nome'];
			$email = $_POST['email'];
			//$pass = (isset($_POST['passe']) && $_POST['passe'] != '') ? $_POST['passe'] : '';

			$usuarios = new UsuarioModel;
			$usuarios->__set('id', $_POST['id']);

			$usuarios->__set('nome', $nome);
			$usuarios->__set('email', $email);

			$usuarios->update();

			if($usuarios->rs == true){

				$_SESSION['tp'] = 'sucesso';
				$_SESSION['txt'] = 'Usuário editado';

			}else{

				$_SESSION['tp'] = 'erro';
				$_SESSION['txt'] = 'Não foi possível editar o usuário';
			}

			header('Location:'.link.'usuarios/editar/'.$_POST['id']);


		}

		function eliminar(){

			$usuario = new UsuarioModel;
			$usuario->__set('id', Id);
			$usuario->delete();

			if($usuario->rs == true){
				
				$_SESSION['tp'] = 'sucesso';
				$_SESSION['txt'] = 'Usuário eliminado';

			}else{

				$_SESSION['tp'] = 'erro';
				$_SESSION['txt'] = 'Não foi possível eliminar o usuário';
			}
			header('Location:'.link);
		}

}