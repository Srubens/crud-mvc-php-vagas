<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;

//OBRIGA O USER ESTA LOGADO
Login::requireLogin();

define('TITLE', 'Editar Vaga');

// echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
use \App\Entity\Vaga;

if( !isset($_GET['id']) || !is_numeric($_GET['id']) ){
	header('location: index.php?status=error');
	exit;
}

$obVaga = Vaga::getVaga($_GET['id']);
// echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

if(!$obVaga instanceof Vaga){
	header('location: index.php?status=error');
	exit;
}

/** VALIDACAO DO POST */
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'] )){

	$obVaga->titulo = $_POST['titulo'];
	$obVaga->descricao = $_POST['descricao'];
	$obVaga->ativo = $_POST['ativo'];
	$obVaga->atualizar();
	// echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
	// exit;
	//die("Cadastrar");
	header('location: index.php?status=success');

}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';

echo "ola mundo!";
