<section>
	<div class="container mt-4 mb-4">
		<!-- <div class="banner mt-4 mb-4">
			<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="d-block w-100" style="background-color: #999999;width: 100%;height: 300px;"></div>
					</div>
					<div class="carousel-item">
						<div class="d-block w-100" style="background-color: #666666;width: 100%;height: 300px;"></div>
					</div>
					<div class="carousel-item">
						<div class="d-block w-100" style="background-color: #444444;width: 100%;height: 300px;"></div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Próximo</span>
				</a>
			</div>
		</div> -->
		<div class="title-section fs-sm-25 title-radius mt-4 mb-4 d-flex align-items-center justify-content-center">
			<h2>Meus Cursos</h2>
		</div>
		<div class="mt-4 mb-4">
			<div class="row">
				<?php if(isset($data['coursesRegistered'][0][0])){ ?>
					<?php foreach ($data['coursesRegistered'][0] as $key => $value) { ?>
						<div class="col-md-6 col-xl-4 mb-3">
							<div class="card h-100">
								<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174da8ef89d%20text%20%7B%20fill%3Argb(255%2C255%2C255)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A0.875em%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174da8ef89d%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%230478be%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2220.1953125%22%20y%3D%2296.3%22%3E<?php echo $value['name'] ?>%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
								<div class="card-body">
									<!-- <h5 class="card-title"><?php echo $value['name'] ?></h5> -->
									<!-- <div class="progress mb-2">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $value['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $value['progress'] ?>%"><?php echo $value['progress'] != '' ? $value['progress'].'%' : '' ?></div>
									</div> -->
									<p class="card-text"><?php echo $value['description'] ?></p>
								</div>
								<div class="card-footer text-center">
									<a href="<?php echo INCLUDE_PATH ?>coursesingle/index/<?php echo $value['reference'] ?>/<?php echo $data['coursesRegistered'][1][$key]['reference']; ?>" class="btn btn-success">Acessar</a>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } else { ?>
					<div class="container">
						<div class="alert alert-info w-100" role="alert">
							<h4 class="alert-heading text-center">Ops! Não estou matriculado ainda em um curso!</h4>
							<hr>
							<p class="mb-0">Olá <?php echo $_SESSION[SYSTEM_ID.'name']; ?>, você ainda não esta matriculado em um dos cursos da <?php echo SYSTEM_TITLE; ?>. Não perca tempo, veja todos nossos cursos abaixo e matricule-se.</p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="title-section title-radius mt-4 mb-4 d-flex align-items-center justify-content-center">
			<h2>Outros Cursos</h2>
		</div>
		<div class="mt-4 mb-4">
			<div class="row">
				<?php if(isset($data['coursesNotRegistered'][0][0])){ ?>
					<?php foreach ($data['coursesNotRegistered'][0] as $key => $value) { ?>
						<div class="col-md-6 col-xl-4 mb-3">
							<div class="card h-100">
							<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174da8ef89d%20text%20%7B%20fill%3Argb(255%2C255%2C255)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A0.875em%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174da8ef89d%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%230478be%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2220.1953125%22%20y%3D%2296.3%22%3E<?php echo $value['name'] ?>%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
								<div class="card-body">
									<!-- <h5 class="card-title"><?php echo $value['name'] ?></h5> -->
									<p class="card-text"><?php echo $value['description'] ?></p>
								</div>
								<div class="card-footer text-center">
									<a href="<?php echo INCLUDE_PATH ?>coursesingle/index/<?php echo $value['reference']; ?>/<?php echo $data['coursesNotRegistered'][1][$key]['reference']; ?>" class="btn btn-primary">Ver Curso</a>
									<a href="#" class="btn btn-outline-success">Matricule-se já!</a>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				<div class="col-md-6 col-xl-4 mb-3">
					<div class="card h-100">
					<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174da8ef89d%20text%20%7B%20fill%3Argb(255%2C255%2C255)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A0.875em%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174da8ef89d%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%230478be%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2220.1953125%22%20y%3D%2296.3%22%3ENovidades 2021!%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
					<div class="card-body">
							<!-- <h5 class="card-title">Novidades <?php echo date('Y'); ?>!</h5> -->
							<p class="card-text">Um novo Curso estará disponivel em breve!</p>
						</div>
						<div class="card-footer text-center">
							<a class="btn btn-outline-success">Novidades em Breve!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>