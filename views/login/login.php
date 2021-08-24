<?php
	require_once('../layouts/header.php');
?>
    <div class="container">
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
			<div class="card-body">
				<h5 class="card-title text-center"><b>Login</b></h5>
				<form action="../../src/login/login.php" method="POST" class="form-signin">

					<div class="form-label-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" placeholder="Email">
					</div>

					<div class="form-label-group">
						<label for="senha">Senha</label>
						<input type="password" name="senha" class="form-control" placeholder="Senha">
					</div>

					<button type="submit" id="btnEntrar" class="btn btn-lg btn-primary btn-block text-uppercase fab" type="button">
						Entrar
					</button>

					<br/>

					<button id="btnVoltar" class="btn btn-lg btn-secondary btn-block text-uppercase fab" type="button">
						Voltar
					</button>
					<hr class="mt-3 my-1">
				</form>	
			</div>
			<label class="text-center">
				Ainda não tem uma conta? <a href="../usuario/usuario-cadastrar.html">Crie uma</a>
			</label>
			</div>
		</div>
		</div>
	</div>

	<script>
		document.body.onload = () => {
			document.getElementById('btnEntrar').addEventListener('click', () => {
				/* Validar credenciais... */

				window.location = '../home/home.html';
			});

			document.getElementById('btnVoltar').addEventListener('click', () => {
				window.location = '../index.html';
			});
		};
	</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<?php
	require_once('../layouts/footer.php');
?>
