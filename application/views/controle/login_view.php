<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Painel - Login</title>
	<link rel="stylesheet" href="<?php echo base_url('dist/css/bootstrap.min.css'); ?>">
	<style>
/*		.fundoEscuro{
			width:100%;
			height: 100%;
			position: fixed;
			z-index: 3;
			background: rgba(0,0,0,0.8);
		}
		.janela{
			top:50%;
			left:50%;
			width: 980px;
			height:650px;
			margin: -325px 0px 0px -490px;
			position: fixed;
			z-index: 4;
			background: #9d9d9c;
		}
		.janela .topo{
			border-bottom: 1px solid;
			background: #fff;
			padding: 20px 20px 75px 20px;
		}
		.janela .contentJanela{
			padding:20px;
			text-align:center;
			font-size:25px;
			font-weight:bolder;
		}*/
	</style>
</head>
<body>
	<!-- <div class="fundoEscuro"></div>
	<div class="janela">
		<div class="topo">
			<img style="float:left;" src="<?php echo base_url('logoUnilab.jpg'); ?>" alt="Logo Unilab">
			<img id="fechaModal" style="float:right; margin:15px 20px; cursor:pointer;" src="<?php echo base_url('delete.png'); ?>" alt="delete">
		</div>
		<div class="contentJanela">
			<p style="color:#eee;">Título</p>
			<p style="color:#fff;">Linha Fina</p>
			<p><a href="#">LINK PARA NOTÍCIA</a></p>
		</div>
	</div> -->
	<section class="container">
		<?php echo form_open('#'); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label for="txtLogin">Login: </label>
							<input type="text" name="txtLogin" id="txtLogin" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="txtSenha">Senha: </label>
							<input type="password" name="txtSenha" id="txtSenha" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<button type="submit" style="margin-top:20px;" class="btn btn-lg btn-block btn-success">Logar</button>
						</div>
					</div>
				</div>
			</div>
			
		</form>
	</section>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>
	$(document).ready(function(){
		$("form").submit(function(){
			// var url = "http://localhost:8080/monica_teste/controle/login/verificaLogin/";
			var url = "http://mlealbrand.com.br/controle/login/verificaLogin/";
        	var dados = $(this).serialize();

	        $.ajax({
	            url: url,
	            type: 'POST',
	            dataType: 'json',
	            data: dados,
	            success: function(resp){
	            	if(resp.msg == "OK")
	            		window.location = "http://mlealbrand.com.br/controle/";
	            	else
	            		alert(resp.msg);
	            },
	            error: function(er){
	            	alert("Ocorreu um erro!");
	            	console.log(er.responseText);
	            }
	        });
	        return false;
		});
	});
	</script>
</body>
</html>