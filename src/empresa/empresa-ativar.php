<?php
    require_once('../../src/conexao.php');
    require_once('../../src/empresa/empresa-index.php');
    require_once('../../src/helpers/usuario-logado.php');
    
    try {

        verificarUsuarioLogado();
        
        $idEmpresa = $_GET['id'];
        
        if (empty($idEmpresa)) {
            header("Location: ./empresa-index.php");
        }
    
        $empresa = buscarEmpresaById($idEmpresa, $conn);
        
        if (!count($empresa) > 0) {
            header("Location: ./empresa-index.php");
        }
    
        $empresa = $empresa[0];

        // Insere o registro no banco de dados
        $stmt = $conn->prepare('UPDATE empresa em
                                   SET em.ativo       = 1
                                 WHERE em.id_empresa  = :id_empresa');
        
        $stmt->bindParam(':id_empresa', $empresa['id_empresa'], PDO::PARAM_STR);

        $stmt->execute();

        echo "<div class='text-center' style='color: green'>Empresa reativada com sucesso.</div>";

        header("Location: ../../views/empresa/empresa-index.php");

    } catch (\Exception $e) {
        echo "<div class='text-center' style='color: red'>Não foi possível reativar a empresa. Verifique seus dados e tente novamente.</div>";
    }
