<?php include("includes/header_controle.php"); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<button id="cadGaleria" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Cadastrar Categoria</button>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Categorias</h1>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Categoria</th>
								<th>Descrição</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $listaCategorias; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<?php echo form_open('controle/galeria/insereCategoria/', $formCat); ?>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Adicionar Categoria</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="cat_titulo">Título:</label>
									<input type="text" id="cat_titulo" name="cat_titulo" class="form-control" required placeholder="Insira o Título">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="cat_descricao">Descrição:</label>
									<textarea  id="cat_descricao" name="cat_descricao" rows="10" class="form-control" required></textarea>
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