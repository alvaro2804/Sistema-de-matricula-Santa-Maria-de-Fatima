<div class="row appear-animation fadeInRight" data-appear-animation="fadeInRight">
<?php
$edit_data = $this->db->get_where( 'inscribirse', array(
	'estudiante_id' => $estudiante_id, 'year' => $this->db->get_where( 'settings', array( 'type' => 'running_year' ) )->row()->description
) )->result_array();
foreach ( $edit_data as $row ):
?>

	<div class="col-md-4">
		<section class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img src="<?php echo $this->crud_model->get_image_url('estudiante' , $row['estudiante_id']);?>" class="rounded img-responsive">
					<div class="thumb-info-title">
						<span class="thumb-info-inner">
							<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?>
						</span>
						<span class="thumb-info-type">
							Estudiante
						</span>
					</div>
				</div>

				<div class="widget-toggle-expand mb-md">
					<div class="widget-content-expanded">
					
						<div class="table-responsive">
							<table class="table table-striped table-condensed mb-none">

							<?php if($row['clase_id'] != ''):?>
							<tr>
								<td>Clase</td>
								<td align="right"><?php echo $this->crud_model->get_class_name($row['clase_id']);?></td>
							</tr>
							<?php endif;?>

							<?php if($row['seccion_id'] != '' && $row['seccion_id'] != 0):?>
							<tr>
								<td>Sección</td>
								<td align="right"><?php echo $this->db->get_where('seccion' , array('seccion_id' => $row['seccion_id']))->row()->nombre;?></td>
							</tr>
							<?php endif;?>

							<?php if($row['roll'] != ''):?>
							<tr>
								<td>Roll</td>
								<td align="right"><?php echo $row['roll'];?></td>
							</tr>
							<?php endif;?>
							<tr>
								<td>Cumpleaños</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->cumpleanos;?></td>
							</tr>
							<tr>
								<td>Género</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->sexo;?></td>
							</tr>
							<tr>
								<td>Religión</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->religion;?></td>
							</tr>
							<tr>
								<td>Grupo Sanguineo</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->grupo_sanguineo;?></td>
							</tr>
							<tr>
								<td>Teléfono</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->telefono;?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->email;?></td>
							</tr>
							<tr>
								<td>Dirección</td>
								<td align="right"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->direccion;?></td>
							</tr>
							<tr>
							<td>Padres</td>
							<td align="right">
								<?php $padres_id = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
								echo $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->nombre; ?>
						   </td>
							</tr>
							<tr>
								<td>Teléfono de los Padres</td>
								<td align="right"><?php echo $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->telefono;?></td>
							</tr> 
						</table>
					</div>	
					
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="col-md-8">
		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#edit" data-toggle="tab"><i class="fa fa-user"></i> Administrar Perfil</a>
				</li>
				<li>
					<a href="#resetpass" data-toggle="tab"><i class="fa fa-lock"></i>Cambiar la Contraseña</a>
				</li>
			</ul>
			
			<div class="tab-content">
				<div id="edit" class="tab-pane active">
				   <?php echo form_open(base_url() . 'index.php?admin/estudiantes/actualizar/'.$row['estudiante_id'].'/'.$row['clase_id'], array('class' => 'form-wizard form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>
					<fieldset class="mb-xl mt-lg">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								Foto
							</label>

							<div class="col-md-8">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('estudiante' , $row['estudiante_id']);?>" alt="...">
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

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Nombre
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="nombre" required title="Valor requerido" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Clase
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="clase" disabled value="<?php echo $this->db->get_where('clase' , array('clase_id' => $row['clase_id']))->row()->nombre; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Sección
							</label>
							<div class="col-md-8">
								<select name="seccion_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
									<option value="">Seleccionar Sección</option>
									<?php
										$secciones = $this->db->get_where( 'seccion', array( 'clase_id' => $row[ 'clase_id' ] ) )->result_array();
										foreach ( $secciones as $row2 ):
									?>
									<option value="<?php echo $row2['seccion_id'];?>" <?php if($row[ 'seccion_id'] == $row2[ 'seccion_id']) echo 'selected';?>><?php echo $row2['nombre'];?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Roll
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="roll" value="<?php echo $row['roll'];?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Padre
							</label>
							<div class="col-md-8">
								<select name="padres_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor requerido">
									<option value="">Seleccionar</option>
									<?php 
									$padres = $this->db->get('padres')->result_array();
									$padres_id = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
									foreach($padres as $row3):
										?>
									<option value="<?php echo $row3['padres_id'];?>" <?php if($row3[ 'padres_id'] == $padres_id)echo 'selected';?>><?php echo $row3['nombre'];?></option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Cumpleaños
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="cumpleanos" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->cumpleanos; ?>" data-plugin-datepicker data-plugin-options='{ "startView": 2 }'>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Género
							</label>
							<div class="col-md-8">
								<select name="sexo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
									<?php
									$genero = $this->db->get_where( 'estudiante', array( 'estudiante_id' => $row[ 'estudiante_id' ] ) )->row()->sexo;
									?>
									<option value="">Seleccionar</option>
									<option value="masculino" <?php if($genero=='masculino' )echo 'selected';?>>Masculino</option>
									<option value="femenino" <?php if($genero=='femenino' )echo 'selected';?>>Femenino</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Religión
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="religion" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->religion; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Grupo Sanguineo
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="grupo_sanguineo" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->grupo_sanguineo; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Dirección
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="direccion" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->direccion; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Teléfono
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="telefono" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->telefono; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Email
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="email" value="<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->email; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									Editar Alumno
								</button>
							</div>
						</div>

					</fieldset>
					</form>
				</div>
            
	            <div id="resetpass" class="tab-pane">
					<?php echo form_open(base_url() . 'index.php?admin/estudiantes/cambiar_password/'.$row['estudiante_id'].'/'.$row['clase_id'] , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
						<fieldset class="mb-xl mt-lg">
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Nueva Contraseña <span class="required">*</span>
								</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="new_password"  required title = "Valor requerido" value=""/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">
									Confirmar Nueva Contraseña<span class="required">*</span>
								</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="confirm_new_password"  required title = "Confirmar nueva contraseña" value=""/>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-primary">
										Actualizar Contraseña
									</button>
								</div>
							</div>
						</fieldset>
					</form>
	            </div>
			</div>
		</div>
	</div>

	<?php
	endforeach;
	?>
</div>