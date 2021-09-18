<?php
    session_start();

    function getUsuarioLogado() {
        if (!empty($_SESSION['usuario'] ?? '')) {
            return json_decode($_SESSION['usuario'], true);
        }
        return null;
    }

    function verificarUsuarioLogado() {
        $usuarioLogado = $_SESSION['usuario'] ?? '';
        if (!empty($usuarioLogado)) {
            $usuarioLogado = json_decode($usuarioLogado);
        }
        else {
            header('Location: ../../views/login/login.php');
        }

        return $usuarioLogado;
    }
