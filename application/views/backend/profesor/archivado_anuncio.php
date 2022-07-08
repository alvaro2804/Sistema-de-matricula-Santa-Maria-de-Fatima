<div class="table-responsive">

	<table  class="table table-bordered table-striped table-condensed mb-none">
	<thead>
		<tr>
		<th><div>#</div></th>
        <th><div>Título</div></th>
        <th><div>Anuncio</div></th>
        <th><div>Fecha</div></th>
        <th><div>Opciones</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$count = 1;
		$anuncios = $this->db->get_where('anuncio', array('status' => 0))->result_array();
		foreach ($anuncios as $row):
			?>
			<tr>
				<td><?php echo $count++; ?></td>
				<td><?php echo $row['anuncio_titulo']; ?></td>
				<td class="span5"><?php echo $row['anuncio']; ?></td>
				<td><?php echo date('d M,Y', $row['crear_timestamp']); ?></td>
				<td>
				
				
					<!-- IMPRIMIR VER AVISO -->
					<a href="#" class="btn btn-success btn-xs" data-placement="top" data-toggle="tooltip" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_ver_anuncio/<?php echo $row['anuncio_id']; ?>');" data-original-title="Imprimir / Ver Anuncio">
					<i class="glyphicon glyphicon-print"></i>
					</a>


					<!-- ARCHIVAR ANUNCIO -->
					<a href="<?php echo base_url() ?>index.php?profesor/anuncio/eliminar_de_archivo/<?php echo $row['anuncio_id'] ?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Archivar Anunicio" >
					<i class="fa fa-exchange"></i>
					</a>


					<!-- EDITAR LINK -->
					<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_anuncio/<?php echo $row['anuncio_id']; ?>');">
					<i class="fa fa-pencil"></i>
					</a>


					<!-- ELIMINAR LINK -->
					<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url(); ?>index.php?profesor/anuncio/eliminar/<?php echo $row['anuncio_id']; ?>');">
					<i class="fa fa-trash"></i>
					</a>

					
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>


</div>
