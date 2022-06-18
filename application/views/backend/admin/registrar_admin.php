<section class="panel">
	<header class="panel-heading">

		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_admin_add/');" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i>
            	Agregar Nuevo Administrador
            </a>
            
	</header>

	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
			<thead>
				<tr>
					<th width="80">
						<div>
							Foto
						</div>
					</th>
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
							Rol
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
				$administradores = $this->db->get( 'admin' )->result_array();
				foreach ( $administradores as $row ): ?>
				<tr>
					<td class="center"><img src="<?php echo $this->crud_model->get_image_url('admin',$row['admin_id']);?>" width="30"/>
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
                    <td>
						<?php echo $row['level'];?>
					</td>
					<td>

						<!-- ADMIN EDITAR LINK -->

						<a href="#" class="btn btn-xs btn-primary" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_admin_edit/<?php echo $row['admin_id'];?>');">
                        <i class="fa fa-pencil"></i>
                        </a>

						<!-- ADMIN PASSWORD ELIMINAR LINK -->
						<a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restablecer la Contraseña" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_admin_password/<?php echo $row['admin_id'];?>');">
                        <i class="fa fa-unlock-alt"></i>
                        </a>

						<!-- ADMIN BOORAR LINK -->
						<a href="#" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/registrar_admin/delete/<?php echo $row['admin_id'];?>');">
                        <i class="fa fa-trash"></i>
                        </a>	
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>