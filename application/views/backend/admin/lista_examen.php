<div class="row">
	<div class="col-md-12">

		<!------CONTROL TABS INICIO------>
		<div class="tabs">
			<ul class="nav nav-tabs bordered">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					Lista de Examen
						</a>
				</li>
				<li>
					<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					Añadir Nuevo Examen
						</a>
				</li>
			</ul>
			<!------CONTROL TABS FINAL------>
			<div class="tab-content">
				<br>
				<!--INICIO LISTA TABLA-->
				<div class="tab-pane box active" id="list">
					<table class="table table-bordered table-striped mb-none" id="table_default">
						<thead>
							<tr>
								<th width="140px">
									<div>
										Nombre del Examen
									</div>
								</th>
								<th>
									<div>
										Fecha
									</div>
								</th>
								<th class="no-sorting">
									<div>
										Comentario
									</div>
								</th>
								<th class="no-sorting">
									<div>
										Opciones
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($examenes as $row):?>
							<tr>
								<td>
									<?php echo $row['nombre'];?>
								</td>
								<td>
									<?php echo $row['date'];?>
								</td>
								<td>
									<?php echo $row['comentario'];?>
								</td>
								<td>

								<!-- EDITAR LINK -->								
								<a href="#" class="btn btn-xs btn-primary" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_examen/<?php echo $row['examen_id'];?>');">
								<i class="fa fa-pencil"></i>
								</a>


								<!-- ELIMINAR LINK -->
								<a href="#" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/lista_examen/eliminar/<?php echo $row['examen_id'];?>');">
								<i class="fa fa-trash"></i>
								</a>

								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<!----FIN TABLA LISTA--->


				<!----INICIO DE CREACIÓN DE FORMULARIO---->
				<div class="tab-pane box" id="add" style="padding: 5px">
					<div class="box-content">
						<?php echo form_open(base_url() . 'index.php?admin/lista_examen/create' , array('clase' => 'form-horizontal form-bordered', 'id' => 'form'));?>
                            <br><br>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Nombre <span class="required">*</span>
							</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="nombre" required title = "Valor Requerido"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Comentario
							</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="comentario"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Fecha <span class="required">*</span>
							</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" data-plugin-datepicker name="date" required title="Valor Requerido"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-primary">
									Añadir Examen
								</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<!--FIN CREACION DE FORMULARIO-->
			</div>
		</div>
	</div>
</div>


<!--  CONFIGURACIÓN DE DATE TABLE -->   
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
	var $table = $('#table_default');

	 $table.dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [0,1,2,3] }]
	 });

	});
		
</script>

