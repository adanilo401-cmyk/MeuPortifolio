<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /MeuPortifolio/login.php');
    exit;
}
