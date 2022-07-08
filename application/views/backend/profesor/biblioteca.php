<div class="row">
	<div class="col-md-12">

		<!--CONTROL TABS INICIO-->
		<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					Lista de Libros
				</a>
			</li>
			
		</ul>
		<!--CONTROL TABS FIN-->

		<div class="tab-content">
		<br>
			<!--INICIO LISTA TABLA-->
			<div class="tab-pane box active" id="list">
			
			   <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
					<thead>
						<tr>
							<th><div>#</div></th>
							<th><div>Nombre del Libro</div></th>
							<th><div>Autor</div></th>
							<th><div>Descripción</div></th>
							<th><div>Precio</div></th>
							<th><div>Clase</div></th>
							<th><div>Estado</div></th>
							
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;foreach($libros as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['autor'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo $row['precio'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('clase',$row['clase_id']);?></td>
							<td><span class="label label-<?php if($row['status']=='disponible')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span></td>

						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			
			<!--FIN LISTA TABLA-->
						</div>
		</div>
	</div>
</div>
</div>