<?php
    session_start();
    unset($_SESSION['idUser']);
    session_destroy();
?>
