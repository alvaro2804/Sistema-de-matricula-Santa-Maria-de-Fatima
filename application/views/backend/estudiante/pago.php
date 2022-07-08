<div class="row">
	<div class="col-md-12">
		<div class="tabs">
		<!------INICIO CONTROL TABS------>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
						<span>Manejo de Boletas / Pago</span>
					</a>
				</li>
			</ul>
			<!------FIN CONTROL TABS------>
			<div class="tab-content">
			<!----INICIO TABLA LISTA-->
				<div class="tab-pane active" id="list">
					
				<table class="table table-bordered table-striped mb-none" id="datatable_default">
                	<thead>
                		<tr>
                			
                    		<th><div>Estudiante</div></th>
                    		<th><div>Título</div></th>
                            <th><div>Descripción</div></th>
                            <th><div>Total</div></th>
                            <th><div>Pagado</div></th>
                            <th><div>Estado</div></th>
                    		<th><div>Fecha</div></th>
                    		<th class="no-sorting"><div>Opciones</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
                    	
                    		foreach($facturas as $row):
                    	?>
                        <tr>
                        	
							<td><?php echo $this->crud_model->get_type_name_by_id('estudiante',$row['estudiante_id']);?></td>
							<td><?php echo $row['titulo'];?></td>
							<td><?php echo $row['descripcion'];?></td>
                            <td><?php echo $row['monto'];?></td>
                            <td><?php echo $row['monto_pagado'];?></td>
                            <td>
                                 <span class="label label-<?php if($row['status']=='pagado')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row['creacion_timestamp']);?></td>
							<td>
                            <?php echo form_open('estudiante/pago/realizar_pago');?>
                                	<input type="hidden" name="factura_id" 		value="<?php echo $row['factura_id'];?>" />
                                		<button type="submit" class="btn btn-info" <?php if($row['status'] == 'pagado'):?> disabled="disabled"<?php endif;?>>
                                            <i class="fa fa-paypal"></i> Paga con Tarjeta
                                        </button>
                                </form>
                                
                            
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->