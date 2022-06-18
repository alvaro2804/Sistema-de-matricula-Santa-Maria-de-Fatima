<div class="row">
	<div class="col-md-12">
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#unpaid" data-toggle="tab">
						<span class="visible-xs"><i class="fa fa-user"></i></span>
						<span class="hidden-xs">Crear Factura</span>
					</a>
				</li>
				<li>

				</li>
			</ul>
			
			<div class="tab-content">
            <br>
				<div class="tab-pane active" id="unpaid">

				<!--CREACIÓN DE LA FACTURA -->
				<?php echo form_open(base_url() . 'index.php?admin/factura/create' , array('class' => 'form-horizontal form-bordered validate'));?>
				<div class="row">
					<div class="col-md-12 ">
	                        <section class="panel panel-border">
	                            <div class="panel-heading">
	                                <h4 class="panel-title">Datos de la Factura</h4>
	                            </div>
	                            <div class="panel-body">
	                                
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Clase<span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <select name="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor Requerido"
	                                        	onchange="return get_clase_estudiantes(this.value)">
	                                        	<option value="">Seleccionar Clase</option>
	                                        	<?php 
	                                        		$clases = $this->db->get('clase')->result_array();
	                                        		foreach ($clases as $row):
	                                        	?>
	                                        	<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
	                                        	<?php endforeach;?>
	                                            
	                                        </select>
	                                    </div>
	                                </div>

	                                <div class="form-group">
		                                <label class="col-sm-3 control-label">Estudiante<span class="required">*</span></label>
		                                <div class="col-sm-6">
		                                    <select name="estudiante_id" class="form-control" id="student_selection_holder" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor Requerido">
		                                        <option value="">Seleccione Primero la Clase</option>
		                                    	
		                                    </select>
		                                </div>
		                            </div>

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Título <span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" name="titulo"
                                                required title="Valor Requerido"/>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Descripción</label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" name="descripcion"/>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label class="col-sm-3 control-label">Fecha <span class="required">*</span></label>
	                                    <div class="col-sm-6">
	                                        <input type="text" class="form-control" data-plugin-datepicker name="date"
                                                required title="Valor Requerido"/>
	                                    </div>
	                                </div>

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Monto Total <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="monto"
                                            placeholder="Ingrese Monto Total"
                                                required title="Valor Requerido"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Monto Pagado <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="monto_pagado"
                                            placeholder="Ingrese Monto de Pago"
                                                required title="Valor Requerido"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estado</label>
                                    <div class="col-sm-6">
                                        <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                            <option value="pagado">Pagado</option>
                                            <option value="nopagado">No Pagado</option>
                                        </select>
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
									<div class="col-sm-offset-3 col-sm-5">
									  <button type="submit" class="btn btn-primary">Añadir Factura</button>
									</div>
								</div>
                        
	                        </div>
	                    </section>
                    </div>


	                </div>
	              	<?php echo form_close();?>

							
				</div>
				
				<div class="tab-pane" id="paid">

				</div>
				
			</div>
			
		</div>	
	</div>
</div>

<script type="text/javascript">
	// function check() {
 //    	$("#selectall").click(function () {
 //    		$("input:checkbox").prop('checked', $(this).prop("checked"));
	// 	});
	// }

	function select() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = true ;
			}

		//alert('asasas');
	}
	function unselect() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = false ;
			}
	}
</script>

<script type="text/javascript">
    function get_clase_estudiantes(clase_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_clase_estudiantes/' + clase_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });
    }
</script>

