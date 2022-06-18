<?php 
$edit_data	=	$this->db->get_where('factura' , array('factura_id' => $param2) )->result_array();
foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
        <section class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Historial de Pagos</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                	<thead>
                		<tr>
                			<td>#</td>
                			<td>Monto</td>
                			<td>Método</td>
                			<td>Fecha</td>
                		</tr>
                	</thead>
                	<tbody>
                	<?php 
                		$count = 1;
                		$pagos = $this->db->get_where('pago' , array(
                			'factura_id' => $row['factura_id']
                		))->result_array();
                		foreach ($pagos as $row2):
                	?>
                		<tr>
                			<td><?php echo $count++;?></td>
                			<td><?php echo $row2['monto'];?></td>
                			<td>
                				<?php 
                					if ($row2['metodo'] == 1)
                						echo 'Efectivo';
                					if ($row2['metodo'] == 2)
                						echo Voucher;
                					if ($row2['metodo'] == 3)
                						echo 'Tarjeta';
                                    
                				?>
                			</td>
                			<td><?php echo date('d M,Y', $row2['timestamp']);?></td>
                		</tr>
                	<?php endforeach;?>
                	</tbody>
                </table>
               </div>
            </div>
        </section>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			
				<?php echo form_open(base_url() . 'index.php?admin/factura/completar_pago/'.$row['factura_id'], array(
					'class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
					
			<div class="panel-heading">
                <h4 class="panel-title">Completar Pago</h4>
            </div>
            <div class="panel-body">

					<div class="form-group">
		                <label class="col-sm-3 control-label">Monto Total</label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['monto'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label">Monto Pagado</label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="monto_pagado" value="<?php echo $row['monto_pagado'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label">Debido</label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['deuda'];?>" disabled=""/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label">Monto Pagado<span class="required">*</span></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="monto" value="" title="Valor Requerido" required
		                    	placeholder="Ingrese Monto de Pago"/>
		                </div>
		            </div>

		            <div class="form-group">
                        <label class="col-sm-3 control-label">Método de Pago</label>
                        <div class="col-sm-6">
                            <select name="metodo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1">Efectivo</option>
                                <option value="2">Voucher</option>
                                <option value="3">Tarjeta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estado</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="pagado">Pagado</option>
                                <option value="debido">No Pagado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
	                    <label class="col-sm-3 control-label">Fecha<span class="required">*</span></label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" required title="Valor Requerido" data-plugin-datepicker name="timestamp" value=""/>
	                    </div>
					</div>

                    <input type="hidden" name="factura_id" value="<?php echo $row['factura_id'];?>">
                    <input type="hidden" name="estudiante_id" value="<?php echo $row['estudiante_id'];?>">
                    <input type="hidden" name="titulo" value="<?php echo $row['titulo'];?>">
                    <input type="hidden" name="descripcion" value="<?php echo $row['descripcion'];?>">

			</div>
				<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Cancelar Pago</button>
				</div>
				</div>
				</footer>
				<?php echo form_close();?>
		</section>
	</div>
</div>


<?php endforeach;?>