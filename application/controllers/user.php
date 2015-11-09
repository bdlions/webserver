<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('user_model');
    }
    public function index()
    {
            
    }
    
    public function create_role()
    {
        
    }
    
    public function create_agent()
    {
        $username = $this->input->post('username_create_agaent');
        $password = $this->input->post('password_create_agaent');
        $email = "";
        $additional_data = array(
            'first_name' => $this->input->post('first_name_create_agaent'),
            'last_name' => $this->input->post('last_name_create_agaent'),
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'commission' => $this->input->post('commission_create_agent')
        );
        $this->ion_auth->register($username, $password, $email, $additional_data);
        
        
        $this->curl->create('http://localhost:5050/registermember?username='.$username.'&&subscribername='.ADMIN_USER_NAME);
        //$this->curl->post(array("APIKey" => "key1", "amount" => $amount ));
        $this->curl->execute();
        
        $response = array(
            'message' => 'Agent is created successfully.'
        );
        echo json_encode($response);
    }
    
    public function create_subagent()
    {
        $agent_user_id = $this->session->userdata('user_id');
        $username = $this->input->post('username_create_subagaent');
        $password = $this->input->post('password_create_subagaent');
        $email = "";
        $additional_data = array(
            'first_name' => $this->input->post('first_name_create_subagaent'),
            'last_name' => $this->input->post('last_name_create_subagaent'),
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'commission' => $this->input->post('commission_create_subagent'),
            'agent_user_id' => $agent_user_id
        );
        $groups = array(GROUP_ID_SUBAGENT);
        $this->ion_auth->register($username, $password, $email, $additional_data, $groups);
        
        $this->curl->create('http://localhost:5050/registermember?username='.$username.'&&subscribername='.ADMIN_USER_NAME);
        //$this->curl->post(array("APIKey" => "key1", "amount" => $amount ));
        $this->curl->execute();
        
        $response = array(
            'message' => 'Subagent is created successfully.'
        );
        echo json_encode($response);
    }
    
    public function show_agents()
    {
        print_r($this->user_model->get_all_agents()->result_array());
    }
    
    public function show_subagents($agent_user_id = 0)
    {
        print_r($this->user_model->get_all_subagents($agent_user_id)->result_array());
    }
}