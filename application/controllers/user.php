<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('user_model');
        $this->load->model('transaction_model');
        $this->load->library('Utils');
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
        
        
        $this->curl->create('http://localhost:4040/registermember');
        $this->curl->post(array("username" => $username, "subscribername" => ADMIN_USER_NAME ));
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
        
        $this->curl->create('http://localhost:4040/registermember?username='.$username.'&&subscribername='.ADMIN_USER_NAME);
        //$this->curl->post(array("APIKey" => "key1", "amount" => $amount ));
        $this->curl->execute();
        
        $response = array(
            'message' => 'Subagent is created successfully.'
        );
        echo json_encode($response);
    }
    
    public function transfer_subagent_credit()
    {
        $transaction_id = $this->utils->generateRandomString();
        $agent_user_id = $this->session->userdata('user_id');
        $subagent_user_id = $this->input->post('subagent_list');
        $amount = $this->input->post('subagent_credit_amount');
        
        
        $agent_transaction_data = array(
            'user_id' => $agent_user_id,
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_out' => $amount,
            'balance_in' => 0,
            'type_id' => TRANSACTION_TYPE_ID_SEND_CREDIT,
            'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
        );
        $this->transaction_model->add_transaction($agent_transaction_data);
        $subagent_transaction_data = array(
            'user_id' => $subagent_user_id,
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => $amount,
            'balance_out' => 0,
            'type_id' => TRANSACTION_TYPE_ID_RECEIVE_CREDIT,
            'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
        );
        $this->transaction_model->add_transaction($subagent_transaction_data);
        
        $response = array(
            'message' => 'Credit is transferred successfully.'
        );
        echo json_encode($response);
    }
    
    public function get_agent_current_balances()
    {
        $agent_list = $this->transaction_model->get_agents_current_balance()->result_array();
        $result = array(
            'agent_list' => $agent_list
        );
        echo json_encode($result);
    }
    public function get_subagent_current_balances()
    {
        $agent_user_id = $this->input->post('agent_user_id');
        $subagent_list = $this->transaction_model->get_subagents_current_balance($agent_user_id)->result_array();
        $result = array(
            'subagent_list' => $subagent_list
        );
        echo json_encode($result);
    }
    
    public function get_subagent_list()
    {
        $agent_user_id = $this->input->post('agent_user_id');
        $subagent_list_array = $this->user_model->get_all_subagents($agent_user_id)->result_array();
        $result = array(
            'subagent_list' => $subagent_list_array
        );
        echo json_encode($result);
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