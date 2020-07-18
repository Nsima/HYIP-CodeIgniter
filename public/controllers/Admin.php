<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');		
		if(!$this->session->name){
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Login to continue!!!</div>');
			redirect(base_url('login'));
		};		
	}
	public function index()
	{
		$this->load->view('includes/dashboard_header');
		$this->load->view('dashboard');
		$this->load->view('includes/dashboard_footer');
	}
	public function profile()
	{
		$this->load->view('includes/dashboard_header');
		$this->load->view('profile');
		$this->load->view('includes/dashboard_footer');
	}
	public function signup()
	{
		$this->load->view('includes/dashboard_header');
		$this->load->view('signup');
		$this->load->view('includes/dashboard_footer');
	}
	public function blog()
	{
		$this->load->view('includes/dashboard_header');
		$this->load->view('blog');
		$this->load->view('includes/dashboard_footer');
	}
	public function blog_post()
	{
		$this->load->view('includes/dashboard_header');
		$this->load->view('blog-post');
		$this->load->view('includes/dashboard_footer');
	}
}
