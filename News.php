<?php
class News extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url');
    }
    
    public function index() {
        
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        print_r($data['news']);
        
        //$this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        
        //$this->load->view('templates/footer');
        
        
    }
    
    public function view() {
        $slug = $this->uri->segment(2, '');
        $data['news_item'] = $this->news_model->get_news($slug);
        print_r($slug);
        
        //$data['news'] = $this->news_model->get_news($slug);
        //print_r($data['news_item']);
        if (empty($data['news_item'])) {
            show_404();
        }
        
        // $data['title'] = $data['news_item']['title'];
        
        //$this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        
        // $this->load->view('templates/footer');
        
        
    }
    
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Create a news item';
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            
            //$this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            
            //$this->load->view('templates/footer');
            
            
        } 
        else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
    
    public function testangular() {
        header('Content-Type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        //$slug = url_title($request->dataform, 'dash', TRUE);
        
        //$data = array();
        
        $data['set'] = "helloooo";
        $data = $this->news_model->testangular_model($data);
        $data['testang'] = $request->dataform;
        
        //$data = array('model' => $request->dataform);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
        //print_r($data);
        
        
    }
    
    public function login() {
        $this->load->library('session');
        $acc_query = array();
        if (!isset($_SESSION['user'])) {
            
            if (!isset($_POST['user'])) {
                $this->load->view('news/login');
                
                //print_r("1");
                
                
            } 
            else {
                global $acc_query;
                
                //print_r("2");
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $acc_query = $this->news_model->login($user, $pass);
                print_r("    flag:" . $acc_query['flag']);
                
                if ($acc_query['flag'] == 1) {
                    $this->load->view('news/success_login', $acc_query);
                } 
                else {
                    $this->load->view('news/login');
                    echo "<br>//try again";
                }
            }
        } 
        else {
            
            //print_r($acc_query);
            
            $this->load->view('news/success_login');
        }
    }
    
    public function clear_sess() {
        $this->load->library('session');
        
        
        $this->session->unset_tempdata('user');
        $this->session->sess_destroy();
        
        header('Location: ../login');
       // print_r($acc_query);
    }
}
