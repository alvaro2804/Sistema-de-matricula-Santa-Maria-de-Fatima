<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
    
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***functina predeterminada, redirige a la página de inicio de sesión si aún no hay ningún administrador que haya iniciado sesión***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('backend/index', $page_data);
    }
    


     /****ADMIN PROFESOR*****/
     function profesor($param1 = '', $param2 = '', $param3 = '')
     {
         if ($this->session->userdata('admin_login') != 1)
             redirect(base_url(), 'refresh');
         if ($param1 == 'create') {
             $data['nombre']        = $this->input->post('nombre');
             $data['cumpleanos']    = $this->input->post('cumpleanos');
             $data['sexo']         = $this->input->post('sexo');
             $data['direccion']     = $this->input->post('direccion');
             $data['telefono']       = $this->input->post('telefono');
             $data['email']       = $this->input->post('email');
             $data['password']    = sha1($this->input->post('password'));
 
             //validar aquí, si la cuenta de correo electrónico
           
             $sea_vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->name;
          
             if ($stu_vemail == null && $tea_vemail == null && $par_vemail == null) {
 
             $this->db->insert('profesor', $data);
             $teacher_id = $this->db->insert_id();
             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
             $this->session->set_flashdata('flash_message' , 'Datos añadidos satisfactoriamente');
             $this->email_model->account_opening_email('profesor', $data['email']); //SEND EMAIL
              } else {
                 $this->session->set_flashdata('flash_message_error' , 'Uso de la cuenta de correo electrónico');
             }
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         }
         if ($param1 == 'do_update') {
             $data['nombre']        = $this->input->post('nombre');
             $data['cumpleanos']    = $this->input->post('cumpleanos');
             $data['sexo']         = $this->input->post('sexo');
             $data['direccion']     = $this->input->post('direccion');
             $data['telefono']       = $this->input->post('telefono');
             $data['email']       = $this->input->post('email');
             
             $this->db->where('profesor_id', $param2);
             $this->db->update('profesor', $data);
             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
             $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         } else if ($param1 == 'personal_profile') {
             $page_data['personal_profile']   = true;
             $page_data['current_profesor_id'] = $param2;
         } else if ($param1 == 'edit') {
             $page_data['edit_data'] = $this->db->get_where('profesor', array(
                 'profesor_id' => $param2
             ))->result_array();
         }
         if ($param1 == 'change_password') {
             $data['password']         = sha1($this->input->post('new_password'));
             $data['confirmar_new_password'] = sha1($this->input->post('confirmar_new_password'));
 
             if ($data['password'] == $data['confirmar_new_password']) {  
             $this->db->where('profesor_id', $param2);
             $this->db->update('profesor', array(
                     'password' => $data['password']
                 ));
                 $this->session->set_flashdata('flash_message', 'Actualizar contraseña');
             } else {
                 $this->session->set_flashdata('flash_message_error', 'Falta de coincidencia de contraseña');
             }
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         }
         if ($param1 == 'delete') {
             $this->db->where('profesor_id', $param2);
             $this->db->delete('profesor');
             $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         }
         $page_data['teachers']   = $this->db->get('profesor')->result_array();
         $page_data['page_name']  = 'profesor';
         $page_data['page_title'] = 'Administrador Profesor';
         $this->load->view('backend/index', $page_data);
     }
   

     /****ADMIN CLASES*****/
    function clase($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['nombre']         = $this->input->post('nombre');
            $data['nombre_numerico'] = $this->input->post('nombre_numerico');
            $data['profesor_id']   = $this->input->post('profesor_id');
            $this->db->insert('clase', $data);
            $class_id = $this->db->insert_id();
            //CREAR SECCION POR DEFECTO
            $data2['clase_id']  =   $class_id;
            $data2['nombre']      =   'A';
            $this->db->insert('seccion' , $data2);

            $this->session->set_flashdata('flash_message' ,'Datos añadidos satisfactoriamente');
            redirect(base_url() . 'index.php?admin/clase/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['nombre']         = $this->input->post('nombre');
            $data['nombre_numerico'] = $this->input->post('nombre_numerico');
            $data['profesor_id']   = $this->input->post('profesor_id');
            
            $this->db->where('clase_id', $param2);
            $this->db->update('clase', $data);
            $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
            redirect(base_url() . 'index.php?admin/clase/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('clase', array(
                'clase_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('clase_id', $param2);
            $this->db->delete('clase');
            $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
            redirect(base_url() . 'index.php?admin/clase/', 'refresh');
        }
        $page_data['classes']    = $this->db->get('clase')->result_array();
        $page_data['page_name']  = 'clase';
        $page_data['page_title'] = 'Administrador Clase';
        $this->load->view('backend/index', $page_data);
    }
     function get_subject($class_id) 
    {
        $subject = $this->db->get_where('asunto' , array(
            'clase_id' => $class_id
        ))->result_array();
        foreach ($subject as $row) {
            echo '<option value="' . $row['asunto_id'] . '">' . $row['nombre'] . '</option>';
        }
    }
        
 /****ADMIN SECCIONES*****/
 function seccion($class_id = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect(base_url(), 'refresh');
     // DETECTA LA PRIMERA CLASE
     if ($class_id == '')
         if($this->db->count_all('clase') !== 0 ){
         $class_id  =  $this->db->get('clase')->first_row()->class_id;
         }

     $page_data['page_name']  = 'seccion';
     $page_data['page_title'] = 'Administración Sección';
     $page_data['clase_id']   = $class_id;
     $this->load->view('backend/index', $page_data);    
 }

 function section($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect(base_url(), 'refresh');
     if ($param1 == 'create') {
         $data['nombre']       =   $this->input->post('nombre');
         $data['nick_nombre']  =   $this->input->post('nick_nombre');
         $data['clase_id']   =   $this->input->post('clase_id');
         $data['profesor_id'] =   $this->input->post('profesor_id');
         $this->db->insert('seccion' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos añadidos satisfactoriamente');
         redirect(base_url() . 'index.php?admin/seccion/' . $data['clase_id'] , 'refresh');
     }

     if ($param1 == 'edit') {
         $data['nombre']       =   $this->input->post('nombre');
         $data['nick_nombre']  =   $this->input->post('nick_nombre');
         $data['clase_id']   =   $this->input->post('clase_id');
         $data['profesor_id'] =   $this->input->post('profesor_id');
         $this->db->where('seccion_id' , $param2);
         $this->db->update('seccion' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
         redirect(base_url() . 'index.php?admin/seccion/' . $data['clase_id'] , 'refresh');
     }

     if ($param1 == 'delete') {
         $this->db->where('seccion_id' , $param2);
         $this->db->delete('seccion');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/seccion' , 'refresh');
     }
 }

 function get_class_section($class_id)
 {
     $sections = $this->db->get_where('seccion' , array(
         'clase_id' => $class_id
     ))->result_array();
     foreach ($sections as $row) {
         echo '<option value="' . $row['seccion_id'] . '">' . $row['nombre'] . '</option>';
     }
 }

 function student($class_id = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
        
    $page_data['page_name']     = 'estudiante';
    $page_data['page_title']    = 'Información del Estudiante'. " - ".'Clase'." : ".
                                        $this->crud_model->get_class_name($class_id);
    $page_data['clase_id']  = $class_id;
    $this->load->view('backend/index', $page_data);
}

 
/****ADMIN ESTUDIANTE*****/
function estudiante($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    $running_year = $this->db->get_where('settings' , array(
        'type' => 'running_year'
    ))->row()->description;
    if ($param1 == 'create') {
        
         ////validar aquí, si la cuenta de correo electrónico
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[40]|valid_email|xss_clean|callback_get_valid_email');
        if ($this->form_validation->run() == FALSE) {
            $page_data['page_name']  = 'estudiante_add';
            $page_data['page_title'] = 'Añadir Estudiante';
            $this->load->view('backend/index', $page_data);
        
        } else {
            
        $data['nombre']           = $this->input->post('nombre');
        $data['cumpleanos']       = $this->input->post('cumpleanos');
        $data['sexo']            = $this->input->post('sexo');
        $data['religion']       = $this->input->post('religion');
        $data['grupo_sanguineo']    = $this->input->post('grupo_sanguineo');
        $data['direccion']        = $this->input->post('direccion');
        $data['telefono']          = $this->input->post('telefono');
        $data['email']          = $this->input->post('email');
        $data['password']       = sha1($this->input->post('password'));
        $data['padres_id']      = $this->input->post('padres_id');


        $this->db->insert('estudiante', $data);
        $student_id = $this->db->insert_id();

        $data2['estudiante_id']     = $student_id;
        $data2['inscribirse_code']    = substr(md5(rand(0, 1000000)), 0, 7);
        $data2['clase_id']       = $this->input->post('clase_id');
        if ($this->input->post('seccion_id') != '') {
            $data2['seccion_id'] = $this->input->post('seccion_id');
        }
        
        $data2['roll']           = $this->input->post('roll');
        $data2['date_added']     = strtotime(date("Y-m-d H:i:s"));
        $data2['year']           = $running_year;
        $this->db->insert('inscribirse', $data2);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/estudiante_image/' . $student_id . '.jpg');
        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        $this->email_model->account_opening_email('estudiante', $data['email'], $this->input->post('password')); //SEND EMAIL 
        redirect(base_url() . 'index.php?admin/estudiante_add/', 'refresh');

        }

    }
    if ($param1 == 'do_update') {
        $data['nombre']           = $this->input->post('nombre');
        $data['compleanos']       = $this->input->post('cumpleanos');
        $data['sexo']            = $this->input->post('sexo');
        $data['religion']       = $this->input->post('religion');
        $data['grupo_sanguineo']    = $this->input->post('grupo_sanguineo');
        $data['direccion']        = $this->input->post('direccion');
        $data['telefono']          = $this->input->post('telefono');
        $data['email']          = $this->input->post('email');
        $data['padres_id']      = $this->input->post('padres_id');

        
        $this->db->where('estudiante_id', $param2);
        $this->db->update('estudiante', $data);

        $data2['seccion_id']    =   $this->input->post('seccion_id');
        $data2['roll']          =   $this->input->post('roll');
        $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
        $this->db->where('estudiante_id' , $param2);
        $this->db->where('year' , $running_year);
        $this->db->update('inscribirse' , array(
            'seccion_id' => $data2['seccion_id'] , 'roll' => $data2['roll']
        ));

        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/estudiante_image/' . $param2 . '.jpg');
        $this->crud_model->clear_cache();
        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/estudiante/' . $param3, 'refresh');
        
    } 

    if ($param1 == 'change_password') {
        $data['password']         = sha1($this->input->post('new_password'));
        $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

        if ($data['password'] == $data['confirm_new_password']) {  
        $this->db->where('estudiante_id', $param2);
        $this->db->update('estudiante', array(
                'password' => $data['password']
            ));
            $this->session->set_flashdata('flash_message', 'Contraseña Actualizada');
        } else {
            $this->session->set_flashdata('flash_message_error', 'Falta coincidencia de contraseña');
        }
        redirect(base_url() . 'index.php?admin/estudiante/' . $param3, 'refresh');
    }
    
    if ($param2 == 'delete') {
        $this->db->where('estudiante_id', $param3);
        $this->db->delete('estudiante');
        $this->db->where('estudiante_id', $param3);
        $this->db->delete('inscribirse');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/estudiante/' . $param1, 'refresh');
    }
}
 
    

    
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param1 == 'do_update') {
            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type' , 'paypal_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type' , 'currency');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('footer_text');
            $this->db->where('type' , 'footer_text');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('footer_text');
            $this->db->where('type' , 'footer_text');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('running_year');
            $this->db->where('type' , 'running_year');
            $this->db->update('settings' , $data);
			
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated')); 
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
		
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'change_skin') {
			
            $data['description'] = $this->input->post('skin_colour');
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('borders_style');
            $this->db->where('type' , 'borders_style');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('header_colour');
            $this->db->where('type' , 'header_colour');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('sidebar_colour');
            $this->db->where('type' , 'sidebar_colour');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('sidebar_size');
            $this->db->where('type' , 'sidebar_size');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected')); 
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh'); 
   
        }

        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    function get_session_changer()
    {
        $this->load->view('backend/admin/change_session');
    }

    function change_session()
    {
        $data['description'] = $this->input->post('running_year');
        $this->db->where('type' , 'running_year');
        $this->db->update('settings' , $data);
        $this->session->set_flashdata('flash_message' , get_phrase('session_changed')); 
        redirect(base_url() . 'index.php?admin/dashboard/', 'refresh'); 
    }
	
	
    /*****SMS SETTINGS*********/
    function sms_settings($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'clickatell') {

            $data['description'] = $this->input->post('clickatell_user');
            $this->db->where('type' , 'clickatell_user');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_password');
            $this->db->where('type' , 'clickatell_password');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_api_id');
            $this->db->where('type' , 'clickatell_api_id');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'twilio') {

            $data['description'] = $this->input->post('twilio_account_sid');
            $this->db->where('type' , 'twilio_account_sid');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_auth_token');
            $this->db->where('type' , 'twilio_auth_token');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_sender_phone_number');
            $this->db->where('type' , 'twilio_sender_phone_number');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'active_service') {

            $data['description'] = $this->input->post('active_sms_service');
            $this->db->where('type' , 'active_sms_service');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        $page_data['page_name']  = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message_error', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
}
