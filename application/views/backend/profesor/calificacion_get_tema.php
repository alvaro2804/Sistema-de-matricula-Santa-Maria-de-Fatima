<div class="col-md-3 mb-sm">
	<div class="form-group">
	<label class="control-label" >Sección<span class="required">*</span></label>
		<select name="seccion_id" id="section_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
			<?php 
				$secciones = $this->db->get_where('seccion' , array(
					'clase_id' => $clase_id 
				))->result_array();
				foreach($secciones as $row):
			?>
			<option value="<?php echo $row['seccion_id'];?>"><?php echo $row['nombre'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<div class="col-md-3 mb-sm">
	<div class="form-group">
	<label class="control-label">Tema <span class="required">*</span></label>
		<select name="tema_id" id="subject_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
			<?php 
				$temas = $this->db->get_where('tema' , array(
					'clase_id' => $clase_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
				))->result_array();
				foreach($temas as $row):
			?>
			<option value="<?php echo $row['tema_id'];?>"><?php echo $row['nombre'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

	if ( $.isFunction($.fn[ 'select2' ]) ) {

		$(function() {
			$('[data-plugin-selectTwo]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSelect2(opts);
			});
		});

	}
   
    });
    
</script>