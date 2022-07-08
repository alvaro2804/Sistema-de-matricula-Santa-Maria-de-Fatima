<div class="row appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
	<?php 
		foreach($edit_data as $row):
	?>

	<div class="col-md-4">
		<section class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img src="<?php echo $this->crud_model->get_image_url('profesor' , $row['profesor_id']);?>" class="rounded img-responsive">
					<div class="thumb-info-title">
						<span class="thumb-info-inner">
							<?php echo $row['nombre'];?>
						</span>
						<span class="thumb-info-type">
							<?php echo $this->session->userdata('login_type'); ?>
						</span>
					</div>
				</div>

				<div class="widget-toggle-expand mb-md">
					<div class="widget-content-expanded">
						<ul class="simple-todo-list">
							<li class="mb-xs" ><i class="fa fa-user mr-xs"></i>
								<?php echo $row['nombre'] ; ?>
							</li>
							<li class="mb-xs"><i class="fa fa-envelope mr-xs"></i>
								<?php echo $row['email'] ; ?>
							</li>
							<li class="mb-xs"><i class="fa fa-map-marker mr-xs"></i>
								<?php echo $row['direccion'];?>
							</li>
							<li class="mb-xs"><i class="glyphicon glyphicon-phone-alt mr-xs"></i>
								<?php echo $row['telefono'];?>
							</li>							
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="col-md-8">
		<div class="tabs">
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#edit" data-toggle="tab"><i class="fa fa-user"></i>Información Personal</a>
				</li>
			</ul>
			<div class="tab-content">

				<div id="edit" class="tab-pane active">

					<?php echo form_open(base_url() . 'index.php?profesor/profesor_perfil/actualizar_perfil_info' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
					<h4 class="mb-xlg">Información Personal</h4>
					<fieldset class="mb-xl">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								Foto
							</label>

							<div class="col-md-8">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
										<img src="<?php echo $this->crud_model->get_image_url('profesor' , $row['profesor_id']);?>" alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
									<div>
										<span class="mr-xs btn btn-xs btn-default btn-file">
											<span class="fileinput-new">Seleccionar Imagen</span>
									
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
								<input type="text" class="form-control" required name="nombre" value="<?php echo $row['nombre'];?>"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Email
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="email" value="<?php echo $row['email'];?>"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Teléfono
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="telefono" value="<?php echo $row['telefono'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Dirección
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" required name="direccion" value="<?php echo $row['direccion'];?>"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Cumpleaños
							</label>
							<div class="col-md-8">
								<input type="text" class="form-control" data-plugin-datepicker data-plugin-datepicker data-plugin-options='{ "startView": 2 }' name="cumpleanos" value="<?php echo $row['cumpleanos'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Género
							</label>
							<div class="col-md-8">
								<select name="sexo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
								  <option value="">Seleccionar</option>
								  <option value="masculino" <?php if($row['sexo'] == 'masculino')echo 'selected';?>>Masculino</option>
								  <option value="femenino"<?php if($row['sexo'] == 'femenino')echo 'selected';?>>Femenino</option>
							  </select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									Actualizar Datos del Perfil
								</button>
							</div>
						</div>

					</fieldset>
					</form>
					
					<hr class="dotted tall">

					<?php echo form_open(base_url() . 'index.php?profesor/profesor_perfil/cambiar_password' , array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
					<h4 class="mb-xlg">
						Cambiar la Contraseña
					</h4>
					<fieldset class="mb-xl">
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Contraseña Actual <span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="Valor Requerido" name="password" value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Nueva Contraseña <span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="Valor Requerido" name="nuevo_password" value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Confirmar Nueva Contraseña
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" required title="Valor Requerido" name="confirm_nuevo_password" value=""/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									Cambiar la Contraseña
								</button>
							</div>
						</div>

						</form>
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