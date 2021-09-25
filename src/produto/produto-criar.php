<?php
    require_once('../conexao.php');
    require_once('../helpers/validador-formulario.php');
    require_once('../helpers/usuario-logado.php');
    
    $fields = [ 'nome', 'preco', 'est_minimo', 'est_inicial', 'id_empresa' ];

    $dados = $_POST;
    try {

        // Valida os dados do uusário
        validarFormulario($dados, $fields);

        $usuarioLogado = getUsuarioLogado();
        
        // Insere o registro no banco de dados
        $stmt = $conn->prepare('INSERT INTO produto (
                                                    nome,
                                                    preco,
                                                    est_minimo,
                                                    est_inicial,
                                                    id_empresa
                                                    )
                                            VALUES  (
                                                    :nome,
                                                    :preco,
                                                    :est_minimo,
                                                    :est_inicial,
                                                    :id_empresa
                                                    )');
        
        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $stmt->bindParam(':est_minimo', $dados['est_minimo'], PDO::PARAM_STR);
        $stmt->bindParam(':est_inicial', $dados['est_inicial'], PDO::PARAM_STR);
        $stmt->bindParam(':id_empresa', $dados['id_empresa'], PDO::PARAM_STR);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Cadastro realizado com sucesso.</div>";

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
