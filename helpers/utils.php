<?php

class Utils{

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCamara(){
        require_once 'models/camara.php';
        $camara = new Camara();
        $camaras = $camara->getAll();
        return $camaras;
    }

    public static function showTipodelito(){
        require_once 'models/tdelito.php';
        $tdelito = new Tdelito();
        $tdelitos = $tdelito->getAll();
        return $tdelitos;
    }

    public static function showMedioalerta(){
        require_once 'models/malerta.php';
        $malerta = new Malerta();
        $malertas = $malerta->getAll();
        return $malertas;
    }

    Public static function showUnidad(){
        require_once 'models/unidad.php';
        $unidad = new Unidad();
        $unidades = $unidad->getAll();
        return $unidades;
    }

    Public static function showSupervisor(){
        require_once 'models/supervisor.php';
        $supervisor = new Supervisor();
        $supervisores = $supervisor->getAll();
        return $supervisores;
    }

    public static function showCecom(){
        require_once 'models/cecom.php';
        $cecom = new Cecom();
        $cecoms = $cecom->getAll();
        return $cecoms;
    }

    public static function showPnp(){
        require_once 'models/pnp.php';
        $pnp = new Pnp();
        $pnps = $pnp->getAll();
        return $pnps;
    }

    Public static function showOperador(){
        require_once 'models/operador.php';
        $operador = new Operador();
        $operadores = $operador->getAll();
        return $operadores;
    }
}

?>


