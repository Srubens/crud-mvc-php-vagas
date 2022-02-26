<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Usuario;

//OBRIGA O USER não ESTA LOGADO
Login::requireLogout();

$alertaLogin = '';
$alertaCadastro = '';

if( isset($_POST['acao']) ){

    switch($_POST['acao']){
        case 'logar':
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            if( !$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
                $alertaLogin = 'E-mail e senha inválidos!';
                break;
            }
            Login::login($obUsuario);
            //echo "<pre>"; print_r($obUsuario); echo "</pre>"; exit;

        break;
        case 'cadastrar':
            if( isset($_POST['nome'], $_POST['email'], $_POST['dt_create'], $_POST['senha']) ){

                $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
                if($obUsuario instanceof  Usuario){
                    $alertaCadastro = 'O e-mail já esta em uso!';
                    break;
                }

                $dt_create = explode('/', $_POST['dt_create']);
                $dt_create = $dt_create[2].'-'.$dt_create[1].'-'.$dt_create[0];

                if( strtotime($dt_create) === false ){
                    header("Location: login.php");
                }

                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->dt_create = $dt_create;
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->ativo = 's';
                $obUsuario->dt_update = date('Y-m-d H:s:i');
                $obUsuario->cadastrar();
                Login::login($obUsuario);
                //echo "<pre>"; print_r($obUsuario); echo "</pre>"; exit;

            }
        break;
    }

     //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';

echo "ola mundo!";
