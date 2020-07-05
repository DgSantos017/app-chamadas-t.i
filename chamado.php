<?php 
	session_start();


	// TRABALHANDO NA MONTAGEM DO TEXTO
	$titulo = str_replace('#','-',$_POST['titulo']);
	$categoria = str_replace('#','-',$_POST['categoria']);
	$descricao = str_replace('#','-',$_POST['descricao']);

	$texto = $_SESSION['id'] . ' # ' . $titulo . ' # ' . $categoria .  ' # ' . $descricao . PHP_EOL;

	// ABRINDO O ARQUIVO
	$arquivo = fopen('arquivo.txt', 'a');

	// ESCREVENDO O TEXTO
	fwrite($arquivo, $texto);

	// FECHANDO O ARQUIVO
	fclose($arquivo);
	header('location: abrir_chamado.php');
 ?>