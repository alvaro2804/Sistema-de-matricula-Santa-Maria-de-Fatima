<?php
$edit_data = $this->db->get_where( 'profesor', array( 'profesor_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
	?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			
				<?php echo form_open(base_url() . 'index.php?admin/profesor/actualizar/'.$row['profesor_id'] , array('class' => 'form-horizontal form-bordered','target'=>'_top', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>
				
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					Editar Profesor
            	</h4>
				
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="field-1" class="col-md-3 control-label">
							Foto
						</label>

						<div class="col-md-7">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('profesor' , $row['profesor_id']);?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-xs btn-default btn-file">
                                    <span class="fileinput-new">Selecciona imagen</span>
									<span class="fileinput-exists">Cambiar</span>
									<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-warning fileinput-exists" data-dismiss="fileinput">Eliminar</a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">
							Nombre
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" required name="nombre" value="<?php echo $row['nombre'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							Cumpleaños
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="cumpleanos" data-plugin-datepicker data-plugin-options='{ "startView": 2 }' value="<?php echo $row['cumpleanos'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							Sexo
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="sexo" class="form-control populate">
							    <option value="masculino" <?php if($row[ 'sexo']=='' )echo 'selected';?>>Selecciona</option>
								<option value="femenino" <?php if($row[ 'sexo']=='masculino' )echo 'selected';?>>Masculinno
								<option value="femenino" <?php if($row[ 'sexo']=='femenino' )echo 'selected';?>>Femenino</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							Dirección
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							Teléfono
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono'];?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">
							Email
						</label>
						<div class="col-md-7">
							<input type="email" required class="form-control" required name="email" value="<?php echo $row['email'];?>"/>
						</div>
					</div>

				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary">
								Editar Profesor
							</button>
						</div>
					</div>
				</footer>
				<?php echo form_close();?>
			</section>
		</div>
	</div>

<?php
endforeach;
?>