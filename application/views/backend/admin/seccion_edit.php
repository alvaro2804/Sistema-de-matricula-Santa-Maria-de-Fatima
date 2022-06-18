<?php 
	$edit_data = $this->db->get_where('seccion' , array(
		'seccion_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">

			<?php echo form_open(base_url() . 'index.php?admin/secciones/edit/' . $row['seccion_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>

			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					Añadir Nueva Sección
            	</h4>
			
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label">
						Nombre
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="nombre" required title="Valor requerido" value="<?php echo $row['nombre'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						Nombre Nick
					</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="nick_nombre" value="<?php echo $row['nick_nombre'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						Clase
					</label>

					<div class="col-sm-5">
						<select name="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor requerido">
							<option value="">
								Seleccionar
							</option>
							<?php 
									$clases = $this->db->get('clase')->result_array();
									foreach($clases as $row2):
										?>
							<option value="<?php echo $row2['clase_id'];?>" <?php if ($row[ 'clase_id'] == $row2[ 'clase_id']) echo 'selected';?>>
								<?php echo $row2['nombre'];?>
							</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">
						Profesor
					</label>

					<div class="col-sm-5">
						<select name="profesor_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value="">Seleccionar</option>
							<?php 
								$profesores = $this->db->get('profesor')->result_array();
								foreach($profesores as $row3):
							?>
							<option value="<?php echo $row3['profesor_id'];?>" <?php if ($row[ 'profesor_id'] == $row3[ 'profesor_id']) echo 'selected';?>><?php echo $row3['nombre'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							Actualizar
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>
<?php endforeach;?>