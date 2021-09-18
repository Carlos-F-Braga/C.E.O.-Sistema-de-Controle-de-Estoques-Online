<?php
    /**
     * @param PDO $conn
     */
    function listarEmpresas($parametros = [], $conn) {
        try {
            
            $usuarioLogado = getUsuarioLogado();
    
            $sql = 'SELECT em.*
                      FROM empresa em
                     WHERE em.id_cliente = :id_cliente';
            
            if (!empty($parametros['nome'])) {
                $sql .= " AND UPPER(em.nome) LIKE CONCAT('%', UPPER(:nome), '%') ";
            }
    
            if (!empty($parametros['cnpj'])) {
                $parametros['cnpj'] = preg_replace('/\D/', '', $parametros['cnpj']);
                $sql .= " AND em.cnpj = :cnpj ";
            }
    
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':id_cliente', $usuarioLogado['id_cliente'], PDO::PARAM_INT);
    
            if (!empty($parametros['nome'])) {
                $stmt->bindParam(':nome', $parametros['nome'], PDO::PARAM_STR);
            }
    
            if (!empty($parametros['cnpj'])) {
                $stmt->bindParam(':cnpj', $parametros['cnpj'], PDO::PARAM_STR);
            }
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            
        }
    }
