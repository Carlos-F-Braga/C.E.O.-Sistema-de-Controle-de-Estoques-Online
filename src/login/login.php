<?php
require_once('../conexao.php');
session_start();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

try {
    $stmt = $conn->prepare('SELECT c.* 
                              FROM cliente c
                             WHERE c.email = :email
                               AND c.senha = :senha LIMIT 1');
    
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        $_SESSION['usuario'] = json_encode($result[0]);
        header('Location: ../../views/home/home.php');
    }
    else {
        throw new \Exception("");
    }
} catch (\Exception $th) {
    echo "<div class='text-center' style='color: red'>Login inválido. Favor tente novamente</div>";
}
