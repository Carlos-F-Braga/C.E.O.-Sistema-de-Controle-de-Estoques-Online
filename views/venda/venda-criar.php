<?php
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');
    require_once('../../src/conexao.php');
    require_once('../../src/produto/produto-index.php');

    verificarUsuarioLogado();

    $produtos = listarProdutos([], $conn);
    $produtos = $produtos ?? [];
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
                    <a class="nav-link" href="../produto/produto-index.php">
                        produtos
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

            <h3 class="text-center mt-4">Cadastro de Movimentação</h3>

            <form action="../../src/vendas/vendas-criar.php" method="POST">
                <div class="row mt-4">
                    <div class="col-lg-5">
                        <label for="produto">Produtos</label>
                        <select class="custom-select" name="id_produto" id="produto" required>
                            <option selected disabled value="">Selecione...</option>
                            <?php
                                foreach ($produtos as $produto) {
                                    ?>
                                    <option value="<?= $produto['id_produto'] ?>">
                                        <?= $produto['id_produto'] . ' - ' . $produto['nome'] ?>
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Data</label>
                        <input type="datetime-local" class="form-control" required name="data" placeholder="Data" aria-label="Data">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Quantidade</label>
                        <input type="number" min="1" class="form-control" required name="quantidade" placeholder="Ex.: 3" aria-label="Quantidade">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tipo</label>
                        <select class="custom-select" required name="tipo" aria-label="Tipo da movimentação">
                            <option selected></option>
                            <option value="ENTRADA">Entrada</option>
                            <option value="SAIDA">Saída</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-md-8 col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="button" id="btnVoltar" class="btn btn-secondary btn-block">Voltar</button>
                    </div>
                </div>
            </form>

        </div>

    </main>

    <script>
        document.getElementById('btnVoltar').addEventListener('click', () => {
            window.location = './venda-index.php';
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>