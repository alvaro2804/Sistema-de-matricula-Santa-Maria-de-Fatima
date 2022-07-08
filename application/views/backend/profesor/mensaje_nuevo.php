<div class="mailbox-email-header mb-lg">
		<h3 class="mailbox-email-subject m-none text-weight-light">
			Escribir Nuevo Mensaje
		</h3>
	</div>
<?php echo form_open(base_url() . 'index.php?profesor/mensaje/enviar_nuevo/', array( 'id' => 'form', 'enctype' => 'multipart/form-data')); ?>
	<div class="panel">
	
		<div class="panel-heading">
			<h4 class="panel-title"> 
			 <i class="fa fa-envelope-o mr-xs"></i>
			</h4>
		</div>

		<div class="panel-body">
		
		<div class="form-group">
		<div class="row">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				Recipiente <span class="required">*</span>
			</label>
		</div>

		<div class="compose">
			<select class="form-control" data-plugin-selectTwo data-width="100%" name="receptor" required>
				<option value="">
					Seleccione Usuario
				</option>
				<optgroup label="Administradores">
                <?php
                $admins = $this->db->get('admin')->result_array();
                foreach ($admins as $row):
                    ?>

                    <option value="admin-<?php echo $row['admin_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
           		 </optgroup>
				<optgroup label="Estudiantes">
					<?php
					$estudiantes= $this->db->get( 'estudiante' )->result_array();
					foreach ( $estudiantes as $row ):
						?>

					<option value="estudiante-<?php echo $row['estudiante_id']; ?>">- <?php echo $row['nombre']; ?></option>

					<?php endforeach; ?>
				</optgroup>
				<optgroup label="Profesores">
					<?php
					$profesores = $this->db->get( 'profesor' )->result_array();
					foreach ( $profesores as $row ):
						?>

					<option value="profesor-<?php echo $row['profesor_id']; ?>">- <?php echo $row['nombre']; ?></option>

					<?php endforeach; ?>
				</optgroup>
				<optgroup label="Padres">
					<?php
					$padres = $this->db->get( 'padres' )->result_array();
					foreach ( $padres as $row ):
						?>

					<option value="padres-<?php echo $row['padres_id']; ?>">- <?php echo $row['nombre']; ?></option>

					<?php endforeach; ?>
				</optgroup>
			</select>
		</div>
	</div>
		
		
			<div class="compose">
				<textarea name="mensaje" class="form-control" placeholder="Escribir tu Mensaje" required title="Valor Requerido" aria-required="true" rows="10" style="height: 320px;"></textarea>
			</div>
		</div>

		<div class="panel-footer">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-send mr-xs"></i>
					<span>Enviar Mensaje</span>
				</button>
			</div>
		</div>
		</form>
	</div>					
