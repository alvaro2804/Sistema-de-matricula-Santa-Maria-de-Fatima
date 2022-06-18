<div class="row">
	<div class="col-md-12">
		<section class="panel">
		
			<?php echo form_open(base_url() . 'index.php?admin/profesor/create/' , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>
			
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Añadir Profesor
            	</h4>
			</div>
					
			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						Nombre<span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="nombre" required title="Valor requerido" value="" autofocus>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Cumpleaños
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="cumpleanos" value="" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Sexo
					</label>

					<div class="col-md-7">
						<select name="sexo" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control populate">
							<option value="">Seleccionar</option>
							<option value="masculino">Masculino</option>
							<option value="femenino">Femenino</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Dirección
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="direccion" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Teléfono
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="telefono" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Email <span class="required">*</span>
					</label>
					<div class="col-md-7">
						<input type="email" class="form-control" name="email" required value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Contraseña<span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="password" class="form-control" name="password" required title="Valor requerido" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Foto
					</label>

					<div class="col-md-7">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								<img src="uploads/200x200.png" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="btn btn-xs btn-default btn-file">
										<span class="fileinput-new">Selecciona Imagen</span>
							
								<span class="fileinput-exists">Cambiar</span>
								<input type="file" name="userfile" accept="image/*">
								</span>
								<a href="#" class="btn btn-xs btn-warning fileinput-exists" data-dismiss="fileinput">Eliminar</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<footer class="panel-footer">
					<div class="col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							Añadir Profesor
						</button>
					</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>