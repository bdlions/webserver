<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('transaction_model');
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
}