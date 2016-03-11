<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('html','form','url','date'));
        $this->load->library(array('form_validation','image_lib','email','upload','funcoes'));
        $this->load->model('model_admin');
        if(isset($_SESSION['user_logado']))
        {
            redirect('controle/home');
        }
    }

    function index()
    {
        $this->load->view('controle/login_view');
    }

    function verificaLogin()
    {
        $login = $this->input->post('txtLogin', TRUE);
        $senha = md5($this->input->post('txtSenha',TRUE));

        $existe = $this->model_admin->get_admin(array("adm_login" => $login, "adm_senha" => $senha));

        if($existe == NULL)
        {
            $dados['msg'] = "Dados incorretos.";
            // echo json_encode($dados);
        }
        else
        {
            $dados['msg'] = "OK";
            $this->session->set_userdata('user_logado', $login);
            // redirect('controle/home');
        }
        echo json_encode($dados);
    }
}