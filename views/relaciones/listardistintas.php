<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				
				<li class="active">Institulos seculares</li>
			</ul>
			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
				
					<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2">
						<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
						<a href="#modal-form-distintas" role="button" class="blue" data-toggle="modal">
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
									Institulos Seculares
								</h5>							
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-striped table-bordered table-hover">
										<thead class="thin-border-bottom">
											
											<tr>
												<th>
													<i class="ace-icon fa fa-user"></i>
													NOMBRE
												</th>
																									
												<th>Acciones</th>
											</tr>
										</thead>

										<tbody>
											<?php  while ($row2 = $listaDis->fetch_object()):?>
											<tr>
												<td class="">
													<a href="<?=URL_BASE?>relaciones/detallesinst&id=<?=$row2->id_relaciones_distinta?>"><?=$row2->nombreInstituto?></a>
												</td>											

												<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="blue" href="<?=URL_BASE?>relaciones/detallesinst&id=<?=$row2->id_relaciones_distinta?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a>													
													<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
													<a class="red" href="<?=URL_BASE?>relaciones/eliminardist&id=<?=$row2->id_relaciones_distinta?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
													<?php endif; ?>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="<?=URL_BASE?>relaciones/detallesinst&id=<?=$row2->id_relaciones_distinta?>" class="tooltip-info" data-rel="tooltip" title="Ver">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>															
															<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
															<li>
																<a href="<?=URL_BASE?>relaciones/eliminar&id=<?=$row2->id_relaciones_distinta?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
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





<div id="modal-form-distintas" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Registro</h4>
			</div>

			<div class="modal-body">
				<form action="<?=URL_BASE?>relaciones/guardarinstituto" enctype="multipart/form-data" method="POST">
									
					<div class="form-group">
						<label for="nombreInstituto">Nombres del Instituto:</label>
						<input type="text" class="form-control" name="nombreInstituto" id="nombreEntidad" required>
					</div>
					<div class="form-group">
						<label for="fiestapatronal">Fiesta Patronal:</label>
						<input type="text" class="form-control" name="fiestapatronal" id="fiestapatronal" required>
					</div>										
					<div class="form-group">
						<label for="presencia">Presencia en la diocesis:</label>
						<input type="text" class="form-control" name="presencia" id="direccion" required>
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