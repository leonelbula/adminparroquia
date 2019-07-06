<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>comisiones/">Comisiones</a>
				</li>
				<li class="active">Editar Registro </li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Editar Comision</h3>
					<a href="<?= URL_BASE ?>parroquia/">
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
								<?php while ($datos = $datosComi ->fetch_object()): ?>
								<form action="<?= URL_BASE ?>comisiones/actualizar" enctype="multipart/form-data" method="POST">
									<input type="hidden" name="id" value="<?= $datos->id_comisiones_pastorales?>"/>
									<div class="form-group">
										<label for="nombre">Nombre:</label>
										<input type="text" class="form-control" value="<?= $datos->nombre ?>" name="nombre" id="nombre" required>
									</div>
									<div class="form-group">
										<label for="nombre">Sacerdote:</label>
										<?php $sacerdote = comisionesController::ListarSacerdotes(); ?>
										<select class="chosen-select form-control" name="sacerdote" id="form-field-select-3" required="">
											<option value="">Seleciones el sacerdote</option>
											<?php
											while ($sac = $sacerdote->fetch_object()) : ?>
											  <option value="<?= $sac->id ?>"  <?= $sac->id == $datos->id_sacerdote ? 'selected' : '' ?>><?=$sac->nombres ?>  <?= $sac->apellidos ?></option>';
											
											<?php endwhile;?>


										</select>
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