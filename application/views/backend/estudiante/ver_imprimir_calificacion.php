<?php 
	$clase_nombre		 	= 	$this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
	$examen_nombre  		= 	$this->db->get_where('examen' , array('examen_id' => $examen_id))->row()->nombre;
	$system_nombre        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$running_year       =	$this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
?>
<div id="print">
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<style type="text/css">
		td {
			padding: 5px;
		}
	</style>

	<center>
		<img src="uploads/logo.png" style="max-height : 60px;"><br>
		<h3 style="font-weight: 100;"><?php echo $system_nombre;?></h3>
		Hoja de Calificación<br>
		<?php echo 'Clase' . ' ' . $clase_nombre;?><br>
		<?php echo $examen_nombre;?>

		
	</center>

	
	<table style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">
		<thead>
			<tr>
			<td style="text-align: center;">
				Los Estudiantes <i class="entypo-down-thin"></i> | Cursos<i class="entypo-right-thin"></i>
			</td>
			<?php 
				$temas = $this->db->get_where('tema' , array('clase_id' => $clase_id , 'year' => $running_year))->result_array();
				foreach($temas as $row):
			?>
				<td style="text-align: center;"><?php echo $row['nombre'];?></td>
			<?php endforeach;?>
			
			</tr>
		</thead>
		<tbody>
		<?php
			
			$estudiantes = $this->db->get_where('inscribirse' , array('clase_id' => $clase_id , 'year' => $running_year))->result_array();
				foreach($estudiantes as $row):
		?>
			<tr>
				<td style="text-align: center;">
					<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;?>
				</td>
			<?php

				foreach($temas as $row2):
				
			?>
            <td style="text-align: center;">
					<?php 
						$consul_cali_obt = 	$this->db->get_where('calificacion' , array(
												'clase_id' => $clase_id , 
													'examen_id' => $examen_id , 
														'tema_id' => $row2['tema_id'] , 
															'estudiante_id' => $row['estudiante_id'],
																'year' => $running_year
											));
						if ( $consul_cali_obt->num_rows() > 0) {
							$obtenida_calificacion = $consul_cali_obt->row()->calificacion_obtenida;
							echo $obtenida_calificacion;
							if ($obtenida_calificacion >= 0 && $obtenida_calificacion != '') {
								$grado = $this->crud_model->get_grado($obtenida_calificacion);
								
							}
							
						}
						

					?>
			</td>
			<?php endforeach;?>
			
			
			</tr>

		<?php endforeach;?>

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