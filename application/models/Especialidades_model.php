<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Especialidades_model extends CI_Model
{
    var $id;
    var $nome;
    var $descricao;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("especialidades", $this);
        return $this->db->insert_id();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("especialidades");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from especialidades where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Especialidades_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("especialidades", $this);
		return $this->db->trans_status();
	}
}

?>