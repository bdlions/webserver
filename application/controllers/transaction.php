<?php
class Transaction extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('Transaction_library');
    }
    public function index()
    {
        $this->transaction_library->add_user_transaction(array());
    }
    
    public function add_transaction()
    {        
        $api_key = SERVICE_TYPE_BKASH_SEND_MONEY_API_KEY;
        $amount = $this->input->post('add_transaction_amount');
        $cell_no = $this->input->post('add_transaction_cell_no');
        $description = $this->input->post('add_transaction_description');
        
        $this->curl->create('http://31.222.157.106:3030/addtransaction');
        $this->curl->post(array("APIKey" => $api_key, "amount" => $amount, "cell_no" => $cell_no, "description" => $description ));
        $transaction_id = $this->curl->execute();
        
        $transaction_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => 0,
            'balance_out' => $amount,
            'cell_no' => $cell_no,
            'description' => $description,
            'type_id' => TRANSACTION_TYPE_ID_USE_SERVICE,
            'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
        );
        $this->transaction_library->add_user_transaction($transaction_data);
        
        $response = array(
            'message' => 'Transaction is executed successfully.'
        );
        echo json_encode($response);
    }
    
    public function get_user_transaction_list()
    {
        $user_id = $this->input->post('user_id');
        $response = $this->transaction_library->get_user_transaction_list($user_id);
        echo json_encode($response);
    }
    
    public function get_user_profit_list()
    {
        $user_id = $this->input->post('user_id');
        $response = $this->transaction_library->get_user_profit_list($user_id);
        echo json_encode($response);
    }
    
    public function get_credit_transfer_list()
    {
        $user_id = $this->input->post('user_id');
        $transaction_list = $this->transaction_library->get_credit_transfer_list($user_id);
        $result = array(
            'transaction_list' => $transaction_list
        );
        echo json_encode($result);
    }
    
    public function show_user_transactions($user_id = 0)
    {
        print_r($this->transaction_model->get_all_transactions()->result_array());
    }
}
