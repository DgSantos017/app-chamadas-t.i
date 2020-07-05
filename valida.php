<?php 
    session_start();

	$email = $_POST['email'];
 	$senha = $_POST['senha'];		 // VARIAVEIS DE ENTRADA  
 	$autenticado = false;
 	$id = null;
 	$perfil = null;
 	$perfils = array(1 => 'adm', 2 => 'usuario');
 // *****************************************************************************************
 $usuarios = array(
 	Array('id' => 1, 'email' => 'diogo@contato', 'senha' => '1234', 'perfil' => 1),
 	Array('id' => 2, 'email' => 'gardenia@contato', 'senha' => '1234', 'perfil' => 1),  // BANCO DE DADOS INTERNO
 	Array('id' => 3, 'email' => 'eva@contato', 'senha' => '1234', 'perfil' => 2),
 	Array('id' => 4, 'email' => 'joao@contato', 'senha' => '1234', 'perfil' => 2) 
 );
// *******************************************************************************************
 	foreach($usuarios as $usuario) {
 		if($email == $usuario['email'] and $senha == $usuario['senha']){
 			$autenticado = true; 
 			$id = $usuario['id']; 
 			$perfil = $usuario['perfil'];                                  // PESQUISA DE USUARIOS
 		}
 	}
// ********************************************************************************************
 	if($autenticado){
 		echo 'SEJA BEM VINDO!';
 		$_SESSION['autenticado'] = 'SIM';
 		$_SESSION['id'] = $id;
 		$_SESSION['perfil'] = $perfil;

 		header('location: home.php');
 	}                                                                  // MSG DE VERIFICAÇÃO
 	else{
 		header('location: index.php?login=erro');
 		$_SESSION['autenticado'] = 'NAO';
 	}
 // ****************************************************************************************
 ?>