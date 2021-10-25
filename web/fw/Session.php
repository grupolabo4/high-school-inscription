<?php

function checkSession() {
    session_start();
    if(!isset($_SESSION['logged'])) {
        header('location: ../controllers/loginController.php');
        exit();
    }
}

function createSession($id) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['id'] = $id;
    header("Location: ../controllers/indexController.php");
    exit();
}

function destroySession() {
    session_start();
    unset($_SESSION['logged']);
    header('Location: ../controllers/loginController.php');
}


?>