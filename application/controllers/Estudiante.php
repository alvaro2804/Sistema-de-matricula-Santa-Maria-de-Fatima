<?php
if (!defined('BASEPATH'))
    exit('No se permite el acceso directo a scripts');


class Estudiante extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2027 05:00:00 GMT");
    }
    
    /***función predeterminada, redirige a la página de inicio de sesión si ningún administrador ha iniciado sesión todavía***/
    public function index()
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('estudiante_login') == 1)
            redirect(base_url() . 'index.php?estudiante/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = 'Tablero del Estudiante';
        $this->load->view('backend/index', $page_data);
    }
    
    
    /****PROFESORES*****/
    function profesor_lista($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'personal_perfil') {
            $page_data['personal_perfil']   = true;
            $page_data['current_profesor_id'] = $param2;
        }
        $page_data['profesores']   = $this->db->get('profesor')->result_array();
        $page_data['page_name']  = 'profesor';
        $page_data['page_title'] = 'Lista de Profesores';
        $this->load->view('backend/index', $page_data);
    }
    
    
    /***********************************************************************************************************/
    
    
    
    /****ADMIN TEMA / CURSOS*****/
    function tema($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url(), 'refresh');
        
        $estudiante_perfil         = $this->db->get_where('estudiante', array(
            'estudiante_id' => $this->session->userdata('estudiante_id')
        ))->row();
        $estudiante_clase_id      = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_perfil->estudiante_id,
                'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $page_data['temas']   = $this->db->get_where('tema', array(
            'clase_id' => $estudiante_clase_id,
                'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->result_array();
        $page_data['page_name']  = 'tema';
        $page_data['page_title'] = 'Administrar Tema';
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    function estudiante_hoja_calificacion($estudiante_id = '') {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $estudiante_nombre = $this->db->get_where('estudiante' , array('estudiante_id' => $estudiante_id))->row()->nombre;
        $clase_nombre   = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
        $page_data['page_name']  =   'estudiante_hoja_calificacion';
        $page_data['page_title'] =   'Hoja de Calificación para' . ' ' . $estudiante_nombre . ' (' . 'Clase' . ' ' . $clase_nombre . ')';
        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $this->load->view('backend/index', $page_data);
    }

    function ver_imprimir_estud_hoja_cali($estudiante_id , $examen_id) {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $clase_nombre   = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;

        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $page_data['examen_id']    =   $examen_id;
        $this->load->view('backend/estudiante/ver_imprimir_estud_hoja_cali', $page_data);
    }
    
    
    /**********HORARIO******************/
    function horario($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url(), 'refresh');
        
        $estudiante_perfil         = $this->db->get_where('estudiante', array(
            'estudiante_id' => $this->session->userdata('estudiante_id')
        ))->row();
        $page_data['clase_id']   = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_perfil->estudiante_id,
                'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $page_data['estudiante_id'] = $estudiante_perfil->estudiante_id;
        $page_data['page_name']  = 'horario';
        $page_data['page_title'] = 'Horarios';
        $this->load->view('backend/index', $page_data);
    }

    function horario_imprimir($clase_id , $seccion_id)
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        $page_data['clase_id']   =   $clase_id;
        $page_data['seccion_id'] =   $seccion_id;
        $this->load->view('backend/admin/horario_imprimir' , $page_data);
    }

    // PLAN DE ESTUDIO
    function plan_estudio($estudiante_id = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name']  = 'plan_estudio';
        $page_data['page_title'] = 'Plan de Estudio Escolar';
        $page_data['estudiante_id']   = $estudiante_id;
        $this->load->view('backend/index', $page_data);
    }

    function descargar_plan_estudio($plan_estudio_cod)
    {
        $archivo_nombre = $this->db->get_where('plan_estudio', array(
            'plan_estudio_cod' => $plan_estudio_cod
        ))->row()->file_name;
        $this->load->helper('download');
        $data = file_get_contents("uploads/syllabus/" . $archivo_nombre);
        $name = $archivo_nombre;

        force_download($name, $data);
    }
    
    /******GESTIONAR LAS BOLETAS / BOLETAS CON ESTADO*****/
    function pago($param1 = '', $param2 = '', $param3 = '')
    {
        //if($this->session->userdata('estudiante_login')!=1)redirect(base_url() , 'refresh');
        if ($param1 == 'realizar_pago') {
            $factura_id      = $this->input->post('factura_id');
            $system_settings = $this->db->get_where('settings', array(
                'type' => 'paypal_email'
            ))->row();
            $factura_detalles = $this->db->get_where('factura', array(
                'factura_id' => $factura_id
            ))->row();
            
            /****TRANSFERENCIA DE USUARIO A PayPal TERMINAL****/
            $this->paypal->add_field('rm', 2);
            $this->paypal->add_field('no_note', 0);
            $this->paypal->add_field('item_name', $factura_detalles->titulo);
            $this->paypal->add_field('monto', $factura_detalles->monto);
            $this->paypal->add_field('custom', $factura_detalles->factura_id);
            $this->paypal->add_field('business', $system_settings->description);
            $this->paypal->add_field('notify_url', base_url() . 'index.php?estudiante/pago/paypal_ipn');
            $this->paypal->add_field('cancel_return', base_url() . 'index.php?estudiante/pago/paypal_cancel');
            $this->paypal->add_field('return', base_url() . 'index.php?estudiante/pago/paypal_success');
            
            $this->paypal->submit_paypal_post();
            // enviar los campos a PayPal
        }
        if ($param1 == 'paypal_ipn') {
            if ($this->paypal->validate_ipn() == true) {
                $ipn_response = '';
                foreach ($_POST as $key => $value) {
                    $value = urlencode(stripslashes($value));
                    $ipn_response .= "\n$key=$value";
                }
                $data['pago_detalle']   = $ipn_response;
                $data['pago_timestamp'] = strtotime(date("m/d/Y"));
                $data['pago_metodo']    = 'paypal';
                $data['status']            = 'pagado';
                $factura_id                = $_POST['custom'];
                $this->db->where('factura_id', $factura_id);
                $this->db->update('factura', $data);

                $data2['metodo']       =   'tarjeta';
                $data2['factura_id']   =   $_POST['custom'];
                $data2['timestamp']    =   strtotime(date("m/d/Y"));
                $data2['pago_tipo'] =   'ingreso';
                $data2['titulo']        =   $this->db->get_where('factura' , array('factura_id' => $data2['factura_id']))->row()->titulo;
                $data2['descripcion']  =   $this->db->get_where('factura' , array('factura_id' => $data2['factura_id']))->row()->descripcion;
                $data2['estudiante_id']   =   $this->db->get_where('factura' , array('factura_id' => $data2['factura_id']))->row()->estudiante_id;
                $data2['monto']       =   $this->db->get_where('factura' , array('factura_id' => $data2['factura_id']))->row()->monto;
                $this->db->insert('pago' , $data2);
            }
        }
        if ($param1 == 'paypal_cancel') {
            $this->session->set_flashdata('flash_message', 'Pago Cancelado');
            redirect(base_url() . 'index.php?estudiante/pago/', 'refresh');
        }
        if ($param1 == 'paypal_success') {
            $this->session->set_flashdata('flash_message', 'Se Realizo el Pago Satisfactoriamente');
            redirect(base_url() . 'index.php?estudiante/pago/', 'refresh');
        }
        $estudiante_perfil         = $this->db->get_where('estudiante', array(
            'estudiante_id'   => $this->session->userdata('estudiante_id')
        ))->row();
        $estudiante_id              = $estudiante_perfil->estudiante_id;
        $page_data['facturas']   = $this->db->get_where('factura', array(
            'estudiante_id' => $estudiante_id
        ))->result_array();
        $page_data['page_name']  = 'pago';
        $page_data['page_title'] = 'Manejo de la Boleta / Pago';
        $this->load->view('backend/index', $page_data);
    }
    
    /**********LIBROS / BIBLIOTECA********************/
    function biblioteca($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['libros']      = $this->db->get('biblioteca')->result_array();
        $page_data['page_name']  = 'biblioteca';
        $page_data['page_title'] = 'Manejo de Libros';
        $this->load->view('backend/index', $page_data);
        
    }
 
    
    /**********ANUNCIO ********************/
    function anuncio($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['noticias']    = $this->db->get_where('anuncio',array('status'=>1))->result_array();
        $page_data['page_name']  = 'anuncio';
        $page_data['page_title'] = 'Anuncios';
        $this->load->view('backend/index', $page_data);
        
    }
    
    /**********ADMINISTRAR DOCUMENTOS / trabajo en casa PARA UNA CLASE ESPECÍFICA o TODO*******************/
    function documento($do = '', $documento_id = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['page_name']  = 'documento';
        $page_data['page_title'] = 'Administrador de Documentos';
        $page_data['documentos']  = $this->db->get('documento')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
/* MENSAJERIA PRIVADA */

function mensaje($param1 = 'mensaje_inicio', $param2 = '', $param3 = '') {
    if ($this->session->userdata('estudiante_login') != 1)
        redirect(base_url(), 'refresh');

    if ($param1 == 'enviar_nuevo') {
        $mensaje_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?estudiante/mensaje/mensaje_leido/' . $mensaje_thread_code, 'refresh');
    }

    if ($param1 == 'enviar_respuesta') {
        $this->crud_model->send_reply_message($param2);  //$param2 = mensaje_thread_code
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?estudiante/mensaje/mensaje_leido/' . $param2, 'refresh');
    }

    if ($param1 == 'mensaje_leido') {
        $page_data['actual_mensaje_thread_code'] = $param2;  // $param2 = mensaje_thread_code
        $this->crud_model->mark_thread_messages_read($param2);
    }

    $page_data['nombre_pagina_interna_del_mensaje']   = $param1;
    $page_data['page_name']                 = 'mensaje';
    $page_data['page_title']                = 'Mensajería Privada';
    $this->load->view('backend/index', $page_data);
}

    /******ADMINISTRAR SU PROPIO PERFIL Y CAMBIAR CONTRASEÑA***/
    function estudiante_perfil($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('estudiante_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'actualizar_perfil_info') {
            $data['nombre']     = $this->input->post('nombre');
            $data['email']    = $this->input->post('email');
            $data['telefono']    = $this->input->post('telefono');
            $data['direccion']  = $this->input->post('direccion');
            $data['cumpleanos'] = $this->input->post('cumpleanos');
            $data['sexo']      = $this->input->post('sexo');
            
            //validar aquí, si le dio Check a la cuenta de correo electrónico
           
            $estu_Vemail = $this->db->get_where('estudiante', array('email' => $data['email']))->row()->nombre;
            $profe_Vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->nombre;
            $Pad_Vemail = $this->db->get_where('padres', array('email' => $data['email']))->row()->nombre;
            if ($estu_Vemail == null && $profe_Vemail == null && $Pad_Vemail == null) {

            $this->db->where('estudiante_id', $this->session->userdata('estudiante_id'));
            $this->db->update('estudiante', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/estudiante_image/' . $this->session->userdata('estudiante_id') . '.jpg');
            $this->session->set_flashdata('flash_message', 'Tus datos han sido actualizados');
            } else if($data['email']== $this->db->get_where('estudiante', array(
                'estudiante_id' => $this->session->userdata('estudiante_id')
            ))->row()->email) {
            $this->db->where('estudiante_id', $this->session->userdata('estudiante_id'));
            $this->db->update('estudiante', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/estudiante_image/' . $this->session->userdata('estudiante_id') . '.jpg');
            $this->session->set_flashdata('flash_message', 'Tus datos han sido actualizados');
            } else {
                $this->session->set_flashdata('flash_message_error' ,'El correo electrónico es usado por otro alumno');
            }
            redirect(base_url() . 'index.php?estudiante/estudiante_perfil/', 'refresh');
        }
        if ($param1 == 'cambiar_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['nuevo_password']         = sha1($this->input->post('nuevo_password'));
            $data['confirm_nuevo_password'] = sha1($this->input->post('confirm_nuevo_password'));
            
            $current_password = $this->db->get_where('estudiante', array(
                'estudiante_id' => $this->session->userdata('estudiante_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['nuevo_password'] == $data['confirm_nuevo_password']) {
                $this->db->where('estudiante_id', $this->session->userdata('estudiante_id'));
                $this->db->update('estudiante', array(
                    'password' => $data['nuevo_password']
                ));
                $this->session->set_flashdata('flash_message', 'Contraseña Actualizada');
            } else {
                $this->session->set_flashdata('flash_message_error', 'No Coinciden la Contraseña, Verifica!');
            }
            redirect(base_url() . 'index.php?estudiante/estudiante_perfil/', 'refresh');
        }
        $page_data['page_name']  = 'estudiante_perfil';
        $page_data['page_title'] = 'Administrar Perfil';
        $page_data['edit_data']  = $this->db->get_where('estudiante', array(
            'estudiante_id' => $this->session->userdata('estudiante_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    function material_estudio($tarea = "", $documento_id = "")
    {
        if ($this->session->userdata('estudiante_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }
                
        if ($tarea == "create")
        {
            $this->crud_model->guardar_material_estudio_info();
            $this->session->set_flashdata('flash_message' , 'Material de Estudio Guardada Correctamente');
            redirect(base_url() . 'index.php?estudiante/material_estudio' , 'refresh');
        }
        
        if ($tarea == "actualizar")
        {
            $this->crud_model->actualizar_material_estudio_info($documento_id);
            $this->session->set_flashdata('flash_message' , 'Material de Estudio Actualizada Correctamente');
            redirect(base_url() . 'index.php?estudiante/material_estudio' , 'refresh');
        }
        
        if ($tarea == "eliminar")
        {
            $this->crud_model->eleminar_material_estudio_info($documento_id);
            redirect(base_url() . 'index.php?estudiante/material_estudio');
        }
        
        $data['material_estudio_info']    = $this->crud_model->seleccionar_material_estudio_info();
        $data['page_name']              = 'material_estudio';
        $data['page_title']             = 'Material de Estudio';
        $this->load->view('backend/index', $data);
    }
}