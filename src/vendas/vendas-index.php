<?php
    /**
     * @param PDO $conn
     */
    function listarMovimentacoes($parametros = [], $conn) {
        try {
            $usuarioLogado = getUsuarioLogado();
    
            $sql = 'SELECT l.*,
                           DATE_FORMAT(l.data, "%d/%m/%Y %H:%i:%s") data_lancamento, 
                           pr.nome
                      FROM lancamento l
                      JOIN produto pr
                        ON pr.id_produto = l.id_produto
                      JOIN empresa em
                        ON em.id_empresa = pr.id_empresa
                     WHERE em.id_cliente = :id_cliente';
            
            if (!empty($parametros['nome'])) {
                $sql .= " AND UPPER(pr.nome) LIKE CONCAT('%', UPPER(:nome), '%') ";
            }
    
            if (!empty($parametros['data'])) {
                $sql .= " AND l.data = :data ";
            }

            if (!empty($parametros['tipo'])) {
                $sql .= " AND l.tipo = :tipo ";
            }
            
            $sql .= " ORDER BY l.data DESC ";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':id_cliente', $usuarioLogado['id_cliente'], PDO::PARAM_INT);
    
            if (!empty($parametros['nome'])) {
                $stmt->bindParam(':nome', $parametros['nome'], PDO::PARAM_STR);
            }
    
            if (!empty($parametros['data'])) {
                $stmt->bindParam(':data', $parametros['data'], PDO::PARAM_STR);
            }

            if (!empty($parametros['tipo'])) {
                $stmt->bindParam(':tipo', $parametros['tipo'], PDO::PARAM_STR);
            }
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            
        }
    }
