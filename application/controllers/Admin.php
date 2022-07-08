<?php
if (!defined('BASEPATH'))
    exit('No se permite el acceso directo a scripts');

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
        $page_data['page_title'] = 'Administración Colegio Privado "Santa María de Fátima"';
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
           
             $sea_vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->nombre;
          
             if ($stu_vemail == null && $tea_vemail == null && $par_vemail == null) {
 
             $this->db->insert('profesor', $data);
             $profesor_id = $this->db->insert_id();
             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/profesor_image/' . $profesor_id . '.jpg');
             $this->session->set_flashdata('flash_message' , 'Datos añadidos satisfactoriamente');
             $this->email_model->account_opening_email('profesor', $data['email']); //SEND EMAIL
              } else {
                 $this->session->set_flashdata('flash_message_error' , 'Uso de la cuenta de correo electrónico');
             }
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         }
         if ($param1 == 'actualizar') {
             $data['nombre']        = $this->input->post('nombre');
             $data['cumpleanos']    = $this->input->post('cumpleanos');
             $data['sexo']         = $this->input->post('sexo');
             $data['direccion']     = $this->input->post('direccion');
             $data['telefono']       = $this->input->post('telefono');
             $data['email']       = $this->input->post('email');
             
             $this->db->where('profesor_id', $param2);
             $this->db->update('profesor', $data);
             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/profesor_image/' . $param2 . '.jpg');
             $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         } else if ($param1 == 'personal_perfil') {
             $page_data['personal_perfil']   = true;
             $page_data['current_profesor_id'] = $param2;
         } else if ($param1 == 'edit') {
             $page_data['edit_data'] = $this->db->get_where('profesor', array(
                 'profesor_id' => $param2
             ))->result_array();
         }
         if ($param1 == 'cambiar_password') {
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
         if ($param1 == 'eliminar') {
             $this->db->where('profesor_id', $param2);
             $this->db->delete('profesor');
             $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
             redirect(base_url() . 'index.php?admin/profesor/', 'refresh');
         }
         $page_data['profesores']   = $this->db->get('profesor')->result_array();
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
            $clase_id = $this->db->insert_id();
            //CREAR SECCION POR DEFECTO
            $data2['clase_id']  =   $clase_id;
            $data2['nombre']      =   'A';
            $this->db->insert('seccion' , $data2);

            $this->session->set_flashdata('flash_message' ,'Datos añadidos satisfactoriamente');
            redirect(base_url() . 'index.php?admin/clase/', 'refresh');
        }
        if ($param1 == 'actualizar') {
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
        if ($param1 == 'eliminar') {
            $this->db->where('clase_id', $param2);
            $this->db->delete('clase');
            $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
            redirect(base_url() . 'index.php?admin/clase/', 'refresh');
        }
        $page_data['clases']    = $this->db->get('clase')->result_array();
        $page_data['page_name']  = 'clase';
        $page_data['page_title'] = 'Administrador Clase';
        $this->load->view('backend/index', $page_data);
    }
     function get_tema($clase_id) 
    {
        $tema = $this->db->get_where('tema' , array(
            'clase_id' => $clase_id
        ))->result_array();
        foreach ($tema as $row) {
            echo '<option value="' . $row['tema_id'] . '">' . $row['nombre'] . '</option>';
        }
    }
        
 /****ADMIN SECCIONES*****/
 function seccion($clase_id = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect(base_url(), 'refresh');
     // DETECTA LA PRIMERA CLASE
     if ($clase_id == '')
         if($this->db->count_all('clase') !== 0 ){
         $clase_id  =  $this->db->get('clase')->first_row()->clase_id;
         }

     $page_data['page_name']  = 'seccion';
     $page_data['page_title'] = 'Administración Sección';
     $page_data['clase_id']   = $clase_id;
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

     if ($param1 == 'eliminar') {
         $this->db->where('seccion_id' , $param2);
         $this->db->delete('seccion');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/seccion' , 'refresh');
     }
 }

 function get_class_section($class_id)
 {
     $sectiones = $this->db->get_where('seccion' , array(
         'clase_id' => $class_id
     ))->result_array();
     foreach ($sectiones as $row) {
         echo '<option value="' . $row['seccion_id'] . '">' . $row['nombre'] . '</option>';
     }
 }

 //VALIDANDO EL EMAIL PARA EL ESTUDIANTE, PROFESOR Y PADRES
 function get_valid_email()
    {
        $email = $_POST["email"];
            //validando aquí, si la cuenta de correo electrónico
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

    
    function get_clase_estudiantes($clase_id)
    {
        $estudiantes = $this->db->get_where('inscribirse' , array(
            'clase_id' => $clase_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->result_array();
        foreach ($estudiantes as $row) {
            $nombre = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
            echo '<option value="' . $row['estudiante_id'] . '">' . $nombre . '</option>';
        }
    }


         /****ADMINISTRAR A LOS ESTUDIANTES EN CLASE*****/
     function estudiante_add()
     {
         if ($this->session->userdata('admin_login') != 1)
             redirect(base_url(), 'refresh');
             
         $page_data['page_name']  = 'estudiante_add';
         $page_data['page_title'] = 'Añadir Estudiante';
         $this->load->view('backend/index', $page_data);
     }


//CALIFICAION POR ALUMNO
    function estudiante_hoja_calificacion($estudiante_id = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $estudiante_nombre = $this->db->get_where('estudiante' , array('estudiante_id' => $estudiante_id))->row()->nombre;
        $clase_nombre   = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;
        $page_data['page_name']  =   'estudiante_hoja_calificacion';
        $page_data['page_title'] =   'Calificaciones para' . ' ' . $estudiante_nombre . ' (' . 'Clase' . ' ' . $clase_nombre . ')';
        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $this->load->view('backend/index', $page_data);
    }


    function estudiante_perfil($estudiante_id = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        $page_data['page_name']  =   'estudiante_perfil';
        $page_data['page_title'] =   'Administrar Perfil Estudiante';
        $page_data['estudiante_id'] =   $estudiante_id;
        $this->load->view('backend/index', $page_data);
    }



    function ver_imprimir_estud_hoja_cali($estudiante_id , $examen_id) {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        $clase_id     = $this->db->get_where('inscribirse' , array(
            'estudiante_id' => $estudiante_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->clase_id;
        $clase_nombre   = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;

        $page_data['estudiante_id'] =   $estudiante_id;
        $page_data['clase_id']   =   $clase_id;
        $page_data['examen_id']    =   $examen_id;
        $this->load->view('backend/admin/ver_imprimir_estud_hoja_cali', $page_data);
    }


 function estudiante($clase_id = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
        
    $page_data['page_name']     = 'estudiante';
    $page_data['page_title']    = 'Información del Estudiante'. " - ".'Clase'." : ".
                                        $this->crud_model->get_class_name($clase_id);
    $page_data['clase_id']  = $clase_id;
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
        $estudiante_id = $this->db->insert_id();

        $data2['estudiante_id']     = $estudiante_id;
        $data2['inscribirse_code']    = substr(md5(rand(0, 1000000)), 0, 7);
        $data2['clase_id']       = $this->input->post('clase_id');
        if ($this->input->post('seccion_id') != '') {
            $data2['seccion_id'] = $this->input->post('seccion_id');
        }
        
        $data2['roll']           = $this->input->post('roll');
        $data2['date_added']     = strtotime(date("Y-m-d H:i:s"));
        $data2['year']           = $running_year;
        $this->db->insert('inscribirse', $data2);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/estudiante_image/' . $estudiante_id . '.jpg');
        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        $this->email_model->account_opening_email('estudiante', $data['email'], $this->input->post('password')); //SEND EMAIL 
        redirect(base_url() . 'index.php?admin/estudiante_add/', 'refresh');

        }

    }
    if ($param1 == 'actualizar') {
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

    if ($param1 == 'cambiar_password') {
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
    
    if ($param2 == 'eliminar') {
        $this->db->where('estudiante_id', $param3);
        $this->db->delete('estudiante');
        $this->db->where('estudiante_id', $param3);
        $this->db->delete('inscribirse');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/estudiante/' . $param1, 'refresh');
    }
}
 
    
   /****ADMINISTRAR A LOS PADRES EN CLASE*****/
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
           
           //validación aquí, si la cuenta de correo electrónico existe
           $Stu_Vemail = $this->db->get_where('estudiante', array('email' => $data['email']))->row()->nombre;
           $Tea_Vemail = $this->db->get_where('profesor', array('email' => $data['email']))->row()->nombre;
           $Par_Vemail = $this->db->get_where('padres', array('email' => $data['email']))->row()->nombre;
           if ($Stu_Vemail == null && $Tea_Vemail == null && $Par_Vemail == null) {
               
           $this->db->insert('padres', $data);
           $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
           $this->email_model->account_opening_email('padres', $data['email']); //ENVIAR CORREO ELECTRÓNICO DE APERTURA DE CUENTA DE CORREO ELECTRÓNICO
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
       if ($param1 == 'cambiar_password') {
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
       if ($param1 == 'eliminar') {
           $this->db->where('padres_id' , $param2);
           $this->db->delete('padres');
           $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
           redirect(base_url() . 'index.php?admin/padres/', 'refresh');
       }
       $page_data['page_title'] 	= 'Lista de todos los Padres';
       $page_data['page_name']  = 'padres';
       $this->load->view('backend/index', $page_data);
   }

/****ADMINISTRAR TEMA*****/
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
    if ($param1 == 'actualizar') {
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
    if ($param1 == 'eliminar') {
        $this->db->where('tema_id', $param2);
        $this->db->delete('tema');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/tema/'.$param3, 'refresh');
    }
    $page_data['clase_id']   = $param1;
    $page_data['temas']   = $this->db->get_where('tema' , array('clase_id' => $param1))->result_array();
    $page_data['page_name']  = 'tema';
    $page_data['page_title'] = 'Administrar Asunto';
    $this->load->view('backend/index', $page_data);
}


/**********ADMINISTRAR CLASE RUTINA HORARIO******************/
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
    if ($param1 == 'actualizar') {
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
    if ($param1 == 'eliminar') {
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

function horario($clase_id = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    $page_data['page_name']  = 'horario';
    $page_data['clase_id']  =   $clase_id;
    $page_data['page_title'] = 'Horarios';
    $this->load->view('backend/index', $page_data);
}

function horario_imprimir($clase_id , $seccion_id)
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    $page_data['clase_id']   =   $clase_id;
    $page_data['seccion_id'] =   $seccion_id;
    $this->load->view('backend/admin/horario_imprimir' , $page_data);
}

function get_clase_seccion_tema($clase_id)
{
    $page_data['clase_id'] = $clase_id;
    $this->load->view('backend/admin/horario_seccion_tema_seleccionador' , $page_data);
}

function seccion_tema_edit($clase_id , $clase_rutina_id)
{
    $page_data['clase_id']          =   $clase_id;
    $page_data['clase_rutina_id']  =   $clase_rutina_id;
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

   function ver_asistencia($clase_id = '' , $seccion_id = '' , $timestamp = '')
   {
       if($this->session->userdata('admin_login')!=1)
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
                    $estudiante_nombre   = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
                    $padres_id      = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
                    $receptor_telefono = $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->telefono;
                    $mensaje        = 'Tu Hijo(a)' . ' ' . $estudiante_nombre . 'está ausente hoy.';
                    $this->sms_model->send_sms($mensaje,$receptor_telefono);
                }
            }
        }
        $this->session->set_flashdata('flash_message' , 'Asistencia Guardada');
        redirect(base_url().'index.php?admin/ver_asistencia/'.$class_id.'/'.$section_id.'/'.$timestamp , 'refresh');
    }


/****** ASISTENCIA DIARIA*****************/
function asistencia_diaria2($date='',$month='',$year='',$clase_id='' , $seccion_id = '' , $session = '')
{
    if($this->session->userdata('admin_login')!=1)
        redirect(base_url() , 'refresh');

    $active_sms_service = $this->db->get_where('settings' , array('type' => 'active_sms_service'))->row()->description;
    $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;

    
    if($_POST)
    {
        // Bucle de todos los estudiantes de $clase_id
        $this->db->where('clase_id' , $clase_id);
        if($seccion_id != '') {
            $this->db->where('seccion_id' , $seccion_id);
        }
        //$session = base64_decode( urldecode( $session ) );
        $this->db->where('year' , $session);
        $estudiantes = $this->db->get('inscribirse')->result_array();
        foreach ($estudiantes as $row)
        {
            $asistencia_status  =   $this->input->post('status_' . $row['estudiante_id']);

            $this->db->where('estudiante_id' , $row['estudiante_id']);
            $this->db->where('date' , $date);
            $this->db->where('year' , $year);
            $this->db->where('clase_id' , $row['clase_id']);
            if($row['seccion_id'] != '' && $row['seccion_id'] != 0) {
                $this->db->where('seccion_id' , $row['seccion_id']);
            }
            $this->db->where('session' , $session);

            $this->db->update('asistencia' , array('status' => $asistencia_status));

            if ($asistencia_status == 2) {

                if ($active_sms_service != '' || $active_sms_service != 'disabled') {
                    $estudiante_nombre   = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;
                    $padres_id      = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
                    $telefono_receptor = $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->telefono;
                    $message        = 'Tu Hijo(a)' . ' ' . $estudiante_nombre . 'está ausente hoy.';
                    $this->sms_model->send_sms($message,$telefono_receptor);
                }
            }

        }

        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/asistencia/'.$date.'/'.$month.'/'.$year.'/'.$clase_id.'/'.$seccion_id.'/'.$session , 'refresh');
    }
    $page_data['date']       =	$date;
    $page_data['month']      =	$month;
    $page_data['year']       =	$year;
    $page_data['clase_id']   =  $clase_id;
    $page_data['seccion_id'] =  $seccion_id;
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



///////ASISTENCIA REPORTE /////
function asistencia_reporte() {
    $page_data['month']        = date('m');
    $page_data['page_name']    = 'asistencia_reporte';
    $page_data['page_title']   = 'Reporte de Asistencia';
    $this->load->view('backend/index',$page_data);
}
function ver_asistencia_reporte($clase_id = '' , $seccion_id = '', $month = '') {
    if($this->session->userdata('admin_login')!=1)
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
     if ($this->session->userdata('admin_login') != 1)
       redirect(base_url(), 'refresh');
   $page_data['clase_id'] = $clase_id;
   $page_data['seccion_id']  = $seccion_id;
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
        $factura_id = $this->db->insert_id();

        $data2['factura_id']        =   $factura_id;
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

    if ($param1 == 'actualizar') {
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

    if ($param1 == 'eliminar') {
        $this->db->where('factura_id', $param2);
        $this->db->delete('factura');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/ingreso', 'refresh');
    }
    $page_data['page_name']  = 'factura';
    $page_data['page_title'] = 'Gestionar Factura/Pago';
    $this->db->order_by('creacion_timestamp', 'desc');
    $page_data['facturas'] = $this->db->get('factura')->result_array();
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
     $page_data['facturas'] = $this->db->get('factura')->result_array();
     $this->load->view('backend/index', $page_data); 
 }

 function estudiante_pago($param1 = '' , $param2 = '' , $param3 = '') {

     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     $page_data['page_name']  = 'estudiante_pago';
     $page_data['page_title'] = 'Crear Pago Estudiante';
     $this->load->view('backend/index', $page_data); 
 }

 function gasto($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     if ($param1 == 'create') {
         $data['titulo']               =   $this->input->post('titulo');
         $data['gastos_categoria_id'] =   $this->input->post('gastos_categoria_id');
         $data['descripcion']         =   $this->input->post('descripcion');
         $data['pago_tipo']        =   'gasto';
         $data['metodo']              =   $this->input->post('metodo');
         $data['monto']              =   $this->input->post('monto');
         $data['timestamp']           =   strtotime($this->input->post('timestamp'));
         $data['year']                =   $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $this->db->insert('pago' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
         redirect(base_url() . 'index.php?admin/gasto', 'refresh');
     }

     if ($param1 == 'edit') {
         $data['titulo']               =   $this->input->post('titulo');
         $data['gastos_categoria_id'] =   $this->input->post('gastos_categoria_id');
         $data['descripcion']         =   $this->input->post('descripcion');
         $data['pago_tipo']        =   'gasto';
         $data['metodo']              =   $this->input->post('metodo');
         $data['monto']              =   $this->input->post('monto');
         $data['timestamp']           =   strtotime($this->input->post('timestamp'));
         $data['year']                =   $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $this->db->where('pago_id' , $param2);
         $this->db->update('pago' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
         redirect(base_url() . 'index.php?admin/gasto', 'refresh');
     }

     if ($param1 == 'eliminar') {
         $this->db->where('pago_id' , $param2);
         $this->db->delete('pago');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/gasto', 'refresh');
     }

     $page_data['page_name']  = 'gasto';
     $page_data['page_title'] = 'Gastos';
     $this->load->view('backend/index', $page_data); 
 }

 function gasto_categoria($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');
     if ($param1 == 'create') {
         $data['nombre']   =   $this->input->post('nombre');
         $this->db->insert('gastos_categoria' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
         redirect(base_url() . 'index.php?admin/gasto_categoria');
     }
     if ($param1 == 'edit') {
         $data['nombre']   =   $this->input->post('nombre');
         $this->db->where('gastos_categoria_id' , $param2);
         $this->db->update('gastos_categoria' , $data);
         $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
         redirect(base_url() . 'index.php?admin/gasto_categoria');
     }
     if ($param1 == 'eliminar') {
         $this->db->where('gastos_categoria_id' , $param2);
         $this->db->delete('gastos_categoria');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/gasto_categoria');
     }

     $page_data['page_name']  = 'gasto_categoria';
     $page_data['page_title'] = 'Gastos por Categoria';
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



/**********ADMIN BIBLIOTECA/LIBROS********************/
function biblioteca($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    if ($param1 == 'create') {
        $data['nombre']        = $this->input->post('nombre');
        $data['descripcion'] = $this->input->post('descripcion');
        $data['precio']       = $this->input->post('precio');
        $data['autor']      = $this->input->post('autor');
        $data['clase_id']    = $this->input->post('clase_id');
        $data['status']      = $this->input->post('status');
        $this->db->insert('biblioteca', $data);
        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        redirect(base_url() . 'index.php?admin/biblioteca', 'refresh');
    }
    if ($param1 == 'actualizar') {
        $data['nombre']        = $this->input->post('nombre');
        $data['descripcion'] = $this->input->post('descripcion');
        $data['precio']       = $this->input->post('precio');
        $data['autor']      = $this->input->post('autor');
        $data['clase_id']    = $this->input->post('clase_id');
        $data['status']      = $this->input->post('status');
        
        $this->db->where('libro_id', $param2);
        $this->db->update('biblioteca', $data);
        $this->session->set_flashdata('flash_message' ,'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/biblioteca', 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('biblioteca', array(
            'libro_id' => $param2
        ))->result_array();
    }
    if ($param1 == 'eliminar') {
        $this->db->where('libro_id', $param2);
        $this->db->delete('biblioteca');
        $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
        redirect(base_url() . 'index.php?admin/biblioteca', 'refresh');
    }
    $page_data['libros']      = $this->db->get('biblioteca')->result_array();
    $page_data['page_name']  = 'biblioteca';
    $page_data['page_title'] = 'Manejo de Libros de la Biblioteca';
    $this->load->view('backend/index', $page_data);
    
}



 /****ADMIN EXAMEN*****/
 function lista_examen($param1 = '', $param2 = '' , $param3 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect(base_url(), 'refresh');
     if ($param1 == 'create') {
         $data['nombre']    = $this->input->post('nombre');
         $data['date']    = $this->input->post('date');
         $data['comentario'] = $this->input->post('comentario');
         $data['year']    = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         $this->db->insert('examen', $data);
         $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
         redirect(base_url() . 'index.php?admin/lista_examen/', 'refresh');
     }
     if ($param1 == 'edit' && $param2 == 'actualizar') {
         $data['nombre']    = $this->input->post('nombre');
         $data['date']    = $this->input->post('date');
         $data['comentario'] = $this->input->post('comentario');
         $data['year']    = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
         
         $this->db->where('examen_id', $param3);
         $this->db->update('examen', $data);
         $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
         redirect(base_url() . 'index.php?admin/lista_examen/', 'refresh');
     } else if ($param1 == 'edit') {
         $page_data['edit_data'] = $this->db->get_where('examen', array(
             'examen_id' => $param2
         ))->result_array();
     }
     if ($param1 == 'eliminar') {
         $this->db->where('examen_id', $param2);
         $this->db->delete('examen');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/lista_examen/', 'refresh');
     }
     $page_data['examenes']      = $this->db->get('examen')->result_array();
     $page_data['page_name']  = 'lista_examen';
     $page_data['page_title'] = 'Listas de Exámenes ';
     $this->load->view('backend/index', $page_data);
 }



  /****ADMIN GRADOS*****/
  function grado($param1 = '', $param2 = '')
  {
      if ($this->session->userdata('admin_login') != 1)
          redirect(base_url(), 'refresh');
      if ($param1 == 'create') {
          $data['nombre']        = $this->input->post('nombre');
          $data['grado_punto'] = $this->input->post('grado_punto');
          $data['calificacion_desde']   = $this->input->post('calificacion_desde');
          $data['calificacion_hasta']   = $this->input->post('calificacion_hasta');
          $data['comentario']     = $this->input->post('comentario');
          $this->db->insert('grado', $data);
          $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
          redirect(base_url() . 'index.php?admin/grado/', 'refresh');
      }
      if ($param1 == 'actualizar') {
          $data['nombre']        = $this->input->post('nombre');
          $data['grado_punto'] = $this->input->post('grado_punto');
          $data['calificacion_desde']   = $this->input->post('calificacion_desde');
          $data['calificacion_hasta']   = $this->input->post('calificacion_hasta');
          $data['comentario']     = $this->input->post('comentario');
          
          $this->db->where('grado_id', $param2);
          $this->db->update('grado', $data);
          $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
          redirect(base_url() . 'index.php?admin/grado/', 'refresh');
      } else if ($param1 == 'edit') {
          $page_data['edit_data'] = $this->db->get_where('grado', array(
              'grado_id' => $param2
          ))->result_array();
      }
      if ($param1 == 'eliminar') {
          $this->db->where('grado_id', $param2);
          $this->db->delete('grado');
          $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
          redirect(base_url() . 'index.php?admin/grado/', 'refresh');
      }
      $page_data['grados']     = $this->db->get('grado')->result_array();
      $page_data['page_name']  = 'grado';
      $page_data['page_title'] = 'Manejo de Grados';
      $this->load->view('backend/index', $page_data);
  }


   /****ADMIN EXAM CALIFICACION*****/
  
   function ingreso_calificacion()
   {
       if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
       $page_data['page_name']  =   'ingreso_calificacion';
       $page_data['page_title'] = 'Manejo de Calificaciones';
       $this->load->view('backend/index', $page_data);
   }

   function ver_manejo_calificacion($examen_id = '' , $clase_id = '' , $seccion_id = '' , $tema_id = '')
   {
       if ($this->session->userdata('admin_login') != 1)
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
       if ($this->session->userdata('admin_login') != 1)
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
       redirect(base_url() . 'index.php?admin/ver_manejo_calificacion/' . $data['examen_id'] . '/' . $data['clase_id'] . '/' . $data['seccion_id'] . '/' . $data['tema_id'] , 'refresh');
       
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
       redirect(base_url().'index.php?admin/ver_manejo_calificacion/'.$examen_id.'/'.$clase_id.'/'.$seccion_id.'/'.$tema_id , 'refresh');
   }

   function calificacion_get_tema($clase_id)
   {
       $page_data['clase_id'] = $clase_id;
       $this->load->view('backend/admin/calificacion_get_tema' , $page_data);
   }

   // REPORTE
   function calificacion_reporte($clase_id = '' , $examen_id = '') {
       if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
       
       if ($this->input->post('operacion') == 'seleccion') {
           $page_data['examen_id']    = $this->input->post('examen_id');
           $page_data['clase_id']   = $this->input->post('clase_id');
           
           if ($page_data['examen_id'] > 0 && $page_data['clase_id'] > 0) {
               redirect(base_url() . 'index.php?admin/calificacion_reporte/' . $page_data['clase_id'] . '/' . $page_data['examen_id'] , 'refresh');
           } else {
               $this->session->set_flashdata('mark_message', 'Elige clase y examen');
               redirect(base_url() . 'index.php?admin/calificacion_reporte/', 'refresh');
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
       if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
       $page_data['clase_id'] = $clase_id;
       $page_data['examen_id']  = $examen_id;
       $this->load->view('backend/admin/ver_imprimir_calificacion' , $page_data);
   }
   



 /****ADMINISTRADOR*****/
 function registrar_admin($param1 = '', $param2 = '', $param3 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect(base_url(), 'refresh');
     if ($param1 == 'create') {
         $data['name']        = $this->input->post('name');
         $data['email']       = $this->input->post('email');
         
         $data['password']    = sha1($this->input->post('password'));

         //validar aquí, si la cuenta de correo electrónico
       
         $sea_vemail = $this->db->get_where('admin', array('email' => $data['email']))->row()->name;
      
         if ($stu_vemail == null && $tea_vemail == null && $par_vemail == null) {

         $this->db->insert('admin', $data);
         $admin_id = $this->db->insert_id();
         move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $admin_id . '.jpg');
         $this->session->set_flashdata('flash_message' , 'Datos añadidos satisfactoriamente');
         $this->email_model->account_opening_email('admin', $data['email']); //SEND EMAIL
          } else {
             $this->session->set_flashdata('flash_message_error' , 'Uso de la cuenta de correo electrónico');
         }
         redirect(base_url() . 'index.php?admin/registrar_admin/', 'refresh');
     }
     if ($param1 == 'actualizar') {
         $data['name']        = $this->input->post('name');
         $data['email']       = $this->input->post('email');
         
         $this->db->where('admin_id', $param2);
         $this->db->update('admin', $data);
         move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $param2 . '.jpg');
         $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
         redirect(base_url() . 'index.php?admin/registrar_admin/', 'refresh');
     } else if ($param1 == 'personal_perfil') {
         $page_data['personal_perfil']   = true;
         $page_data['current_admin_id'] = $param2;
     } else if ($param1 == 'edit') {
         $page_data['edit_data'] = $this->db->get_where('admin', array(
             'admin_id' => $param2
         ))->result_array();
     }
     if ($param1 == 'cambiar_password') {
         $data['password']         = sha1($this->input->post('new_password'));
         $data['confirmar_new_password'] = sha1($this->input->post('confirmar_new_password'));

         if ($data['password'] == $data['confirmar_new_password']) {  
         $this->db->where('admin_id', $param2);
         $this->db->update('admin', array(
                 'password' => $data['password']
             ));
             $this->session->set_flashdata('flash_message', 'Actualizar contraseña');
         } else {
             $this->session->set_flashdata('flash_message_error', 'Falta de coincidencia de contraseña');
         }
         redirect(base_url() . 'index.php?admin/registrar_admin/', 'refresh');
     }
     if ($param1 == 'eliminar') {
         $this->db->where('admin_id', $param2);
         $this->db->delete('admin');
         $this->session->set_flashdata('flash_message' , 'Datos Eliminados');
         redirect(base_url() . 'index.php?admin/registrar_admin/', 'refresh');
     }
     $page_data['administradores']   = $this->db->get('admin')->result_array();
     $page_data['page_name']  = 'registrar_admin';
     $page_data['page_title'] = 'Registrar Administradores';
     $this->load->view('backend/index', $page_data);
 }



 /* MENSAJERIA PRIVADA */

 function mensaje($param1 = 'mensaje_inicio', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    if ($param1 == 'enviar_nuevo') {
        $mensaje_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?admin/mensaje/mensaje_leido/' . $mensaje_thread_code, 'refresh');
    }

    if ($param1 == 'enviar_respuesta') {
        $this->crud_model->send_reply_message($param2);  //$param2 = mensaje_thread_code
        $this->session->set_flashdata('flash_message', 'Mensaje Enviado');
        redirect(base_url() . 'index.php?admin/mensaje/mensaje_leido/' . $param2, 'refresh');
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

/***ADMINISTRAR EVENTO / TABLÓN DE ANUNCIOS, SERÁ VISTO POR EL PANEL DE TODAS LAS CUENTAS**/

function anuncio($param1 = '', $param2 = '', $param3 = '')
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    
    if ($param1 == 'create') {
        $data['anuncio_titulo']     = $this->input->post('anuncio_titulo');
        $data['anuncio']           = $this->input->post('anuncio');
        $data['crear_timestamp'] = strtotime($this->input->post('crear_timestamp'));
        $this->db->insert('anuncio', $data);

        $this->session->set_flashdata('flash_message' , 'Datos Añadidos Satisfactoriamente');
        redirect(base_url() . 'index.php?admin/anuncio/', 'refresh');
    }
    if ($param1 == 'actualizar') {
        $data['anuncio_titulo']     = $this->input->post('anuncio_titulo');
        $data['anuncio']           = $this->input->post('anuncio');
        $data['crear_timestamp'] = strtotime($this->input->post('crear_timestamp'));
        $this->db->where('anuncio_id', $param2);
        $this->db->update('anuncio', $data);

        $this->session->set_flashdata('flash_message' , 'Datos Actualizados');
        redirect(base_url() . 'index.php?admin/anuncio/', 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('anuncio', array(
            'anuncio_id' => $param2
        ))->result_array();
    }
    if ($param1 == 'eliminar') {
        $this->db->where('anuncio_id', $param2);
        $this->db->delete('anuncio');
        $this->session->set_flashdata('flash_message' , 'Datos eliminados');
        redirect(base_url() . 'index.php?admin/anuncio/', 'refresh');
    }
    if ($param1 == 'archivar_anuncio') {
        $this->db->where('anuncio_id' , $param2);
        $this->db->update('anuncio' , array('status' => 0));
        redirect(base_url() . 'index.php?admin/anuncio/', 'refresh');
    }

    if ($param1 == 'eliminar_de_archivo') {
        $this->db->where('anuncio_id' , $param2);
        $this->db->update('anuncio' , array('status' => 1));
        redirect(base_url() . 'index.php?admin/anuncio/', 'refresh');
    }
    $page_data['page_name']  = 'anuncio';
    $page_data['page_title'] = 'Administrar Tablón de Anuncios';
    $this->load->view('backend/index', $page_data);
}



 // PLAN DE ESTUDIOS 
 function plan_estudio($clase_id = '')
 {
     if ($this->session->userdata('admin_login') != 1)
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
     redirect(base_url() . 'index.php?admin/plan_estudio/' . $data['clase_id'] , 'refresh');

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
     redirect(base_url() . 'index.php?admin/plan_estudio/' . $clase_id , 'refresh');
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



 // PROMOVER ESTUDIANTE
 function promover_estudiante($param1 = '' , $param2 = '')
 {
     if ($this->session->userdata('admin_login') != 1)
         redirect('login', 'refresh');

     if($param1 == 'promover') {
         $running_year  =   $this->input->post('running_year');  
         $de_clase_id =   $this->input->post('promover_de_clase_id'); 
         $estudiantes_de_promover_clase =   $this->db->get_where('inscribirse' , array(
             'clase_id' => $de_clase_id , 'year' => $running_year
         ))->result_array();
         foreach($estudiantes_de_promover_clase as $row) {
             $inscribirse_data['inscribirse_code']     =   substr(md5(rand(0, 1000000)), 0, 7);
             $inscribirse_data['estudiante_id']      =   $row['estudiante_id'];
             $inscribirse_data['clase_id']        =   $this->input->post('promover_status_'.$row['estudiante_id']);
             $inscribirse_data['year']            =   $this->input->post('promover_year');
             $inscribirse_data['date_added']      =   strtotime(date("Y-m-d H:i:s"));
             $this->db->insert('inscribirse' , $inscribirse_data);
         } 
         $this->session->set_flashdata('flash_message' , 'Nueva Inscripción exitosa');
         redirect(base_url() . 'index.php?admin/promover_estudiante' , 'refresh');
     }

     $page_data['page_title']    = 'Promover al Estudiante';
     $page_data['page_name']  = 'promover_estudiante';
     $this->load->view('backend/index', $page_data);
 }

 function get_estudiante_para_promover($clase_id_de , $clase_id_para , $running_year , $promover_year)
 {
     $page_data['clase_id_de']     =   $clase_id_de;
     $page_data['clase_id_para']       =   $clase_id_para;
     $page_data['running_year']      =   $running_year;
     $page_data['promover_year']    =   $promover_year;
     $this->load->view('backend/admin/estudiante_promover_selector' , $page_data);
 }


 /******ADMINISTRADOR PERFIL Y CAMBIO DE PASSWOORD***/
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



    
    /*****CONFIGURACIÓN DEL SITIO/SISTEMA*********/
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
    
    
    
    

   

    
    
}
