<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secretarios_model extends CI_Model
{
    var $id;
    var $nome;
    var $dataNascimento;
    var $cpf;
    var $email;
    var $telefone;
    var $senha;
    var $salario;
    var $endereco;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("secretarios", $this);
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("secretarios");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from secretarios where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Secretarios_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("secretarios", $this);
		return $this->db->trans_status();
	}
	
	public function check_login()
	{
	    $this->db->from("secretarios");
	    $this->db->where("email", $this->email);
	    $this->db->like("senha", $this->senha);
	    $query = $this->db->get();
	    if($query->num_rows() == 1)
	        return true;
	    return false;
	}
	
	public function load_obj_login()
    {
        $this->db->select("*");
        $this->db->from("secretarios");
        $this->db->where("email",$this->email);
        $this->db->like("senha",$this->senha);
    	$query = $this->db->get();
        return $query->row(0, "Secretarios_model");
    }
	
}

?>