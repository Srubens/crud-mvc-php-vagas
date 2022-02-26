<?php

namespace App\Session;

use App\DB\DataBase;

class Login
{

    public static function init(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public static function login($obUsuario){
        self::init();
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email
        ];
        header("Location: index.php");
        exit;
    }

    /**
     * METODO RESPONSAVEL POR VERIFICAR SE O USER
     * ESTA LOGADO
     * @return void
     */
    public static function isLogged(){
        self::init();
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * METODO RESPONSAVEL POR OBRIGAR AO USUARIO A ESTA LOGADO
     * PARA ACESSAR
     */
    public static function requireLogin(){
        if(!self::isLogged()){
            header('Location: login.php');
            exit;
        }
    }

    public static function requireLogout(){
        if(self::isLogged()){
            header('Location: index.php');
            exit;
        }
    }


    public static function getUsiarioLogado(){
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    public static function logout(){
        self::init();
        unset($_SESSION['usuario']);
        header('Location: login.php');
        exit;
    }


}