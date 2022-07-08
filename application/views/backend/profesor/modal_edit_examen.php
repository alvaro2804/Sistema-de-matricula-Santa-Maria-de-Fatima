<?php 
$edit_data		=	$this->db->get_where('examen' , array('examen_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
       	 <?php echo form_open(base_url() . 'index.php?admin/lista_examen/edit/actualizar/'.$row['examen_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					Editar Datos del Examen
            	</h4>
            </div>
			<div class="panel-body">
               
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>" required title="Valor Requerido"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" data-plugin-datepicker name="date" required title="Valor Requerido" value="<?php echo $row['date'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Comentario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="comentario" value="<?php echo $row['comentario'];?>"/>
                    </div>
                </div>
           
        </div>

		<footer class="panel-footer">
		<div class="row">
		<div class="col-sm-9 col-sm-offset-3">
		<button type="submit" class="btn btn-primary">Editar Examen</button>
		</div>
		</div>
		</footer>
		</form>        
        
    </section>
</div>

<?php
endforeach;
?>





