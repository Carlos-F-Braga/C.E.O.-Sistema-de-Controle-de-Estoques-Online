<?php
    require_once "header.php";
    if(isset($_SESSION['nomeusuario']) && !empty($_SESSION['nomeusuario'])){
        echo $_SESSION['nomeusuario'] . "<br>";
?>
        
<?php    
    } else {
?>
    <h2>Você não tem permissão para acessar esta página, faça login.</h2>
<?php
    }
    
require_once "footer.php";
?>


<?php
/* ---------------------- Todo o código acima apenas em PHP -------------------
    require_once "header.php";
    session_start();
    if(isset($_SESSION['nomeusuario']) || !empty($_SESSION['nomeusuario'])){
        echo $_SESSION['nomeusuario'] . "<br>";
        echo "<a href=''>Usuários</a><br>
        <a href=''>Verbas</a><br>
        <a href=''>Itens - Patrimônio</a><br>";
    } else {
        echo "<h2>Você não tem permissão para acessar esta página, faça login.</h2>";
    }
    require_once "footer.php";
*/
?>

