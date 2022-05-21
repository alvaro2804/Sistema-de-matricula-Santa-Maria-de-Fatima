<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/secciones/create/' , array('class' => 'form-horizontal form-bordered ', 'id' => 'form', 'enctype' => 'multipart/form-data'));?>
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Añadir Nueva Sección
            	</h4>
			
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="field-1" class="col-md-3 control-label">
						Nombre <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="nombre" required title="Valor requerido" value="" autofocus>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Nombre Nick
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="nick_nombre" value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Clase <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<select name="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor requerido">
							<option value="">Seleccionar</option>
							<?php 
									$classes = $this->db->get('clase')->result_array();
									foreach($classes as $row):
										?>
							<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Profesor
					</label>

					<div class="col-md-7">
						<select name="profesor_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value="">Seleccionar</option>
							<?php 
								$teachers = $this->db->get('profesor')->result_array();
								foreach($teachers as $row):
							?>
							<option value="<?php echo $row['profesor_id'];?>"><?php echo $row['nombre'];?></option>
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
							Añadir Sección
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>