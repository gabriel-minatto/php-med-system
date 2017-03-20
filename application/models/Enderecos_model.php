<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enderecos_model extends CI_Model
{
    var $id;
    var $logradouro;
    var $cidade;
    var $cep;
    var $uf;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("enderecos", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("enderecos");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from enderecos where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Enderecos_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("enderecos", $this);
		return $this->db->trans_status();
	}
}

?>