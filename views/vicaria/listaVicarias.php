<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					Lista Vicarias
				</li>
			
			</ul>

			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
						<div class="row">
							<div class="col-xs-8">
								<table id="simple-table" class="table  table-bordered table-hover">
									<thead>
										<tr>

											<th class="detail-col">Detalles</th>
											<th>Nombre</th>
											
											<th>Acciones</th>
										</tr>
									</thead>

									<tbody>
										<?php while ($row = $listarVicaria->fetch_object()): ?>
											<tr>


												<td class="center">
													<div class="action-buttons">
														<a href="#" class="green bigger-140 show-details-btn" title="Ver Detalles">
															<i class="ace-icon fa fa-angle-double-down"></i>
															<span class="sr-only">Detalles</span>
														</a>
													</div>
												</td>

												<td>
													<a href="<?= URL_BASE ?>vicarias/detallesvicaria&id=<?= $row->id_vicaria ?>"><?= $row->nombre ?></a>
												</td>
																																					

												<td>
													<div class="hidden-sm hidden-xs btn-group">												
														<a href="<?= URL_BASE ?>vicarias/detallesvicaria&id=<?= $row->id_vicaria ?>">
															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-search-plus bigger-120"></i>
															</button>
														</a>
														
													</div>

													<div class="hidden-md hidden-lg">
														<div class="inline pos-rel">
															<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
															</button>

															<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																<li>
																	<a href="<?= URL_BASE ?>vicarias/detallesvicaria&id=<?= $row->id_vicaria ?>" class="tooltip-info" data-rel="tooltip" title="Ver">
																		<span class="blue">
																			<i class="ace-icon fa fa-search-plus bigger-120"></i>
																		</span>
																	</a>
																</li>																

																
															</ul>
														</div>
													</div>
												</td>
											</tr>

											<tr class="detail-row">
												<td colspan="8">
													<div class="table-detail">
														<div class="row">
															<div class="col-xs-12 col-sm-2">
																<div class="text-center">
																	<img height="150" class="thumbnail inline no-margin-bottom" alt="" src="<?= URL_BASE ?>imagenes/vicarias/iglesia.jpg" />
													
																	<br />
																	<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																		<div class="inline position-relative">
																			<a class="user-title-label" href="<?=URL_BASE?>vicarias/detallesvicaria&id=<?=$row->id_vicaria?>">
																				
																				
																				<span class="white"><?= $row->nombre ?></span>
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
																			<a class="user-title-label" href="<?=URL_BASE?>vicarias/detallesvicaria&id=<?=$row->id_vicaria?>">
																			<span><?= $row->nombre ?></span>
																			</a>
																		</div>
																	</div>

										
																	<div class="profile-info-row">
																		<div class="profile-info-name"> </div>

																		<div class="profile-info-value">																	
																			<span>LISTA DE PARROQUIAS</span>
																		</div>
																	</div>
																	<?php 
																		$listaPar = VicariasController::ParroquiasVicarias($row->id_vicaria); 
																		while ($row1 = $listaPar ->fetch_object()) :
																																					
																		?>
																	<div class="profile-info-row">
																		<div class="profile-info-name"> </div>
																		
																		<div class="profile-info-value">
																			<a class="user-title-label" href="<?=URL_BASE?>parroquia/detalles&id=<?=$row1->id_parroquia?>">
																			<span><?= $row1->nombre ?></span>
																			</a>
																		</div>
																		
																	</div>
																	<?php endwhile;?>
																</div>
															</div>


														</div>
													</div>
												</td>
											</tr>
										<?php endwhile; ?>

									</tbody>
								</table>
							</div>
						</div>
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
	</div>
</div>