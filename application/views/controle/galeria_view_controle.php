<?php include("includes/header_controle.php"); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<button id="cadGaleria" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Cadastrar Galeria</button>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h1>Galeria</h1>
				<?php echo $listaGalerias; ?>
			</div>
		</div>
	

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<?php echo form_open('controle/galeria/insereGaleria/'); ?>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Adicionar Galeria</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="gal_titulo">Título:</label>
									<input type="text" id="gal_titulo" name="gal_titulo" class="form-control" required placeholder="Insira o Título">
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="cat_id">Categoria:</label>
									<select id="cat_id" name="cat_id" class="form-control" required>
										<option value="">Selecione...</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="gal_descricao">Descrição:</label>
									<textarea  id="gal_descricao" name="gal_descricao" rows="10" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Adicionar</button>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
<?php include("includes/footer_controle.php"); ?>