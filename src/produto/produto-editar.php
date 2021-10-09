<?php
    require_once('../conexao.php');
    require_once('../helpers/usuario-logado.php');
    require_once('../helpers/validador-formulario.php');
    
    $fields = [ 'nome', 'preco', 'est_minimo', 'est_inicial', 'id_produto' ];

    $dados = $_POST;
    try {

        // Valida os dados do uusário
        validarFormulario($dados, $fields);
        
        // Insere o registro no banco de dados
        $stmt = $conn->prepare('UPDATE produto pr 
                                   SET pr.nome        = :nome,
                                       pr.preco       = :preco,
                                       pr.est_minimo  = :est_minimo,
                                       pr.est_inicial = :est_inicial
                                 WHERE pr.id_produto = :id_produto');
        
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $stmt->bindParam(':est_minimo', $dados['est_minimo'], PDO::PARAM_STR);
        $stmt->bindParam(':est_inicial', $dados['est_inicial'], PDO::PARAM_STR);
        $stmt->bindParam(':id_produto', $dados['id_produto'], PDO::PARAM_STR);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Edição realizada com sucesso.</div>";

        header("Location: ../../views/produto/produto-index.php");

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível realizar a edição. Verifique seus dados e tente novamente.</div>";
    }
