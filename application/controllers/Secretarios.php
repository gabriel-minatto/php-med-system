<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secretarios extends CI_Controller 
{

    var $data;

    public function __construct() {

        parent::__construct();
        
    }
    
    public function index()
    {
        $this->load->view('secretarios/login', $this->data);
    }
    
    //login
    
    public function login()
    {
        $this->load->model("Secretarios_model","secretario");
        $this->secretario->email = $this->input->post('email', TRUE);
        $this->secretario->senha = md5($this->input->post('senha', TRUE));
        if(!$this->secretario->check_login())
        {
            $this->session->set_flashdata("error","Verifique suas informações de login!");
            //redirect(base_url(), 'refresh');
        }
        $medico = $this->secretario->load_obj_login();
        $this->session->set_userdata('secretario_id', $medico->id);
        $this->session->set_userdata('secretario_nome', $medico->nome);
        $this->session->set_userdata('secretario_email', $medico->email);
        $this->session->set_flashdata("success","Bem-vindo!");
        redirect(base_url('secretarios/consultas'), 'refresh');
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
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->data["consultas"] = $this->consulta->load_all();
        $this->load->view("secretarios/list_consults" ,$this->data);
    }
    
    public function pay_consult($id)
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Consultas_model","consulta");
        $this->consulta->id = $id;
        $this->consulta->set_paid();
        $this->session->set_flashdata("success","Consulta Paga Com Sucesso!");
        redirect(base_url('secretarios/consultas'), 'refresh');
    }
    
    public function doctors()
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Medicos_model","medico");
        $this->data["medicos"] = $this->medico->load_all();
        $this->load->view("secretarios/list_doctors", $this->data);
    }
    
    public function new_doctor()
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->view("secretarios/new_doctor", $this->data);
    }
    
    public function add_doctor()
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Medicos_model","medico");
        $this->load->model("Enderecos_model","endereco");
        $this->load->model("Especialidades_model","especialidade");
        
        $this->especialidade->nome = $this->input->post("especialidade",null);
        $this->especialidade->descricao = $this->input->post("espec_desc",null);
        $this->medico->especialidade = $this->especialidade->insert();
        
        $this->endereco->logradouro = $this->input->post("logradouro",null);
        $this->endereco->cidade = $this->input->post("cidade",null);
        $this->endereco->cep = $this->input->post("cep",null);
        $this->endereco->uf = $this->input->post("uf",null);
        $this->medico->endereco = $this->endereco->insert();
        
        $this->medico->nome = $this->input->post("nome",null);
        $this->medico->dataNascimento = $this->input->post("dt_nasc",null);
        $this->medico->cpf = $this->input->post("cpf",null);
        $this->medico->email = $this->input->post("email",null);
        $this->medico->telefone = $this->input->post("telefone",null);
        $this->medico->senha = md5($this->input->post("senha",null));
        $this->medico->crm = $this->input->post("crm",null);
        $this->medico->insert();
        $this->session->set_flashdata("success","Médico Adicionado Com Sucesso!");
        redirect(base_url('secretarios/medicos'), 'refresh');
    }
    
    public function delete_doctor($id)
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Medicos_model","medico");
        $this->load->model("Enderecos_model","endereco");
        $this->load->model("Especialidades_model","especialidade");
        
        $this->medico->id = $id;
        $medico = $this->medico->load_by_id();
        $this->endereco->id = $medico->endereco;
        $this->especialidade->id = $medico->especialidade;
        
        $this->medico->delete();
        $this->endereco->delete();
        $this->disponibilidade->delete();
        
        $this->session->set_flashdata("success","Médico Deletado Com Sucesso!");
        redirect(base_url('secretarios/medicos'), 'refresh');
    }
    
    public function patients()
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Pacientes_model","paciente");
        $this->data["pacientes"] = $this->paciente->load_all();
        $this->load->view("secretarios/list_patients", $this->data);
    }
    
    public function activate_patient($id)
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Pacientes_model","paciente");
        $this->paciente->id = $id;
        $this->paciente->activate();
        $this->session->set_flashdata("success","Paciente Ativado Com Sucesso!");
        redirect(base_url('secretarios/pacientes'), 'refresh');
    }
    
    public function delete_patient($id)
    {
        if(!is_secretary())
        {
            $this->session->set_flashdata("error","Você não tem permissão para acessar essa área do site!");
            redirect(base_url(), 'refresh');
        }
        $this->load->model("Pacientes_model","paciente");
        $this->paciente->id = $id;
        $this->paciente->delete();
        $this->session->set_flashdata("success","Paciente Deletado Com Sucesso!");
        redirect(base_url('secretarios/pacientes'), 'refresh');
    }
    
}   




