<?php

session_start();
unset($_SESSION['id_corretor'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: ../index.php");