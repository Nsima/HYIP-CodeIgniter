<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function generalinfo()
    {
        $id = 1; //It works, let it be
        $result = $this->db->get_where('general_settings', array('id'=>$id))->result_array(); 
        return (count($result)>0?$result[0]:null);
    }
    public function faqs()
    {
        $sql = "SELECT * FROM faqs;";
        $result = $this->db->query($sql);
        $result = $result->result();
        return $result;
        /*
        foreach ($query->result() as $row)
        {
            echo $row->title;
            echo $row->name;
            echo $row->body;
        }
        */
    }
    public function posts()
    {
        $sql = "SELECT * FROM posts";
        $result = $this->db->query($sql);
        $result = $result->result();
        return $result;
    }
    public function get_last_three_post()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('post', 3);
        return $query->result();
    }
    //insert into user table
    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
    
    //send verification email to user's email id
    public function sendEmail($to_email)
    {
        $site_info = $this->generalinfo();
        $from_email = $site_info['contact_email'];
        $app_name = $site_info['site_name']; 
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.bonic.org/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />'.$app_name;
        
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
        $this->email->from($from_email, $app_name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    public function isUseRegistered($email){
        $user = $this->db->get_where('users',array('email'=>$email))->result_array();
        return $user?1:0;
    }

    public function isDetailsCorrect($email, $password){
        $user = $this->db->get_where('users',array('email'=>$email, 'password' => md5($password)))->result_array();
        return $user?$user[0]:0;
    }

    public function createUserSession($userDetails) {
        $this->session->set_userdata($userDetails);
    }
    
    //activate user account
    public function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user', $data);
    }

    public function getUser($key)
    {
        //$data = $this->db->get_where('users', array('id' => , );)
    }

}
?>