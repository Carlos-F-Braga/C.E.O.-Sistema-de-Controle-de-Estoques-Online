<?php
	require_once('../layouts/header.php');
?>
	<div class="container">

		<div class="row">
			<div class="col-sm-9 col-md-12 col-lg-12 mx-auto">
				<div class="card card-signin my-4">
					<div class="card-body">
						<h5 class="card-title text-center"><b>Cadastrar-se</b></h5>
						<form action="../../src/usuario/usuario-cadastrar.php" method="POST" class="form-signin">

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nome">Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
								</div>
								<div class="form-group col-md-3">
									<label for="cpf">CPF</label>
									<input type="text" maxlength="14" name="cpf" class="form-control" id="cpf" placeholder="CPF">
								</div>
								<div class="form-group col-md-3">
									<label for="telefone">Telefone</label>
									<input type="text" maxlength="14" name="telefone" class="form-control" id="telefone"
										placeholder="Telefone">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" name="email" placeholder="Ex.: exemplo@gmail.com">
								</div>
								<div class="form-group col-md-6">
									<label for="senha">Senha</label>
									<input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
								</div>
							</div>

							<h5 class="card-title mb-3 mt-2"><b>Assinatura</b></h5>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nivel">Selecione uma assinatura</label>
									<select class="custom-select" name="assinatura" id="assinaturaNivel">
										<option selected></option>
										<option value="1">Básica</option>
										<option value="2">Profissional</option>
										<option value="3">V.I.P</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="mensalidade">Mensalidade (R$)</label>
									<input type="text" class="form-control" id="mensalidade" readonly>
								</div>
							</div>

							<hr class="mt-2 my-2">

							<button
								id="btnCadastrar"
								class="btn p-2 btn-primary btn-block text-uppercase fab"
								type="submit">
								Cadastrar-se
							</button>

							<br/>

							<button id="btnVoltar" class="btn p-2 btn-secondary btn-block text-uppercase fab"
								type="button">
								Voltar
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

	<script>
		document.body.onload = () => {
			let inputMensalidade = document.getElementById('mensalidade');

			let opcoesMensalidade = {
				'1': 30.99,
				'2': 45.99,
				'3': 60.99
			};

			document.getElementById('btnCadastrar').addEventListener('click', () => {
				/* Capturar as informações digitadas e gravar no banco de dados */

			});

			document.getElementById('assinaturaNivel').addEventListener('change', function ($e) {
				let mensalidade = opcoesMensalidade[$e.target.value];
				inputMensalidade.value = mensalidade ? `R$ ${mensalidade}` : '';
			});

			document.getElementById('btnVoltar').addEventListener('click', () => {
				window.location = '../index.php';
			});
			
			$('#cpf').mask('000.000.000-00');
			$('#telefone').mask('(00) 000000000');
		};
	</script>

<?php
	require_once('../layouts/footer.php');
?>