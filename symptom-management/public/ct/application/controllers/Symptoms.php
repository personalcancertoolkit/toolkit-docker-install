<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Symptoms extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('cancerlist_model');
		$this->load->model('symptom_model');
//		$user_id = $this->session->userdata('user_id');
//		if( $user_id < 1){redirect(base_url().'auth');}
    }
	
	 
	 
	public function index()
	{	$data = Array();
		$data["cancertypes"] = $this->cancerlist_model->get_cancerlist();
		$data["c_id"] = $this->uri->segment(3, 1);// if there is no 3rd segment, set the id to 1
		$data["s_id"] = $this->uri->segment(4, 1);// if there is no 4th segment, set the id to 1
		$data["symptom"] = $this->symptom_model->get_symptom_by_symptom_id($data["s_id"]);
		$this->load->view('templates/head');
		$this->load->view('templates/left_side', $data);
		$this->load->view('symptoms/index', $data);
		$this->load->view('templates/left_side_close');
	}
	
	public function create_symptom()
	{	
	$data = Array();
		$data["c_id"] = 0;
		$data["s_id"] = 0;
		$data["cancertypes"] = $this->cancerlist_model->get_cancerlist();
		$data["all_symptoms"] = $this->symptom_model->get_all_symptoms();
		//$data["symptom"] = $this->symptom_model->create_symptom();
		$this->load->view('templates/head');
		$this->load->view('templates/left_side_symptom', $data);
		$this->load->view('symptoms/symptom_setup', $data);
		$this->load->view('templates/left_side_close');
	}
	
	public function symptom_setup(){
		$symptom_name = $this->input->post();
		$success = $this->symptom_model->symptom_setup($symptom_name);
		echo json_encode($success);
	}
	
	public function updatename(){
		$namechange = $this->input->post();
		$success = $this->symptom_model->updatename($namechange);
		echo json_encode($success);
	}
	
	public function updatesymptom(){
		$symptom = $this->input->post();
		$success = $this->symptom_model->updatesymptom($symptom);
		echo json_encode($symptom);
	}
}
