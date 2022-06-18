<?php 
$edit_data		=	$this->db->get_where('grado' , array('grado_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					Editar Grado
            	</h4>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/grado/actualizar/'.$row['grado_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre del Grado</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="nombre" required title="Valor Requerido" value="<?php echo $row['nombre'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Punto de Calificación</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="grado_punto" required title="Valor Requerido" title="Valor Requerido" value="<?php echo $row['grado_punto'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Calificación Desde</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="calificacion_desde" required title="Valor Requerido" value="<?php echo $row['calificacion_desde'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Calificación Hasta</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="calificacion_hasta" required title="Valor Requerido" value="<?php echo $row['calificacion_hasta'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Comentario</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="comentario" value="<?php echo $row['comentario'];?>"/>
                    </div>
                </div>
                  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-primary">Editar Grado</button>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>



