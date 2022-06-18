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

}
