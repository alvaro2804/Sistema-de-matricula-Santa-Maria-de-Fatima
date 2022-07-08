<?php 
	$clase_nombre	= $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
	$seccion_nombre  		= $this->db->get_where('seccion' , array('seccion_id' => $seccion_id))->row()->nombre;
	$system_nombre        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$running_year       =	$this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
        if($month == 1) $m = 'Enero';
        else if($month == 2) $m='Febrero';
        else if($month == 3) $m='Marzo';
        else if($month == 4) $m='Abril';
        else if($month == 5) $m='Mayo';
        else if($month == 6) $m='Junio';
        else if($month == 7) $m='Julio';
        else if($month == 8) $m='Agosto';
        else if($month == 9) $m='Septiembre';
        else if($month == 10) $m='Octubre';
        else if($month == 11) $m='Noviemebre';
        else if($month == 12) $m='Diciembre';
?>
<div id="print">
	<script src="assets/vendor/jquery/jquery.js"></script>
	
	<style type="text/css">
		td {
			padding: 5px;
		}
	</style>

	<center>
		<img src="uploads/logo.png" style="max-height : 60px;"><br>
		<h3 style="font-weight: 100;"><?php echo $system_nombre;?></h3>
		Hoja de Asistencia<br>
		<?php echo 'Clase'. ' ' . $clase_nombre;?><br>
		<?php echo 'Sección'.' '.$seccion_nombre;?><br>
		<?php echo $m.' '.'Mes';?>
	</center>
	  <table border="1" style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;">
			<thead>
				<tr>
					<td style="text-align: center;">
						Los Estudiantes <i class="entypo-down-thin"></i> | Fecha <i class="entypo-right-thin"></i>
					</td>
					<?php
						$year = explode('-', $running_year);
						$days = cal_days_in_month(CAL_GREGORIAN, $month, $year[0]);
						for ($i = 1; $i <= $days; $i++) {
					?>
					<td style="text-align: center;"><?php echo $i; ?></td>
					<?php } ?>
				</tr>
			</thead>

			<tbody>

				<?php
				$data = array();
				$estudiantes = $this->db->get_where('inscribirse', array('clase_id' => $clase_id, 'year' => $running_year, 'seccion_id' => $seccion_id))->result_array();
				foreach ($estudiantes as $row):
				?>

				<tr>
					<td style="text-align: center;">
						<?php echo $this->db->get_where('estudiante', array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?>
					</td>
					<?php
					$status = 0;
					for ( $i = 1; $i <= $days; $i++ ) {
						$timestamp = strtotime( $i . '-' . $month . '-' . $year[ 0 ] );
						$this->db->group_by( 'timestamp' );
						$asistencia = $this->db->get_where( 'asistencia', array( 'seccion_id' => $seccion_id, 'clase_id' => $clase_id, 'year' => $running_year, 'timestamp' => $timestamp, 'estudiante_id' => $row[ 'estudiante_id' ] ) )->result_array();


						foreach ( $asistencia as $row1 ):
							$month_dummy = date( 'm', $row1[ 'timestamp' ] );
						if ( $i == $month_dummy );
						$status = $row1[ 'status' ];
						endforeach;
						?>
					<td style="text-align: center;" data-class="">
						<?php if ($status == 1) { ?>
						<div style="color: #005228">P</div>
						<?php } else if ($status == 2) { ?>
						<div style="color: #ff3030">A</div>
						<?php }$status=0; ?>
					</td>

					<?php } ?>
					<?php endforeach; ?>
				</tr>

			</tbody>
	  </table>
</div>

<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var elem = $('#print');
		PrintElem(elem);
		Popup(data);

	});

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="assets/css/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        //mywindow.document.write('<style>.print{border : 1px;}</style>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>

