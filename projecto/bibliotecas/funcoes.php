<?php

	//listar usurios

	function listar_usurios(array $dados){

		$i = 0;
		$a = '';
		foreach ($dados as $key => $value) {
			$a .='

			<tr>
              <td>'.++$i.'</td>
              <td>'.$value['nome'].'</td>
              <td>'.$value['email'].'</td>
              <td>
              <ul class="mnus">
              	<li><a href="'.link.'usuarios/editar/'.$value['id'].'">Editar</a></li>
              	<li><a href="'.link.'usuarios/eliminar/'.$value['id'].'">Eliminar</a></li>
              	<ul>
              </td>
            </tr>
			';
		}

		return $a;
	}

?>