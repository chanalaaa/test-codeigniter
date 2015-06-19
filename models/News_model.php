

<?php

class News_model extends CI_Model
{
    
    public function __construct() {
        $this->load->database();
    }
    
    public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function set_news() {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array('title' => $this->input->post('title'), 'slug' => $slug, 'text' => $this->input->post('text'));
        return $this->db->insert('news', $data);
    }
    
    public function testangular_model($data) {
        $data['set'] = "helloooo from model";
        return $data;
    }
    
    public function login($user, $pass) {
        $query = $this->db->get_where('account', array('username' => $user));
        $data = $query->result_array();
        print_r($data);
        
        $data['flag'] = 0;
        if (isset($data[0]['username'])) {
            if ($data[0]['password'] == $pass) {

                $this->load->library('session');
                //$this->session->sess_expiration = 5;
                $this->session->set_userdata('user',$user);
                //$_SESSION['user'] =  $user;
                //$this->session->mark_as_temp('user', 300);
                //$this->session->mark_as_temp('user', 300);
                $data_array = $data[0];
                
                //print_r($data_array['username']);
                $data_array['flag'] = 1;
                $data_array['comment'] = "success";
                return $data_array;
            }
        }
        
        // print_r($data);
        
        
    }
}

