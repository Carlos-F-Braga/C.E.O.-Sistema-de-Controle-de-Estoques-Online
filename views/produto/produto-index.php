<?php
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');

    verificarUsuarioLogado();

    // Estabelece conexão com banco de dados e lista os produtos.
    require_once('../../src/conexao.php');
    require_once('../../src/produto/produto-index.php');

    $parametros = [
        'nome'         => $_POST['nome'] ?? '',
        'preco'        => $_POST['preco'] ?? '',
        'qtde_estoque' => $_POST['qtde_estoque'] ?? ''
    ];
    $produtos = listarProdutos($parametros, $conn);
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

            <h3 class="text-center mt-4">Produtos</h3>

            <div class="row mt-4">
                <div class="col-md-4">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Ex.: Notebook Dell" aria-label="Nome do produto">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Preço</label>
                    <input type="text" class="form-control" name="name="nome"" placeholder="Ex.: 200,00" aria-label="Valor">
                </div>
                <div class="col-md-2">
                    <label class="form-label">QTD. Estoque</label>
                    <input type="text" class="form-control" name="qtde_estoque" placeholder="Ex.: 10" aria-label="Quantidade do Estoque">
                </div>
                <div class="col" style="margin-top: 32px">
                    <button type="button" class="btn btn-primary btn-block">Listar</button>
                </div>
            </div>

            <div class="row">
                <div class="offset-md-8 col-md-4 mt-4">
                    <button type="button" id="btnAdicionar" class="btn btn-primary btn-block">Adicionar</button>
                </div>
            </div>

            <table class="table table-striped table-hover mt-4">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Empresa</th>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque Atual</th>
                    <th scope="col">Estoque Mínimo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($produtos as $produto) {
                        ?>
                        <tr class="text-center">
                          <td scope="row"><?= $produto['empresa'] ?></td>
                          <td><?= $produto['nome'] ?></td>
                          <td><?= $produto['preco'] ?></td>
                          <td><?= $produto['est_inicial'] ?></td>
                          <td><?= $produto['est_minimo'] ?></td>
                          <td>
                            <a role="button" href="<?= './produto-editar.php?id=' . $produto['id_produto'] ?>" class="btn btn-sm btn-success">
                                  Editar
                            </a>
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
            window.location = './produto-criar.php';
        });
    </script>

<?php
    require_once('../layouts/footer.php');
?>
