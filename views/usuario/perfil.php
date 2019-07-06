<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?=URL_BASE?>usuario/">Lista de Usuarios</a>
				</li>
				<li class="active">Perfil</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<?php while ($inf = $infoUser->fetch_object()):?>
					<div class="table-detail">
						<div class="row">
							<div class="col-xs-12 col-sm-2">
								<div class="text-center">
									<img height="150" class="thumbnail inline no-margin-bottom" alt="" src="<?= URL_BASE ?>assets/images/avatars/profile-pic.jpg" />
									<br />
									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a class="user-title-label" href="#">
												<i class="ace-icon fa fa-circle light-green"></i>
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
										<div class="profile-info-name"> Usuario </div>

										<div class="profile-info-value">
											<span><?= $inf->nombre ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Tipo </div>

										<div class="profile-info-value">																	
											<span><?= $inf->tipo ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Estado </div>

										<div class="profile-info-value">
											<span>
												<?php
												if ($inf->estado == 1) {
													echo'Activado';
												} else {
													echo 'Desactivado';
												}
												?></span>
										</div>
									</div>



								</div>
							</div>
							<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
							<a href="<?=URL_BASE?>usuario/editar&id=<?=$inf->id?>">
								<button class="btn btn-success">Editar</button>
							</a>
							<a href="<?=URL_BASE?>usuario/eliminar&id=<?=$inf->id?>">
								<button class="btn btn-danger">Eliminar</button>
							</a>
								<?php endif; ?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	

</div>




