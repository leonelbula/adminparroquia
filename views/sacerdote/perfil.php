<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>sacerdote/">Lista de Sacerdotes</a>
				</li>
				<li class="active">Informacion</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<a href="<?= URL_BASE ?>sacerdote/">

							<button class="btn">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Volver
							</button>

						</a>
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="<?= URL_BASE ?>sacerdote/editar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-success">Editar Inf. Personal</button>
						</a>
						<?php 
						$datos = SacerdoteController::MostrarDatosMinisteriales();						
						if($datos->field_count == 0){
								echo '
									<a href="#modal-form-mini" role="button" class="blue" data-toggle="modal">
										<button class="btn btn-info" type="button">								
											Agregar Inf. Ministerial
										</button>
									</a>';
						}else{
							echo '<a href="#modal-form-editar" role="button" class="blue" data-toggle="modal">
									<button class="btn btn-success">Editar Inf. Ministerial</button>
								  </a>';
						}
						
						?>
												
						<a href="#modal-form-especializacion" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info">Agregar Especializacion</button>
						</a>
						
						<a href="#modal-form-tras" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info">Realizar Traslado</button>
						</a>						
						<a href="<?= URL_BASE ?>sacerdote/eliminar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-danger">Eliminar</button>
						</a>
						<?php endif; ?>
						
					</div><!-- /.page-header -->
					<div id="user-profile-1" class="user-profile row">
						<?php while ($row = $detallesParroco->fetch_object()): ?>
							<div class="col-xs-12 col-sm-3 center">

								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" alt="<?= $row->nombres ?>" src="<?php if ($row->foto) {
											echo URL_BASE . 'imagenes/parroco/' . $row->foto;
										} else {
											echo URL_BASE . 'assets/images/avatars/profile-pic.jpg';
										} ?>" />
									</span>



									<div class="width-150 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">


												<span class="white"><?= $row->nombres ?>  <?= $row->apellidos ?></span>
											</a>


										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<div class="profile-contact-info">


									<div class="space-6"></div>

								</div>



								<div class="clearfix">

								</div>


							</div>

							<div class="col-xs-12 col-sm-6">


								<div class="space-1"></div>

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Nombre </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?= $row->nombres ?>  <?= $row->apellidos ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Fecha Nacimiento </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?= $row->fechanacimiento ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Lugar Nacimiento</div>

										<div class="profile-info-value">
											<i class="fa fa-map-marker light-orange bigger-110"></i>
											<span class="editable" id="country"><?= $row->lugarnacimiento ?></span>

										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Telefono </div>

										<div class="profile-info-value">
											<span class="editable" id="age"><?php if ($row->telefono) {
											echo $row->telefono;
										} else {
											echo 'No Registrado';
										} ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Email </div>

										<div class="profile-info-value">
											<span class="editable" id="signup"><?php if ($row->email) {
											echo $row->email;
										} else {
											echo 'No Registrado';
										} ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Lugar de Ordenacion </div>

										<div class="profile-info-value">
														<span class="editable" id="login"><?php if ($row->lugarOrdenacion) {
										echo $row->lugarOrdenacion;
									} else {
										echo 'No Registrado';
									} ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Fecha de Ordanacion </div>

										<div class="profile-info-value">
											<span class="editable" id="about"><?php if ($row->fechaordenacion) {
											echo$row->fechaordenacion;
										} else {
											echo 'No Registrado';
										} ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Parroquia Ordenacion </div>

										<div class="profile-info-value">
											<span class="editable" id="about"><?php if ($row->parroquiaOrdenacion) {
											echo$row->parroquiaOrdenacion;
										} else {
											echo 'No Registrado';
										} ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name">Parroquia Actual</div>
										<div class="profile-info-value">
											<?php
											$id_sacerdote = $_GET['id'];
											$datosParroquia = ParroquiaController::MostrarParroquia($id_sacerdote);
											
											while ($row2 = $datosParroquia->fetch_object()) :
												
												?>
												<span class="editable" id="about"><a href="<?= URL_BASE ?>parroquia/detalles&id=<?= $row2->id_parroquia ?>"><?php if ($row2->id_parroquia) {
												echo $row2->nombre;
												
											} else {
												echo 'No Registrado';
											} ?> </a></span>
											<?php endwhile; ?>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Cargo </div>

										<div class="profile-info-value">
											<span class="editable" id="about"><?php if ($row->cargo) {
												echo $row->cargo;
											} else {
												echo 'No Registrado';
											} ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Estudio Relaizados </div>

										<div class="profile-info-value">
											<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
												<b>Estudios Teologia</b>
											</div><br><br>
											<p><span class="editable" id="about">
													
													<?php
												$listEsp = SacerdoteController::MostraEstudioTeologia();
												while ($row6 = $listEsp->fetch_object()) :
													?>

													
													<i class="ace-icon fa fa-caret-right green"></i> <?= $row6->estudio_teologia ?>	
														
															<span class="red">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
														</a>
													
														<?php endwhile; ?>												
													
													
												</span></p>
												<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
												<b>Estudios Filosofia</b>
											</div><br>
											<ul class="list-unstyled spaced">
												<?php
												$listaEstF = SacerdoteController::MostraEstudioFilosofia();
												while ($rowF = $listaEstF->fetch_object()):
													?>

													<li>
														<i class="ace-icon fa fa-caret-right blue"></i><?= $rowF->estudio_filosofia ?>
														<a href="<?= URL_BASE ?>sacerdote/eliminarestf&id=<?= $rowF->id_estudios_filosafia ?>&idp=<?= $_GET['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
															<span class="red">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
														</a>
													</li>


												<?php endwhile; ?>


											</ul>										
											<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
												<b>Especializaciones</b>
											</div><br>

											<ul class="list-unstyled  spaced">
												<?php
												$listEsp = SacerdoteController::Mostrarespecializacion();
												while ($row1 = $listEsp->fetch_object()) :
													?>

													<li>
														<i class="ace-icon fa fa-caret-right green"></i> <?= $row1->estudio_especializaciones ?>	
														<a href="<?= URL_BASE ?>sacerdote/eliminareste&id=<?= $row1->id_estudios_especializaciones ?>&idp=<?= $_GET['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
															<span class="red">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
														</a>
													</li>
														<?php endwhile; ?>													
												<li class="divider"></li>

											</ul>
											<hr>
											
										</div>

									</div>
								</div>

								<div class="space-6"></div>
							<?php endwhile; ?>

						</div>						

					</div>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="widget-box transparent">
								<div class="widget-header widget-header-large">
									<h3 class="widget-title grey lighter">
										<i class="ace-icon fa fa-leaf green"></i>
										Mas Informacion
									</h3>


								</div>

								<div class="widget-body">
									<div class="widget-main padding-24">
										<div class="row">

											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
														<b>Historia Cural</b>
													</div>
												</div>

												<div>
													<div class="row">
														<div class="col-xs-11">
															<table id="dynamic-table" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>
																		<th class="hidden-480">Año</th>
																		<th>Parroquia</th>
																		<th>Cargo</th>
																	


																		<th>Acciones</th>
																	</tr>
																</thead>

																<tbody>	
																	<?php
																	$listaHistoria = SacerdoteController::MostrarHistoriaCural();
																	while ($rowH = $listaHistoria->fetch_object()):
																		?>
																		<tr>

																			<td><?= $rowH->hasta ?></td>
																			<td>
																				<?= $rowH->parroquia ?>
																			</td>
																			<td><?= $rowH->cargo ?></td>

																			



																			<td>
																				<div class="hidden-sm hidden-xs action-buttons">																				


																					<a class="red" href="<?= URL_BASE ?>sacerdote/eliminarhist&id=<?= $rowH->id_historial_cural ?>&ids=<?= $_GET['id'] ?>">
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
																								<a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar">
																									<span class="red">
																										<i class="ace-icon fa fa-trash-o bigger-120"></i>
																									</span>
																								</a>
																							</li>
																						</ul>
																					</div>
																				</div>
																			</td>
																		</tr>

																	<?php endwhile; ?>

																</tbody>
															</table>
															<a href="#modal-form-grupo" role="button" class="blue" data-toggle="modal">
																<button class="btn btn-info">Registrar</button>
															</a>
														</div>
													</div>
												</div>



											</div>
											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
														<b>Cargos Diocesanos y Capellanias</b>
													</div>
												</div>

												<div>
													<div class="row">
														<div class="col-xs-11">
															<table id="dynamic-table2" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>

																		<th>Cargo</th>																		
																		<th class="hidden-480">Año</th>
																		<th>Acciones</th>
																	</tr>
																</thead>

																<tbody>	
																	<?php
																	$listaCargo = SacerdoteController::MostrarCargos();
																	while ($rowC = $listaCargo->fetch_object()):
																		?>
																		<tr>


																			<td>
																				<?= $rowC->nombre ?>
																			</td>
																			

																			<td><?= $rowC->fecha ?></td>



																			<td>
																				<div class="hidden-sm hidden-xs action-buttons">																				


																					<a class="red" href="<?= URL_BASE ?>sacerdote/eliminarhist&id=<?= $rowC->id_cargo_diocesados ?>&ids=<?= $_GET['id'] ?>">
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
																								<a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar">
																									<span class="red">
																										<i class="ace-icon fa fa-trash-o bigger-120"></i>
																									</span>
																								</a>
																							</li>
																						</ul>
																					</div>
																				</div>
																			</td>
																		</tr>

																	<?php endwhile; ?>

																</tbody>
															</table>
															<a href="#modal-form-cargo" role="button" class="blue" data-toggle="modal">
																<button class="btn btn-info">Registrar</button>
															</a>
														</div>
													</div>
												</div>



											</div>
											<?php if($_SESSION['identity']->tipo == 'usuario' || $_SESSION['identity']->tipo == 'maestro' ): ?>
											<div class="col-sm-6">
												<div class="widget-box">
													<div class="widget-header">
														<h4 class="widget-title lighter smaller">
															<i class="ace-icon fa fa-comment blue"></i>
															Observaciones
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main no-padding">
															<div class="dialogs">
																<div class="itemdiv dialogdiv">
																	<div class="user">

																	</div>
																		<?php
																		$observaciones = SacerdoteController::MostrarObservaciones();

																		while ($obs = $observaciones->fetch_object()):
																			?>
																		<div class="body">
																			<div class="time">
																				<i class="ace-icon fa fa-clock-o"></i>
																				<span class="green"><?= $obs->fecha ?></span>
																			</div>

																			<div class="text"><?= $obs->comentario ?>.</div>

																			<div class="tools">
																				<a href="<?= URL_BASE ?>sacerdote/eliminarobservacion&id=<?= $obs->id_observ_parroco ?>&idp=<?= $_GET['id'] ?>" class="btn btn-minier btn-info">
																					<i class="icon-only ace-icon fa fa-share"></i>
																					Eliminar
																				</a>
																			</div>
																		</div>
																	<?php endwhile; ?>
																</div>

																<div class="itemdiv dialogdiv">
																	<div class="user">

																	</div>


																</div>
															</div>

															<form action="<?= URL_BASE ?>sacerdote/guardarobservacion" method="POST">
																<div class="form-actions">
																	<div class="input-group">
																		<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>"/>																		
																		<textarea rows="4" cols="50" class="form-control"  name="observacion"  placeholder="Escriba la observacion ..."></textarea>
																		<span class="input-group-btn">
																			<button class="btn btn-sm btn-info no-radius" type="submit">
																				<i class="ace-icon fa fa-share"></i>
																				Guardad
																			</button>
																		</span>
																	</div>
																</div>
															</form>
														</div><!-- /.widget-main -->
													</div><!-- /.widget-body -->
												</div><!-- /.widget-box -->
											</div>
											<?php endif; ?>
										</div><!-- /.row -->


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
<div id="modal-form-cargo" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Cargo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>sacerdote/guardarcargo" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="cargo">Nombre del Cargo:</label>
						<input type="text" class="form-control" name="cargo" id="estudioFilosofia" required>
					</div>
					<div class="form-group">
						<label for="fecha">AÑO:</label>
						<input type="text" class="form-control" name="fecha" id="estudioFilosofia" required>
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

<div id="modal-form-especializacion" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Especilaizacion</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>sacerdote/guardarespecializacion" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="Especializacion">Nombre:</label>
						<input type="text" class="form-control" name="Especializacion" id="Especializacion" required>
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

<div id="modal-form-grupo" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Registro de Historial</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>sacerdote/guardarhistorial" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="parroquia">Nombre Parroquia:</label>
							<?php $parroquias = ParroquiaController::ListarParroquia(); ?>
						<select  class="chosen-select form-control" id="form-field-select-3" data-placeholder="Parroquia a buscar..."name="parroquia" required>
							
							<option value="">  </option>
								<?php
								while ($sac = $parroquias->fetch_object()) {
									echo '<option value="' . $sac->nombre . '">' . $sac->nombre . '</option>';
								}
								?>
  

						</select>
					</div>
					<div class="form-group">
						<label for="cargo">Parroquia Externa :</label>
						<input type="text" class="form-control" name="exte" id="cargo" required>
					</div>					
					<div class="form-group">
						<label for="cargo">Cargo :</label>
						<input type="text" class="form-control" name="cargo" id="cargo" required>
					</div>
					<div class="form-group">
						<label for="fecha">Año:</label>
						<input type="text" class="form-control"name="fecha" id="fecha" required>
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

<div id="modal-form-editar" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Datos Ministeriales

					<div class="modal-body">
						<form action="<?= URL_BASE ?>sacerdote/guardardatosm" enctype="multipart/form-data" method="POST">
							<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>" />
							<?php
							$datosMin = SacerdoteController::MostrarDatosMinisteriales();
							
							
							if($datosMin->num_rows == 0){ ?>
								<div class="form-group">
									<label for="lugarOrdenacion">Lugar de Ordenacion:</label>
									<input type="text" class="form-control" name="lugarOrdenacion" value="" id="lugarOrdenacion" required>
								</div>
								<div class="form-group">
									<label for="fechaOrdenacion">fecha de Ordenacion:</label>
									<input type="date" class="form-control" name="fechaOrdenacion" value="" id="fechaOrdenacion" required>
								</div>
								<div class="form-group">
									<label for="parroquiaordenacion">Parroquia de Ordenacion:</label>
									<input type="text" class="form-control" name="parroquiaordenacion" value="" id="parroquiaordenacion" required>
								</div>
							<div class="form-group">
									<label for="parroquiaActual">Parroquia Actual</label>
									<?php $parroquias = ParroquiaController::ListarParroquia(); ?>
									<select class="chosen-select form-control" name="parroquiaActual"  id="form-field-select-3" required="">
										<option value="">Seleciones una Opcion</option>
											<?php
											while ($par = $parroquias->fetch_object()):
												?>
											<option value="<?= $par->id_parroquia ?>"><?= $par->nombre ?></option>;
											<?php endwhile; ?>


									</select>
								</div>
							<div class="form-group">
									<label for="cargo">Cargo:</label>
									<select class="chosen-select form-control" name="cargo"  id="form-field-select-3" required="">
										<option value="">Seleciones una Opcion</option>
										<option value="Vicario">Vicario</option>
										<option value="Parroco">Parroco</option>
									</select>
									
								</div>	
							<?php	?>														
							<?php
							} else {
							while ($dat = $datosMin->fetch_object()) :
								
								?>
								<div class="form-group">
									<label for="lugarOrdenacion">Lugar de Ordenacion:</label>
									<input type="text" class="form-control" name="lugarOrdenacion" value="<?= $dat->lugarOrdenacion ?>" id="lugarOrdenacion" required>
								</div>
								<div class="form-group">
									<label for="fechaOrdenacion">fecha de Ordenacion:</label>
									<input type="date" class="form-control" name="fechaOrdenacion" value="<?= $dat->fechaordenacion ?>" id="fechaOrdenacion" required>
								</div>
								<div class="form-group">
									<label for="parroquiaordenacion">Parroquia de Ordenacion:</label>
									<input type="text" class="form-control" name="parroquiaordenacion" value="<?= $dat->parroquiaOrdenacion ?>" id="parroquiaordenacion" required>
								</div>
								<div class="form-group">
									<label for="parroquiaActual">Parroquia Actual</label>
									<?php $parroquias = ParroquiaController::ListarParroquia(); ?>
									<select class="chosen-select form-control" name="parroquiaActual"  id="form-field-select-3" required="">
										<option value="">Seleciones una Opcion</option>
											<?php
											while ($par = $parroquias->fetch_object()):
												?>
											<option value="<?= $par->id_parroquia ?>"<?= $par->id_parroquia == $dat->parroquiaActual ? 'selected' : ''; ?>><?= $par->nombre ?></option>;
											<?php endwhile; ?>


									</select>
								</div>
								<div class="form-group">
									<label for="cargo">Cargo:</label>
									<select class="chosen-select form-control" name="cargo"  id="form-field-select-3" required="">
										<option value="">Seleciones una Opcion</option>
										<option value="Vicario"<?= "vicario" == $dat->cargo ? 'selected' : ''; ?>>Vicario</option>
										<option value="Parroco"<?= "parroco" == $dat->cargo ? 'selected' : ''; ?>>Parroco</option>
									</select>
									
								</div>	
							<?php endwhile;?>
							<?php }?>
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
</div>
<div id="modal-form-mini" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Datos Ministeriales

					<div class="modal-body">
						<form action="<?= URL_BASE ?>sacerdote/guardardatos" enctype="multipart/form-data" method="POST">
							<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>" />				
							<div class="form-group">
								<label for="lugarOrdenacion">Lugar de Ordenacion:</label>
								<input type="text" class="form-control" name="lugarOrdenacion" id="lugarOrdenacion" required>
							</div>
							<div class="form-group">
								<label for="fechaOrdenacion">fecha de Ordenacion:</label>
								<input type="date" class="form-control" name="fechaOrdenacion" id="fechaOrdenacion" required>
							</div>
							<div class="form-group">
								<label for="parroquiaordenacion">Parroquia de Ordenacion:</label>
								<input type="text" class="form-control" name="parroquiaordenacion" id="parroquiaordenacion" required>
							</div>
							<div class="form-group">
								<label for="parroquiaActual">Parroquia Actual</label>
									<?php $parroquias = ParroquiaController::ListarParroquia(); ?>
								<select class="chosen-select form-control" name="parroquiaActual" id="form-field-select-3" required="">
									<option value="">Seleciones una Opcion</option>
									<?php
									while ($par = $parroquias->fetch_object()) {
										echo '<option value="' . $par->id_parroquia . '">' . $par->nombre . '</option>';
									}
									?>


								</select>
							</div>
							<div class="form-group">
								<label for="cargo">Cargo:</label>
								<input type="text" class="form-control" name="cargo" id="cargo">
							</div>
							<div class="form-group">
								<label for="teologia">Estudio de Teologia:</label>
								<input type="text" class="form-control" name="teologia" id="cargo">
							</div>
							<div class="form-group">
								<label for="filosofia">Estudio Filosofia:</label>
								<input type="text" class="form-control" name="filosofia" id="cargo">
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
</div>



<div id="modal-form-tras" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">TRASLADAR A</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>sacerdote/realizartraslado" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="parroquiaordenacion">Parroquia:</label>
							<?php $parroquias = ParroquiaController::ListarParroquia(); ?>
						<select class="chosen-select form-control" name="parroquiatraslado" id="form-field-select-3" required="">
							<option value="">Seleciones una Opcion</option>
								<?php
								while ($par = $parroquias->fetch_object()) {
									echo '<option value="' . $par->id_parroquia . '">' . $par->nombre . '</option>';
								}
								?>


						</select>
					</div>
					<div class="form-group">
						<label for="parroquiaordenacion">Cargo a realizar:</label>
						
						<select class="chosen-select form-control" name="cargoarealizar" id="form-field-select-3" required="">
							<option value="">Seleciones una Opcion</option>
							<option value="sacerdote">Sacerdote</option>;
							<option value="vicario">Vicario</option>;
						</select>
					</div>									

					<button type="submit" class="btn btn-primary">Trasladar</button>
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