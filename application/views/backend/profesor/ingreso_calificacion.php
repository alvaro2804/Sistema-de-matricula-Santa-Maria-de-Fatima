<?php echo form_open(base_url() . 'index.php?profesor/selector_calificacion',array('id' => 'form'));?>
<section class="panel">
  <div class="panel-body">
	<div class="row">

	<div class="col-md-3 mb-sm">
		<div class="form-group">
		<label class="control-label">Examen <span class="required">*</span></label>
			<select name="examen_id" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
				<?php
					$examenes = $this->db->get_where('examen' , array('year' => $running_year))->result_array();
					foreach($examenes as $row):
				?>
				<option value="<?php echo $row['examen_id'];?>"><?php echo $row['nombre'];?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="col-md-3 mb-sm">
		<div class="form-group">
		<label class="control-label">Clase <span class="required">*</span></label>
			<select name="clase_id" class="form-control" onchange="get_clase_tema(this.value)" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
				<option value="">Seleccionar CLase</option>
				<?php
					$clases = $this->db->get('clase')->result_array();
					foreach($clases as $row):
				?>
				<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div id="tema_holder">
		<div class="col-md-3 mb-sm">
			<div class="form-group">
			<label class="control-label">Sección <span class="required">*</span></label>
				<select name="" id="" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
					<option value="">Seleccione Primero la Clase</option>		
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			<label class="control-label">Curso <span class="required">*</span></label>
				<select name="" id="" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
					<option value="">Seleccione Primero la Clase</option>		
				</select>
			</div>
		</div>
	</div>

  </div>
</div>
  
	<footer class="panel-footer">
		<center>
				<button type="submit" class="btn btn-primary">Manejo de Calificaciones</button>
		</center>
	</div>
</section>

<?php echo form_close();?>

<script type="text/javascript">
	function get_clase_tema(clase_id) {
		
		$.ajax({
            url: '<?php echo base_url();?>index.php?profesor/calificacion_get_tema/' + clase_id ,
            success: function(response)
            {
                jQuery('#tema_holder').html(response);
            }
        });

	}
</script>