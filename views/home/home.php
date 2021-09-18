<?php
    require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');

    $usuarioLogado = verificarUsuarioLogado();

?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../empresa/empresa-index.php">
                        Empresas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../produto/produto-index.html">
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../venda/venda-index.html">
                        Movimentações
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page">Fatec Eletrônicos LTDA</a>
                </li>
                <li class="nav-item">
                    <span class="material-icons" id="btnSair">
                        logout
                    </span>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <!-- PRODUTOS -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-primary mb-2 mt-2">
                    <div class="card-header">
                        <span style="float: right">Produtos registrados: 1</span>
                    </div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">
                            Produtos
                        </h5>
                        <p>
                            Registrados recentemente:
                        </p>
                        <table class="table table-striped table-hover mt-4" style="font-size: 12px">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nome do produto</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Estoque Atual</th>
                                    <th scope="col">Estoque Mínimo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td scope="row">Notebook Dell</td>
                                    <td>R$ 4.000,00</td>
                                    <td>544</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <button type="button" id="btnProdutos" class="btn btn-primary btn-sm">
                            Visualizar todos os produtos
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- VENDAS (MOVIMENTAÇÕES) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-success mb-2 mt-2">
                    <div class="card-header">
                        <span style="float: right">Movimentações registradas: 1</span>
                    </div>
                    <div class="card-body text-success">
                        <h5 class="card-title">
                            Movimentações
                        </h5>
                        <p>
                            Registradas recentemente:
                        </p>
                        
                        <table class="table table-striped table-hover mt-4" style="font-size: 12px">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nome do Protudo</th>
                                    <th scope="col">QTDE. Movimentada</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">QTDE. Estoque</th>
                                    <th scope="col">Data da Movimentação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td scope="row">Notebook Dell</td>
                                    <td>3</td>
                                    <td>Saída</td>
                                    <td>17</td>
                                    <td>11/06/2021</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <button type="button" id="btnVendas" class="btn btn-success btn-sm">
                            Visualizar todas as movimentações
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- EMPRESAS -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-warning mb-2 mt-2">
                    <div class="card-header">
                        <span style="float: right">Empresas registradas: 1</span>
                    </div>
                    <div class="card-body text-warning">
                        <h5 class="card-title">
                            Empresas
                        </h5>
                        <p>
                            Suas empresas:
                        </p>
                        <table class="table table-striped table-hover mt-4" style="font-size: 12px">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Responsável</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td scope="row">Fatec Eletrônicos LTDA</td>
                                    <td>R. Fernandópolis, 2510 - Eldorado, São José do Rio Preto - SP, 15043-020</td>
                                    <td>C.E.O</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-transparent border-warning"></div>
                </div>
            </div>
        </div>

        <br>
        <br>

    </div>

    <script>
        document.body.onload = () => {
            document.getElementById('btnProdutos').addEventListener('click', () => {
                window.location = '../produto/produto-index.html';
            });

            document.getElementById('btnVendas').addEventListener('click', () => {
                window.location = '../venda/venda-index.html';
            });

            document.getElementById('btnSair').addEventListener('click', () => {
                window.location.href = '../login/login.html';
            });
        };
    </script>
</body>

</html>