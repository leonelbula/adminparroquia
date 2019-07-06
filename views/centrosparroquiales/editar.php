<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>centrosparroquiales/">Centros Parroquiales</a>
				</li>
				<li class="active">Editar Registro </li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Editar Centros Parroquiales</h3>
					<a href="<?= URL_BASE ?>centrosparroquiales/">
						<button class="btn btn-info" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Cancelar
						</button>
					</a>
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="page-content">			
						<div class="row">
							<div class="col-xs-8">
								<?php while ($datos = $detalles->fetch_object()): ?>
									<form action="<?= URL_BASE ?>centrosparroquiales/actualizar" enctype="multipart/form-data" method="POST">
										<input type="hidden" name="id" value="<?= $datos->id_centro_parroquiales ?>"/>

										<div class="form-group">
											<label for="nombre">Sacerdote:</label>
											<?php $sacerdote = ParroquiaController::ListarSacerdotes(); ?>
											<select class="chosen-select form-control" name="sacerdote" id="form-field-select-3" required="">
												<option value="">Seleciones el sacerdote</option>
												<?php while ($sac = $sacerdote->fetch_object()) : ?>
													<option value="<?= $sac->id ?>"  <?= $sac->id == $datos->id_sacerdote ? 'selected' : '' ?>><?= $sac->nombres ?>  <?= $sac->apellidos ?></option>';

												<?php endwhile; ?>


											</select>
										</div>
										<div class="form-group">
											<label for="nombre">Nombre:</label>
											<input type="text" class="form-control" value="<?= $datos->nombre ?>" name="nombre" id="nombre" required>
										</div>
										<div class="form-group">
											<label for="direccion">Direccion:</label>
											<input type="text" class="form-control" value="<?= $datos->direccion ?>" name="direccion" id="direccion" required>
										</div>
										<div class="form-group">
											<label for="municipio">Municipio:</label>
											<input type="text" class="form-control" value="<?= $datos->municipio ?>" name="municipio" id="municipio" required>
										</div>														


										<div class="form-group">
											<label for="fiestapatronal">Fiesta Patronal:</label>
											<input type="text" class="form-control" value="<?= $datos->fiesta_patronal ?>" name="fiesta" id="fiesta" required>
										</div>


										<div class="form-group">
											<label for="foto">Foto:</label>
											<input type="file" class="form-control"  name="foto" id="foto">
										</div>
										<div class="form-group">
											<label for="foto">Foto:</label>
											<input type="hidden" class="form-control" value="<?= $datos->foto ?>" name="fotoActual" id="foto">
											<img src="<?= URL_BASE ?>imagenes/centroparroquial/<?= $datos->foto ?>" class="img-thumbnail" width="30%"/>
										</div>	

										<button type="submit" class="btn btn-primary">Actualizar</button>
									<?php endwhile; ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>