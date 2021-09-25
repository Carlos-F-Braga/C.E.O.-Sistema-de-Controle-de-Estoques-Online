<?php
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');

    verificarUsuarioLogado();

    // Estabelece conexão com banco de dados e lista os lançamentos.
    require_once('../../src/conexao.php');
    require_once('../../src/vendas/vendas-index.php');

    $parametros = [
        'nome'         => $_POST['nome'] ?? '',
        'data'         => $_POST['data'] ?? '',
        'tipo'         => $_POST['tipo'] ?? ''
    ];

    $lancamentos = listarMovimentacoes($parametros, $conn);
    $lancamentos = $lancamentos ?? [];
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
                    <a class="nav-link" href="../empresa/empresa-index.php">
                        Empresas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../produto/produto-index.php">
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./venda-index.php">
                        Movimentações
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">

            <h3 class="text-center mt-4">Movimentações</h3>

            <form action="" method="POST">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome do Produto" aria-label="Nome do Produto" value="<?= $parametros['nome'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Data</label>
                        <input type="date" class="form-control" name="data" aria-label="Data da movimentação" value="<?= $parametros['data'] ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tipo</label>
                        <select class="custom-select" name="tipo" aria-label="Tipo da movimentação" value="<?= $parametros['tipo'] ?>">
                            <option selected></option>
                            <option value="ENTRADA">Entrada</option>
                            <option value="SAIDA">Saída</option>
                        </select>
                    </div>
                    <div class="col" style="margin-top: 32px">
                        <button type="submit" class="btn btn-primary btn-block">Listar</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="offset-md-8 col-md-2 mt-4">
                    <button type="button" id="btnAdicionar" class="btn btn-primary btn-block">Adicionar</button>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-primary btn-block">Emitir Relatório</button>
                </div>
            </div>

            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nome do Protudo</th>
                        <th scope="col">QTDE. Movimentada</th>
                        <th scope="col">QTDE. Estoque</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Data</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($lancamentos as $lancamento) {
                            ?>
                            <tr class="text-center">
                                <td scope="row"><?= $lancamento['nome'] ?></td>
                                <td><?= $lancamento['quantidade'] ?></td>
                                <td><?= $lancamento['qtde_estoque'] ?></td>
                                <td><?= $lancamento['tipo'] ?></td>
                                <td><?= $lancamento['data_lancamento'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger">Cancelar</button>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

    <script>
        document.getElementById('btnAdicionar').addEventListener('click', () => {
            window.location = './venda-criar.php';
        });
    </script>
<?php
    require_once('../layouts/footer.php');
?>
