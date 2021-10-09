<?php
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');

    verificarUsuarioLogado();

    // Estabelece conexão com banco de dados e lista as empresas do usuário logado.
    require_once('../../src/conexao.php');
    require_once('../../src/empresa/empresa-index.php');

    $parametros = [
        'nome' => $_POST['nome'] ?? '',
        'cnpj' => $_POST['cnpj'] ?? ''
    ];
    
    $empresas = listarEmpresas($parametros, $conn);
    $empresas = $empresas ?? []; 
?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../home/home.php">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./empresa-index.php">
                        Empresas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../produto/produto-index.php">
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../venda/venda-index.php">
                        Movimentações
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">

            <h3 class="text-center mt-4">Empresas</h3>

            <form action="" method="POST">
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label class="form-label">Nome da Empresa</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome da Empresa" aria-label="Nome da Empresa" value="<?= $parametros['nome'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" aria-label="CNPJ" value="<?= $parametros['cnpj'] ?>">
                    </div>
                    <div class="col" style="margin-top: 32px">
                        <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="offset-md-8 col-md-4 mt-4">
                    <button type="button" id="btnAdicionar" class="btn btn-primary btn-block">Adicionar</button>
                </div>
            </div>

            <table class="table table-striped table-hover mt-4">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Nome da Empresa</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Endereço</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($empresas as $empresa) {
                        ?>
                            <tr class="text-center">
                            <td scope="row"><?= $empresa['nome'] ?></td>
                            <td><?= preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $empresa['cnpj']) ?></td>
                            <td><?= $empresa['responsavel'] ?></td>
                            <td><?= $empresa['rua'] . ", " . $empresa['bairro'] . " Nº " . $empresa['numero'] ?></td>
                            <td>
                                <a role="button" href="<?= './empresa-editar.php?id=' . $empresa['id_empresa'] ?>" class="btn btn-sm btn-success">
                                    Editar
                                </a>
                                <?php
                                    switch ((int) $empresa['ativo']) {
                                        case 1:
                                            ?>
                                                <a role="button" href="<?= '../../src/empresa/empresa-desativar.php?id=' . $empresa['id_empresa'] ?>" class="btn btn-sm btn-danger">
                                                    Desativar
                                                </a>
                                            <?php
                                            break;
                                        case 0:
                                            ?>
                                                <a role="button" href="<?= '../../src/empresa/empresa-ativar.php?id=' . $empresa['id_empresa'] ?>" class="btn btn-sm btn-primary">
                                                    Reativar
                                                </a>
                                            <?php
                                            break;
                                    }
                                ?>
                            </td>
                            </tr>
                        <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.body.onload = function () {

            document.getElementById('btnAdicionar').addEventListener('click', () => {
                window.location = './empresa-criar.php';
            });

            $('#cnpj').mask('00.000.000/0000-00');
        };
    </script>

<?php
    require_once('../layouts/footer.php');
?>
