<!DOCTYPE html>
<html lang="pt">
<head>
<title><?php echo SYSTEM_TITLE; ?> - <?php echo ucfirst($data['titlePage']); ?></title>
	<!-- Meta tags Requeridas -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_ASSETS; ?>frameworks-plugins/bootstrap-4.5.3/css/bootstrap.min.css">

	<!-- Meu CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_ASSETS; ?>css/mycss.css">
</head>
<body>
	<?php if($data['titlePage'] != 'login'){ ?>
		<header>
			<nav class="navbar navbar-expand-lg navbar-white-bcode bg-blue-bcode">
				<div class="container">
					<a class="logo-secondary text-white text-center" href="<?php echo INCLUDE_PATH; ?>campus">
						<span class="logo-princ font-iceberg">EAD</span>
						<span class="logo-sub font-iceberg">&lt;BCode&gt;</span>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<p class="my-auto pl-2 small color-white-bcode">v1.0.0-Alpha01</p>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item mx-1">
								<a identifier="campus" class="nav-link" href="<?php echo INCLUDE_PATH; ?>campus"><i class="fas fa-home"></i> Câmpus Virtual</a>
							</li>
							<!-- <li class="nav-item mx-1">
								<a identifier="certificate" class="nav-link" href="<?php echo INCLUDE_PATH; ?>certificate"><i class="fas fa-certificate"></i> Certificados</a>
							</li> -->
							<li class="nav-item mx-1">
								<a identifier="myaccount" class="nav-link" href="<?php echo INCLUDE_PATH; ?>myaccount"><i class="far fa-user"></i> Minha Conta</a>
							</li>
							<a class="m-1 btn btn-sm btn-outline-bcode my-auto" href="<?php echo INCLUDE_PATH; ?>login/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	<?php } ?>