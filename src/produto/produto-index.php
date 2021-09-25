<?php
    /**
     * @param PDO $conn
     */
    function listarProdutos($parametros = [], $conn) {
        try {
            
            $usuarioLogado = getUsuarioLogado();
    
            $sql = 'SELECT pr.*
                      FROM produto pr
                      JOIN empresa em
                        ON em.id_empresa = pr.id_empresa
                     WHERE em.id_cliente = :id_cliente';
            
            if (!empty($parametros['nome'])) {
                $sql .= " AND UPPER(pr.nome) LIKE CONCAT('%', UPPER(:nome), '%') ";
            }
    
            if (!empty($parametros['preco'])) {
                $sql .= " AND pr.preco = :preco ";
            }

            if (!empty($parametros['qtde_estoque'])) {
                $sql .= " AND (pr.est_inicial = :qtde_estoque OR pr.est_minimo = :qtde_estoque) ";
            }
    
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':id_cliente', $usuarioLogado['id_cliente'], PDO::PARAM_INT);
    
            if (!empty($parametros['nome'])) {
                $stmt->bindParam(':nome', $parametros['nome'], PDO::PARAM_STR);
            }
    
            if (!empty($parametros['preco'])) {
                $stmt->bindParam(':preco', $parametros['preco'], PDO::PARAM_STR);
            }

            if (!empty($parametros['qtde_estoque'])) {
                $stmt->bindParam(':qtde_estoque', $parametros['qtde_estoque'], PDO::PARAM_STR);
            }
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            
        }
    }
