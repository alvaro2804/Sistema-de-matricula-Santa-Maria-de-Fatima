<div class="row">
	<div class="col-md-12">

		<!--CONTROL TABS INICIO-->
		<div class="tabs">
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					Lista de Calificaciones
				</a>
			</li>
			<li>
				<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					Añadir Grado
				</a>
			</li>
		</ul>
		<!--CONTROL TABS FIN-->
		<div class="tab-content">
		<br>
			<!----INICIO DE LA LISTA DE TABLAS-->
			<div class="tab-pane box active" id="list">

				<table class="table table-bordered table-striped mb-none" id="table_default">
					<thead>
						<tr>
							<th><div>#</div></th>
							<th><div>Nombre del Grado</div></th>
							<th><div>Punto de Calificación</div></th>
							<th><div>Calificación Desde</div></th>
							<th><div>Calificación Hasta</div></th>
							<th><div>Comentario</div></th>
							<th><div>Opciones</div></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;foreach($grados as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['grado_punto'];?></td>
							<td><?php echo $row['calificacion_desde'];?></td>
							<td><?php echo $row['calificacion_hasta'];?></td>
							<td><?php echo $row['comentario'];?></td>
							<td>

							<!-- EDITAR LINK -->
							<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_grado/<?php echo $row['grado_id'];?>');">
							<i class="fa fa-pencil"></i>
							</a>

							<!-- ELIMINAR LINK -->
							<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/grado/eliminar/<?php echo $row['grado_id'];?>');">
							<i class="fa fa-trash"></i>
							</a>

							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<!--FINAL DE LA LISTA DE TABLAS-->

			<!--INICIO DE CREACIÓN DEL FORMULARIO-->
			<div class="tab-pane box" id="add" style="padding: 5px">
				<div class="box-content">
					<?php echo form_open(base_url() . 'index.php?admin/grado/create' , array('class' => 'form-horizontal form-bordered','id' => 'form'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="nombre"
									  required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Punto de Calificación<span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="grado_punto"
									  required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Calificación Desde <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="calificacion_desde"
									  required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Calificación Hasta <span class="required">*</span></label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="calificacion_hasta"
									  required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Comentario</label>
								<div class="col-sm-5 controls">
									<input type="text" class="form-control" name="comentario"/>
								</div>
							</div>
							<div class="form-group">
							  <div class="col-sm-offset-3 col-sm-5">
								  <button type="submit" class="btn btn-primary">Añadir Grado</button>
							  </div>
							</div>
					</form>                
				</div>                
			</div>
			<!--FIN DE CREACIÓN DE FORMULARIO-->

		</div>
	</div>
	</div>
</div>


<!--  DATA TABLE CONFIGURACIÓN -->   
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
	var $table = $('#table_default');
	
	 $table.dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6] }]
	 });

	});
		
</script>
