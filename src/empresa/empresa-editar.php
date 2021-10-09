<?php
    require_once('../conexao.php');
    require_once('../helpers/validador-formulario.php');
    
    $fields = [ 'id_empresa', 'nome', 'cnpj', 'responsavel', 'rua', 'bairro', 'numero' ];

    $dados = $_POST;

    try {

        // Valida os dados do uusário
        validarFormulario($dados, $fields);

        // Insere o registro no banco de dados
        $stmt = $conn->prepare('UPDATE empresa em
                                   SET em.nome        = :nome,
                                       em.cnpj        = :cnpj,
                                       em.responsavel = :responsavel,
                                       em.rua         = :rua,
                                       em.bairro      = :bairro,
                                       em.numero      = :numero
                                 WHERE em.id_empresa  = :id_empresa');

        $dados['cnpj'] = preg_replace('/\D/', '', $dados['cnpj']);

        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':cnpj', $dados['cnpj'], PDO::PARAM_STR);
        $stmt->bindParam(':responsavel', $dados['responsavel'], PDO::PARAM_STR);
        $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
        $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':id_empresa', $dados['id_empresa'], PDO::PARAM_STR);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Edição realizada com sucesso.</div>";

        header("Location: ../../views/empresa/empresa-index.php");

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível realizar a edição. Verifique seus dados e tente novamente.</div>";
    }
