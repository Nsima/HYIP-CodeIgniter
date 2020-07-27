<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->name){
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Login to continue!!!</div>');
			redirect(base_url('login'));
		};
	}
	public function index()
	{
		$pagedata['title'] = 'Dashboard';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/dashboard');
		$this->load->view('includes/dashboard_footer');
	}
	public function deposit()
	{
		$pagedata['title'] = 'Deposit';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/deposit');
		$this->load->view('includes/dashboard_footer');
	}
	public function market()
	{
		$pagedata['title'] = 'Market';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/market');
		$this->load->view('includes/dashboard_footer');
	}
	public function referral()
	{
		$pagedata['title'] = 'Referral';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/referral');
		$this->load->view('includes/dashboard_footer');
	}
	public function transfer()
	{
		$pagedata['title'] = 'Transfer';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/transfer');
		$this->load->view('includes/dashboard_footer');

	}
	public function profile()
	{
		$pagedata['title'] = 'Profile';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/profile');
		$this->load->view('includes/dashboard_footer');
	}
	public function login_history()
	{
		$pagedata['title'] = 'Login History';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/login-history');
		$this->load->view('includes/dashboard_footer');
	}
	public function support()
	{
		$pagedata['title'] = 'Support';
		$this->load->view('includes/dashboard_header', $pagedata);
		$this->load->view('user/support');
		$this->load->view('includes/dashboard_footer');
	}

	public function getChart() {
		$res = $this->db->get('chart')->result_array();
		echo $res?json_encode($res):null;
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}			
}
