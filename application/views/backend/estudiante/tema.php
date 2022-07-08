<div class="row">
	<div class="col-md-12">
    	<!------CONTROL TABS INICIO ----->
    	<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
						Lista de Asignaturas
					</a>
				</li>
			</ul>
    	    <!------CONTROL TABS FINAL------>
			<div class="tab-content">            
				<!----INICIO DE LISTA DE TABLA-->
				<div class="tab-pane box active" id="list">

					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th><div>Clase</div></th>
								<th><div>Nombre de la Asignatura</div></th>
								<th><div>Profesor</div></th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1;foreach($temas as $row):?>
							<tr>
								<td><?php echo $this->crud_model->get_type_name_by_id('clase',$row['clase_id']);?></td>
								<td><?php echo $row['nombre'];?></td>
								<td><?php echo $this->crud_model->get_type_name_by_id('profesor',$row['profesor_id']);?></td>

							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<!----FIN TABLA-->
			</div>
		</div>
	</div>
</div>
