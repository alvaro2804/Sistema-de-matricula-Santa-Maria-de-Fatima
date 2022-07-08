<?php
	$clase_nombre		 	= 	$this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
	$examen_nombre  		= 	$this->db->get_where('examen' , array('examen_id' => $examen_id))->row()->nombre;
	$system_nombre        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $running_year       =   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
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
		Hoja de Calificación del Alumno<br>
		<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $estudiante_id))->row()->nombre;?><br>
		<?php echo 'Clase'. ' ' . $clase_nombre;?><br>
		<?php echo $examen_nombre;?>
	</center>

	<table style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">
       <thead>
        <tr>
            <td style="text-align: center;">Cursos</td>
            <td style="text-align: center;">Nota Obtenida</td>
            <td style="text-align: center;">Nota más alta</td>
            <td style="text-align: center;">Grado</td>
            <td style="text-align: center;">Comentario</td>
        </tr>
    </thead>
    <tbody>
        <?php 

            $temas = $this->db->get_where('tema' , array(
                    'clase_id' => $clase_id , 'year' => $running_year
            ))->result_array();
            foreach ($temas as $row3):
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $row3['nombre'];?></td>
                <td style="text-align: center;">
                    <?php
                        $consul_cali_obt = $this->db->get_where('calificacion' , array(
                                                    'tema_id' => $row3['tema_id'],
                                                        'examen_id' => $examen_id,
                                                            'clase_id' => $clase_id,
                                                                'estudiante_id' => $estudiante_id , 
                                                                    'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
                                                ));
                        if($consul_cali_obt->num_rows() > 0){
                            $calificaciones = $consul_cali_obt->result_array();
                            foreach ($calificaciones as $row4) {
                                echo $row4['calificacion_obtenida'];
                           
                            }
                        }
                    ?>
                </td>
                <td style="text-align: center;">
                    <?php

                    $calificacion_alta = $this->crud_model->get_calificacion_alta( $examen_id , $clase_id , $row3['tema_id'] );
                    echo $calificacion_alta;



                    ?>
                </td>
                <td style="text-align: center;">
                    <?php
                        if($consul_cali_obt->num_rows() > 0){
                            if ($row4['calificacion_obtenida'] >= 0 || $row4['calificacion_obtenida'] != '') {
                                $grado = $this->crud_model->get_grado($row4['calificacion_obtenida']);
                                echo $grado['nombre'];
                                $total_grade_point += $grado['grado_punto'];
                            }
                        }
                    ?>
                </td>
                <td style="text-align: center;">
                    <?php if($consul_cali_obt->num_rows() > 0) echo $row4['comentario'];?>
                </td>
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
        var mywindow = window.open('', 'my div', 'height=800,width=800');
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