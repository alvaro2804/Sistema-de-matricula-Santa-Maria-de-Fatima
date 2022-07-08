<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'nombre') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

    
    ////////IMAGEN URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }


      /////////PROFESOR/////////////
      function get_profesores() {
        $query = $this->db->get('profesor');
        return $query->result_array();
    }

    function get_profesor_nombre($profesor_id) {
        $query = $this->db->get_where('profesor', array('profesor_id' => $profesor_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre'];
    }

    function get_profesor_info($profesor_id) {
        $query = $this->db->get_where('profesor', array('profesor_id' => $profesor_id));
        return $query->result_array();
    }

     ////////ESTUDIANTE/////////////
     function get_students($clase_id) {
        $query = $this->db->get_where('estudiante', array('clase_id' => $clase_id));
        return $query->result_array();
    }

    function get_estudiante_info($estudiante_id) {
        $query = $this->db->get_where('estudiante', array('estudiante_id' => $estudiante_id));
        return $query->result_array();
    }

    ////////////CLASE///////////
    function get_class_name($clase_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $clase_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre'];
    }

    function get_class_name_numeric($clase_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $clase_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre_numerico'];
    }

    function get_classes() {
        $query = $this->db->get('clase');
        return $query->result_array();
    }

    function get_class_info($clase_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $clase_id));
        return $query->result_array();
    }
  

 //////////TEMA/////////////
 function get_subjects() {
    $query = $this->db->get('tema');
    return $query->result_array();
}

function get_subject_info($subject_id) {
    $query = $this->db->get_where('tena', array('tema_id' => $subject_id));
    return $query->result_array();
}

function get_subjects_by_class($class_id) {
    $query = $this->db->get_where('tema', array('clase_id' => $class_id));
    return $query->result_array();
}

function get_subject_name_by_id($subject_id) {
    $query = $this->db->get_where('tema', array('tema_id' => $subject_id))->row();
    return $query->nombre;
}


//////////EXAMENES/////////////
function get_exams() {
    $query = $this->db->get_where('examen' , array(
        'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
    ));
    return $query->result_array();
}

function get_exam_info($examen_id) {
    $query = $this->db->get_where('examen', array('examen_id' => $examen_id));
    return $query->result_array();
}

//////////GRADOS////////////
function get_grades() {
    $query = $this->db->get('grado');
    return $query->result_array();
}

function get_grade_info($grado_id) {
    $query = $this->db->get_where('grado', array('grado_id' => $grado_id));
    return $query->result_array();
}

function get_calificacion_obtenida( $examen_id , $clase_id , $tema_id , $estudiante_id) {
    $calificaciones = $this->db->get_where('calificacion' , array(
                                'tema_id' => $tema_id,
                                    'examen_id' => $examen_id,
                                        'clase_id' => $clase_id,
                                            'estudiante_id' => $estudiante_id))->result_array();
                                    
    foreach ($calificaciones as $row) {
        echo $row['calificacion_obtenida'];
    }
}

function get_calificacion_alta( $examen_id , $clase_id , $tema_id ) {
    $this->db->where('examen_id' , $examen_id);
    $this->db->where('clase_id' , $clase_id);
    $this->db->where('tema_id' , $tema_id);
    $this->db->select_max('calificacion_obtenida');
    $calificacion_alta = $this->db->get('calificacion')->result_array();
    foreach($calificacion_alta as $row) {
        echo $row['calificacion_obtenida'];
    }
}

function get_grado($calificacion_obtenida) {
    $query = $this->db->get('grado');
    $grados = $query->result_array();
    foreach ($grados as $row) {
        if ($calificacion_obtenida >= $row['calificacion_desde'] && $calificacion_obtenida <= $row['calificacion_hasta'])
            return $row;
    }
}

function get_system_settings() {
    $query = $this->db->get('settings');
    return $query->result_array();
}



////////MENSAJE PRIVADO//////
function send_new_private_message() {
    $mensaje    = $this->input->post('mensaje');
    $timestamp  = strtotime(date("Y-m-d H:i:s"));

    $receptor   = $this->input->post('receptor');
    $remitente     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

    //check if the thread between those 2 users exists, if not create new thread
    $num1 = $this->db->get_where('mensaje_thread', array('remitente' => $remitente, 'receptor' => $receptor))->num_rows();
    $num2 = $this->db->get_where('mensaje_thread', array('remitente' => $receptor, 'receptor' => $remitente))->num_rows();

    if ($num1 == 0 && $num2 == 0) {
        $mensaje_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data_message_thread['mensaje_thread_code'] = $mensaje_thread_code;
        $data_message_thread['remitente']              = $remitente;
        $data_message_thread['receptor']            = $receptor;
        $this->db->insert('mensaje_thread', $data_message_thread);
    }
    if ($num1 > 0)
        $mensaje_thread_code = $this->db->get_where('mensaje_thread', array('remitente' => $remitente, 'receptor' => $receptor))->row()->mensaje_thread_code;
    if ($num2 > 0)
        $mensaje_thread_code = $this->db->get_where('mensaje_thread', array('remitente' => $receptor, 'receptor' => $remitente))->row()->mensaje_thread_code;


    $data_message['mensaje_thread_code']    = $mensaje_thread_code;
    $data_message['mensaje']                = $mensaje;
    $data_message['remitente']                 = $remitente;
    $data_message['timestamp']              = $timestamp;
    $this->db->insert('mensaje', $data_message);

    // notify email to email receptor
    //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

    return $mensaje_thread_code;
}

function send_reply_message($mensaje_thread_code) {
    $mensaje    = $this->input->post('mensaje');
    $timestamp  = strtotime(date("Y-m-d H:i:s"));
    $remitente     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


    $data_message['mensaje_thread_code']    = $mensaje_thread_code;
    $data_message['mensaje']                = $mensaje;
    $data_message['remitente']                 = $remitente;
    $data_message['timestamp']              = $timestamp;
    $this->db->insert('mensaje', $data_message);

    // notify email to email receptor
    //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
}

function mark_thread_messages_read($mensaje_thread_code) {
    // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
    $usuario_actual = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
    $this->db->where('remitente !=', $usuario_actual);
    $this->db->where('mensaje_thread_code', $mensaje_thread_code);
    $this->db->update('mensaje', array('leer_status' => 1));
}

function count_unread_message_of_thread($mensaje_thread_code) {
    $nro_mensaje_no_leido = 0;
    $usuario_actual = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
    $mensajes = $this->db->get_where('mensaje', array('mensaje_thread_code' => $mensaje_thread_code))->result_array();
    foreach ($mensajes as $row) {
        if ($row['remitente'] != $usuario_actual && $row['leer_status'] == '0')
            $nro_mensaje_no_leido++;
    }
    return $nro_mensaje_no_leido;
}

 ////////MATERIAL DE ESTUDIO//////////
 function guardar_material_estudio_info()
 {
     $data['timestamp']         = strtotime($this->input->post('timestamp'));
     $data['titulo'] 		       = $this->input->post('titulo');
     $data['descripcion']       = $this->input->post('descripcion');
     $data['titulo_nombre'] 	       = $_FILES["titulo_nombre"]["name"];
     $data['file_tipo']     	   = $this->input->post('file_tipo');
     $data['clase_id'] 	       = $this->input->post('clase_id');
     $data['tema_id']         = $this->input->post('tema_id');
     $this->db->insert('documento',$data);
     
     $documento_id            = $this->db->insert_id();
     move_uploaded_file($_FILES["titulo_nombre"]["tmp_name"], "uploads/documentos/" . $_FILES["titulo_nombre"]["name"]);
 }
 
 function seleccionar_material_estudio_info()
 {
     $this->db->order_by("timestamp", "desc");
     return $this->db->get('documento')->result_array(); 
 }
 
 function seleccionar_material_estudio_info_para_estudiante()
 {
     $estudiante_id = $this->session->userdata('estudiante_id');
     $clase_id   = $this->db->get_where('inscribirse', array(
         'estudiante_id' => $estudiante_id,
             'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
         ))->row()->clase_id;
     $this->db->order_by("timestamp", "desc");
     return $this->db->get_where('documento', array('clase_id' => $clase_id))->result_array();
 }
 
 function actualizar_material_estudio_info($documento_id)
 {
     $data['timestamp']      = strtotime($this->input->post('timestamp'));
     $data['titulo'] 		= $this->input->post('titulo');
     $data['descripcion']    = $this->input->post('descripcion');
     $data['clase_id'] 	= $this->input->post('clase_id');
     $data['tema_id']     = $this->input->post('tema_id');
     $this->db->where('documento_id',$documento_id);
     $this->db->update('documento',$data);
 }
 
 function eleminar_material_estudio_info($documento_id)
 {
     $this->db->where('documento_id',$documento_id);
     $this->db->delete('documento');
 }


}
