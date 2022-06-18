<div class="row">
	<div class="col-md-12">
		<section class="panel">
       	   <?php echo form_open(base_url() . 'index.php?admin/gasto_categoria/create/' , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>

        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Añadir Categoria de Gasto
            	</h4>
            </div>
			<div class="panel-body">
				
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nombre" required title="Valor Requerido" value="" autofocus>
						</div>
					</div>

            </div>
				<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Añadir Nueva Categoria de Gasto</button>
				</div>
				</div>
				</footer>
				<?php echo form_close();?>
        </section>
    </div>
</div>