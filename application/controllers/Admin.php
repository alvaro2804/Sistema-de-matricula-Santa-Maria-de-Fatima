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
         $class_id  =  $this->db->get('clase')->first_row()->clase_id;
         }

     $page_data['page_name']  = 'seccion';
     $page_data['page_title'] = 'Administración Sección';
     $page_data['class_id']   = $class_id;
     $this->load->view('backend/index', $page_data);    
 }

 function secciones($param1 = '' , $param2 = '')
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

 //VALIDANDO EL EMAIL PARA EL ESTUDIANTE, DOCENTE Y PADRES
 function get_valid_email()
    {
        $email = $_POST["email"];
            //validate here, if the Check email account
            $stu_vemail = $this->db->get_where('estudiante', array('email' => $email))->row()->nombre;
            $sea_vemail = $this->db->get_where('profesor', array('email' => $email))->row()->nombre;
            $par_vmail = $this->db->get_where('padres', array('email' => $email))->row()->nombre;
            if ($stu_vemail == null && $tea_vemail == null && $par_vemail == null) {
                return true;
            } else {
				$this->form_validation->set_message("get_valid_email", 'Esta cuenta de correo electrónico ya se utiliza');
				$this->session->set_flashdata('flash_message_error', 'Esta cuenta de correo electrónico ya se utiliza');
                return false;
            }
    }

    
    function get_class_students($class_id)
    {
        $students = $this->db->get_where('inscribirse' , array(
            'clase_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->result_array();
        foreach ($students as $row) {
            $name = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
            echo '<option value="' . $row['estudiante_id'] . '">' . $name . '</option>';
        }
    }


    function get_class_students_mass($class_id)
    {
        $students = $this->db->get_where('inscribirse' , array(
            'clase_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->result_array();
        echo '<div class="form-group">
                <label class="col-sm-3 control-label">' . 'Estudiante' . '</label>
                <div class="col-sm-9">';
        foreach ($students as $row) {
             $name = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
            echo '<div class="checkbox">
                    <label><input type="checkbox" class="check" name="estudiante_id[]" value="' . $row['estudiante_id'] . '">' . $name .'</label>
                </div>';
        }
        echo '<br><button type="button" class="btn btn-default" onClick="select()">'.get_phrase('select_all').'</button>';
        echo '<button style="margin-left: 5px;" type="button" class="btn btn-default" onClick="unselect()"> '.get_phrase('select_none').' </button>';
        echo '</div></div>';
    }


     /****MANAGE STUDENTS CLASSWISE*****/
     function estudiante_add()
     {
         if ($this->session->userdata('admin_login') != 1)
             redirect(base_url(), 'refresh');
             
         $page_data['page_name']  = 'estudiante_add';
         $page_data['page_title'] = 'Añadir Estudiante';
         $this->load->view('backend/index', $page_data);
     }


    
    function get_sections($class_id)
    {
        $page_data['clase_id'] = $class_id;  
        $this->load->view('backend/admin/estudiante_masiva_add_secciones' , $page_data);
    }


 function estudiante($class_id = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
        
    $page_data['page_name']     = 'estudiante';
    $page_data['page_title']    = 'Información del Estudiante'. " - ".'Clase'." : ".
                                        $this->crud_model->get_class_name($class_id);
    $page_data['class_id']  = $class_id;
    $this->load->view('backend/index', $page_data);
}

 
/****ADMIN ESTUDIANTE*****/
function estudiantes($param1 = '', $param2 = '', $param3 = '')
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
        $data['cumpleanos']       = $this->input->post('cumpleanos');
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
 
    
   /****MANAGE PARENTS CLASSWISE*****/
   function padres($param1 = '', $param2 = '', $param3 = '')
   {
       if ($this->session->userdata('admin_login') != 1)
           redirect('login', 'refresh');
       if ($param1 == 'create') {
           $data['nombre']        			= $this->input->post('nombre');
           $data['email']       			= $this->input->post('email');
           $data['password']    			= sha1($this->input->post('password'));
           $data['telefono']       			= $this->input->post('telefono');
           $data['direccion']     			= $this->input->post('direccion');
           $data['profesion']  			= $this->input->post('profesion');
           
           //validate here, if the Check email account
           $Stu_Vemail = $this->db->get_where('estudiante', array('email' => $data['email']))->row()->nombre;
           $Tea_Vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->nombre;
           $Par_Vemail = $this->db->get_where('padres', array('email' => $data['email']))->row()->nombre;
           if ($Stu_Vemail == null && $Tea_Vemail == null && $Par_Vemail == null) {
               
           $this->db->insert('padres', $data);
           $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
           $this->email_model->account_opening_email('padres', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            } else {
               $this->session->set_flashdata('flash_message_error' , 'Uso de la cuenta de correo electrónico');
           }
           redirect(base_url() . 'index.php?admin/padres/', 'refresh');
       }
       if ($param1 == 'edit') {
           $data['nombre']                   = $this->input->post('nombre');
           $data['email']                  = $this->input->post('email');
           $data['telefono']                  = $this->input->post('telefono');
           $data['direccion']                = $this->input->post('direccion');
           $data['profesion']             = $this->input->post('profesion');
           $this->db->where('padres_id' , $param2);
           $this->db->update('padres' , $data);
           $this->session->set_flashdata('flash_message' , get_phrase('Datos Actualizados'));
           redirect(base_url() . 'index.php?admin/padres/', 'refresh');
       }
       if ($param1 == 'change_password') {
           $data['password']         = sha1($this->input->post('new_password'));
           $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

           if ($data['password'] == $data['confirm_new_password']) {  
           $this->db->where('padres_id', $param2);
           $this->db->update('padres', array(
                   'password' => $data['password']
               ));
               $this->session->set_flashdata('flash_message', 'Contraseña Actualizado');
           } else {
               $this->session->set_flashdata('flash_message_error', 'La Contraseña no coinciden');
           }
           redirect(base_url() . 'index.php?admin/padres/', 'refresh');
       }
       if ($param1 == 'delete') {
           $this->db->where('padres_id' , $param2);
           $this->db->delete('padres');
           $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
           redirect(base_url() . 'index.php?admin/padres/', 'refresh');
       }
       $page_data['page_title'] 	= 'Lista de todos los Padres';
       $page_data['page_name']  = 'padres';
       $this->load->view('backend/index', $page_data);
   }

/****MANAGE TEMA*****/
function tema($param1 = '', $param2 = '' , $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    if ($param1 == 'create') {
        $data['nombre']       = $this->input->post('nombre');
        $data['clase_id']   = $this->input->post('clase_id');
        $data['profesor_id'] = $this->input->post('profesor_id');
        $data['year']       = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        $this->db->insert('tema', $data);
        $this->session->set_flashdata('flash_message' , get_phrase('Datos Añadidos Satisfactoriamente'));
        redirect(base_url() . 'index.php?admin/tema/'.$data['clase_id'], 'refresh');
    }
    if ($param1 == 'do_update') {
        $data['nombre']       = $this->input->post('nombre');
        $data['clase_id']   = $this->input->post('clase_id');
        $data['profesor_id'] = $this->input->post('profesor_id');
        $data['year']       = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        
        $this->db->where('tema_id', $param2);
        $this->db->update('tema', $data);
        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/tema/'.$data['clase_id'], 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('tema', array(
            'tema_id' => $param2
        ))->result_array();
    }
    if ($param1 == 'delete') {
        $this->db->where('tema_id', $param2);
        $this->db->delete('tema');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/tema/'.$param3, 'refresh');
    }
    $page_data['class_id']   = $param1;
    $page_data['subjects']   = $this->db->get_where('tema' , array('clase_id' => $param1))->result_array();
    $page_data['page_name']  = 'tema';
    $page_data['page_title'] = 'Administrar Asunto';
    $this->load->view('backend/index', $page_data);
}


/**********MANAGING CLASE RUTINA HORARIO******************/
function clase_rutina($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    if ($param1 == 'create') {
        $data['clase_id']       = $this->input->post('clase_id');
        if($this->input->post('seccion_id') != '') {
            $data['seccion_id'] = $this->input->post('seccion_id');
        }
        $data['tema_id']     = $this->input->post('tema_id');
        $data['time_inicio']     = $this->input->post('time_inicio');
        $data['time_final']       = $this->input->post('time_final') ;
        $data['dia']            = $this->input->post('dia');
        $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        $this->db->insert('clase_rutina', $data);
        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        redirect(base_url() . 'index.php?admin/horario_add/', 'refresh');
    }
    if ($param1 == 'do_update') {
        $data['clase_id']       = $this->input->post('clase_id');
        if($this->input->post('seccion_id') != '') {
            $data['seccion_id'] = $this->input->post('seccion_id');
        }
        $data['tema_id']     = $this->input->post('tema_id');
        $data['time_inicio']     = $this->input->post('time_inicio') ;
        $data['time_final']       = $this->input->post('time_final');
        $data['dia']            = $this->input->post('dia');
        $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        
        $this->db->where('clase_rutina_id', $param2);
        $this->db->update('clase_rutina', $data);
        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/horario/' . $data['clase_id'], 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('clase_rutina', array(
            'clase_rutina_id' => $param2
        ))->result_array();
    }
    if ($param1 == 'delete') {
        $class_id = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $param2))->row()->clase_id;
        $this->db->where('clase_rutina_id', $param2);
        $this->db->delete('clase_rutina');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/horario/' . $class_id, 'refresh');
    }
    
}

function horario_add()
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    $page_data['page_name']  = 'horario_add';
    $page_data['page_title'] = 'Añadir Rutina de la Clase';
    $this->load->view('backend/index', $page_data);
}

function horario($class_id = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    $page_data['page_name']  = 'horario';
    $page_data['class_id']  =   $class_id;
    $page_data['page_title'] = 'Horarios';
    $this->load->view('backend/index', $page_data);
}

function horario_imprimir($class_id , $section_id)
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    $page_data['class_id']   =   $class_id;
    $page_data['section_id'] =   $section_id;
    $this->load->view('backend/admin/horario_imprimir' , $page_data);
}

function get_class_section_subject($class_id)
{
    $page_data['class_id'] = $class_id;
    $this->load->view('backend/admin/horario_seccion_tema_seleccionador' , $page_data);
}

function section_subject_edit($class_id , $class_routine_id)
{
    $page_data['class_id']          =   $class_id;
    $page_data['class_routine_id']  =   $class_routine_id;
    $this->load->view('backend/admin/horario_seccion_tema_edit' , $page_data);
}







/****** ASISTENCIA *****************/

   function asistencia()
   {
       if($this->session->userdata('admin_login')!=1)
           redirect(base_url() , 'refresh');
       
       $page_data['page_name']  =  'asistencia';
       $page_data['page_title'] =  'Gestionar Asistencia Diaria';
       $this->load->view('backend/index', $page_data);
   }

   function ver_asistencia($class_id = '' , $section_id = '' , $timestamp = '')
   {
       if($this->session->userdata('admin_login')!=1)
           redirect(base_url() , 'refresh');
       $class_name = $this->db->get_where('clase' , array(
           'clase_id' => $class_id
       ))->row()->nombre;
       $page_data['class_id'] = $class_id;
       $page_data['timestamp'] = $timestamp;
       $page_data['page_name'] = 'ver_asistencia';
       $section_name = $this->db->get_where('seccion' , array(
           'seccion_id' => $section_id
       ))->row()->nombre;
       $page_data['section_id'] = $section_id;
       $page_data['page_title'] = 'Gestionar Asistencia de clase' . ' ' . $class_name . ' : ' . 'Sección' . ' ' . $section_name;
       $this->load->view('backend/index', $page_data);
   }

   /*PARA QUE CARGE EL LISTADO DE SECCIÓN -*/
   function get_section($class_id) {
    $page_data['class_id'] = $class_id; 
    $this->load->view('backend/admin/administrar_titular_asistencia' , $page_data);
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
        $students = $this->db->get_where('inscribirse' , array(
            'clase_id' => $data['clase_id'] , 'seccion_id' => $data['seccion_id'] , 'year' => $data['year']
        ))->result_array();
      
        foreach($students as $row) {
            $attn_data['clase_id']   = $data['clase_id'];
            $attn_data['year']       = $data['year'];
            $attn_data['timestamp']  = $data['timestamp'];
            $attn_data['seccion_id'] = $data['seccion_id'];
            $attn_data['estudiante_id'] = $row['estudiante_id'];
            $this->db->insert('asistencia' , $attn_data);  
        }
        
    }
    redirect(base_url().'index.php?admin/ver_asistencia/'.$data['clase_id'].'/'.$data['seccion_id'].'/'.$data['timestamp'],'refresh');
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
        redirect(base_url().'index.php?admin/ver_asistencia/'.$class_id.'/'.$section_id.'/'.$timestamp , 'refresh');
    }


/****** DAILY ATTENDANCE *****************/
function asistencia_diaria2($date='',$month='',$year='',$class_id='' , $section_id = '' , $session = '')
{
    if($this->session->userdata('admin_login')!=1)
        redirect(base_url() , 'refresh');

    $active_sms_service = $this->db->get_where('settings' , array('type' => 'active_sms_service'))->row()->description;
    $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;

    
    if($_POST)
    {
        // Loop all the students of $class_id
        $this->db->where('clase_id' , $class_id);
        if($section_id != '') {
            $this->db->where('seccion_id' , $section_id);
        }
        //$session = base64_decode( urldecode( $session ) );
        $this->db->where('year' , $session);
        $students = $this->db->get('inscribirse')->result_array();
        foreach ($students as $row)
        {
            $attendance_status  =   $this->input->post('status_' . $row['estudiante_id']);

            $this->db->where('estudiante_id' , $row['estudiante_id']);
            $this->db->where('date' , $date);
            $this->db->where('year' , $year);
            $this->db->where('clase_id' , $row['clase_id']);
            if($row['seccion_id'] != '' && $row['seccion_id'] != 0) {
                $this->db->where('seccion_id' , $row['seccion_id']);
            }
            $this->db->where('session' , $session);

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

        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/asistencia/'.$date.'/'.$month.'/'.$year.'/'.$class_id.'/'.$section_id.'/'.$session , 'refresh');
    }
    $page_data['date']       =	$date;
    $page_data['month']      =	$month;
    $page_data['year']       =	$year;
    $page_data['clase_id']   =  $class_id;
    $page_data['seccion_id'] =  $section_id;
    $page_data['session']    =  $session;
    
    $page_data['page_name']  =	'asistencia';
    $page_data['page_title'] =	'Gestionar Asistencia Diaria';
    $this->load->view('backend/index', $page_data);
}
function asistencia_selector2()
{
    //$session = $this->input->post('session');
    //$encoded_session = urlencode( base64_encode( $session ) );
    redirect(base_url() . 'index.php?admin/asistencia/'.$this->input->post('date').'/'.
                $this->input->post('month').'/'.
                    $this->input->post('year').'/'.
                        $this->input->post('clase_id').'/'.
                            $this->input->post('seccion_id').'/'.
                                $this->input->post('session') , 'refresh');
}



///////ATTENDANCE REPORT /////
function asistencia_reporte() {
    $page_data['month']        = date('m');
    $page_data['page_name']    = 'asistencia_reporte';
    $page_data['page_title']   = 'Reporte de Asistencia';
    $this->load->view('backend/index',$page_data);
}
function ver_asistencia_reporte($class_id = '' , $section_id = '', $month = '') {
    if($this->session->userdata('admin_login')!=1)
       redirect(base_url() , 'refresh');
   $class_name = $this->db->get_where('clase' , array(
       'clase_id' => $class_id
   ))->row()->nombre;
   $page_data['class_id'] = $class_id;
   $page_data['month']    = $month;
   $page_data['page_name'] = 'ver_asistencia_reporte';
   $section_name = $this->db->get_where('seccion' , array(
       'seccion_id' => $section_id
   ))->row()->nombre;
   //para ver el reprte de la asistencia segun la sección
   $page_data['section_id'] = $section_id;
   $page_data['page_title'] = 'Asistencia Reporte de Clase' . ' ' . $class_name . ' : ' . 'Sección' . ' ' . $section_name;
   $this->load->view('backend/index', $page_data);
}
function ver_asistencia_reporte_imprimir($class_id ='' , $section_id = '' , $month = '') {
     if ($this->session->userdata('admin_login') != 1)
       redirect(base_url(), 'refresh');
   $page_data['class_id'] = $class_id;
   $page_data['section_id']  = $section_id;
   $page_data['month'] = $month;
   $this->load->view('backend/admin/ver_asistencia_reporte_imprimir' , $page_data);
}

function asistencia_reporte_seleccionador()
{
   $data['clase_id']   = $this->input->post('clase_id');
   $data['year']       = $this->input->post('year');
   $data['month']  = $this->input->post('month');
   $data['seccion_id'] = $this->input->post('seccion_id');
   redirect(base_url().'index.php?admin/ver_asistencia_reporte/'.$data['clase_id'].'/'.$data['seccion_id'].'/'.$data['month'],'refresh');
}



/******GESTIONAR FACTURACIÓN / FACTURAS CON ESTADO*****/
function factura($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    
    if ($param1 == 'create') {
        $data['estudiante_id']         = $this->input->post('estudiante_id');
        $data['titulo']              = $this->input->post('titulo');
        $data['descripcion']        = $this->input->post('descripcion');
        $data['monto']             = $this->input->post('monto');
        $data['monto_pagado']        = $this->input->post('monto_pagado');
        $data['deuda']                = $data['monto'] - $data['monto_pagado'];
        $data['status']             = $this->input->post('status');
        $data['creacion_timestamp'] = strtotime($this->input->post('date'));
        $data['year']               = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        
        $this->db->insert('factura', $data);
        $invoice_id = $this->db->insert_id();

        $data2['factura_id']        =   $invoice_id;
        $data2['estudiante_id']        =   $this->input->post('estudiante_id');
        $data2['titulo']             =   $this->input->post('titulo');
        $data2['descripcion']       =   $this->input->post('descripcion');
        $data2['pago_tipo']      =  'ingreso';
        $data2['metodo']            =   $this->input->post('metodo');
        $data2['monto']            =   $this->input->post('monto_pagado');
        $data2['timestamp']         =   strtotime($this->input->post('date'));
        $data2['year']              =  $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;

        $this->db->insert('pago' , $data2);

        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        redirect(base_url() . 'index.php?admin/estudiante_pago', 'refresh');
    }

    if ($param1 == 'do_update') {
        $data['estudiante_id']         = $this->input->post('estudiante_id');
        $data['titulo']              = $this->input->post('titulo');
        $data['descripcion']        = $this->input->post('descripcion');
        $data['monto']             = $this->input->post('monto');
        $data['status']             = $this->input->post('status');
        $data['creacion_timestamp'] = strtotime($this->input->post('date'));
        
        $this->db->where('factura_id', $param2);
        $this->db->update('factura', $data);
        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/ingreso', 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('factura', array(
            'factura_id' => $param2
        ))->result_array();
    }
    //TOMAR EL PAGO A CANCELAR
    if ($param1 == 'completar_pago') {
        $data['factura_id']   =   $this->input->post('factura_id');
        $data['estudiante_id']   =   $this->input->post('estudiante_id');
        $data['titulo']        =   $this->input->post('titulo');
        $data['descripcion']  =   $this->input->post('descripcion');
        $data['pago_tipo'] =   'ingreso';
        $data['metodo']       =   $this->input->post('metodo');
        $data['monto']       =   $this->input->post('monto');
        $data['timestamp']    =   strtotime($this->input->post('timestamp'));
        $data['year']         =   $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        $this->db->insert('pago' , $data);

        $status['status']   =   $this->input->post('status');
        $this->db->where('factura_id' , $param2);
        $this->db->update('factura' , array('status' => $status['status']));

        $data2['monto_pagado']   =   $this->input->post('monto');
        $data2['status']        =   $this->input->post('status');
        $this->db->where('factura_id' , $param2);
        $this->db->set('monto_pagado', 'monto_pagado + ' . $data2['monto_pagado'], FALSE);
        $this->db->set('deuda', 'deuda - ' . $data2['monto_pagado'], FALSE);
        $this->db->update('factura');

        $this->session->set_flashdata('flash_message' , 'Pago Exitoso');
        redirect(base_url() . 'index.php?admin/ingreso/', 'refresh');
    }

    if ($param1 == 'delete') {
        $this->db->where('factura_id', $param2);
        $this->db->delete('factura');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/ingreso', 'refresh');
    }
    $page_data['page_name']  = 'factura';
    $page_data['page_title'] = get_phrase('manage_invoice/payment');
    $this->db->order_by('creacion_timestamp', 'desc');
    $page_data['invoices'] = $this->db->get('factura')->result_array();
    $this->load->view('backend/index', $page_data);
}



 /**********CONTABILIDAD********************/
 function ingreso($param1 = '' , $param2 = '')
 {
    if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     $page_data['page_name']  = 'ingreso';
     $page_data['page_title'] = 'Pagos de los Estudiantes';
     $this->db->order_by('creacion_timestamp', 'desc');
     $page_data['invoices'] = $this->db->get('factura')->result_array();
     $this->load->view('backend/index', $page_data); 
 }

 function estudiante_pago($param1 = '' , $param2 = '' , $param3 = '') {

     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     $page_data['page_name']  = 'estudiante_pago';
     $page_data['page_title'] = 'Crear Pago Estudiante';
     $this->load->view('backend/index', $page_data); 
 }

 function expense($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     if ($param1 == 'create') {
         $data['title']               =   $this->input->post('title');
         $data['expense_category_id'] =   $this->input->post('expense_category_id');
         $data['description']         =   $this->input->post('description');
         $data['payment_type']        =   'expense';
         $data['method']              =   $this->input->post('method');
         $data['amount']              =   $this->input->post('amount');
         $data['timestamp']           =   strtotime($this->input->post('timestamp'));
         $data['year']                =   $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $this->db->insert('payment' , $data);
         $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
         redirect(base_url() . 'index.php?admin/expense', 'refresh');
     }

     if ($param1 == 'edit') {
         $data['title']               =   $this->input->post('title');
         $data['expense_category_id'] =   $this->input->post('expense_category_id');
         $data['description']         =   $this->input->post('description');
         $data['payment_type']        =   'expense';
         $data['method']              =   $this->input->post('method');
         $data['amount']              =   $this->input->post('amount');
         $data['timestamp']           =   strtotime($this->input->post('timestamp'));
         $data['year']                =   $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $this->db->where('payment_id' , $param2);
         $this->db->update('payment' , $data);
         $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
         redirect(base_url() . 'index.php?admin/expense', 'refresh');
     }

     if ($param1 == 'delete') {
         $this->db->where('payment_id' , $param2);
         $this->db->delete('payment');
         $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
         redirect(base_url() . 'index.php?admin/expense', 'refresh');
     }

     $page_data['page_name']  = 'expense';
     $page_data['page_title'] = get_phrase('expenses');
     $this->load->view('backend/index', $page_data); 
 }

 function expense_category($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     if ($param1 == 'create') {
         $data['name']   =   $this->input->post('name');
         $this->db->insert('expense_category' , $data);
         $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
         redirect(base_url() . 'index.php?admin/expense_category');
     }
     if ($param1 == 'edit') {
         $data['name']   =   $this->input->post('name');
         $this->db->where('expense_category_id' , $param2);
         $this->db->update('expense_category' , $data);
         $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
         redirect(base_url() . 'index.php?admin/expense_category');
     }
     if ($param1 == 'delete') {
         $this->db->where('expense_category_id' , $param2);
         $this->db->delete('expense_category');
         $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
         redirect(base_url() . 'index.php?admin/expense_category');
     }

     $page_data['page_name']  = 'expense_category';
     $page_data['page_title'] = get_phrase('expense_category');
     $this->load->view('backend/index', $page_data);
 }

 function ver_factura($param1 = '')
 {
    if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     $page_data['page_name']  = 'ver_factura';
     $page_data['page_title'] = 'Factura';
     $page_data['param1'] = $param1;
     $this->load->view('backend/index', $page_data); 
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
