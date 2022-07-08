
<section class="panel">
	<header class="panel-heading">
		<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_material_estudio_add');" class="btn btn-primary btn-sm">
			<i class="fa fa-plus-circle"></i>
		    Añadir Material de Estudio
		</button>
	</header>
	<div class="panel-body">

		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" >
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Título</th>
				<th>Descripción</th>
				<th>Clase</th>
				<th>Asignatura</th>
				<th>Descargar</th>
				<th>Opciones</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$count = 1;
			foreach ($material_estudio_info as $row) { ?>   
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo date("d M, Y", $row['timestamp']); ?></td>
					<td><?php echo $row['titulo']?></td>
					<td><?php echo $row['descripcion']?></td>
					<td>
						<?php $nombre = $this->db->get_where('clase' , array('clase_id' => $row['clase_id'] ))->row()->nombre;
							echo $nombre;?>
					</td>
					<td>
						<?php $nombre = $this->db->get_where('tema' , array('tema_id' => $row['tema_id'] ))->row()->nombre;
							echo $nombre;?>
					</td>
					<td>
						<a href="<?php echo base_url().'uploads/documentos/'.$row['titulo_nombre']; ?>" class="btn btn-info btn-xs" target="_blank">
							<i class="fa fa-download"></i>
							<span>Descargar</span>
						</a>
					</td>
					<td>
						<a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_material_estudio_edit/<?php echo $row['documento_id']?>');" 
							class="btn btn-primary btn-xs">
								<i class="fa fa-pencil"></i>
								<span>Editar</span>
						</a>
						<a href="<?php echo base_url();?>index.php?profesor/material_estudio/eliminar/<?php echo $row['documento_id']?>" 
							class="btn btn-danger btn-xs" onclick="return confirm('¿Está seguro de eliminar?');">
								<i class="fa fa-trash"></i>
								<span>Eliminar</span>
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	</div>
</section>
