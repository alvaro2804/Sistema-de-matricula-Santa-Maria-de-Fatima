<section class="panel">

	<?php echo form_open(base_url() . 'index.php?admin/clase_rutina/create' , array('class' => 'form-horizontal form-bordered', 'id' => 'form'));?>

	<div class="panel-body">
		<div class="col-md-12">

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Clase<span class="required">*</span>
				</label>
				<div class="col-sm-5">
					<select name="clase_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required title="Valor Requerido" class="form-control populate" onchange="return get_clase_seccion_tema(this.value)">
						<option value="">Seleccionar Clase</option>
						<?php $clases = $this->db->get('clase')->result_array();
                         foreach($clases as $row):
                        ?>
						<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>

			<div id="seccion_tema_seleccion_holder"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Día
				</label>
				<div class="col-sm-5">
					<select name="dia" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
						<option value="domingo">Domingo</option>
						<option value="lunes">Lunes</option>
						<option value="martes">Martes</option>
						<option value="miércoles">Miércoles</option>
						<option value="jueves">Jueves</option>
						<option value="viernes">Viernes</option>
						<option value="sábado">Sábado</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">
					Hora de Inicio
				</label>
				<div class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_inicio" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }'>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">
					Hora de Fin
				</label>
				<div class="col-md-5">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_final" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }'>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="panel-footer">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">
					Añadir Rutina de la Clase
				</button>
			</div>
		</div>
	</footer>
	<?php echo form_close();?>
</section>

	<script type="text/javascript">
		function get_clase_seccion_tema( clase_id ) {
			$.ajax( {
				url: '<?php echo base_url();?>index.php?admin/get_clase_seccion_tema/' + clase_id,
				success: function ( response ) {
					jQuery( '#seccion_tema_seleccion_holder' ).html( response );
				}
			} );
		}
	</script>