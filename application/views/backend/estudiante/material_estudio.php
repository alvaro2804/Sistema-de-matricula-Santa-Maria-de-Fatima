
<section class="panel">

	<div class="panel-body">
	<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">  
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Título</th>
				<th>Descripción</th>
				<th>Clase</th>
				<th>Asignatura</th>
				<th>Descargar</th>

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
					
				</tr>
			<?php } ?>
		</tbody>
	</table>

	</div>
</section>
