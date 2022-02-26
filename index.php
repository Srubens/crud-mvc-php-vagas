<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Session\Login;

//OBRIGA O USER ESTA LOGADO
Login::requireLogin();

$vagas = Vaga::getVagas();
// echo "<pre>"; print_r($vagas); echo "</pre>"; exit;

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';

//echo "ola mundo!";
