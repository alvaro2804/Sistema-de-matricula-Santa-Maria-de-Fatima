<?php
    $clase_nombre    =   $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
    $seccion_nombre  =   $this->db->get_where('seccion' , array('seccion_id' => $seccion_id))->row()->nombre;
    $system_nombre   =   $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $running_year  =   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
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
		Horarios<br>
		<?php echo 'Clase' . ' ' . $clase_nombre;?> : <?php echo 'Sección';?> <?php echo $seccion_nombre;?><br>
	</center>
    <br>
	<table style="width:100%; border-collapse:collapse;border: 1px solid #eee; margin-top: 10px;" border="1">
        <tbody>
            <?php 
                for($d=1;$d<=7;$d++):

                    if($d==1)$day='domingo';
                    else if($d==2)$day='lunes';
                    else if($d==3)$day='martes';
                    else if($d==4)$day='miércoles';
                    else if($d==5)$day='jueves';
                    else if($d==6)$day='viernes';
                    else if($d==7)$day='sábado';

                ?>
                <tr>
                    <td width="100"><?php echo strtoupper($day);?></td>
                    
                        <td align="left">
							<?php
							$this->db->order_by("time_inicio", "asc");
							$this->db->where('dia' , $day);
							$this->db->where('clase_id' , $clase_id);
							$this->db->where('seccion_id' , $seccion_id);
							$this->db->where('year' , $running_year);
							$rutinas   =   $this->db->get('clase_rutina')->result_array();
							foreach($rutinas as $row):
							?>
								<div style="float:left; padding:8px; margin:5px; background-color:#ccc;">
									<?php echo $this->crud_model->get_subject_name_by_id($row['tema_id']);?>
									<?php echo '('.$row['time_inicio'].'-'.$row['time_final'].')'; ?>
								</div>
							<?php endforeach;?>
                        </td>
                </tr>
           <?php endfor;?>
        </tbody>
   </table>

<br>

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
        var mywindow = window;
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="assets/css/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        //mywindow.document.write('<style>.print{border : 1px;}</style>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
    }
</script>
