<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;

//OBRIGA O USER ESTA LOGADO
Login::requireLogin();

define('TITLE', 'Cadastrar Vaga');

// echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
use \App\Entity\Vaga;
$obVaga = new Vaga;

/** VALIDACAO DO POST */
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'] )){

	$obVaga->titulo = $_POST['titulo'];
	$obVaga->descricao = $_POST['descricao'];
	$obVaga->ativo = $_POST['ativo'];
	$obVaga->cadastrar();
	//echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

	//die("Cadastrar");
	header('location: index.php?status=success');
	exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';

echo "ola mundo!";
