<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller 
{

    var $data;

    public function __construct() {

        parent::__construct();
        
    }
    
    //home

    public function index()
    {
        $this->load->view('med-system/home/home', $this->data);
    }
    
    //home - end
    
    //pre cadastro
    
    public function pre_cadastro()
    {
        $this->load->view('med-system/precadastro/pre_cadastro', $this->data);
    }
    
    public function save_pre_cadastro()
    {
        $this->load->model("Pacientes_model","paciente");
        $this->load->model("Enderecos_model","endereco");
        
        $this->endereco->logradouro = $this->input->post('logradouro', TRUE);
        $this->endereco->cidade = $this->input->post('cidade', TRUE);
        $this->endereco->cep = $this->input->post('cep', TRUE);
        $this->endereco->uf = $this->input->post('uf', TRUE);
        
        $this->paciente->endereco = $this->endereco->insert();
        
        $this->paciente->nome = $this->input->post('nome', TRUE);
        $this->paciente->dataNascimento = $this->input->post('dataNascimento', TRUE);
        $this->paciente->cpf = $this->input->post('cpf', TRUE);
        $this->paciente->email = $this->input->post('email', TRUE);
        $this->paciente->telefone = $this->input->post('telefone', TRUE);
        $this->paciente->senha = md5($this->input->post('senha', TRUE));
        $this->paciente->active = 0;
        
        if($this->paciente->insert())
        {
            $this->session->set_flashdata("success","Pré Cadastro efetuado com sucesso, vá até uma de nossas clínicas para finalizá-lo!");
            redirect(base_url(), 'refresh');
        }
        
    }
    
    //pre cadastro - end
    
    //login
    
    public function patientLogin()
    {
        $this->load->model("Pacientes_model","paciente");
        $this->paciente->email = $this->input->post('email', TRUE);
        $this->paciente->senha = md5($this->input->post('senha', TRUE));
        if(!$this->paciente->check_login())
        {
            $this->session->set_flashdata("error","Verifique suas informações de login!");
            redirect(base_url(), 'refresh');
        }
        $paciente = $this->paciente->load_obj_login();
        $this->session->set_userdata('paciente_id', $paciente->id);
        $this->session->set_userdata('paciente_nome', $paciente->nome);
        $this->session->set_userdata('paciente_email', $paciente->email);
        $this->session->set_flashdata("success","Bem-vindo!");
        redirect(base_url('consultas/dashboard'), 'refresh');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        echo "Saindo...";
        redirect(base_url(), 'refresh');
    }
    
    //login - end
    
    //consultas
    
    public function consults()
    {
        if(!is_patient())
        {
            $this->session->set_flashdata("error","Você precisa estar logado para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->paciente = $this->session->userdata('paciente_id');
        $this->data["consultas"] = $this->consulta->load_by_patient();
        $this->load->view("med-system/consultas/list",$this->data);
    }
        
    //consultas - end
    
    public function pay($id)
    {
        if(!is_patient())
        {
            $this->session->set_flashdata("error","Você precisa estar logado para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->id = $id;
        $this->consulta->set_paid();
        $this->session->set_flashdata("success","Consulta Paga Com Sucesso!");
        redirect(base_url('consultas/dashboard'), 'refresh');
    }
    
    public function new_consult()
    {
        if(!is_patient())
        {
            $this->session->set_flashdata("error","Você precisa estar logado para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $espec = $this->input->post("espec_filter",null);
        $this->load->model("Medicos_model","medico");
        $this->data["medicos"] = $this->medico->load_available_doctors($espec);
        $this->load->view("med-system/consultas/new",$this->data);
    }
    
    public function create_consult()
    {
        if(!is_patient())
        {
            $this->session->set_flashdata("error","Você precisa estar logado para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->medico = $this->input->post("medico",null);
        $this->consulta->paciente = $this->session->userdata('paciente_id');
        $this->consulta->pago = 0;
        $this->consulta->done = 0;
        $this->consulta->insert();
        $this->session->set_flashdata("success","Consulta Criada Com Sucesso!");
        redirect(base_url('consultas/dashboard'), 'refresh');
    }
    
}   




