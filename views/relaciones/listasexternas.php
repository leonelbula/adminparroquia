<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				
				<li class="active">Lista de Relaciones Externas</li>
			</ul>
			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2">
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="#modal-form-externas" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info" type="button">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Registrar
							</button>
							</a>
						<?php endif; ?>
						<div class="widget-box widget-color-blue" id="widget-box-2">
							
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">
									<i class="ace-icon fa fa-table"></i>
									Relaciones Externas
								</h5>							
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-striped table-bordered table-hover">
										<thead class="thin-border-bottom">
											<tr>
												<th>
													<i class="ace-icon fa fa-user"></i>
													Entidad
												</th>

												<th>													
													Encargado
												</th>
												
												<th class="hidden-480">Status</th>
											</tr>
										</thead>

										<tbody>
											<?php while ($row1 = $listaExt->fetch_object()): ?>
											<tr>
												<td class="">
													<a href="<?=URL_BASE?>relaciones/detallesext&id=<?=$row1->id_relaciones_externas?>"><?=$row1->nombreEntidad?></a>
												</td>

												<td>
													<?=$row1->encargadoEntidad?>
												</td>
												

												<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="blue" href="<?=URL_BASE?>relaciones/detallesext&id=<?=$row1->id_relaciones_externas?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a>													

													<a class="red" href="<?=URL_BASE?>relaciones/eliminarest&id=<?=$row1->id_relaciones_externas?>">
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
																<a href="<?=URL_BASE?>relaciones/detallesext&id=<?=$row->id_relaciones_externas?>" class="tooltip-info" data-rel="tooltip" title="Ver">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>															

															<li>
																<a href="<?=URL_BASE?>relaciones/eliminar&id=<?=$row->id_relaciones_externas?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
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

					
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
	</div>
</div>


<div id="modal-form-externas" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Registro</h4>
			</div>

			<div class="modal-body">
				<form action="<?=URL_BASE?>relaciones/guardarexternas" enctype="multipart/form-data" method="POST">
									
					<div class="form-group">
						<label for="nombreEntidad">Nombres de la Entidad:</label>
						<input type="text" class="form-control" name="nombreEntidad" id="nombreEntidad" required>
					</div>
					<div class="form-group">
						<label for="encargadoEntidad">Encargado de la Entidad:</label>
						<input type="text" class="form-control" name="encargadoEntidad" id="encargadoEntidad" required>
					</div>									
					<div class="form-group">
						<label for="direccion">Direccion:</label>
						<input type="text" class="form-control" name="direccion" id="direccion" required>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="number" class="form-control" name="telefono" id="telefono" required>
					</div>
					<div class="form-group">
						<label for="contrato">Contrato:</label>
						<input type="file" class="form-control" name="contrato" id="contrato" required>
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
