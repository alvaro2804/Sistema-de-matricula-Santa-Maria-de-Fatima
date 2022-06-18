<div class="row">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<div class="panel-heading">
				<h6 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Formulario de Admisión
            	</h6>
			
			</div>
			<div class="panel-body">

				<?php echo form_open(base_url() . 'index.php?admin/estudiantes/create/' , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Foto
					</label>

					<div class="col-md-6">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
								<img src="uploads/200x200.png" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
							<div>
								<span class="mr-xs btn btn-default btn-file">
								<span class="fileinput-new">Selecciona Imagen</span>
								<span class="fileinput-exists">Cambiar</span>
								<input type="file" name="userfile" accept="image/*">
								</span>
								<a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Eliminar</a>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Nombre<span class="required">*</span>
					</label>
					<div class="col-md-6 ">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-user"></i>
						</span>
							<input type="text" class="form-control" name="nombre" title="Valor requerido" required value="<?=set_value('nombre')?>" autofocus>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Padre
					</label>
					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" name="padres_id" class="form-control populate">
							<option value="">Seleccionar</option>
							<?php  $padres = $this->db->get('padres')->result_array();
							foreach($padres as $row): ?>
							   <option value="<?php echo $row['padres_id'];?>" <?php if (set_value('padres_id') == $row['padres_id']) echo 'selected'; ?>><?php echo $row['nombre'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Clase<span class="required">*</span>
					</label>
					<div class="col-md-6">
						<select name="clase_id" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" class="form-control populate"  required id="clase_id" title="Valor requerido" onchange="return get_class_sections(this.value)">
							<option value="">Seleccionar</option>
							<?php $clases = $this->db->get('clase')->result_array();
								foreach($clases as $row):
							?>
							<option value="<?php echo $row['clase_id'];?>" <?php if (set_value('clase_id') == $row['clase_id']) echo 'selected'; ?>><?php echo $row['nombre'];?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Sección
					</label>
					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="seccion_id" class="form-control populate" id="section_selector_holder">
							<option value="">Seleccione Primero la Clase</option>
									<?php
							         if (set_value('seccion_id') != ''):
										$secciones = $this->db->get_where( 'seccion', array( 'clase_id' => set_value('clase_id') ) )->result_array();
										foreach ( $secciones as $row2 ):
									?>
									<option value="<?php echo $row2['seccion_id'];?>" <?php if(set_value('seccion_id') == $row2[ 'seccion_id']) echo 'selected';?>><?php echo $row2['nombre'];?></option>
									<?php
										endforeach; 
										endif;
									?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Rol de Asignación <span class="required">*</span>
					</label>

					<div class="col-md-6">
						<input type="text" class="form-control" name="roll" required title="Valor requerido" value="<?=set_value('roll')?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Cumpleaños
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
							</span>
						
							<input type="text" class="form-control" name="cumpleanos" value="<?=set_value('cumpleanos')?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Género
					</label>

					<div class="col-md-6">
						<select data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="sexo" class="form-control populate">
							<option value="">Seleccionar</option>
							<option value="masculino" <?php if (set_value('sexo') == 'masculino') echo 'selected'; ?>>Masculino</option>
							<option value="femenino" <?php if (set_value('sexo') == 'femenino') echo 'selected'; ?>>Femenino</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">
						Religión
					</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="religion" value="<?=set_value('religion')?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">
						Grupo Sanguineo
					</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="grupo_sanguineo" value="<?=set_value('grupo_sanguineo')?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Dirección
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-map-marker"></i>
						</span>
						
							<input type="text" class="form-control" name="direccion" value="<?=set_value('direccion')?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Teléfono
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-phone"></i>
						</span>
						
							<input type="text" class="form-control" name="telefono" value="<?=set_value('telefono')?>">
						</div>
					</div>
				</div>

				<div class="form-group <?php if (form_error('email')) echo 'has-error'; ?>">
					<label class="col-sm-3 control-label">
						Email<span class="required">*</span>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-envelope"></i>
						</span>
							<input type="email" class="form-control" name="email" required id="email" value="<?=set_value('email')?>">
						</div>
						<?php echo form_error('email', '<label id="email-error" class="error" for="email">', '</label>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">
						Contraseña <span class="required">*</span>
					</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
						<i class="fa fa-lock"></i>
						</span>
						
							<input type="password" class="form-control" name="password" required title="Valor requerido" value="<?=set_value('password')?>">
						</div>
					</div>
				</div>

				
			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="mr-xs btn btn-primary">
							Añadir Estudiante
						</button>
						<button type="reset" class="btn btn-default">Limpiar</button>
					</div>
				</div>
			</footer>

			<?php echo form_close();?>

		</section>
	</div>
</div>

<script type="text/javascript">
	function get_class_sections( clase_id ) {

		$.ajax( {
			url: '<?php echo base_url();?>index.php?admin/get_class_section/' + clase_id,
			success: function ( response ) {
				jQuery( '#section_selector_holder' ).html( response );
			}
		} );
	}
</script>

