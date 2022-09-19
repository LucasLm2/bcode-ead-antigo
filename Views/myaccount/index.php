<section class="my-account">
	<div class="container mt-4 mb-4">
		<div class="title-section title-radius mt-4 mb-4 d-flex align-items-center justify-content-center">
			<h2>Meus dados</h2>
		</div>
		<form method="post" class="border p-4 rounded box-shadow" enctype="multipart/form-data">
			<?php if (isset($data['message']) && $data['message'] != null) { ?>
				<?php if($data['message'][0] == true){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Obrigado!</strong> <?php echo $data['message'][1]; ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } else { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Desculpe!</strong> <?php echo $data['message'][1]; ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
			<?php } ?>
			<input type="hidden" name="id" value="">
			<input type="hidden" id="last-image" name="last-image" value="<?php echo isset($data['post']['last-image']) ? $data['post']['last-image'] : (isset($data['student']['image']) ? $data['student']['image'] : '') ; ?>">
			<div class="form-row">
				<div class="col-lg-8 mb-3">
					<label for="input-name"><i class="fas fa-user"></i> Nome</label>
					<input type="text" name="name" class="form-control" id="input-name" placeholder="Nome" value="<?php echo $data['student']['name']; ?>">
				</div>
				<div class="col-lg-4 mb-3">
					<label for="input-cpf"><i class="fas fa-id-card"></i> CPF</label>
					<input type="text" name="cpf" class="form-control" id="input-cpf" aria-describedby="cpfHelp" placeholder="Ex.: 00.000.000-00" value="<?php echo $data['student']['cpf']; ?>">
					<small id="cpfHelp" class="form-text text-muted">*Nunca vamos compartilhar seu CPF, com ninguém.</small>
				</div>
			</div>
			<div class="form-row">
				<div class="col-lg-4 mb-3">
					<label for="input-email"><i class="fas fa-envelope"></i> E-Mail</label>
					<input type="email" class="form-control" id="input-email" aria-describedby="emailHelp" value="<?php echo $data['student']['email']; ?>" disabled>
					<small id="cpfHelp" class="form-text text-muted">*Nunca vamos compartilhar seu e-mail, com ninguém.</small>
				</div>
				<div class="col-lg-4 mb-3">
					<label for="input-date-birth"><i class="fas fa-calendar-alt"></i> Data de Nascimento</label>
					<input type="date" name="birth_date" class="form-control" id="date-birth" value="<?php echo $data['student']['birth_date']; ?>">
				</div>
				<div class="custom-file col-lg-4 mb-5">
					<label for="inputImage"><i class="fas fa-camera-retro"></i> Foto</label>
					<div class="custom-file">
						<input 
							type="file"
							class="custom-file-input"
							id="inputImage"
							name="image"
							accept="image/*"
						>
						<label class="custom-file-label" for="inputImage">Selecione uma imagem...</label>
						<div class="invalid-feedback">
							Por favor, digite uma senha.
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-lg-6 mb-3">
					<label for="password-email"><i class="fas fa-lock"></i> Nova Senha</label>
					<input type="password" name="password" id="password" class="form-control" aria-describedby="password-email">
					<small id="cpfHelp" class="form-text text-muted">*A senha deve ter no minimo 8 digitos.</small>
				</div>
				<div class="col-lg-6 mb-3">
					<i></i>
					<label for="confirm-password-email"><i class="fas fa-lock"></i> Confirme Senha</label>
					<input type="password" name="confirm-password" id="confirm-password" class="form-control" aria-describedby="confirm-password-email">
				</div>
			</div>
			<button type="submit" name="update" class="btn btn-primary">Confirmar</button>
		</form>
	</div>
</section>