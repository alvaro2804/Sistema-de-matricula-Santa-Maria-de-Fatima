<?php
if (!defined('BASEPATH'))
    exit('No se permite el acceso directo a scripts');


class Profesor extends CI_Controller
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
    
    /***función predeterminada, redirige a la página de inicio de sesión si ningún profesor ha iniciado sesión todavía***/
    public function index()
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('profesor_login') == 1)
            redirect(base_url() . 'index.php?profesor/dashboard', 'refresh');
    }
    
    /***PROFESOR DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = 'Administración del Profesor';
        $this->load->view('backend/index', $page_data);
    }
        
    
    /****MANEJO DE LOS ESTUDIANTES POR CLASE*****/

	
	function estudiante($clase_id = '')
	{
		if ($this->session->userdata('profesor_login') != 1)
            redirect('login', 'refresh');
			
		$page_data['page_name']  	= 'estudiante';
		$page_data['page_title'] 	= 'Información del Estudiante'. " - ".'Clase'." : ".
											$this->crud_model->get_class_name($clase_id);
		$page_data['clase_id'] 	= $clase_id;
		$this->load->view('backend/index', $page_data);
	}
	
	function estudiante_hoja_calificacion($estudiante_id = '') {
        if ($this->session->userdata('profesor_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $estudiante_nombre = $this->db->get_where('estudiante' , array('estudiante_id' => $estudiante_id))->row()->nombre;
        $clase_nombre   = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
        $page_data['page_name']  =   'estudiante_hoja_calificacion';
        $page_data['page_title'] =   'Hoja de Calificación Para' . ' ' . $estudiante_nombre . ' (' . 'Clase' . ' ' . $clase_nombre . ')';
        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $this->load->view('backend/index', $page_data);
    }

    function ver_imprimir_estud_hoja_cali($estudiante_id , $examen_id) {
        if ($this->session->userdata('profesor_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $clase_nombre  = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;

        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $page_data['examen_id']    =   $examen_id;
        $this->load->view('backend/profesor/ver_imprimir_estud_hoja_cali', $page_data);
    }
	

    function get_class_section($clase_id)
    {
        $secciones= $this->db->get_where('seccion' , array(
            'clase_id' => $clase_id
        ))->result_array();
        foreach ($secciones as $row) {
            echo '<option value="' . $row['seccion_id'] . '">' . $row['nombre'] . '</option>';
        }
    }
    
    function get_clase_tema($clase_id) 
    {
        $tema = $this->db->get_where('tema' , array(
            'clase_id' => $clase_id
        ))->result_array();
        foreach ($tema as $row) {
            echo '<option value="' . $row['tema_id'] . '">' . $row['nombre'] . '</option>';
        }
    }
    /****MANEJO DE LOS PROFESORES*****/
    function profesor($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('profesor_login') != 1)
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
    
    
    
    /****TEMA / ASIGNATURA*****/
    function tema($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect(base_url(), 'refresh');
       
		$page_data['clase_id']   = $param1;
        $page_data['temas']   = $this->db->get_where('tema' , array(
            'clase_id' => $param1,
            'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->result_array();
        $page_data['page_name']  = 'tema';
        $page_data['page_title'] = 'Lista de Asignaturas';
        $this->load->view('backend/index', $page_data);
    }
    
   
     /****ADMIN EXAM CALIFICACION*****/
  
   function ingreso_calificacion()
   {
       if ($this->session->userdata('profesor_login') != 1)
           redirect(base_url(), 'refresh');
       $page_data['page_name']  =   'ingreso_calificacion';
       $page_data['page_title'] = 'Manejo de Calificaciones';
       $this->load->view('backend/index', $page_data);
   }

   function ver_manejo_calificacion($examen_id = '' , $clase_id = '' , $seccion_id = '' , $tema_id = '')
   {
       if ($this->session->userdata('profesor_login') != 1)
           redirect(base_url(), 'refresh');
       $page_data['examen_id']    =   $examen_id;
       $page_data['clase_id']   =   $clase_id;
       $page_data['tema_id'] =   $tema_id;
       $page_data['seccion_id'] =   $seccion_id;
       $page_data['page_name']  =   'ver_manejo_calificacion';
       $page_data['page_title'] = 'Manejo de Calificaciones';
       $this->load->view('backend/index', $page_data);
   }

   function selector_calificacion()
   {
       if ($this->session->userdata('profesor_login') != 1)
           redirect(base_url(), 'refresh');

       $data['examen_id']    = $this->input->post('examen_id');
       $data['clase_id']   = $this->input->post('clase_id');
       $data['seccion_id'] = $this->input->post('seccion_id');
       $data['tema_id'] = $this->input->post('tema_id');
       $data['year']       = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
       $query = $this->db->get_where('calificacion' , array(
                   'examen_id' => $data['examen_id'],
                       'clase_id' => $data['clase_id'],
                           'seccion_id' => $data['seccion_id'],
                               'tema_id' => $data['tema_id'],
                                   'year' => $data['year']
               ));
       if($query->num_rows() < 1) {
           $estudiantes = $this->db->get_where('inscribirse' , array(
               'clase_id' => $data['clase_id'] , 'seccion_id' => $data['seccion_id'] , 'year' => $data['year']
           ))->result_array();
           foreach($estudiantes as $row) {
               $data['estudiante_id'] = $row['estudiante_id'];
               $this->db->insert('calificacion' , $data);
           }
       }
       redirect(base_url() . 'index.php?profesor/ver_manejo_calificacion/' . $data['examen_id'] . '/' . $data['clase_id'] . '/' . $data['seccion_id'] . '/' . $data['tema_id'] , 'refresh');
       
   }

   function actualizar_calificacion($examen_id = '' , $clase_id = '' , $seccion_id = '' , $tema_id = '')
   {
       $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
       $calif_estu = $this->db->get_where('calificacion' , array(
           'examen_id' => $examen_id,
               'clase_id' => $clase_id,
                   'seccion_id' => $seccion_id,
                       'year' => $running_year,
                           'tema_id' => $tema_id
       ))->result_array();
       foreach($calif_estu as $row) {
           $calificacion_obtenida = $this->input->post('calificacion_obtenida_'.$row['calificacion_id']);
           $comentario = $this->input->post('comentario_'.$row['calificacion_id']);
           $this->db->where('calificacion_id' , $row['calificacion_id']);
           $this->db->update('calificacion' , array('calificacion_obtenida' => $calificacion_obtenida , 'comentario' => $comentario));
       }
       $this->session->set_flashdata('flash_message' , 'Calificación Actualizada');
       redirect(base_url().'index.php?profesor/ver_manejo_calificacion/'.$examen_id.'/'.$clase_id.'/'.$seccion_id.'/'.$tema_id , 'refresh');
   }

   function calificacion_get_tema($clase_id)
   {
       $page_data['clase_id'] = $clase_id;
       $this->load->view('backend/profesor/calificacion_get_tema' , $page_data);
   }

   // REPORTE
   function calificacion_reporte($clase_id = '' , $examen_id = '') {
       if ($this->session->userdata('profesor_login') != 1)
           redirect(base_url(), 'refresh');
       
       if ($this->input->post('operacion') == 'seleccion') {
           $page_data['examen_id']    = $this->input->post('examen_id');
           $page_data['clase_id']   = $this->input->post('clase_id');
           
           if ($page_data['examen_id'] > 0 && $page_data['clase_id'] > 0) {
               redirect(base_url() . 'index.php?profesor/calificacion_reporte/' . $page_data['clase_id'] . '/' . $page_data['examen_id'] , 'refresh');
           } else {
               $this->session->set_flashdata('mark_message', 'Elige clase y examen');
               redirect(base_url() . 'index.php?profesor/calificacion_reporte/', 'refresh');
           }
       }
       $page_data['examen_id']    = $examen_id;
       $page_data['clase_id']   = $clase_id;
       
       $page_data['page_info'] = 'Notas del Examen';
       
       $page_data['page_name']  = 'calificacion_reporte';
       $page_data['page_title'] = 'Reporte de Calificaciones';
       $this->load->view('backend/index', $page_data);
   
   }

   function ver_imprimir_calificacion($clase_id , $examen_id) {
       if ($this->session->userdata('profesor_login') != 1)
           redirect(base_url(), 'refresh');
       $page_data['clase_id'] = $clase_id;
       $page_data['examen_id']  = $examen_id;
       $this->load->view('backend/profesor/ver_imprimir_calificacion' , $page_data);
   }
   


    // PLAN DE ESTUDIOS 
 function plan_estudio($clase_id = '')
 {
     if ($this->session->userdata('profesor_login') != 1)
         redirect(base_url(), 'refresh');
     // detectar la primera clase
     if ($clase_id == '')
         if($this->db->count_all('clase') !== 0 ){
         $clase_id           =   $this->db->get('clase')->first_row()->clase_id;
         }

     $page_data['page_name']  = 'plan_estudio';
     $page_data['page_title'] = 'Plan de Estudio Escolar';
     $page_data['clase_id']   = $clase_id;
     $this->load->view('backend/index', $page_data);
 }

 function usuario_plan_estudio()
 {
     $data['plan_estudio_cod'] =   substr(md5(rand(0, 1000000)), 0, 7);
     $data['titulo']                  =   $this->input->post('titulo');
     $data['descripcion']            =   $this->input->post('descripcion');
     $data['clase_id']               =   $this->input->post('clase_id');
     $data['tema_id']             =   $this->input->post('tema_id');
     $data['usuario_tipo']          =   $this->session->userdata('login_type');
     $data['usuario_id']            =   $this->session->userdata('login_user_id');
     $data['year']                   =   $this->db->get_where('settings',array('type'=>'running_year'))->row()->description;
     $data['timestamp']              =   strtotime(date("Y-m-d H:i:s"));
     //cargar archivos mediante la biblioteca de carga de codeigniter
     $files = $_FILES['file_name'];
        $this->load->library('upload');
        $config['upload_path']   =  'uploads/syllabus/';
        $config['allowed_types'] =  '*';
        $config['remove_spaces']= false;
        $_FILES['file_name']['name']     = $files['name'];
        $_FILES['file_name']['type']     = $files['type'];
        $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
        $_FILES['file_name']['size']     = $files['size'];
        $this->upload->initialize($config);
        $this->upload->do_upload('file_name');

        $data['file_name'] = $_FILES['file_name']['name'];

     $this->db->insert('plan_estudio', $data);
     $this->session->set_flashdata('flash_message' , 'Archivo Subido con Exito');
     redirect(base_url() . 'index.php?profesor/plan_estudio/' . $data['clase_id'] , 'refresh');

 }
 
 /****ELIMINAR PLAN DE ESTUDIO****/
 function plan_estudio_eliminar($plan_estudio_cod, $clase_id = '')
 {
     $archivo_nombre = "uploads/syllabus/" .$this->db->get_where('plan_estudio', array(
         'plan_estudio_cod' => $plan_estudio_cod
     ))->row()->file_name;
     if (file_exists($archivo_nombre)) {
         unlink($archivo_nombre);
     }
     $this->db->where('plan_estudio_cod',$plan_estudio_cod);
     $this->db->delete('plan_estudio');
     $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
     redirect(base_url() . 'index.php?profesor/plan_estudio/' . $clase_id , 'refresh');
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

 
    
    /******ADMINISTRAR SU PROPIO PERFIL Y CAMBIAR CONTRASEÑA***/
    function profesor_perfil($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'actualizar_perfil_info') {
            $data['nombre']        = $this->input->post('nombre');
            $data['email']       = $this->input->post('email');
            $data['telefono']       = $this->input->post('telefono');
            $data['direccion']       = $this->input->post('direccion');
            $data['cumpleanos']       = $this->input->post('cumpleanos');
            $data['sexo']       = $this->input->post('sexo');

            //validar aquí, si la cuenta de correo electrónico
            $Estu_Vemail = $this->db->get_where('estudiante', array('email' => $data['email']))->row()->nombre;
            $Prof_Vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->nombre;
            $Pad_Vemail = $this->db->get_where('padres', array('email' => $data['email']))->row()->nombre;
            if ($Estu_Vemail == null && $Prof_Vemail == null && $Pad_Vemail == null) {
            
            $this->db->where('profesor_id', $this->session->userdata('profesor_id'));
            $this->db->update('profesor', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/profesor_image/' . $this->session->userdata('profesor_id') . '.jpg');
            $this->session->set_flashdata('flash_message', 'Datos Actualizados Correctamente');
            } else if($data['email']== $this->db->get_where('profesor', array(
                'profesor_id' => $this->session->userdata('profesor_id')
            ))->row()->email) {
            $this->db->where('profesor_id', $this->session->userdata('profesor_id'));
            $this->db->update('profesor', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/profesor_image/' . $this->session->userdata('profesor_id') . '.jpg');
            $this->session->set_flashdata('flash_message', 'Datos Actualizados Correctamente');
            } else {
                $this->session->set_flashdata('flash_message_error' , 'Cuenta de Correo Electrónico Usada');
            }
            redirect(base_url() . 'index.php?profesor/profesor_perfil/', 'refresh');
        }
        if ($param1 == 'cambiar_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['nuevo_password']         = sha1($this->input->post('nuevo_password'));
            $data['confirm_nuevo_password'] = sha1($this->input->post('confirm_nuevo_password'));
            
            $actual_password = $this->db->get_where('profesor', array(
                'profesor_id' => $this->session->userdata('profesor_id')
            ))->row()->password;
            if ($actual_password == $data['password'] && $data['nuevo_password'] == $data['confirm_nuevo_password']) {
                $this->db->where('profesor_id', $this->session->userdata('profesor_id'));
                $this->db->update('profesor', array(
                    'password' => $data['nuevo_password']
                ));
                $this->session->set_flashdata('flash_message', 'Contraseña Actualizada');
            } else {
                $this->session->set_flashdata('flash_message_error', 'La Contraseña no Coinciden');
            }
            redirect(base_url() . 'index.php?profesor/profesor_perfil/', 'refresh');
        }
        $page_data['page_name']  = 'profesor_perfil';
        $page_data['page_title'] = 'Administrar Perfil';
        $page_data['edit_data']  = $this->db->get_where('profesor', array(
            'profesor_id' => $this->session->userdata('profesor_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /**********HORARIOS******************/
    function horario($clase_id = '')
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'horario';
        $page_data['clase_id']  =   $clase_id;
        $page_data['page_title'] = 'Horarios';
        $this->load->view('backend/index', $page_data);
    }

    function horario_imprimir($clase_id , $seccion_id)
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect('login', 'refresh');
        $page_data['clase_id']   =   $clase_id;
        $page_data['seccion_id'] =   $seccion_id;
        $this->load->view('backend/profesor/horario_imprimir' , $page_data);
    }
	
	function get_valid_email()
    {
        $email = $_POST["email"];
            //validar aquí, si la cuenta de correo electrónico
            $estu_vemail = $this->db->get_where('estudiante', array('email' => $email))->row()->nombre;
            $prof_vemail = $this->db->get_where('profesor', array('email' => $email))->row()->nombre;
            $pad_vmail = $this->db->get_where('padres', array('email' => $email))->row()->nombre;
            if ($estu_vemail == null && $prof_vemail == null && $pad_vemail == null) {
                return true;
            } else {
				$this->form_validation->set_message("get_valid_email", get_phrase('La cuenta de correo electrónico está en uso'));
				$this->session->set_flashdata('flash_message_error', get_phrase('La cuenta de correo electrónico está en uso'));
                return false;
            }
    }
	
	/****** ASISTENCIA*****************/
    function asistencia()
    {
        if($this->session->userdata('profesor_login')!=1)
            redirect(base_url() , 'refresh');
        
        $page_data['page_name']  =  'asistencia';
        $page_data['page_title'] =  'Gestionar Asistencia Diaria';
        $this->load->view('backend/index', $page_data);
    }
 
    function ver_asistencia($clase_id = '' , $seccion_id = '' , $timestamp = '')
    {
        if($this->session->userdata('profesor_login')!=1)
            redirect(base_url() , 'refresh');
        $clase_nombre = $this->db->get_where('clase' , array(
            'clase_id' => $clase_id
        ))->row()->nombre;
        $page_data['clase_id'] = $clase_id;
        $page_data['timestamp'] = $timestamp;
        $page_data['page_name'] = 'ver_asistencia';
        $seccion_nombre = $this->db->get_where('seccion' , array(
            'seccion_id' => $seccion_id
        ))->row()->nombre;
        $page_data['seccion_id'] = $seccion_id;
        $page_data['page_title'] = 'Gestionar Asistencia de clase' . ' ' . $clase_nombre . ' : ' . 'Sección' . ' ' . $seccion_nombre;
        $this->load->view('backend/index', $page_data);
    }
 
    /*PARA QUE CARGE EL LISTADO DE SECCIÓN -*/
    function get_seccion($clase_id) {
     $page_data['clase_id'] = $clase_id; 
     $this->load->view('backend/profesor/administrar_titular_asistencia' , $page_data);
 }
 
 function seleccionador_asistencia()
 {
     $data['clase_id']   = $this->input->post('clase_id');
     $data['year']       = $this->input->post('year');
     $data['timestamp']  = strtotime($this->input->post('timestamp'));
     $data['seccion_id'] = $this->input->post('seccion_id');
     $query = $this->db->get_where('asistencia' ,array(
         'clase_id'=>$data['clase_id'],
             'seccion_id'=>$data['seccion_id'],
                 'year'=>$data['year'],
                     'timestamp'=>$data['timestamp']
     ));
     if($query->num_rows() < 1) {
         $estudiantes = $this->db->get_where('inscribirse' , array(
             'clase_id' => $data['clase_id'] , 'seccion_id' => $data['seccion_id'] , 'year' => $data['year']
         ))->result_array();
       
         foreach($estudiantes as $row) {
             $attn_data['clase_id']   = $data['clase_id'];
             $attn_data['year']       = $data['year'];
             $attn_data['timestamp']  = $data['timestamp'];
             $attn_data['seccion_id'] = $data['seccion_id'];
             $attn_data['estudiante_id'] = $row['estudiante_id'];
             $this->db->insert('asistencia' , $attn_data);  
         }
         
     }
     redirect(base_url().'index.php?profesor/ver_asistencia/'.$data['clase_id'].'/'.$data['seccion_id'].'/'.$data['timestamp'],'refresh');
 }
 
 
 function actualizar_asistencia($class_id = '' , $section_id = '' , $timestamp = '')
     {
         $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $active_sms_service = $this->db->get_where('settings' , array('type' => 'active_sms_service'))->row()->description;
         $attendance_of_students = $this->db->get_where('asistencia' , array(
             'clase_id'=>$class_id,'seccion_id'=>$section_id,'year'=>$running_year,'timestamp'=>$timestamp
         ))->result_array();
         foreach($attendance_of_students as $row) {
             $attendance_status = $this->input->post('status_'.$row['asistencia_id']);
             $this->db->where('asistencia_id' , $row['asistencia_id']);
             $this->db->update('asistencia' , array('status' => $attendance_status));
 
             if ($attendance_status == 2) {
 
                 if ($active_sms_service != '' || $active_sms_service != 'disabled') {
                     $student_name   = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
                     $parent_id      = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
                     $receiver_phone = $this->db->get_where('padres' , array('padres_id' => $parent_id))->row()->telefono;
                     $message        = 'Tu Hijo(a)' . ' ' . $student_name . 'está ausente hoy.';
                     $this->sms_model->send_sms($message,$receiver_phone);
                 }
             }
         }
         $this->session->set_flashdata('flash_message' , 'Asistencia Guardada');
         redirect(base_url().'index.php?profesor/ver_asistencia/'.$class_id.'/'.$section_id.'/'.$timestamp , 'refresh');
     }

     ///////ASISTENCIA REPORTE /////
function asistencia_reporte() {
    $page_data['month']        = date('m');
    $page_data['page_name']    = 'asistencia_reporte';
    $page_data['page_title']   = 'Reporte de Asistencia';
    $this->load->view('backend/index',$page_data);
}
function ver_asistencia_reporte($clase_id = '' , $seccion_id = '', $month = '') {
    if($this->session->userdata('profesor_login')!=1)
       redirect(base_url() , 'refresh');
   $clase_nombre = $this->db->get_where('clase' , array(
       'clase_id' => $clase_id
   ))->row()->nombre;
   $page_data['clase_id'] = $clase_id;
   $page_data['month']    = $month;
   $page_data['page_name'] = 'ver_asistencia_reporte';
   $seccion_nombre = $this->db->get_where('seccion' , array(
       'seccion_id' => $seccion_id
   ))->row()->nombre;
   //para ver el reprte de la asistencia segun la sección
   $page_data['seccion_id'] = $seccion_id;
   $page_data['page_title'] = 'Asistencia Reporte de Clase' . ' ' . $clase_nombre . ' : ' . 'Sección' . ' ' . $seccion_nombre;
   $this->load->view('backend/index', $page_data);
}
function ver_asistencia_reporte_imprimir($clase_id ='' , $seccion_id = '' , $month = '') {
     if ($this->session->userdata('profesor_login') != 1)
       redirect(base_url(), 'refresh');
   $page_data['clase_id'] = $clase_id;
   $page_data['seccion_id']  = $seccion_id;
   $page_data['month'] = $month;
   $this->load->view('backend/profesor/ver_asistencia_reporte_imprimir' , $page_data);
}

function asistencia_reporte_seleccionador()
{
   $data['clase_id']   = $this->input->post('clase_id');
   $data['year']       = $this->input->post('year');
   $data['month']  = $this->input->post('month');
   $data['seccion_id'] = $this->input->post('seccion_id');
   redirect(base_url().'index.php?profesor/ver_asistencia_reporte/'.$data['clase_id'].'/'.$data['seccion_id'].'/'.$data['month'],'refresh');
}

    
    
    /**********BIBLIOTECA********************/
    function biblioteca($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('profesor_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['libros']      = $this->db->get('biblioteca')->result_array();
        $page_data['page_name']  = 'biblioteca';
        $page_data['page_title'] = 'Manejo de Libros de la Biblioteca';
        $this->load->view('backend/index', $page_data);
        
    }

    
    /***ADMINISTRAR EVENTO / TABLÓN DE ANUNCIOS, SERÁ VISTO POR EL PANEL DE TODAS LAS CUENTAS**/

function anuncio($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('profesor_login') != 1)
        redirect(base_url(), 'refresh');
    
    if ($param1 == 'create') {
        $data['anuncio_titulo']     = $this->input->post('anuncio_titulo');
        $data['anuncio']           = $this->input->post('anuncio');
        $data['crear_timestamp'] = strtotime($this->input->post('crear_timestamp'));
        $this->db->insert('anuncio', $data);

        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        redirect(base_url() . 'index.php?profesor/anuncio/', 'refresh');
    }
    if ($param1 == 'actualizar') {
        $data['anuncio_titulo']     = $this->input->post('anuncio_titulo');
        $data['anuncio']           = $this->input->post('anuncio');
        $data['crear_timestamp'] = strtotime($this->input->post('crear_timestamp'));
        $this->db->where('anuncio_id', $param2);
        $this->db->update('anuncio', $data);

        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?profesor/anuncio/', 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('anuncio', array(
            'anuncio_id' => $param2
        ))->result_array();
    }
    if ($param1 == 'eliminar') {
        $this->db->where('anuncio_id', $param2);
        $this->db->delete('anuncio');
        $this->session->set_flashdata('flash_message' , 'Datos eliminados');
        redirect(base_url() . 'index.php?profesor/anuncio/', 'refresh');
    }
    if ($param1 == 'archivar_anuncio') {
        $this->db->where('anuncio_id' , $param2);
        $this->db->update('anuncio' , array('status' => 0));
        redirect(base_url() . 'index.php?profesor/anuncio/', 'refresh');
    }

    if ($param1 == 'eliminar_de_archivo') {
        $this->db->where('anuncio_id' , $param2);
        $this->db->update('anuncio' , array('status' => 1));
        redirect(base_url() . 'index.php?profesor/anuncio/', 'refresh');
    }
    $page_data['page_name']  = 'anuncio';
    $page_data['page_title'] = 'Administrar Tablón de Anuncios';
    $this->load->view('backend/index', $page_data);
}

    
    
    /**********ADMINISTRAR DOCUMENTOS / trabajo en casa PARA UNA CLASE ESPECÍFICA o TODO*******************/
    function document($do = '', $document_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($do == 'upload') {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], "uploads/document/" . $_FILES["userfile"]["name"]);
            $data['document_name'] = $this->input->post('document_name');
            $data['file_name']     = $_FILES["userfile"]["name"];
            $data['file_size']     = $_FILES["userfile"]["size"];
            $this->db->insert('document', $data);
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        if ($do == 'delete') {
            $this->db->where('document_id', $document_id);
            $this->db->delete('document');
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        $page_data['page_name']  = 'manage_document';
        $page_data['page_title'] = get_phrase('manage_documents');
        $page_data['documents']  = $this->db->get('document')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*********MATERIAL DE ESTUDIO************/
    function material_estudio($tarea = "", $documento_id = "")
    {
        if ($this->session->userdata('profesor_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }
                
        if ($tarea == "create")
        {
            $this->crud_model->guardar_material_estudio_info();
            $this->session->set_flashdata('flash_message' , 'Material de Estudio Guardada Correctamente');
            redirect(base_url() . 'index.php?profesor/material_estudio' , 'refresh');
        }
        
        if ($tarea == "actualizar")
        {
            $this->crud_model->actualizar_material_estudio_info($documento_id);
            $this->session->set_flashdata('flash_message' , 'Material de Estudio Actualizada Correctamente');
            redirect(base_url() . 'index.php?profesor/material_estudio' , 'refresh');
        }
        
        if ($tarea == "eliminar")
        {
            $this->crud_model->eleminar_material_estudio_info($documento_id);
            redirect(base_url() . 'index.php?profesor/material_estudio');
        }
        
        $data['material_estudio_info']    = $this->crud_model->seleccionar_material_estudio_info();
        $data['page_name']              = 'material_estudio';
        $data['page_title']             = 'Material de Estudio';
        $this->load->view('backend/index', $data);
    }
    
     /* MENSAJERIA PRIVADA */

 function mensaje($param1 = 'mensaje_inicio', $param2 = '', $param3 = '') {
    if ($this->session->userdata('profesor_login') != 1)
    {
         $this->session->set_userdata('last_page' , current_url());
        redirect(base_url(), 'refresh');
    }

    if ($param1 == 'enviar_nuevo') {
        $mensaje_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?profesor/mensaje/mensaje_leido/' . $mensaje_thread_code, 'refresh');
    }

    if ($param1 == 'enviar_respuesta') {
        $this->crud_model->send_reply_message($param2);  //$param2 = mensaje_thread_code
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?profesor/mensaje/mensaje_leido/' . $param2, 'refresh');
    }

    if ($param1 == 'mensaje_leido') {
        $page_data['actual_mensaje_thread_code'] = $param2;  // $param2 = mensajee_thread_code
        $this->crud_model->mark_thread_messages_read($param2);
    }

    $page_data['nombre_pagina_interna_del_mensaje']   = $param1;
    $page_data['page_name']                 = 'mensaje';
    $page_data['page_title']                = 'Mensajería Privada';
    $this->load->view('backend/index', $page_data);
 }
}