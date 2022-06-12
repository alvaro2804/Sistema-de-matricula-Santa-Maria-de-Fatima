<section class="panel">
	<?php echo form_open(base_url() . 'index.php?admin/student_bulk_add/add_bulk_student' , 
				array('class' => 'form-inline', 'id' => 'summary-form', 'style' => 'text-align:center;'));?>
<div class="panel-body">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<div class="form_group">
				<label class="control-label mb-xs">Clase <span class="required">*</span></label>
				<select name="clase_id" id="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'
					onchange="get_sections(this.value)">
					<option value="">Seleccionar Clase</option>
					<?php
						$classes = $this->db->get('clase')->result_array();
						foreach($classes as $row):
					?>
					<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>

		 <div class="col-md-3">
		  <div class="form_group">
		  <label class="control-label mb-xs">Sección <span class="required">*</span></label>
			<select name="seccion_id" id="seccion_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
				<option value="">Seleccione Primero la Clase</option>
			</select>
		  </div>
		 </div>


	</div>
	<br><br>


	<div id="bulk_add_form">
	<div id="student_entry">
	<div class="row mb-sm">

		<div class="form-group mr-xs">
			<input type="text" name="nombre[]" id="nombre" class="form-control" style="width: 140px"
				placeholder="Nombre" required>
		</div>

		<div class="form-group mr-xs">
			<input type="email" name="email[]" id="email" class="form-control" style="width: 160px"
				placeholder="Email" required>
		</div>

		<div class="form-group mr-xs">
			<input type="password" name="password[]" id="password" class="form-control" style="width: 120px"
				placeholder="Password" required>
		</div>

		<div class="form-group mr-xs">
			<input type="text" name="roll[]" id="roll" class="form-control" style="width: 60px"
				placeholder="Roll">
		</div>
	
		<div class="form-group mr-xs">
			<input type="text" name="telefono[]" id="telefono" class="form-control" style="width: 140px"
				placeholder="Telefono">
		</div>

		<div class="form-group mr-xs">
			<input type="text" name="direccion[]" id="direccion" class="form-control" style="width: 170px"
				placeholder="Dirección">
		</div>

		<div class="form-group mr-xs">
			<select name="sexo[]" id="sexo" class="form-control">
				<option value="">Género</option>
				<option value="masculino">Masculino</option>
				<option value="femenino">Femenino</option>
			</select>
		</div>

		<div class="form-group">
			<button type="button" class="mr-xs btn btn-default" title="Retirar"
					onclick="deleteParentElement(this)" >
        		<i class="fa fa-trash" style="color: #696969;"></i>
        	</button>
		</div>
	</div>
</div>

    <div id="student_entry_append"></div>

</div>
</div>

	<footer class="panel-footer">
		<button type="button" class="mr-xs btn btn-warning" onclick="append_student_entry()">
			<i class="fa fa-plus"></i>Añadir Fila
		</button>
				<button type="submit" class="btn btn-primary" id="submit_button">
			<i class="fa fa-check"></i>Guardar Estudiantes
		</button>							
	</footer>
<?php echo form_close();?>
</section>	



<script type="text/javascript">

	var blank_student_entry ='';
	$(document).ready(function() {
		//$('#bulk_add_form').hide(); 
		blank_student_entry = $('#student_entry').html();

		for ($i = 0; $i<7;$i++) {
			$("#student_entry").append(blank_student_entry);
		}
		
	});

	function get_sections(clase_id) {
		$.ajax( {
			url: '<?php echo base_url();?>index.php?admin/get_class_section/' + clase_id,
			success: function ( response ) {
				jQuery( '#seccion_id' ).html( response );
			}
		} );
	}


	function append_student_entry()
	{
		$("#student_entry_append").append(blank_student_entry);
	}

	// REMOVING INVOICE ENTRY
	function deleteParentElement(n)
	{
		n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
	}

    // CLASS SELECT REQUIRED CHECK
    $( "form" ).submit(function( event ) {

        var receiver = $('#clase_id').val();
        if(receiver == ''){

	new PNotify({
		title: 'Error',
		text: 'Seleccione Primero la Clase',
		shadow: true,
		type: 'error',
		buttons: {
		sticker: false
		}
		});
        event.preventDefault();
        } else {
            return true;
        }  
      
    });

</script>

