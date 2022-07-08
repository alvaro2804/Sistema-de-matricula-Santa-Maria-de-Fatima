
<div class="row">
    <div class="col-md-12">

        <!------ INICIO CONTROL TABS------>
        <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fa fa-list"></i> 
                   <span class="hidden-xs">Lista Tablón de Anuncios</span>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab">
                   <i class="fa fa-plus-circle"></i>
                   <span class="hidden-xs">Añadir Tablón de Anuncios</span>
                </a></li>
        </ul>
        <!------FIN CONTROL TABS------>

        <div class="tab-content">
            <br>
            <!----COMIENZA LA LISTA DE TABLAS-->
            <div class="tab-pane box active" id="list">
                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs"><!-- clases disponibles "bordeadas", "alineadas a la derecha" -->
                            <li class="active">
                                <a href="#running" data-toggle="tab">
                                    <span><i class="entypo-home"></i>
                                        Activo</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#archived" data-toggle="tab">
                                    <span><i class="entypo-archive"></i>
                                        Archivado</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <br>
                            <div class="tab-pane active" id="running">

                                <?php include 'activo_anuncio.php'; ?>

                            </div>
                            <div class="tab-pane" id="archived">

                                <?php include 'archivado_anuncio.php'; ?>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!----FIN DE LA LISTA DE TABLAS--->


            <!----INICIO DE CREACION DE FORMULARIO---->
            <div class="tab-pane box" id="add">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?profesor/anuncio/create', array('class' => 'form-horizontal form-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Título <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required title="Valor Requerido" name="anuncio_titulo"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Anuncio</label>
                        <div class="col-sm-5">
                            <div class="box closable-chat-box">
                                <div class="box-content padded">
                                    <div class="chat-message-box">
                                        <textarea name="anuncio" id="ttt" rows="5" placeholder="Añadir Anuncio" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha <span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" data-plugin-datepicker required title="Valor Requerido" name="crear_timestamp"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-primary">Añadir Anuncio</button>
                        </div>
                    </div>
                    </form>                
                </div>                
            </div>
            <!---- FIN DE CREACIÓN DE FORMULARIO-->

        </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('flash_message') != ""):?>
		<script type="text/javascript">
			new PNotify({
				title: 'Successful',
				text: '<?php echo $this->session->flashdata("flash_message");?>',
				shadow: true,
				type: 'success',
				buttons: {
				sticker: false
				}
				});
		</script>
		<?php endif;?>