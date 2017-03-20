<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicos extends CI_Controller 
{

    var $data;

    public function __construct() {

        parent::__construct();
        
    }
    
    public function index()
    {
        $this->load->view('medicos/login', $this->data);
    }
    
    //login
    
    public function login()
    {
        $this->load->model("Medicos_model","medico");
        $this->medico->email = $this->input->post('email', TRUE);
        $this->medico->senha = md5($this->input->post('senha', TRUE));
        if(!$this->medico->check_login())
        {
            $this->session->set_flashdata("error","Verifique suas informações de login!");
            //redirect(base_url(), 'refresh');
        }
        $medico = $this->medico->load_obj_login();
        $this->session->set_userdata('medico_id', $medico->id);
        $this->session->set_userdata('medico_nome', $medico->nome);
        $this->session->set_userdata('medico_email', $medico->email);
        $this->session->set_flashdata("success","Bem-vindo!");
        redirect(base_url('medicos/consultas'), 'refresh');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        echo "Saindo...";
        redirect(base_url(), 'refresh');
    }
    
    //login - end
    
    public function consults()
    {
        if(!is_doctor())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->medico = $this->session->userdata('medico_id');
        $this->data["consultas"] = $this->consulta->load_by_doctor();
        $this->load->view("medicos/list",$this->data);
    }
    
    public function make_consult($id)
    {
        if(!is_doctor())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->id = $id;
        $this->data["consulta"] = $this->consulta->select_consult();
        $this->load->view("medicos/consult",$this->data);
    }
    
    public function save_consult($id)
    {
        if(!is_doctor())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->id = $id;
        $this->consulta->diagnostico = $this->input->post("diagnostico",null);
        $this->consulta->valor = $this->input->post("valor",null);
        $this->consulta->done = 1;
        $this->consulta->set_consult_done();
        $this->session->set_flashdata("success","Consulta realizada Com Sucesso!");
        redirect(base_url('medicos/consultas'), 'refresh');
    }
    
}   




