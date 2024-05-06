<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura extends CI_Controller {

	public function index()
	{
		$this->load->model("juanbd_model");
		$filas = $this->juanbd_model->cuenta();
		$datos["filas"]=$filas;
		$this->load->view('view_lectura', $datos);
	}

	public function indexdos()
	{
		$this->load->helper('url');

		$dato["codcuenta"]=$_GET['codcuenta'];
		$this->load->model("juanbd_model");
		$this->juanbd_model->eliminar($dato["codcuenta"]);
		redirect("Lectura");
		
	}


}
