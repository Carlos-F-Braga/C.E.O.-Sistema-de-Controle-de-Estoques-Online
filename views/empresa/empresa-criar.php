<?php
	require_once('../layouts/header.php');
    require_once('../../src/helpers/usuario-logado.php');

    verificarUsuarioLogado();
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

            <h3 class="text-center mt-4">Cadastro de Empresa</h3>

            <form action="../../src/empresa/empresa-criar.php" method="POST">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="form-label">Nome da Empresa</label>
                        <input type="text" class="form-control" required name="nome" placeholder="Nome da Empresa" aria-label="Nome da Empresa">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Responsável</label>
                        <input type="text" class="form-control" required name="responsavel"  placeholder="Responsável" aria-label="Responsável">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">CNPJ</label>
                        <input type="text" class="form-control" required id="cnpj" name="cnpj"  placeholder="CNPJ" aria-label="CNPJ">
                    </div>
                </div>
    
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="form-label">Rua</label>
                        <input type="text" class="form-control" required name="rua" placeholder="Ex.: Av. Romeu Strazzi" aria-label="Rua">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Bairro</label>
                        <input type="text" class="form-control" required name="bairro" placeholder="Bairro" aria-label="Bairro">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Nº</label>
                        <input type="number" min="0" class="form-control" required name="numero" placeholder="Nº" aria-label="Nº">
                    </div>
                </div>
    
                <div class="row">
                    <div class="offset-md-8 col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="button" id="btnVoltar" class="btn btn-secondary btn-block">Voltar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.body.onload = function () {
            document.getElementById('btnVoltar').addEventListener('click', () => {
                window.location = './empresa-index.php';
            });

            $('#cnpj').mask('00.000.000/0000-00');
        };
    </script>
<?php
	require_once('../layouts/header.php');
?>