<?php 
    $empieza_year_array             = explode ( "-" , $running_year ); 
    $siguiente_year_primer_index          = $empieza_year_array[1];
    $siguiente_year_segundo_index         = $empieza_year_array[1]+1;
    $siguiente_year                      = $siguiente_year_primer_index. "-" .$siguiente_year_segundo_index;
?>

<section class="panel">
<header class="panel-heading">
  <h2 class="panel-title">Promover al Siguiente Año Escolar</h2>
</header>
<div class="panel-body">
<?php echo form_open(base_url() . 'index.php?admin/promover_estudiante/promover');?>
    <div class="row">
    <div class="col-sm-3">
	    <div class="form-group">
        <label class="control-label">Año Académico Actual</label>
            <select name="running_year" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
            <option value="<?php echo $running_year;?>"><?php echo $running_year;?> </option>
            </select>
        </div>
    </div>

    <div class="col-sm-3 mb-sm">
         <div class="form-group">
        <label class="control-label">Para Promover la Sección</label>
            <select name="promover_year" class="form-control" id="promover_year" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
            <option value="<?php echo $siguiente_year;?>"><?php echo $siguiente_year;?></option>
            </select>
        </div>
    </div>
    
    <div class="col-sm-3 mb-sm">
        <div class="form-group">
        <label class="control-label">Promover la Clase</label>
            <select name="promover_de_clase_id" id="de_clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
                <option value="">Seleccionar</option>
                <?php
                    $clases = $this->db->get('clase')->result_array();
                    foreach($clases as $row):
                ?>
                <option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="col-sm-3 mb-sm">
    <div class="form-group">
        <label class="control-label">Promover para la Clase</label>
            <select name="promover_para_clase_id" id="para_clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
                <option value="">Seleccionar</option>
                <?php foreach($clases as $row):?>
                <option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>

<div id="estudiante_para_promover_holder"></div>
</div>

<footer class="panel-footer">
    <center>
        <button class="btn btn-primary" type="button" onclick="get_estudiante_para_promover('<?php echo $running_year;?>')">
            Promover Sección</button>
    </center>
</footer>

</section>

<?php echo form_close();?>

<script type="text/javascript">
    
    function get_estudiante_para_promover(running_year)
    {
        de_clase_id   = $("#de_clase_id").val();
        para_clase_id     = $("#para_clase_id").val();
        promover_year  = $("#promover_year").val();
        
        if (de_clase_id == "" || para_clase_id == "") {
           
	new PNotify({
		title: 'Error',
		text: 'Seleccione Clase para promover hacia y desde',
		shadow: true,
		type: 'error',
		buttons: {
		sticker: false
		}
		});
			
            return false;
        }
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_estudiante_para_promover/' + de_clase_id + '/' + para_clase_id + '/' + running_year + '/' + promover_year,
            success: function(response)
            {
                jQuery('#estudiante_para_promover_holder').html(response);
            }
        });
        return false;
    }

</script>