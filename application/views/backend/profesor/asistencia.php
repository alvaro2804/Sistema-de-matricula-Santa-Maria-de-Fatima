<?php echo form_open(base_url() . 'index.php?profesor/seleccionador_asistencia/');?>
<section class="panel">

	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						Clase <span class="required">*</span>
					</label>
					<select name="clase_id" class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required title="Valor Requerido" onchange="select_seccion(this.value)">
						<option value="">Seleccionar Clase</option>
						<?php
						$clases = $this->db->get( 'clase' )->result_array();
						foreach ( $clases as $row ):
						?>
						<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div id="section_holder">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label ">
							Sección<span class="required">*</span>
						</label>
						<select class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="seccion_id" id="section_selector_holder">
							<option value="">Seleccione Primero la Clase</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						Fecha <span class="required">*</span>
					</label>
					<input type="text" class="form-control mb-sm" data-plugin-datepicker name="timestamp" data-plugin-options='{ "format": "dd-mm-yyyy"}' value="<?php echo date(" d-m-Y ");?>"/>
				</div>
			</div>

			<input type="hidden" name="year" value="<?php echo $running_year;?>">

		</div>
	</div>

	<div class="panel-footer">
		<center>
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary">
				Manejo de Asistencia
			</button>
		</center>
	</div>

</section>
<?php echo form_close();?>

<script type="text/javascript">
	function select_seccion( clase_id ) {

		$.ajax( {
			url: '<?php echo base_url(); ?>index.php?profesor/get_seccion/' + clase_id,
			success: function ( response ) {
				jQuery( '#section_holder' ).html( response );
			}
		} );
	}
</script>