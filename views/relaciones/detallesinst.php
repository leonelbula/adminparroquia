<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				<li>					
					<a href="<?= URL_BASE ?>relaciones/">lista de Relaciones</a>
				</li>
				<li>
					Detalles
				</li>

			</ul>

		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<a href="<?= URL_BASE ?>relaciones/listasdistintas">

							<button class="btn">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Volver
							</button>

						</a>
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="#modal-form-dist" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-success">Editar</button>
						</a>
						<a href="<?= URL_BASE ?>relaciones/EliminarInt&id=<?= $_GET['id'] ?>">
							<button class="btn btn-danger">Eliminar</button>
						</a>
						<?php endif; ?>
					</div>
					<?php while ($inf = $datosInst->fetch_object()): ?>
						<div class="table-detail">
							<div class="row">
								<div class="col-xs-12 col-sm-2">

								</div>

								<div class="col-xs-12 col-sm-7">
									<div class="space visible-xs"></div>

									<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
											<div class="profile-info-name"> Nombre de la entidad </div>

											<div class="profile-info-value">
												<span><?= $inf->nombreInstituto ?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Fiesta Patronal </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->fiesta_patronal != '') {
														echo $inf->fiesta_patronal;
													} else {
														echo 'No registrado';
													}
													?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Presencia en la diocesis </div>

											<div class="profile-info-value">
												<span><?= $inf->presencia_diocesis ?></span>
											</div>
										</div>	
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="modal-form-dist" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Editar Registro</h4>
				</div>

				<div class="modal-body">
					<form action="<?= URL_BASE ?>relaciones/actualizarinst" enctype="multipart/form-data" method="POST">

						<input type="hidden" name="id_instituto" value="<?= $_GET['id'] ?>"/>				
						<div class="form-group">
						<label for="nombreEntidad">Nombres de la Instituto:</label>
						<input type="text" class="form-control" value="<?=$inf->nombreInstituto?>" name="nombreInstituto" id="nombreEntidad" required>
					</div>
					<div class="form-group">
						<label for="fiestapatronal">Fiesta Patronal:</label>
						<input type="text" class="form-control" value="<?=$inf->fiesta_patronal?>" name="fiestapatronal" id="fiestapatronal" required>
					</div>	
					<div class="form-group">
						<label for="presencia_diocesis">Presencia en la diocesis:</label>
						<input type="text" class="form-control" value="<?=$inf->presencia_diocesis?>" name="presencia" id="encargadoEntidad" required>
					</div>						
										
							
						<?php endwhile; ?>				
					<button type="submit" class="btn btn-primary">Editar</button>
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancelar
				</button>

			</div>
		</div>
	</div>
</div>
