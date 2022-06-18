<div class="row">
	<div class="col-md-12">
		<section class="panel">

			<?php echo form_open(base_url() . 'index.php?admin/tema/create' , array('class' => 'form-horizontal form-bordered validate'));?>

			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Añadir Tema / Asignaturas
            	</h4>
			</div>
			<div class="panel-body">
				
					<div class="form-group">
						<label class="col-md-3 control-label">
							Nombre <span class="required">*</span>
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="nombre" required title="Valor Requerido"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Clase<span class="required">*</span>
						</label>
						<div class="col-md-7">
							<select name="clase_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control populate" required>
								<?php  $clases = $this->db->get('clase')->result_array();
								  foreach($clases as $row):
								?>
								<option value="<?php echo $row['clase_id'];?>" <?php if($row[ 'clase_id'] == $clase_id) echo 'selected';?>><?php echo $row['nombre'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Profesor
						</label>
						<div class="col-md-7">
							<select name="profesor_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control populate">
								<option value="">Seleccione Profesor</option>
								  <?php $profesores = $this->db->get('profesor')->result_array();
								    foreach($profesores as $row):
								  ?>
								<option value="<?php echo $row['profesor_id'];?>"><?php echo $row['nombre'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							Añadir Tema
						</button>
					</div>
				</div>
			</footer>
			</form>
		</section>
	</div>
</div>