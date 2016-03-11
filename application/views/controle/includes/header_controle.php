<?php @session_start(); ?>
<!DOCTYPE html>
<html class="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel<?php echo (isset($titulo) ? " - $titulo" : ""); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,b-1.0.3,b-colvis-1.0.3,b-flash-1.0.3,b-html5-1.0.3,b-print-1.0.3,r-1.0.7/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url('dist/css/animate.css');?>">
    <!-- <link rel="stylesheet" href="dist/css/cropper.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/estiloAdm.min.css');?>">
    <base href="<?php echo base_url(); ?>">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
</head>
<body>
	<header id="header">
		<nav id="menuTopo" class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Brand</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Principal</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Colaboradores</a></li>
								<li><a href="#">Pessoas</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Unidades</a></li>
								<li><a href="#">Mensagens de E-mail</a></li>
								<li><a href="#">Destinos - E-mail</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recursos Humanos<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Candidatos</a></li>
								<li><a href="#">Vagas</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conteúdo<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Institucional</a></li>
								<li><a href="#">Notícias</a></li>
								<li><a href="#">Publicações</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Banners</a></li>
								<li><a href="#">Fotos</a></li>
								<li><a href="#">Videos</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#">Configurações</a></li>
					</ul>
					<!-- <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form> -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img src="http://placehold.it/40x40" class="img-circle" style="margin-top: -12px; margin-bottom: -10px;"><!--&nbsp;&nbsp;Gabriel--><span class="caret"></span>
							</a>
							<!-- <span style="vertical-align: middle; padding-right: 10px;">André Andrade</span> -->
							<ul class="dropdown-menu">
								<li><a href="#">Editar Perfil</a></li>
								<li><a href="#">Sair</a></li>
							</ul>

						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<aside id="menuLateral" class="esconde">
		<button type="button" id="abreFechaMenu" class="navbar-toggle">
			<span class="icon-bar iconx"></span>
			<span class="icon-bar iconnone"></span>
			<span class="icon-bar icony"></span>
		</button>
		<section id="logo">
			<img src="http://placehold.it/250x150" width="250" height="150" alt="Logo" id="imgLogo" class="img-squad">
		</section>
		<ul id="navLateral" class="nav nav-pills nav-stacked">
			<li role="presentation" class="active">
				<a href="#">
					<img src="<?php echo base_url('dist/img/add_user.png');?>" height="26" width="26" alt="Novo Colaborador"> <span class="mlat">Adicionar Colaborador</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/all_user.png');?>" height="26" width="26" alt="Colaboradores"> <span class="mlat">Lista de Colaboradores</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/map_marker.png');?>" height="26" width="26" alt="Unidades"><span class="mlat">Lista de Unidades</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/marker.png');?>" height="26" width="26" alt="Nova Unidade"><span class="mlat">Adicionar Unidade</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/workers.png');?>" height="26" width="26" alt="Candidatos"><span class="mlat">Lista de Candidatos</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/nova_vaga.png');?>" height="26" width="26" alt="Nova Vaga"><span class="mlat">Nova Vaga</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/vagas.png');?>" height="26" width="26" alt="Vagas"><span class="mlat">Lista de Vagas</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/foto.png');?>" height="26" width="26" alt="Fotos"><span class="mlat">Fotos</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/videos.png');?>" height="26" width="26" alt="Videos"><span class="mlat">Videos</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/nova_noticia.png');?>" height="26" width="26" alt="Nova Notícia"><span class="mlat">Nova Notícia</span>
				</a>
			</li>
			<li role="presentation">
				<a href="#">
					<img src="<?php echo base_url('dist/img/noticias.png');?>" height="26" width="26" alt="Notícias"><span class="mlat">Lista de Notícias</span>
				</a>
			</li>
		</ul>
	</aside>
	<section class="container">

		
	