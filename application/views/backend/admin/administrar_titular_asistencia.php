<div class="col-md-4">
	<div class="form-group">
	<label class="control-label">Sección <span class="required">*</span></label>
		<select name="seccion_id" id="section_id" required title="Valor Requerido" class="form-control mb-sm" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%">
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