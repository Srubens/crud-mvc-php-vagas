<?php
use \App\Session\Login;
$usuarioLogado = Login::getUsiarioLogado();
$usuario = $usuarioLogado ?
    $usuarioLogado['nome'] . ' <a style="margin-left:20px;" class="col-12 col-md-1 btn btn-danger text-bold" href="logout.php">sair</a>' :
    'Visitante <a class="btn btn-success text-bold ml-2" href="login.php">Entrar</a>';
//echo "<pre>"; print_r($usuarioLogado); echo "</pre>"; exit;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style media="screen">
      a{
        list-style: none;
        color:#000;
        text-decoration: none;
      }
    </style>
    <title>WDev Vagas</title>
  </head>
  <body class="bg-dark text-light" >
    <div class="container">
      <div class="jumbotron bg-danger p-4 bg-opacity-70">
        <h1>WDev Vagas</h1>
        <p>Exemplo de CRUD com php Orientado a Objetos.</p>

            <hr/>
      </div>
        <div class="d-flex justify-content-start flex-column">
            <div class="bg-danger bg-opacity-25" >
                <?= $usuario; ?>
            </div>
        </div>
