<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2022 05:00:00 GMT");
    }

    //Default function, PARA EL INICIO DE CADA USUARIO
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');

        if ($this->session->userdata('profesor_login') == 1)
            redirect(base_url() . 'index.php?profesor/dashboard', 'refresh');

        if ($this->session->userdata('estudiante_login') == 1)
            redirect(base_url() . 'index.php?estudiante/dashboard', 'refresh');

        if ($this->session->userdata('padres_login') == 1)
            redirect(base_url() . 'index.php?padres/dashboard', 'refresh');

        $this->load->view('backend/login');
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();

        
        $email = $_POST["email"];
        $password = sha1($_POST["password"]);
        $response['submitted_data'] = $_POST;

        //Validacion login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }

        //Replying ajax validacion
        echo json_encode($response);
    }

    //Validating login 
    function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => $password);


        // CREDENCIALES PARA ADMIN
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            //$this->session->set_userdata('nombre', $row->nombre);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }

// CREDENCIALES PROFESOR
$query = $this->db->get_where('profesor', $credential);
if ($query->num_rows() > 0) {
    $row = $query->row();
    $this->session->set_userdata('profesor_login', '1');
    $this->session->set_userdata('profesor_id', $row->profesor_id);
    $this->session->set_userdata('login_user_id', $row->profesor_id);
    $this->session->set_userdata('name', $row->nombre);
    $this->session->set_userdata('login_type', 'profesor');
    return 'success';
}

// CREDENCIALES ESTUDIANTTE
$query = $this->db->get_where('estudiante', $credential);
if ($query->num_rows() > 0) {
    $row = $query->row();
    $this->session->set_userdata('estudiante_login', '1');
    $this->session->set_userdata('estudiante_id', $row->estudiante_id);
    $this->session->set_userdata('login_user_id', $row->estudiante_id);
    $this->session->set_userdata('name', $row->nombre);
    $this->session->set_userdata('login_type', 'estudiante');
    return 'success';
}

// CREDENCIALES PARA PADRES
$query = $this->db->get_where('padres', $credential);
if ($query->num_rows() > 0) {
    $row = $query->row();
    $this->session->set_userdata('padres_login', '1');
    $this->session->set_userdata('padres_id', $row->padres_id);
    $this->session->set_userdata('login_user_id', $row->padres_id);
    $this->session->set_userdata('name', $row->nombre);
    $this->session->set_userdata('login_type', 'padres');
    return 'success';
}
        

        return 'invalid';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password()
    {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password()
    {
        $resp                   = array();
        $resp['status']         = 'false';
        $email                  = $_POST["email"];
        $reset_account_type     = '';
        //reset contra
        $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);

        // check credencial
        $query = $this->db->get_where('admin' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'admin';
            $this->db->where('email' , $email);
            $this->db->update('admin' , array('password' => sha1($new_password)));
            $resp['status']         = 'true';
        }
      

        // send new password to user email
        if ($reset_account_type !== '' ){
         $this->email_model->password_reset_email($new_password , $reset_account_type , $email);
        }
        

        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }

}
