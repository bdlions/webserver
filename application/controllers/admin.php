<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('transaction_library');
        $this->load->library('Utils');
    }
    public function index()
    {
            
    }
    
    /*
     * This method will load balance for the admin
     */
    public function load_balance()
    {
        $api_key = SERVICE_TYPE_BKASH_SEND_MONEY_API_KEY;
        $amount = $this->input->post('load_balance_amount');
        $this->curl->create('http://localhost:5050/addsubscriberpayment');
        $this->curl->post(array("APIKey" => $api_key, "amount" => $amount ));
        $transaction_id = $this->curl->execute();
        
        $transaction_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => $amount,
            'user_transaction_type_id' => TRANSACTION_TYPE_ID_LOAD_BALANCE
        );
        $this->transaction_model->add_transaction($transaction_data);
        
        
        $response = array(
            'message' => 'Transaction is executed successfully.'
        );
        echo json_encode($response);
    }
    
    public function transfer_agent_credit()
    {
        $transaction_id = $this->utils->generateRandomString();
        $user_id = $this->session->userdata('user_id');
        $agent_user_id = $this->input->post('agent_list');
        $amount = $this->input->post('agent_credit_amount');
        
        
        $admin_transaction_data = array(
            'user_id' => $user_id,
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => $amount,
            'user_transaction_type_id' => TRANSACTION_TYPE_ID_SEND_CREDIT
        );
        $this->transaction_model->add_transaction($admin_transaction_data);
        $agent_transaction_data = array(
            'user_id' => $agent_user_id,
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => $amount,
            'user_transaction_type_id' => TRANSACTION_TYPE_ID_RECEIVE_CREDIT
        );
        $this->transaction_model->add_transaction($agent_transaction_data);
        
        $response = array(
            'message' => 'Credit is transferred successfully.'
        );
        echo json_encode($response);
    }
    
    public function get_load_balance_list()
    {
        $response = $this->transaction_library->get_load_balance_list();
        echo json_encode($response);
    }
}