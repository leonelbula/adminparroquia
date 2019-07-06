<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				<li>					
					<a href="<?= URL_BASE ?>parroquia/">listas de Parroquias</a>
				</li>
				<li>
					Detalles
				</li>

			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<a href="<?= URL_BASE ?>centrosparroquiales/">

							<button class="btn">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Volver
							</button>

						</a>
						<a href="<?= URL_BASE ?>centrosparroquiales/editar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-success">Editar</button>
						</a>
						<a href="<?= URL_BASE ?>centrosparroquiales/eliminar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-danger">Eliminar</button>
						</a>
					</div>
					<?php while ($inf = $detalles->fetch_object()): ?>
					<div class="table-detail">
						<div class="row">
							<div class="col-xs-12 col-sm-2">
								<div class="text-center">
									<img height="150" class="thumbnail inline no-margin-bottom" alt="" src="<?= URL_BASE ?>imagenes/centroparroquial/<?= $inf->foto ?>" />
									<br />
									<div class="width-100 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a class="user-title-label" >

												&nbsp;
												<span class="white"><?= $inf->nombre ?></span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-7">
								<div class="space visible-xs"></div>

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Nombre </div>

										<div class="profile-info-value">
											<span><?= $inf->nombre ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Direccion </div>

										<div class="profile-info-value">																	
											<span><?= $inf->direccion ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name">Municipio </div>

										<div class="profile-info-value">
											<span><?= $inf->municipio ?></span>
										</div>
									</div>


									<div class="profile-info-row">
										<div class="profile-info-name">Fiestas Patronal </div>

										<div class="profile-info-value">
											<span><?= $inf->fiesta_patronal ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name">Sacerdote </div>

										<div class="profile-info-value">
											<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->id_sacerdote ?>">
												<?php
												if($inf->id_sacerdote == ''){
												echo 'No registrado';
												} else {
												$id_sacerdote = $inf->id_sacerdote;
												$vicario = ParroquiaController::SacerdotesParroquia($id_sacerdote);
												while ($sacer = $vicario->fetch_object()) {
												echo $sacer->nombres;
												}
												}
												?>
											</a>	
										</div>
									</div>


								</div>
							</div>
							

						</div>

					</div>
					<?php endwhile; ?>

				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>


