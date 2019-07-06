<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>seminarista/">Lista Seminarista</a>
				</li>
				<li class="active">Editar</li>
			</ul><!-- /.breadcrumb -->

			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-8">
					<form action="<?=URL_BASE?>seminarista/actualizar" enctype="multipart/form-data" method="POST">
						<?php while ($row = $datosSeminarista-> fetch_object()): ?>			
					<div class="form-group">
						<input type="hidden" value="<?= $row->id_seminarista?>" name="id" />
						<label for="nombre">Nombres:</label>
						<input type="text" class="form-control" name="nombre" value="<?= $row->nombres?>" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="nombre">Apellidos:</label>
						<input type="text" class="form-control" name="apellido" value="<?= $row->apellidos?>" id="apellido" required>
					</div>
					<div class="form-group">
						<label for="fechanacimiento">fecha Nacimiento:</label>
						<input type="date" class="form-control" name="fechanacimiento" value="<?= $row->fecha_nacimiento?>"id="fechanacimiento" required>
					</div>
					<div class="form-group">
						<label for="lugarnacimiento">Lugar de Nacimiento:</label>
						<input type="text" class="form-control"name="lugarnacimiento" value="<?= $row->lugar_nacimiento?>" id="municipio" required>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="number" class="form-control" name="telefono" value="<?= $row->telefono?>" id="telefono">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" value="<?= $row->email?>" id="email">
					</div>					
					<div class="form-group">
						<label for="foto">Foto:</label>
						<input type="hidden" value="<?= $row->foto ?>" name="fotoActual"/>
						<input type="file" class="form-control" name="foto" id="foto">
						<img src="<?= URL_BASE?>imagenes/seminarista/<?= $row->foto ?>" class="img-thumbnail" width="30%"/>
					</div>				
					
					<?php endwhile; ?>
					<button type="submit" class="btn btn-primary">Editar</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>