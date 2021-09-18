<?php
    require_once('../conexao.php');
    require_once('../helpers/validador-formulario.php');

    $fields = [ 'nome', 'cpf', 'telefone', 'email', 'senha', 'assinatura' ];

    $dados = $_POST;

    try {
        // Valida os dados do formulário
        validarFormulario($dados, $fields);
    
        // Insere o registro no banco de dados
        $stmt = $conn->prepare('INSERT INTO cliente (
                                                    nome,
                                                    cpf,
                                                    telefone,
                                                    email,
                                                    senha,
                                                    id_assinatura
                                                    )
                                            VALUES (
                                                    :nome,
                                                    :cpf,
                                                    :telefone,
                                                    :email,
                                                    :senha,
                                                    :id_assinatura
                                                    )');
        
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':id_assinatura', $dados['assinatura'], PDO::PARAM_STR);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Cadastro realizado com sucesso.</div>";

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
?>
