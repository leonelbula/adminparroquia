<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>sacerdote/">Lista de Sacerdote</a>
				</li>
				<li class="active">Editar</li>
			</ul><!-- /.breadcrumb -->
			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					
					
					<h3 class="header smaller lighter blue">Editar Sacerdote</h3>
					<a href="<?= URL_BASE ?>sacerdote/">
						<button class="btn btn-info" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Cancelar
						</button>
					</a>
						
					<br><br>
					<!-- PAGE CONTENT BEGINS -->
					<div class="col-sm-6">
						<div class="row">
							<form action="<?= URL_BASE ?>sacerdote/actualizar" enctype="multipart/form-data" method="POST">
								<?php 
								while ($row = $datosSacerdote-> fetch_object()):
									
								?>
								<div class="form-group">
									<input type="hidden" name="id_sacerdote" value="<?= $_GET['id'] ?>" />
									<label for="nombre">Nombres:</label>
									<input type="text" class="form-control" name="nombre" value="<?= $row->nombres?> " id="nombre" required>
								</div>
								<div class="form-group">
									<label for="nombre">Apellidos:</label>
									<input type="text" class="form-control" name="apellido" value="<?= $row->apellidos?>" id="apellido" required>
								</div>
								<div class="form-group">
									<label for="fechanacimiento">fecha Nacimiento:</label>
									<input type="date" class="form-control" name="fechanacimiento" value="<?= $row->fechanacimiento?>" id="fechanacimiento" required>
								</div>
								<div class="form-group">
									<label for="lugarnacimiento">Lugar de Nacimiento:</label>
									<input type="text" class="form-control"name="lugarnacimiento" value="<?= $row->lugarnacimiento?>" id="municipio" required>
								</div>
								<div class="form-group">
									<label for="telefono">Telefono:</label>
									<input type="number" class="form-control" name="telefono"  value="<?= $row->telefono?>" id="telefono">
								</div>
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" class="form-control" name="email" value="<?= $row->email?>" id="email">
								</div>					
								<div class="form-group">
									<label for="foto">Foto:</label>
									<input type="file" class="form-control" name="foto" id="foto">
									<input type="hidden" name="fotoActual" value="<?= $row->foto?>"/>
									<img id="avatar" class="editable img-responsive" alt="<?= $row->nombres?>" src="<?php if($row->foto){echo URL_BASE.'imagenes/parroco/'.$row->foto;}else {echo URL_BASE.'assets/images/avatars/profile-pic.jpg';}  ?>" />
								</div>					
								<?php endwhile; ?>
								<button type="submit" class="btn btn-primary">Editar</button>
							</form>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
	</div>
</div>