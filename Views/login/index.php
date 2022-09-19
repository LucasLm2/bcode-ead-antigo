
<div class="d-flex justify-content-center align-items-center flex-column vh-100">
	<form method="post" class="box-login mb-4">
		<div class="login">
			<h1 class="mb-4 text-center font-iceberg">Login</h1>
			<?php if (isset($data['message'])) { ?>
				<?php if($data['message'][0] == true){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong><?php echo $data['message'][1]; ?></strong> <?php echo $data['message'][2]; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="form-group">
				<label class="sr-only">E-mail</label>
				<input name="email" type="email" class="form-control" placeholder="E-mail" required autofocus>
			</div>
			<div class="form-group">
				<label class="sr-only">Senha</label>
				<input name="password" type="password" class="form-control" placeholder="Senha" required>
			</div>
			<div class="form-group">
				<div class="form-check text-right">
					<input name="remember" type="checkbox" class="form-check-input">
					<label class="form-check-label">Lembrar-me</label>
				</div>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name='login'>Entrar</button>
		</div>
	</form>

	<div class="box-logo">
		<div class="d-flex justify-content-center align-items-center">
			<a class="logo text-white logo-border text-center" href="https://www.bcode.com.br">
				<span class="logo-princ font-iceberg">BCode</span>
				<span class="logo-sub font-iceberg">&lt;Soluções&gt;</span>
			</a>
			<a class="logo-secondary text-white text-center" href="https://cursos.bcode.com.br">
				<span class="logo-princ font-iceberg">EAD</span>
				<span class="logo-sub font-iceberg">&lt;BCode&gt;</span>
			</a>
		</div>
	</div>
</div>
