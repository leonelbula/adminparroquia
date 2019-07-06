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
					<a href="<?= URL_BASE ?>parroquia/">

						<button class="btn">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Volver
						</button>

					</a>
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="<?= URL_BASE ?>parroquia/editar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-success">Editar</button>
						</a>
						<a href="<?= URL_BASE ?>parroquia/eliminar&id=<?= $_GET['id'] ?>">
							<button class="btn btn-danger">Eliminar</button>
						</a>				
						<?php endif; ?>
						
					</div>
					<?php while ($inf = $resulParroquia->fetch_object()): ?>
						<div class="table-detail">
							<div class="row">
								<div class="col-xs-12 col-sm-2">
									<div class="text-center">
										<img height="150" class="thumbnail inline no-margin-bottom" alt="" 
										<?php
										if (!empty($inf->foto)) {
											echo 'src="' . URL_BASE . 'imagenes/parroquia/' . $inf->foto . '"';
										} else {
											echo 'src="' . URL_BASE . 'imagenes/parroquia/defaul.jpg"';
										}
										?>  />
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

								<div class="col-xs-6 col-sm-7">
									<div class="space visible-xs"></div>

									<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
											<div class="profile-info-name"> Vicaria </div>

											<div class="profile-info-value">
												<span>
												<?php
												 $id_vicaria= $inf->id_vicaria;
												$datoV = VicariasController::Vicarias($id_vicaria);
												while ($row1 = $datoV ->fetch_object()) {
													echo $row1->nombre;
												}
												?>
												</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Nombre </div>

											<div class="profile-info-value">
												<span><?= $inf->nombre ?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Decreto </div>

											<div class="profile-info-value">
												<span>
														<?php
														if (!empty($inf->decreto)) {
															echo $inf->decreto;
														} else {
															echo 'No registrado';
														}
														?></span>
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
											<div class="profile-info-name">Año de fundación </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->fundada == '') {
														echo 'No registrado';
													} else {
														echo $inf->fundada;
													}
													?>
													</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Extencion </div>

											<div class="profile-info-value">
												<span><?php
													if ($inf->extencion == '') {
														echo 'No registrado';
													} else {
														echo $inf->extencion;
													}
													?>
															</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Limites </div>

											<div class="profile-info-value">
												<span><?php
													if ($inf->limites == '') {
														echo 'No registrado';
													} else {
														echo $inf->limites;
													}
													?>
															
															
													</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Fiestas Patronal </div>

											<div class="profile-info-value">
												<span>
													<?php
													if ($inf->fiestapatronal == '') {
														echo 'No registrado';
													} else {
														echo $inf->fiestapatronal;
													}
													?>
															</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Sacerdote </div>

											<div class="profile-info-value">
												<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->id_sacerdote ?>">
													<?php
													if ($inf->id_sacerdote == '') {
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
										<div class="profile-info-row">
											<div class="profile-info-name">Vicario </div>

											<div class="profile-info-value">
												<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->id_vicario ?>">
													<?php
													if ($inf->id_vicario == '' || $inf->id_vicario == 0) {
														echo 'No registrado';
													} else {
														$id_sacerdote = $inf->id_vicario;
														$vicario = ParroquiaController::SacerdotesParroquia($id_sacerdote);
														while ($sacer = $vicario->fetch_object()) {
															echo $sacer->nombres;
														}
													}
													?>
												</a>	
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Sacerdote Anterior </div>

											<div class="profile-info-value">
												<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->id_sac_anterios ?>">
													<?php
													if ($inf->id_sac_anterios == '') {
														echo 'No registrado';
													} else {
														$id_sacerdote = $inf->id_sac_anterios;
														$vicario = ParroquiaController::SacerdotesParroquia($id_sacerdote);
														while ($sacer = $vicario->fetch_object()) {
															echo $sacer->nombres;
														}
													}
													?>
												</a>	
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Vicario Anterior </div>

											<div class="profile-info-value">
												<a href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $inf->id_vic_anterior ?>">
													<?php
													if ($inf->id_vic_anterior == '' || $inf->id_vic_anterior == 0) {
														echo 'No registrado';
													} else {
														$id_sacerdote = $inf->id_vic_anterior;
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
													<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
													<a href="#modal-form" role="button" class="blue" data-toggle="modal">
															<button class="btn btn-info">Registrar</button>														</a>
													<?php endif; ?>
													<br><br>
												<div class="row">
														<div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
															<b>Consejo Parroquial</b>
														</div>
													</div>

												<div>
													<div class="row">
														<div class="col-xs-12">
															<table id="dynamic-table" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>

																		<th>Nombre del Concejo</th>
																		<th>Encargado</th>
																		<th>Promedio de Edad</th>												


																		<th>Acciones</th>
																	</tr>
																</thead>

																<tbody>	
																	<?php
																	$listaConsejo = ParroquiaController::MostrarConsejo();
																	while ($row = $listaConsejo->fetch_object()):
																		?>
																		<tr>


																			<td>
																			<?= $row->nombreC ?>
																			</td>
																			<td><?= $row->encargadoCons ?></td>

																			<td><?= $row->promedioEdad ?></td>
																			


																			<td>
																				<div class="hidden-sm hidden-xs action-buttons">																				


																					<a class="red" href="<?= URL_BASE ?>parroquia/eliminarconcejo&id=<?= $row->id_conpar ?>&ids=<?= $_GET['id'] ?>">
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
																								<a href="<?= URL_BASE ?>parroquia/eliminarconcejo&id=<?= $row->id_conpar ?>&ids=<?= $_GET['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
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
															
														</div>
													</div>
												</div>



											</div>	
												
												
												
												<div class="col-sm-6">
													<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
													<a href="#modal-form-grupo" role="button" class="blue" data-toggle="modal">
															<button class="btn btn-info">Registrar</button>														</a>
													<?php endif; ?>
													<br><br>
												<div class="row">
														<div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
															<b>Grupos Parroquiales</b>
														</div>
													</div>

												<div>
													<div class="row">
														<div class="col-xs-12">
															<table id="dynamic-table2" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>

																		<th>Nombre del Concejo</th>
																		<th>Encargado</th>
																		<th>Promedio de Edad</th>																


																		<th>Acciones</th>
																	</tr>
																</thead>

																<tbody>	
																	<?php
																	$listaGrupo= ParroquiaController::MostrarGrupoParroquial();
																	while ($row = $listaGrupo->fetch_object()):
																		?>
																		<tr>


																			<td>
																			<?= $row->nombreGrupo ?>
																			</td>
																			<td><?= $row->encargadoGrupo ?></td>

																			<td><?= $row->proEdadGrupo ?></td>
																			


																			<td>
																				<div class="hidden-sm hidden-xs action-buttons">																				


																					<a class="red" href="<?= URL_BASE ?>parroquia/eliminargrupop&id=<?= $row->id_grupo ?>&ids=<?= $_GET['id'] ?>">
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
																								<a href="<?= URL_BASE ?>parroquia/eliminargrupoPp&id=<?= $row->id_grupo ?>&ids=<?= $_GET['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
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
															
														</div>
													</div>
												</div>



											</div>
											

											
											</div><!-- /.col -->
										</div><!-- /.row -->

										<div class="space"></div>

										<div>
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
																		<th>Sacerdote</th>
																		<th>Cargo</th>											
																		
																	</tr>
																</thead>

																<tbody>	
																	<?php
																	$listaHistoria = ParroquiaController::MostrarHistorialParroquia();
																	
																	while ($rowH = $listaHistoria->fetch_object()):
																		?>
																		<tr>

																			<td><?= $rowH->hasta ?></td>
																			<td>
																				<?= $rowH->id_sacerdote ?>
																			</td>
																			<td><?= $rowH->cargo ?></td>
																																						
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
																	$observaciones = ParroquiaController::MostrarObservaciones();

																	while ($obs = $observaciones->fetch_object()):
																		?>
																		<div class="body">
																			<div class="time">
																				<i class="ace-icon fa fa-clock-o"></i>
																				<span class="green"><?= $obs->fecha ?></span>
																			</div>

																			<div class="text"><?= $obs->observacion ?>.</div>

																			<div class="tools">
																				<a href="<?= URL_BASE ?>parroquia/eliminarobservacion&id=<?= $obs->id_observ_parroquia ?>&idp=<?= $_GET['id'] ?>" class="btn btn-minier btn-info">
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

															<form action="<?= URL_BASE ?>parroquia/guardarobservacion" method="POST">
																<div class="form-actions">
																	<div class="input-group">
																		<input type="hidden" name="id_parroquia" value="<?= $_GET['id'] ?>"/>																		
																		<textarea rows="4" cols="50" class="form-control"  name="observacion"  placeholder="Escriba la observacion ..."></textarea>
																		<span class="input-group-btn">
																			<button class="btn btn-sm btn-info no-radius" type="submit">
																				<i class="ace-icon fa fa-share"></i>
																				Agregar
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
										</div>

										<div class="hr hr8 hr-double hr-dotted"></div>



										<div class="space-6"></div>

									</div>
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
				<h4 class="blue bigger">NUEVO CONCEJO</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>parroquia/guardarconcejo" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_parroquia" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="encargado">Enacargado:</label>
						<input type="text" class="form-control" name="encargado" id="encargado" required>
					</div>
					<div class="form-group">
						<label for="promEdad">Promedio Edad:</label>
						<input type="text" class="form-control"name="promEdad" id="promEdad" required>
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
				<h4 class="blue bigger">Nuevo Grupo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>parroquia/guardargrupo" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_parroquia" value="<?= $_GET['id'] ?>"/>					
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" name="nombreGrupo" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="direccion">Enacargado:</label>
						<input type="text" class="form-control" name="encargadoGrupo" id="direccion" required>
					</div>
					<div class="form-group">
						<label for="municipio">Promedio Edad:</label>
						<input type="text" class="form-control"name="promEdadGrupo" id="municipio" required>
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

<div id="modal-form-editconsejo" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Editar Consejo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>parroquia/editarconcejo" enctype="multipart/form-data" method="POST">
					<?php
					$datosConsejo = ParroquiaController::MostrarConsejo();
					while ($edit = $datosConsejo->fetch_object()):
						?>
						<input type="hidden" name="id_parroquia" value="<?= $_GET['id'] ?>"/>	
						<input type="hidden" name="id_consejo" value="<?= $edit->id_conpar ?>"/>					
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input type="text" class="form-control" name="nombre" value="<?= $edit->nombreC ?>" id="nombre" required>
						</div>
						<div class="form-group">
							<label for="encargado">Enacargado:</label>
							<input type="text" class="form-control" name="encargado" value="<?= $edit->encargadoCons ?>" id="encargado" required>
						</div>
						<div class="form-group">
							<label for="promEdad">Promedio Edad:</label>
							<input type="text" class="form-control"name="promEdad" value="<?= $edit->promedioEdad ?>" id="promEdad" required>
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

<div id="modal-form-editargrupo" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Editar Grupo</h4>
			</div>

			<div class="modal-body">
				<form action="<?= URL_BASE ?>parroquia/editargrupo" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id_parroquia" value="<?= $_GET['id'] ?>"/>
					<?php
					$datosGrupos = ParroquiaController::MostrarGrupoParroquial();
					while ($edit = $datosGrupos->fetch_object()):
						?>
						<input type="hidden" name="id_grupo" value="<?= $edit->id_grupo ?>"/>
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input type="text" class="form-control" name="nombreGrupo" value="<?= $edit->nombreGrupo ?>" id="nombre" required>
						</div>
						<div class="form-group">
							<label for="direccion">Enacargado:</label>
							<input type="text" class="form-control" name="encargadoGrupo" value="<?= $edit->encargadoGrupo ?>" id="direccion" required>
						</div>
						<div class="form-group">
							<label for="municipio">Promedio Edad:</label>
							<input type="text" class="form-control"name="promEdadGrupo" value="<?= $edit->proEdadGrupo ?>" id="municipio" required>
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
<div id="modal-form-consgrup" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Lista de Consejo</h4>
			</div>

			<div class="modal-body">
				<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
					<b>Consejos</b>
				</div><br>
				<ul class="list-unstyled spaced">


					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Nombre Consejo : 
					</li>

					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Encargado : 
					</li>

					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Promedio de Edad : 
					</li>



				</ul>

				<hr>


				<hr>
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
<div id="modal-form-lisgrupo" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Lista de Grupos</h4>
			</div>

			<div class="modal-body">
				<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
					<b>Grupos</b>
				</div><br>
				<ul class="list-unstyled spaced">


					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Nombre Consejo : 
					</li>

					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Encargado : 
					</li>

					<li>
						<i class="ace-icon fa fa-caret-right blue"></i>Promedio de Edad : 
					</li>



				</ul>

				<hr>


				<hr>
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