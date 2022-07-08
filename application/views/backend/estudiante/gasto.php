
<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_gasto_add/');" 
		class="mr-xs btn btn-primary btn-sm">
		<i class="fa fa-plus-circle"></i>
		Añadir Nuevo Gasto
		</a> 
	</header>
	<div class="panel-body">
	
		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div>Título</div></th>
					<th><div>Categoría</div></th>
					<th><div>Método de Pago</div></th>
					<th><div>Cantidad</div></th>
					<th><div>Fecha</div></th>
					<th class="no-sorting">Opciones</div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1;
					$this->db->where('pago_tipo' , 'gasto');
					$this->db->where('year' , $running_year);
					$this->db->order_by('timestamp' , 'desc');
					$gastos = $this->db->get('pago')->result_array();
					foreach ($gastos as $row):
				?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['titulo'];?></td>
					<td>
						<?php 
							if ($row['gastos_categoria_id'] != 0 || $row['gastos_categoria_id'] != '')
								echo $this->db->get_where('gastos_categoria' , array('gastos_categoria_id' => $row['gastos_categoria_id']))->row()->nombre;
						?>
					</td>
					<td>
						<?php 
							if ($row['metodo'] == 1)
								echo 'Efecivo';
							if ($row['metodo'] == 2)
								echo 'Voucher';
							if ($row['metodo'] == 3)
								echo 'Tarjeta';
						?>
					</td>
					<td><?php echo $row['monto'];?></td>
					<td><?php echo date('d M,Y', $row['timestamp']);?></td>
					<td>

							<!-- EDITAR LINK -->
							<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_gasto_edit/<?php echo $row['pago_id'];?>');">
							<i class="fa fa-pencil"></i>
							</a>

							<!-- ELIMINAR LINK -->
							<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/gasto/eliminar/<?php echo $row['pago_id'];?>');">
							<i class="fa fa-trash"></i>
							</a>

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>

