<?php
    require_once('./layouts/header.php');
    session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-escura">
    <div class="container">
        <a class="navbar-brand" href="#">C.E.O</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#servicos" class="nav-link">Serviços</a></li>
                <li class="nav-item"><a href="#contatos" class="nav-link">Contatos</a></li>
                <li class="nav-item"><a href="./usuario/usuario-cadastrar.php" class="nav-link">Cadastrar-se</a></li>
                <li class="nav-item"><a href="./login/login.php" class="nav-link">Entrar</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="sessao-principal">
    <div class="container">
        <div class="row sessao-altura align-items-center text-center">
            <div class="col-sm">
                <div class="sessao-texto">
                    <h1 class="sessao-cabecalho-texto text-white mb-4">
                        Faça o controle do seu estoque já!
                    </h1>
                    <div class="sessao-subcabecalho-texto mb-5">
                        <p class="h4 font-weight-normal">
                            Começe a utilizar o C.E.O e proporcione mais rapidez e controle ao seu negócio.
                    </div>
                    <p>
                        <a href="./login/login.php" class="btn btn-primary mr-2 mb-2">
                            Iniciar
                        </a>
                        <a href="#servicos" class="btn btn-servicos mb-2">
                            Conhecer Serviços
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sessao-principal-conteudo" id="servicos">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="media mr-3 mb-3">
                    <div class="media-body">
                        <h5 class="mt-0">Emissão de Relatório!</h5>
                        <p>
                            Emita relatórios referente às movimentações, produtos e vendas do seu negócio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media ml-3 mr-3 mb-3">
                    <div class="media-body">
                        <h5 class="mt-0">Melhore sua gestão!</h5>
                        <p>
                            Com C.E.O você pode gerenciar de forma eficiente e detalhada seu estoque.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media mb-md-0 mb-3">
                    <div class="media-body">
                        <h5 class="mt-0">Layout intuitivo!</h5>
                        <p>
                            A clareza na exibição das informações é algo que consideramos muito.
                            Com isso, você não terá dificuldade em manusear o software e agilizará seu négocio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="rodape" id="contatos">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="sessao-cabecalho-texto">
                    <a href="#">C.E.O</a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md text-left">
                <ul class="list-unstyled rodape-lista-ul">
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Contatos</a></li>
                    <li><a href="#">Sobre nós</a></li>
                </ul>
            </div>
            <div class="col-md text-md-right text-left text-light">
                <p>
                    <small>&copy; Desenvolvido em 2021</small>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
    require_once('./layouts/footer.php');
?>