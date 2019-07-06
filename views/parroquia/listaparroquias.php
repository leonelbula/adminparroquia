<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				
				<li class="active">lista de Parroquias</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">


			<div class="row">
				<div class="col-xs-12">														

					<div class="row">
						<div class="col-xs-12">
							<h3 class="header smaller lighter blue">Lista de Parroquias</h3>
							<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
							<a href="#modal-form" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info" type="button">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Registrar
							</button>
							</a>
							<?php endif; ?>
							<div class="clearfix">
								<div class="pull-right tableTools-container"></div>
							</div>

							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label class="pos-rel">
													N°
													<span class="lbl"></span>
												</label>
											</th>
											<th>PARROQUIAS</th>
											<th>SACERDOTE ENCARGADO</th>
									
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$i=1;
											
											while ($row = $listaParroquia->fetch_object()):
												
										?>
										<tr>
											<td class="center">
												<label class="pos-rel">
													<?= $i++; ?>
													<span class="lbl"></span>
												</label>
											</td>
											<td><a href="<?=URL_BASE?>parroquia/detalles&id=<?=$row->id_parroquia?>"><?= $row->nombre?></a></td>
											<td>
												<a href="<?=URL_BASE?>sacerdote/sacerdote&id=<?=$row->id_sacerdote?>"><?= $row->sacerdote?></a>
											</td>
													
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="blue" href="<?=URL_BASE?>parroquia/detalles&id=<?=$row->id_parroquia?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a>

													<a class="green" href="<?=URL_BASE?>parroquia/editar&id=<?=$row->id_parroquia?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>

													<a class="red" href="<?=URL_BASE?>parroquia/eliminar&id=<?=$row->id_parroquia?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="<?=URL_BASE?>parroquia/detalles&id=<?=$row->id_parroquia?>" class="tooltip-info" data-rel="tooltip" title="Ver">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
															<li>
																<a href="<?=URL_BASE?>parroquia/editar&id=<?=$row->id_parroquia?>" class="tooltip-success" data-rel="tooltip" title="Editar">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="<?=URL_BASE?>parroquia/eliminar&id=<?=$row->id_parroquia?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php endif; ?>
														</ul>
													</div>
												</div>
											</td>
										</tr>

									<?php endwhile;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>



					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Registro</h4>
			</div>

			<div class="modal-body">
				<form action="<?=URL_BASE?>parroquia/guardar" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="nombre">Vicaria:</label>
						<?php $vicarias = ParroquiaController::listarVicarias(); ?>
						<select class="form-control" name="vicaria" id="form-field-select-1" required="">
							<option value="">Seleccione una Vicarria</option>
							<?php 
								while ($cat = $vicarias->fetch_object()) {
									echo'<option value="'.$cat->id_vicaria.'">'.$cat->nombre.'</option>';
								}
							?>
							
						</select>
					</div>
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
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="direccion">Direccion:</label>
						<input type="text" class="form-control" name="direccion" id="direccion" required>
					</div>
					<div class="form-group">
						<label for="municipio">Municipio:</label>
						<input type="text" class="form-control"name="municipio" id="municipio" required>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="text" class="form-control" name="telefono" id="telefono">
					</div>
					<div class="form-group">
						<label for="fundada">Fundada:</label>
						<input type="text" class="form-control" name="fundada" id="fundada" required>
					</div>
					<div class="form-group">
						<label for="decreto">Decreto:</label>
						<input type="text" class="form-control" name="decreto" id="decreto" required>
					</div>
					<div class="form-group">
						<label for="extencion">Extencion:</label>
						<input type="text" class="form-control" name="extencion" id="extencion" required>
					</div>
					<div class="form-group">
						<label for="limites">Limites:</label>
						<input type="text" class="form-control" name="limites" id="limites" required>
					</div>
					<div class="form-group">
						<label for="fiestapatronal">Fiesta Patronal:</label>
						<input type="text" class="form-control" name="fiesta" id="fiesta" required>
					</div>
					<div class="form-group">
						<label for="nombre">Vicario :</label>
						<?php $sacerdote = ParroquiaController::ListarSacerdotes();	?>
						<select class="chosen-select form-control" name="vicario" id="form-field-select-3" required="">
							<option value="">Seleciones el sacerdote</option>
							<?php
								while ($sac = $sacerdote->fetch_object()) {
									echo '<option value="'.$sac->id.'">'.$sac->nombres.' '.$sac->apellidos.'</option>';
								}
														
							?>
												

						</select>
					</div>				
					<div class="form-group">
						<label for="foto">Foto:</label>
						<input type="file" class="form-control" name="foto" id="foto">
					</div>					
					
					<button type="submit" class="btn btn-primary">Guardar</button>
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
