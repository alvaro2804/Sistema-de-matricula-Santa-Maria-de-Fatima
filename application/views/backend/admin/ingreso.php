<div class="row">
	<div class="col-md-12">
		<div class="tabs">
		
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#unpaid" data-toggle="tab">
						<span>Facturas</span>
					</a>
				</li>
				<li>
					<a href="#paid" data-toggle="tab">
						Historial de Pagos</span>
					</a>
				</li>
			</ul>
			
			<div class="tab-content">
			<br>
				<div class="tab-pane active" id="unpaid">
					
				<table class="table table-bordered table-striped mb-none" id="table_default">
                	<thead>
                		<tr>
                			<th>#</th>
                    		<th><div>Estudiante</div></th>
                    		<th><div>Título</div></th>
                            <th><div>Total</div></th>
                            <th><div>Pagado</div></th>
                            <th><div>Estado</div></th>
                    		<th><div>Fecha</div></th>
                    		<th class="no-sorting"><div>Opciones</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
                    		$count = 1;
                    		$this->db->where('year' , $running_year);
                    		$this->db->order_by('creacion_timestamp' , 'desc');
                    		$facturas = $this->db->get('factura')->result_array();
                    		foreach($facturas as $row):
                    	?>
                        <tr>
                        	<td><?php echo $count++;?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('estudiante',$row['estudiante_id']);?></td>
							<td><?php echo $row['titulo'];?></td>
							<td><?php echo $row['monto'];?></td>
                            <td><?php echo $row['monto_pagado'];?></td>
                            <?php if($row['deuda'] == 0):?>
                            	<td>
                            		<button class="btn btn-success btn-xs">Pagado</button>
                            	</td>
                            <?php endif;?>
                            <?php if($row['deuda'] > 0):?>
                            	<td>
                            		<button class="btn btn-danger btn-xs">Debido</button>
                            	</td>
                            <?php endif;?>
							<td><?php echo date('d M,Y', $row['creacion_timestamp']);?></td>
							<td width="120px">
									<!-- COMPLETAR PAGO LINK  -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Completar Pago" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_completar_pago/<?php echo $row['factura_id'];?>');">
                                    <i class="fa fa-money"></i>
                                    </a>
								

									<!-- VER FACTURA LINK -->
									<a href="<?php echo base_url();?>index.php?admin/ver_factura/<?php echo $row['factura_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Ver Boleta" >
                                    <i class="fa fa-newspaper-o"></i>
                                    </a>
								

									<!-- EDITAR LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_factura/<?php echo $row['factura_id'];?>');">
                                    <i class="fa fa-pencil"></i>
                                    </a>
								

									<!-- ELIMINAR FACTURA DEL ALUMNO LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/factura/eliminar/<?php echo $row['factura_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
	
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
					
				</div>
				<div class="tab-pane" id="paid">
					
					<table class="table table-bordered table-striped mb-none" id="table_history">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div>Título</div></th>
					            <th><div>Descripción</div></th>
					            <th><div>Método</div></th>
					            <th><div>Monto</div></th>
					            <th><div>Fecha</div></th>
					            <th class="no-sorting"></th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php 
					        	$count = 1;
					        	$this->db->where('pago_tipo' , 'ingreso');
					        	$this->db->order_by('timestamp' , 'desc');
					        	$pagos = $this->db->get('pago')->result_array();
					        	foreach ($pagos as $row):
					        ?>
					        <tr>
					            <td><?php echo $count++;?></td>
					            <td><?php echo $row['titulo'];?></td>
					            <td><?php echo $row['descripcion'];?></td>
					            <td>
					            	<?php 
					            		if ($row['metodo'] == 1)
					            			echo 'Efectivo';
					            		if ($row['metodo'] == 2)
					            			echo 'Voucher';
					            		if ($row['metodo'] == 3)
					            			echo 'Tarjeta';
					            	?>
					            </td>
					            <td><?php echo $row['monto'];?></td>
					            <td><?php echo date('d M,Y', $row['timestamp']);?></td>
					            <td align="center">
					            	<a href="<?php echo base_url();?>index.php?admin/ver_factura/<?php echo $row['factura_id'];?>"
					            		class="btn btn-sm btn-default">
					            			Ver Boleta
					            	</a>
					            </td>
					        </tr>
					        <?php endforeach;?>
					    </tbody>
					</table>
				</div>
			</div>	
	
			
		</div>			
	</div>
</div>

<!--  CONFIGURACIONES DE TABLAS DE DATOS-->   
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
	
	$('#table_default').dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6,7] }]
	 });
		
	$('#table_history').dataTable({ 
	 	aoColumnDefs: [{ bSortable: false, aTargets: [1,2,3,4,5,6] }]
	 });

	});
		
</script>
