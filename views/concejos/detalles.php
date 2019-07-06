<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				<li>					
					<a href="<?= URL_BASE ?>consejos/">listas de Parroquias</a>
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
						<a href="<?= URL_BASE ?>consejos/">

							<button class="btn">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Volver
							</button>

						</a>
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="#modal-form" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-success">Editar</button>
						</a>
						<a href="#modal-form-integrante" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info" type="button">								
								Agregar Integrante
							</button>
						</a>		
						<?php endif;?>
										
					</div>
					
					<div class="table-detail">
						<div class="row">
							<div class="col-xs-12 col-sm-2">
								<div class="text-center">
									
									<br />
									<div class="width-100 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a class="user-title-label" >

												&nbsp;
												<span class="white">
													<?php 
													while ($row = $nombre ->fetch_object()) {
														echo $row->nombre;
													}
													?>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-7">
								<div class="space visible-xs"></div>

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-name"> </div>
									<h3> <span> INTEGRANTES </span></h3>
									<?php while ($inf = $lisDet->fetch_object()): ?>
									<div class="profile-info-row">
										<div class="profile-info-name"></div>

										<div class="profile-info-value">
											<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->idt2 ?>">
											<span><?= $inf->nombres ?> <?= $inf->apellidos?></span>
											</a>
											<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
											<a href="<?= URL_BASE ?>consejos/eliminar&id=<?= $inf->idt2 ?>&idc=<?= $_GET['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											<?php endif; ?>
										</div>
									</div>
									
						<?php endwhile; ?>


								</div>
							</div>
							

						</div>

					</div>
				

				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>


<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nombre Consejo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>sacerdote/guardarestfilosofia" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_consejo" value="<?= $_GET['id'] ?>"/>	
																					
																	
					<div class="form-group">
						<label for="nomnre">Nombre:</label>
						
						<?php 
						
						$nombrecon = ConsejosController::NombreConsejo();
						
						while ($row1 = $nombrecon-> fetch_object()) {
							echo '<input type="text" class="form-control" name="nombre" value="'.$row1->nombre.'" id="nombre" required>';
						}
						
						?>
						
						
					</div>					
					
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
<div id="modal-form-integrante" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nombre Consejo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>consejos/AgregarIntegrante" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_consejo" value="<?= $_GET['id'] ?>"/>	
																					
																	
					<div class="form-group">
						<label for="nombre">Sacerdote:</label>
						<?php $sacerdote = ParroquiaController::ListarSacerdotes();	?>
						<select class="chosen-select form-control" name="sacerdote" id="form-field-select-3" required="">
							<option value="">Seleciones el sacerdote</option>
							<?php
								while ($sac = $sacerdote->fetch_object()) {
									echo '<option value="'.$sac->id.'">'.$sac->nombres.' '.$sac->apellidos.'</option>';
								}
														
							?>
												

						</select>
					</div>			
					
					<button type="submit" class="btn btn-primary">Agregar</button>
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