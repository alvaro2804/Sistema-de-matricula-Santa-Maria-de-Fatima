<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_gasto_categoria_add/');" 
		class="mr-xs btn btn-primary btn-sm">
		<i class="fa fa-plus-circle"></i>
		Añadir Nueva Categoria de Gasto
		</a> 
	</header>
	<div class="panel-body">

		<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div>Nombre</div></th>
					<th class="no-sorting"><div>Opciones</div></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1;
					$gastos = $this->db->get('gastos_categoria')->result_array();
					foreach ($gastos as $row):
				?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['nombre'];?></td>
					<td>

						<!-- EDITAR LINK -->
						<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_gasto_categoria_edit/<?php echo $row['gastos_categoria_id'];?>');">
						<i class="fa fa-pencil"></i>
						</a>

						<!-- ELIMINAR LINK -->
						<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/gasto_categoria/eliminar/<?php echo $row['gastos_categoria_id'];?>');">
						<i class="fa fa-trash"></i>
						</a>

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</section>



