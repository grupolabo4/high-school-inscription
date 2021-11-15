<?php

function checkSession() {
    session_start();
    if(!isset($_SESSION['logged']) 
            or !isset($_SESSION['x-session'])
            or $_SESSION["x-session"] != "admin" ) {
        header('location: ./inicio');
        exit();
    }
}

function checkNormalSession() {
    session_start();
    if(!isset($_SESSION['logged'])) {
        header('location: ./login');
        exit();
    }
}

function createSession($id, $rol) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['x-session'] = $rol;
    header("Location: ./inicio");
    exit();
}

function destroySession() {
    session_start();
    unset($_SESSION['logged']);
    unset($_SESSION['x-session']);
    header('Location: ./login');
}


?>