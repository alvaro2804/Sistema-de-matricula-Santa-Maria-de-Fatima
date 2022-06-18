<?php 
$edit_data = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $param2) )->result_array();
?>
<section class="panel">

 <?php foreach($edit_data as $row):?>
   <?php echo form_open(base_url() . 'index.php?admin/clase_rutina/actualizar/'.$row['clase_rutina_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form'));?>

 <header class="panel-heading">
   <h4 class="panel-title">
   <i class="fa fa-pencil-square"></i>
   Editar Horario de Clase
   </h4>
 </header>
		<div class="panel-body">
        <div class="panel-body">
			<div class="form-group">
				<label class="col-sm-3 control-label">Clase</label>
             <div class="col-md-6">
					<select data-plugin-selectTwo id="clase_id" name="clase_id" class="form-control populate" onchange="section_subject_select(this.value , <?php echo $param2;?>)" style="width: 100%">
						<?php 
						$clases = $this->db->get('clase')->result_array();
						foreach($clases as $row2):
						?>
							<option value="<?php echo $row2['clase_id'];?>" <?php if($row['clase_id']==$row2['clase_id'])echo 'selected';?>><?php echo $row2['nombre'];?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>
			<div id="seccion_tema_edit_holder"></div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Día</label>
				<div class="col-md-6">
					<select name="dia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
						<option value="lunes" 	<?php if($row['dia']=='lunes')echo 'selected="selected"';?>>Lunes</option>
						<option value="martes" 		<?php if($row['dia']=='martes')echo 'selected="selected"';?>>Martes</option>
						<option value="martes" 		<?php if($row['dia']=='martes')echo 'selected="selected"';?>>Martes</option>
						<option value="miercoles" 	<?php if($row['dia']=='miercoles')echo 'selected="selected"';?>>Miércoles</option>
						<option value="jueves" 	<?php if($row['dia']=='jueves')echo 'selected="selected"';?>>Jueves</option>
						<option value="viernes" 	<?php if($row['dia']=='viernes')echo 'selected="selected"';?>>Viernes</option>
						
					</select>
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-3 control-label">
					Hora de Inicio
				</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_inicio" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }' value = <?php echo $row['time_inicio'] ?>>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-3 control-label">
					Hora de Fin
				</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
                         <i class="fa fa-clock-o"></i>
                        </span>
					
						<input type="text" name="time_final" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 5 }' value = <?php echo $row['time_final'] ?>>
					</div>
				</div>
			</div>
		</div>

    <footer class="panel-footer">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Editar Horario</button>
			</div>
		</div>
    </footer>
    
  </form>
<?php endforeach;?>

</section>

<script type="text/javascript">
    function section_subject_select(clase_id , clase_rutina_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/seccion_tema_edit/' + clase_id + '/' + clase_rutina_id ,
            success: function(response)
            {
                jQuery('#seccion_tema_edit_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var clase_id = $('#clase_id').val();
        var clase_rutina_id = '<?php echo $param2;?>';
        section_subject_select(clase_id,clase_rutina_id);
        
    }); 
</script>

