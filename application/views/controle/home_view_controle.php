<?php include("includes/header_controle.php"); ?>
		<h2 id="titulo"><?php echo $titulo; ?></h2>
		<!-- <div class="table-responsive"> -->
			<table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th colspan="2"><button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"><span data-toggle="tooltip" data-placement="top" title="Adicionar Colaborador" class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></th>
						<th colspan="2"><button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal"><span data-toggle="tooltip" data-placement="top" title="Editar Colaborador" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></th>
						<th colspan="2"><button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal"><span data-toggle="tooltip" data-placement="top" title="Excluir Colaborador" class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Estado</th>
						<th>Cidade</th>
					</tr>
				</thead>
				<tbody>
					<!-- <?php //echo $listaCadastros; ?> -->
				</tbody>
			</table>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<form action="#" method="post">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Adicionar Usuário</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="txtCPF">CPF:</label>
									<input type="tel" name="txtCPF" id="txtCPF" class="form-control" required>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="txtRG">RG:</label>
									<input type="text" name="txtRG" id="txtRG" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-8">
									<label for="txtNome">Nome:</label>
									<input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Digite seu Nome..." required>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="txtDtNasc">Data de Nasc.:</label>
									<input type="date" name="txtDtNasc" id="txtDtNasc" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label>Sexo:</label>
									<br>
									<label class="radio-inline">
										<input type="radio" name="rbSexo" value="M"> Masculino
									</label>
									<label class="radio-inline">
										<input type="radio" name="rbSexo" value="F"> Feminino
									</label>
								</div>
								<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="txtTelefone">Telefone:</label>
									<input type="tel" name="txtTelefone" id="txtTelefone" class="form-control" required>
								</div>
								<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<label for="txtCelular">Celular:</label>
									<input type="tel" name="txtCelular" id="txtCelular" class="form-control">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="txtCEP">CEP:</label>
									<input type="text" name="txtCEP" id="txtCEP" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
									<label for="txtEndereco">Endereço:</label>
									<input type="text" name="txtEndereco" id="txtEndereco" class="form-control" required>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="txtNum">Nº:</label>
									<input type="text" name="txtNum" id="txtNum" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtBairro">Bairro:</label>
									<input type="text" name="txtBairro" id="txtBairro" class="form-control" required>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtComplemento">Complemento:</label>
									<input type="text" name="txtComplemento" id="txtComplemento" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtEstado">Estado:</label>
									<select name="txtEstado" id="txtEstado" class="form-control" required>
										<option value="">Selecione...</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtCidade">Cidade:</label>
									<select name="txtCidade" id="txtCidade" class="form-control" required>
										<option value="">Selecione...</option>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<!-- <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtLogin">Login:</label>
									<input type="text" name="txtLogin" id="txtLogin" class="form-control" placeholder="Digite seu Login..." required>
								</div> -->
								<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtEmail">E-mail:</label>
									<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Digite seu E-mail..." required>
								</div>
								<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="txtSenha">Senha:</label>
									<div class="input-group">
										<input type="password" name="txtSenha" id="txtSenha" class="form-control" placeholder="Digite a Senha..." required>
										<span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Exibir/Ocultar Senha"><a id="mostraSenha" href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
						</div>
					</div>
				</div>
			</form>
		</div>

		<!-- Modal de IMAGENS -->
		<div class="modal fade" id="modalImages" tabindex="-1" role="dialog" aria-labelledby="modalImagesLabel">
			<form action="#" method="post">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Galeria de Imagens</h4>
						</div>
						<div class="modal-body clearfix">
							
						</div>
						<div class="modal-footer">
							<!-- <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Adicionar</button> -->
						</div>
					</div>
				</div>
			</form>
		</div>

<!--
<div class="row">
	<div class="col-xs-12 col-sm- col-md- col-lg-"></div>
</div>
-->

<?php include("includes/footer_controle.php"); ?>