<section class="panel">
	<header class="panel-heading">

		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_profesor_add/');" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i>
            	Agregar Nuevo Profesor
            </a>
            
	</header>

	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="render-data">
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
							Opciones
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
			
				<?php
				$profesores = $this->db->get( 'profesor' )->result_array();
				foreach ( $profesores as $row ): ?>
				<tr>
					<td class="center"><img src="<?php echo $this->crud_model->get_image_url('profesor',$row['profesor_id']);?>" width="30"/>
					</td>
					<td>
						<?php echo $row['nombre'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
					<td>

						<!-- PROFESOR EDITAR LINK -->

						<a href="#" class="btn btn-xs btn-primary" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_profesor_edit/<?php echo $row['profesor_id'];?>');">
                        <i class="fa fa-pencil"></i>
                        </a>

						<!-- PROFESOR PASSWORD ELIMINAR LINK -->
						<a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restablecer la Contraseña" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_profesor_password/<?php echo $row['profesor_id'];?>');">
                        <i class="fa fa-unlock-alt"></i>
                        </a>

						<!-- PROFESOR BOORAR LINK -->
						<a href="#" class="btn btn-xs btn-danger" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/profesor/eliminar/<?php echo $row['profesor_id'];?>');">
                        <i class="fa fa-trash"></i>
                        </a>	
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>

<script type="text/javascript">

jQuery(document).ready(function() {
jQuery('#render-data').DataTable({

rowReorder: {
selector: 'td:nth-child(2)'
},
responsive: true,

"paging": true,
"processing": true,

dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf', 'print', 'copy',
],
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
} );
} );
        
</script>