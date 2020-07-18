<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');		
	}
	public function index()
	{
        if($this->session->name){
            redirect(base_url('user'));
        }; 
        $pagedata = $this->User_model->generalinfo();
        $pagedata['faqs'] = $this->User_model->faqs();
        $this->load->view('includes/front_header');
		$this->load->view('home', $pagedata);
		$this->load->view('includes/front_footer');
	}
	public function login()
	{
        if($this->session->name){
            redirect(base_url('user'));
        };
		$this->load->view('includes/front_header');
		$this->load->view('login');
		$this->load->view('includes/front_footer');
	}

	public function signup()
	{
        if($this->session->name){
            redirect(base_url('user'));
        };
		//set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[30]');
        //$this->form_validation->set_rules('phone', 'Phone', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('country', 'Country');
        $this->form_validation->set_rules('state', 'State');
        //$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|alpha|min_length[3]|max_length[30]|xss_clean');
        //$this->form_validation->set_rules('acc_num', 'Account Number', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|md5');
        //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            //die("failed");
            // fails
			$this->load->view('includes/front_header');
			$this->load->view('signup');
			$this->load->view('includes/front_footer');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'name' => $this->input->post('name'),
                //'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                //'bank_name' => $this->input->post('bank_name'),
                //'acc_num' => $this->input->post('acc_num')
            );
            
            // insert form data into database
            if ($this->User_model->insertUser($data))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email Address!!!</div>');
                    redirect('/signup');
                /* send email
                if ($this->User_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('Home/register');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('Home/register');
                }
                */
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('/signup');
            }
        }
    }
    public function do_login() {
        if (isset($_POST)) {
            extract($_POST);
            $isUseRegistered = $this->User_model->isUseRegistered($email);
            if (!$isUseRegistered) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  We could not find any user with the email provided!!!</div>');
                redirect('/login');
            }else{
               $isDetailsCorrect = $this->User_model->isDetailsCorrect($email, $password);
               if ($isDetailsCorrect) {
                    $startSession = $this->User_model->createUserSession($isDetailsCorrect);
                    redirect(base_url('user'));
                }else{
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Email or password is incorrect!!!</div>');
                    redirect('/login');
                }
            }
            $login = $this->User_model->do_login($email, $password);
            if ($login) {
                
            }
        }else{
            die("THIS ACTION IS NOT ALLOWED");
        }
    }
    public function verify($hash=NULL)
    {
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('Home/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('Home/register');
        }
    }	
	public function blog()
	{
		$this->load->view('includes/front_header');
		$this->load->view('blog');
		$this->load->view('includes/front_footer');
	}
	public function blog_post()
	{
		$this->load->view('includes/front_header');
		$this->load->view('blog-post');
		$this->load->view('includes/front_footer');
	}
}
