<?php
    require_once('../../src/conexao.php');
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');
    require_once('../../src/empresa/empresa-index.php');

    verificarUsuarioLogado();

    $empresas = listarEmpresas([], $conn);
    $empresas = $empresas ?? [];
?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../home/home.html">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../empresa/empresa-index.php">
                        Empresas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./produto-index.php">
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

            <h3 class="text-center mt-4">Cadastro de Produto</h3>

            <form action="../../src/produto/produto-criar.php" method="POST">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="form-label">Nome do produto</label>
                        <input type="text" class="form-control" name="nome" required placeholder="Ex.: Notebook Dell" aria-label="Nome do produto">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Preço</label>
                        <input type="number" class="form-control" name="preco" required placeholder="Ex.: 4.000,00" aria-label="Preço">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">QTD. Estoque Atual</label>
                        <input type="number" min="0" value="1" name="est_inicial" required class="form-control" placeholder="Ex.: 10" aria-label="QTD. Estoque Atual">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">QTD. Estoque Mínimo</label>
                        <input type="number" min="0" class="form-control" name="est_minimo" required placeholder="Ex.: 5" aria-label="QTD. Estoque Mínimo">
                    </div>
                </div>

                <br/>

                <div class="row">
                    <div class="col-lg-8" style="margin-top: -7px">
                        <label for="empresa">Empresa</label>
                        <select class="custom-select" name="id_empresa" id="empresa" required>
                            <option selected disabled value="">Selecione...</option>
                            <?php
                                foreach ($empresas as $empresa) {
                                    ?>
                                    <option value="<?= $empresa['id_empresa'] ?>">
                                        <?= $empresa['nome'] ?>
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
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
            window.location = './produto-index.php';
        });
    </script>
<?php
    require_once('../layouts/footer.php');
?>