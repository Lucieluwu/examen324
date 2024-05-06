<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class juanbd_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function cuenta()
	{
		$this->load->database();
		$query=$this->db->query("SELECT * FROM cuenta WHERE condicion LIKE 'ACTIVA'");
		return $query->result();
	}

	public function eliminar($id)
	{
		$this->load->database();
		$query=$this->db->query("UPDATE cuenta SET condicion='ELIMINADA' WHERE codcuenta='$id';");
		$query=$this->db->query("SELECT * FROM cuenta WHERE condicion LIKE 'ACTIVA'");
		return $query->result();
	}

}
