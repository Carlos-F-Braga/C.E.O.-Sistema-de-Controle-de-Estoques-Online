<?php
    require_once('../conexao.php');
    require_once('../helpers/validador-formulario.php');
    require_once('../helpers/usuario-logado.php');

    /**
     * @param PDO $conn
     */
    function calcularEstoqueProduto($conn, $idProduto, $dados) {
        $stmt = $conn->prepare('SELECT pr.*
                  FROM produto pr
                 WHERE pr.id_produto = :id_produto');

        $stmt->bindParam(':id_produto', $idProduto, PDO::PARAM_INT);

        $stmt->execute();

        $resultado = $stmt->fetch();
        
        $estoqueAtual = (int) $resultado['est_inicial'];
        $estoqueMinimo = (int) $resultado['est_minimo'];
        $qtdeMovimentada = (int) $dados['quantidade'];

        if ($dados['tipo'] === 'SAIDA') {

            // Se a quantidade movimentada for maior que o estoque atual do produto
            if ($qtdeMovimentada > $estoqueAtual) {
                echo "<div class='text-center' style='color: red'>O Produto não possui estoque suficiente para realizar o lançamento.</div>";
                exit;
            }

            $estoqueAtual -= $qtdeMovimentada;

            // Mostra um aviso para o usuário se o estoque atual estiver abaixo do estoque minímo
            if ($estoqueAtual < $estoqueMinimo) {
                echo "<div class='text-center' style='color: red'>
                AVISO: O estoque atual do produto se encontra abaixo do estoque mínimo.
                </div><br/><br/>";
            }  
        }
        else {
            $estoqueAtual += $qtdeMovimentada;
        }


        return $estoqueAtual;
    }
    
    $fields = [ 'tipo', 'data', 'quantidade', 'id_produto' ];

    $dados = $_POST;
    try {

        // Valida os dados do uusário
        validarFormulario($dados, $fields);

        $usuarioLogado = getUsuarioLogado();
        
        $conn->beginTransaction();

        // Insere o registro no banco de dados
        $stmt = $conn->prepare('INSERT INTO lancamento (
                                                        data,
                                                        quantidade,
                                                        tipo,
                                                        qtde_estoque,
                                                        id_produto
                                                        )
                                                VALUES  (
                                                        :data,
                                                        :quantidade,
                                                        :tipo,
                                                        :qtde_estoque,
                                                        :id_produto
                                                        )');

        $dados['qtde_estoque'] = calcularEstoqueProduto($conn, $dados['id_produto'], $dados);
        
        $stmt->bindParam(':data', $dados['data'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(':qtde_estoque', $dados['qtde_estoque'], PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
        $stmt->bindParam(':id_produto', $dados['id_produto'], PDO::PARAM_INT);

        $stmt->execute();

        $stmtProduto = $conn->prepare('UPDATE produto pr
                                   SET pr.est_inicial = :qtde_estoque
                                 WHERE pr.id_produto = :id_produto');

        $stmtProduto->bindParam(':qtde_estoque', $dados['qtde_estoque'], PDO::PARAM_STR);
        $stmtProduto->bindParam(':id_produto', $dados['id_produto'], PDO::PARAM_INT);

        $stmtProduto->execute();

        $conn->commit();

        echo "<div class='text-center' style='color: green'>Cadastro realizado com sucesso.</div>";

    } catch (\Exception $e) {
        $conn->rollBack();
        echo "<div class='text-center' style='color: red'>Não foi possível realizar o cadastro. Verifique seus dados e tente novamente.</div>";
    }
