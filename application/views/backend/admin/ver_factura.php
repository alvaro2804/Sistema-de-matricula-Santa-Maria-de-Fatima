<?php
	$edit_data = $this->db->get_where('factura', array('factura_id' => $param1))->result_array();
	foreach ($edit_data as $row):
?>

<section class="panel">
	<div class="panel-body"  id="invoice_print" >
		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-6 mt-md">
						<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">BOLETA DE VENTA ELECTRONICA</h2>
						<h4 class="h4 m-none text-dark text-weight-bold">RUC: 10085962570</h4>
						<h4 class="h4 m-none text-dark text-weight-bold">#<?php echo($param1) ?></h4>
					</div>
					<div class="col-sm-6 text-right mt-md mb-md">
						<address class="ib mr-xlg">
							<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br/>
							<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br/>
							<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br/> 
							  
						</address>
						<div class="ib">
							<img src="assets/images/invoice-logo.png" alt="Santa María de Fátima" width="50"/>
						</div>
					</div>
				</div>
			</header>
			
			<div class="bill-info">
				<div class="row">
					<div class="col-md-6">
						<div class="bill-to">
							<p class="h5 mb-xs text-dark text-weight-semibold">Para:</p>
							<address>
								<?php echo $this->db->get_where('estudiante', array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?><br>
								
								<?php 
									$clase_id = $this->db->get_where('inscribirse' , array(
										'estudiante_id' => $row['estudiante_id'],
											'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
									))->row()->clase_id;
									echo 'Clase' . ' : ' . $this->db->get_where('clase', array('clase_id' => $clase_id))->row()->nombre;
								?><br>
								<?php echo 'Email' . ' : ' . $this->db->get_where('estudiante', array('estudiante_id' => $row['estudiante_id']))->row()->email; ?>
							</address>
						</div>
					</div>

					<div class="col-md-6">
						<div class="bill-data text-right">
							<p class="mb-none">
								<span class="text-dark">Fecha de Emisión : </span>
								<span><?php echo date('d M,Y', $row['creacion_timestamp']);?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark">Título : </span>
								<span><?php echo $row['titulo'];?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark">Descripción : </span>
								<span><?php echo $row['descripcion'];?></span>
							</p>
							<p class="mb-none">
								<span class="text-dark">Estado : </span>
								<?php if($row['status'] == "pagado"):?>
									<span class=" btn btn-success btn-xs"><?php echo $row['status'];?></span>
								<?php endif;?>
								<?php if($row['status'] == "debido"):?>
									<span class=" btn btn-danger btn-xs"><?php echo $row['status'];?></span>
								<?php endif;?>
							</p>
						</div>
					</div>

				</div>
			</div>

			<!-- Historial de Pago -->
			<div class="table-responsive">
				<table class="table invoice-items">
					<thead>
						<tr class="h4 text-dark">
							<th id="cell-id"     class="text-weight-semibold">#</th>
							<th id="cell-item"   class="text-weight-semibold">Fecha</th>
							<th id="cell-desc"   class="text-weight-semibold">Método</th>
							<th id="cell-price"  class="text-center text-weight-semibold">Monto</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						$pago_historial = $this->db->get_where('pago', array('factura_id' => $row['factura_id']))->result_array();
						foreach ($pago_historial as $row2):
						?>
						<tr>
							<td><?php echo $count++;?></td>
							<td class="text-weight-semibold text-dark"><?php echo date("d M, Y", $row2['timestamp']); ?></td>
							<td>
							<?php 
								if ($row2['metodo'] == 1)
									echo 'Efectivo';
								if ($row2['metodo'] == 2)
									echo 'Voucher';
								if ($row2['metodo'] == 3)
									echo 'Tarjeta';

							?>
							</td>
							<td class="text-center"><?php echo $row2['monto']; ?></td>
						</tr>

						 <?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<div class="invoice-summary">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table h5 text-dark">
							<tbody>
								<tr class="b-top-none">
									<td colspan="2">Monto Total</td>
									<td class="text-left"><?php echo $row['monto']; ?></td>
								</tr>
								<tr>
									<td colspan="2">Monto Pagado</td>
									<td class="text-left"><?php echo $row['monto_pagado']; ?></td>
								</tr>
								<tr class="h4">
									<td colspan="2">Deuda</td>
									<td class="text-left"><?php echo $row['deuda']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<footer class="panel-footer">
			<div class="text-right mr-lg">
				<a href="#" onClick="PrintElem('#invoice_print')" class="btn btn-primary ml-sm"><i class="glyphicon glyphicon-print"></i> Imprimir Boleta</a>
			</div>
		</footer>
		
</section>			
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
	
    function Popup(data)
    {
        var mywindow = window.open();
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
    }

</script>