<section class="panel">
	<header class="panel-heading">

		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_padre_add/');" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i>
                Añadir Nuevo Padre
            </a>
	
	</header>

	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
			<thead>
				<tr>
					<th>#</th>
					<th>
						<div>
							Nombre
						</div>
					</th>
					<th>
						<div>
							Email
						</div>
					</th>
					<th>
						<div>
							Telefono
						</div>
					</th>
					<th>
						<div>
							Profesión
						</div>
					</th>
					<th>
						<div>
							Opciones
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 1;
				$parents = $this->db->get( 'padres' )->result_array();
				foreach ( $parents as $row ): ?>
				<tr>
					<td>
						<?php echo $count++;?>
					</td>
					<td>
						<?php echo $row['nombre'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
					<td>
						<?php echo $row['telefono'];?>
					</td>
					<td>
						<?php echo $row['profesion'];?>
					</td>
					<td>
					    <!-- PARENT EDITING LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_padre_edit/<?php echo $row['padres_id'];?>');">
								<i class="fa fa-pencil"></i>
								</a>
                                    
					    <!-- PARENT RESET PASSWORD LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Restablecer la Contraseña" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_padre_password/<?php echo $row['padres_id'];?>');">
                                    <i class="fa fa-unlock-alt"></i>
                                    </a>

					    <!-- PARENT DELETE LINK -->
						<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/padres/delete/<?php echo $row['padres_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
					
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>