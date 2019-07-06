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
					<a href="<?= URL_BASE ?>relaciones/listasinternas">
						<div class="page-header">
							<button class="btn">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Volver
							</button>
							<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
							<a href="#modal-form-internas" role="button" class="blue" data-toggle="modal">
								<button class="btn btn-success">Editar</button>
							</a>
							<a href="<?= URL_BASE ?>relaciones/EliminarInt&id=<?= $_GET['id'] ?>">
								<button class="btn btn-danger">Eliminar</button>
							</a>
							<?php endif; ?>
						</div>
					</a>
					<?php while ($inf = $listaRelInt->fetch_object()): ?>
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
												<span><?= $inf->nombreEntidad ?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Encargado </div>

											<div class="profile-info-value">
												<span><?= $inf->encargadoEntidad ?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Direccion </div>

											<div class="profile-info-value">																	
												<span><?= $inf->direccion ?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">Telefono </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->telefono == '') {
														echo 'No registrado';
													} else {
														echo $inf->telefono;
													}
													?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Promedio de Edad </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->promedioEdad != '') {
														echo $inf->promedioEdad;
													} else {
														echo 'No registrado';
													}
													?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Email </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->email != '') {
														echo $inf->email;
													} else {
														echo 'No Registrado';
													}
													?></span>
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

	<div id="modal-form-internas" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Editar Registro</h4>
				</div>

				<div class="modal-body">
					<form action="<?= URL_BASE ?>relaciones/actualizarinternas" enctype="multipart/form-data" method="POST">

						<input type="hidden" name="id_relacion" value="<?= $_GET['id'] ?>"/>				
						<div class="form-group">
							<label for="nombreEntidad">Nombres de la Entidad:</label>
							<input type="text" class="form-control" value="<?= $inf->nombreEntidad ?>" name="nombreEntidad" id="nombreEntidad" required>
						</div>
						<div class="form-group">
							<label for="encargadoEntidad">Encargado de la Entidad:</label>
							<input type="text" class="form-control" value="<?= $inf->encargadoEntidad ?>" name="encargadoEntidad" id="encargadoEntidad" required>
						</div>
						<div class="form-group">
							<label for="promedioEdad">Promedio Edad:</label>
							<input type="text" class="form-control" value="<?= $inf->promedioEdad ?>" name="promedioEdad" id="telefono" required>
						</div>					
						<div class="form-group">
							<label for="direccion">Direccion:</label>
							<input type="text" class="form-control" value="<?= $inf->direccion ?>" name="direccion" id="telefono" required>
						</div>
						<div class="form-group">
							<label for="telefono">Telefono:</label>
							<input type="number" class="form-control" value="<?= $inf->telefono ?>" name="telefono" id="telefono" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" value="<?= $inf->email ?>" name="email" id="email" required>
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
