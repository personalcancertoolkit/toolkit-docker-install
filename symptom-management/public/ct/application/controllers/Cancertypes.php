<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancertypes extends CI_Controller {

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
		$data["c_id"] = $this->uri->segment(3, 1); // if there is no 3rd segment, set the id to 1
		$data["cancertypes"] = $this->cancerlist_model->get_cancerlist();
		$data["symptoms"] = $this->symptom_model->get_symptoms_by_cancer_id($data["c_id"]);
		$data["all_symptoms"] = $this->symptom_model->get_all_symptoms();
		$this->load->view('templates/head');
		$this->load->view('templates/left_side', $data);
		$this->load->view('cancertypes/index', $data);
		$this->load->view('templates/left_side_close');
	}
	
	public function add()
	{	$data = Array();
		$data["c_id"] = 0;
		$data["cancertypes"] = $this->cancerlist_model->get_cancerlist();
		$this->load->view('templates/head');
		$this->load->view('templates/left_side', $data);
		$this->load->view('cancertypes/add', $data);
		$this->load->view('templates/left_side_close');
	}
	
	public function add_new(){
		$cancertype = $this->input->post();
		$new_type = $this->cancerlist_model->add_new($cancertype);
		echo $new_type;
	}
	
	public function updatename(){
		$namechange = $this->input->post();
		$success = $this->cancerlist_model->updatename($namechange);
		echo json_encode($success);
	}
	
	public function add_symptom(){
		$symptom = $this->input->post();
		$new_symptom = $this->cancerlist_model->add_symptom($symptom);
		echo $new_symptom;
	}
	
	public function remove_symptom(){
		$symptom = $this->input->post();
		$remove_symptom = $this->cancerlist_model->remove_symptom($symptom);
		echo $remove_symptom;
	}
}
