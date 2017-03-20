<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_model extends CI_Model
{
    var $id;
    var $paciente;
    var $medico;
    var $diagnostico;
    var $valor;
    var $pago;
    var $done;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("consultas", $this);
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("consultas");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from consultas where id=?";
    	$query = $this->db->query($sql, array($this->id));
        return $query->row(0, "Consultas_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("consultas", $this);
		return $this->db->trans_status();
	}
	
	public function load_by_patient()
	{
	    $this->db->select('c.*,m.nome as medico_m,p.nome as paciente_m,e.nome as especialidade');
	    $this->db->from("consultas c");
	    $this->db->join("pacientes p","p.id = c.paciente");
	    $this->db->join("medicos m","m.id = c.medico");
	    $this->db->join("especialidades e","e.id = m.especialidade");
	    $this->db->where("p.id", $this->paciente);
	    $this->db->order_by("id","desc");
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function load_by_doctor()
	{
	    $this->db->select('c.*,m.nome as medico_m,p.nome as paciente_m,e.nome as especialidade,c.done as done');
	    $this->db->from("consultas c");
	    $this->db->join("pacientes p","p.id = c.paciente");
	    $this->db->join("medicos m","m.id = c.medico");
	    $this->db->join("especialidades e","e.id = m.especialidade");
	    $this->db->where("m.id", $this->medico);
	    $this->db->order_by("id","desc");
	    $query = $this->db->get();
	    return $query->result();
	}
	
	public function select_consult()
	{
	    $this->db->select("c.*,p.nome as nome_p,p.*,c.id as consulta_id");
	    $this->db->from("consultas c");
	    $this->db->join("pacientes p","p.id = c.paciente");
	    $this->db->where("c.id",$this->id);
	    $query = $this->db->get();
	    return $query->row();
	}
	
	public function set_consult_done()
	{
	    $this->db->set("done",1);
	    $this->db->set("diagnostico",$this->diagnostico);
	    $this->db->set("valor",$this->valor);
	    $this->db->where("id", $this->id);
	    $this->db->update('consultas');
	    return $this->db->trans_status();
	}
	
	public function set_paid()
	{
	    $this->db->set("pago",1);
	    $this->db->where("id", $this->id);
	    $this->db->update('consultas');
	    return $this->db->trans_status();
	}
	
	public function load_all()
	{
		$this->db->select('c.*,m.nome as medico_m,p.nome as paciente_m,e.nome as especialidade,c.done as done');
	    $this->db->from("consultas c");
	    $this->db->join("pacientes p","p.id = c.paciente");
	    $this->db->join("medicos m","m.id = c.medico");
	    $this->db->join("especialidades e","e.id = m.especialidade");
	    $this->db->order_by("id","desc");
	    $query = $this->db->get();
	    return $query->result();
	}
	
}

?>