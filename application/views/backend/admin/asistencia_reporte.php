<section class="panel">
<?php echo form_open(base_url() . 'index.php?admin/asistencia_reporte_seleccionador/', array('id' => 'form')); ?>
<div class="panel-body">
<div class="row">

    <?php
    $query = $this->db->get('clase');
        $clase = $query->result_array();
    ?>

        <div class="col-md-4 mb-sm">
            <div class="form-group">
                <label class="control-label">Clase <span class="required">*</span></label>
                <select class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="clase_id" onchange="select_seccion(this.value)">
                    <option value="">Seleccionar Clase</option>
                    <?php foreach ($clase as $row): ?>
                    <option value="<?php echo $row['clase_id']; ?>" ><?php echo $row['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
 
    <div id="section_holder">
        <div class="col-md-4 mb-sm">
            <div class="form-group">
                <label class="control-label">Sección <span class="required">*</span></label>
                <select class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="seccion_id">
                    <option value="">Seleccione Primero la Clase</option>

                </select>
            </div>
        </div>
    </div>
	
    <div class="col-md-4 mb-sm">
         <div class="form-group">
                <label class="control-label">Fecha(Mes)<span class="required">*</span></label>
        <select name="month" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="month" >
            <?php
            for ($i = 1; $i <= 12; $i++):
                if ($i == 1)
                    $m = 'Enero';
                else if ($i == 2)
                    $m = 'Febrero';
                else if ($i == 3)
                    $m = 'Marzo';
                else if ($i == 4)
                    $m = 'Abril';
                else if ($i == 5)
                    $m = 'Mayo';
                else if ($i == 6)
                    $m = 'Junio';
                else if ($i == 7)
                    $m = 'Julio';
                else if ($i == 8)
                    $m = 'Agosto';
                else if ($i == 9)
                    $m = 'Septiembre';
                else if ($i == 10)
                    $m = 'Octubre';
                else if ($i == 11)
                    $m = 'Noviembre';
                else if ($i == 12)
                    $m = 'Diciembre';
                ?>
                <option value="<?php echo $i; ?>" <?php if($month == $i) echo 'selected'; ?>  ><?php echo $m; ?></option>
                <?php
            endfor;
            ?>
        </select>
         </div>
    </div>
	
    <input type="hidden" name="operation" value="selection">
    <input type="hidden" name="year" value="<?php echo $running_year;?>">

</div>

</div>
    <div class="panel-footer">
        <center>
        <button type="submit" class="btn btn-primary">Mostrar Reporte</button>
        </center>
    </div>
    <?php echo form_close(); ?>
</section>

<script type="text/javascript">
    function select_seccion(clase_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_seccion/' + clase_id,
            success: function (response)
            {

                jQuery('#section_holder').html(response);
            }
        });
    }
</script>