<?php

function checkSession() {
    session_start();
    if(!isset($_SESSION['logged'])) {
        header('location: ../login.php');
        exit();
    }
}

function destroySession() {
    session_start();
    unset($_SESSION['logged']);
    header('Location: ../login.php');
}


?>