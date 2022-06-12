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

    
    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }


      /////////PROFESOR/////////////
      function get_teachers() {
        $query = $this->db->get('profesor');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('profesor', array('profesor_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('profesor', array('profesor_id' => $teacher_id));
        return $query->result_array();
    }

     ////////ESTUDIANTE/////////////
     function get_students($class_id) {
        $query = $this->db->get_where('estudiante', array('clase_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('estudiante', array('estudiante_id' => $student_id));
        return $query->result_array();
    }

    ////////////CLASS///////////
    function get_class_name($class_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre'];
    }

    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['nombre_numerico'];
    }

    function get_classes() {
        $query = $this->db->get('clase');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('clase', array('clase_id' => $class_id));
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


}
