<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>seminarista/">Lista de Seminarista</a>
				</li>
				<li class="active">Informacion</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<a href="<?= URL_BASE ?>seminarista/">

						<button class="btn">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Volver
						</button>

					</a>
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="<?=URL_BASE?>seminarista/editar&id=<?=$row->id_seminarista?>">
								<button class="btn btn-success">Editar</button>
							</a>
							<a href="<?=URL_BASE?>usuario/eliminar&id=<?=$row->id_seminarista?>">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						<?php endif; ?>
					</div><!-- /.page-header -->
					<div id="user-profile-1" class="user-profile row">
						<?php while ($row = $detallesSeminarista ->fetch_object()): ?>
						<div class="col-xs-12 col-sm-3 center">
							
							<div>
								<span class="profile-picture">
									<img id="avatar" class="editable img-responsive" alt="<?=$row->nombres ?>" src="<?php if($row->foto){echo URL_BASE.'imagenes/seminarista/'.$row->foto;}else {echo URL_BASE.'assets/images/avatars/profile-pic.jpg';}  ?>" />
								</span>

								

								<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
									<div class="inline position-relative">
										<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
											
										
											<span class="white"><?= $row->nombres?>  <?= $row->apellidos?></span>
										</a>

										
									</div>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="profile-contact-info">


								<div class="space-6"></div>

							</div>

							<div class="hr hr12 dotted"></div>

							<div class="clearfix">
								<div class="grid2">
									

									<br />
								
								</div>

								<div class="grid2">
								

									<br />
									
								</div>
							</div>

							<div class="hr hr16 dotted"></div>
						</div>

						<div class="col-xs-12 col-sm-6">


							<div class="space-1"></div>

							<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
									<div class="profile-info-name"> Nombre </div>

									<div class="profile-info-value">
										<span class="editable" id="username"><?= $row->nombres?>  <?= $row->apellidos?></span>
									</div>
								</div>
								<div class="profile-info-row">
									<div class="profile-info-name"> Fecha Nacimiento </div>

									<div class="profile-info-value">
										<span class="editable" id="username"><?= $row->fecha_nacimiento?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Lugar Nacimiento</div>

									<div class="profile-info-value">
										<i class="fa fa-map-marker light-orange bigger-110"></i>
										<span class="editable" id="country"><?= $row->lugar_nacimiento?></span>
										
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Telefono </div>

									<div class="profile-info-value">
										<span class="editable" id="age"><?php if($row->telefono){echo $row->telefono;}else {echo 'No Registrado';}?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Email </div>

									<div class="profile-info-value">
										<span class="editable" id="signup"><?php if($row->email){echo $row->email;}else {echo 'No Registrado';}?></span>
									</div>
								</div>
																
								
								<div class="profile-info-row">
									<div class="profile-info-name">Parroquia Procedencia</div>
									<div class="profile-info-value">
										<span class="editable" id="about"><a href="#"><?php if($row->id_seminarista){echo $row->id_seminarista;}else {echo 'No Registrado';}?> </a></span>
									</div>
								</div>
								
							</div>
							
							<div class="space-6"></div>

						</div>						
						<?php endwhile; ?>
						
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
</div>


