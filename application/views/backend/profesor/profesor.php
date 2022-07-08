<section class="panel">
	
	<div class="panel-body">
		<table class="table table-bordered table-striped table-condensed mb-none" id="render-data">
			<thead>
				<tr>
					<th width="80">
						<div>
							Foto
						</div>
					</th>
					<th>
						<div>
							Nombre
						</div>
					</th>
					<th>
						<div>
							Email
						</div>
					</th>
				
				</tr>
			</thead>
			<tbody>
			
				<?php
				$profesores = $this->db->get( 'profesor' )->result_array();
				foreach ( $profesores as $row ): ?>
				<tr>
					<td class="center"><img src="<?php echo $this->crud_model->get_image_url('profesor',$row['profesor_id']);?>" width="30"/>
					</td>
					<td>
						<?php echo $row['nombre'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
				
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>

<script type="text/javascript">

jQuery(document).ready(function() {
jQuery('#render-data').DataTable({

rowReorder: {
selector: 'td:nth-child(2)'
},
responsive: true,

"paging": true,
"processing": true,

dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf', 'print', 'copy',
],
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
} );
} );
        
</script>