<?php
    require_once('../conexao.php');
    require_once('../helpers/validador-formulario.php');
    require_once('../helpers/usuario-logado.php');
    
    $fields = [ 'nome', 'cnpj', 'responsavel', 'rua', 'bairro', 'numero' ];

    $dados = $_POST;

    try {

        // Valida os dados do uusário
        validarFormulario($dados, $fields);

        $usuarioLogado = getUsuarioLogado();
        
        // Insere o registro no banco de dados
        $stmt = $conn->prepare('INSERT INTO empresa (
                                                    nome,
                                                    cnpj,
                                                    responsavel,
                                                    rua,
                                                    bairro,
                                                    numero,
                                                    id_cliente
                                                    )
                                            VALUES (
                                                    :nome,
                                                    :cnpj,
                                                    :responsavel,
                                                    :rua,
                                                    :bairro,
                                                    :numero,
                                                    :id_cliente
                                                    )');

        $dados['cnpj'] = preg_replace('/\D/', '', $dados['cnpj']);

        $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':cnpj', $dados['cnpj'], PDO::PARAM_STR);
        $stmt->bindParam(':responsavel', $dados['responsavel'], PDO::PARAM_STR);
        $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
        $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $usuarioLogado['id_cliente'], PDO::PARAM_INT);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Cadastro realizado com sucesso.</div>";

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
