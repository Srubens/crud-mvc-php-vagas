<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;

//OBRIGA O USER ESTA LOGADO
Login::requireLogin();

define('TITLE', 'Excluir Vaga');

// echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
use \App\Entity\Vaga;

if( !isset($_GET['id']) || !is_numeric($_GET['id']) ){
	header('location: index.php?status=error');
	exit;
}

$obVaga = Vaga::getVaga($_GET['id']);

if(!$obVaga instanceof Vaga){
	header('location: index.php?status=error');
	exit;
}

// echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

/** VALIDACAO DO POST */
if(isset($_POST['excluir'] )){

	$obVaga->excluir();
	// echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
	// exit;
	//die("Cadastrar");
	header('location: index.php?status=success');

}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';

echo "ola mundo!";
