<?php
class user_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
    
    //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'team@bonic.org'; 
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.bonic.org/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.bonic.org'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = '21Computer'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //please, biko, I beg you, use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Bonic');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    function isUseRegistered($email){
        $user = $this->db->get_where('users',array('email'=>$email))->result_array();
        return $user?1:0;
    }

    function isDetailsCorrect($email, $password){
        $user = $this->db->get_where('users',array('email'=>$email, 'password' => md5($password)))->result_array();
        return $user?$user[0]:0;
    }

    function createUserSession($userDetails) {
        $this->session->set_userdata($userDetails);
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user', $data);
    }
}
?>