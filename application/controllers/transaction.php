<?php
class Transaction extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('transaction_model');
    }
    public function index()
    {
            
    }
    
    public function add_transaction()
    {        
        $api_key = SERVICE_TYPE_BKASH_SEND_MONEY_API_KEY;
        $amount = $this->input->post('add_transaction_amount');
        $cell_no = $this->input->post('add_transaction_cell_no');
        $description = $this->input->post('add_transaction_description');
        $this->curl->create('http://localhost:3030/addtransaction?APIKey='.$api_key.'&&amount='.$amount.'&&cell_no='.$cell_no.'&&description='.$description);
        //$this->curl->post(array("APIKey" => "key1", "amount" => $amount ));
        $transaction_id = $this->curl->execute();
        
        $transaction_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_out' => $amount,
            'cell_no' => $cell_no,
            'description' => $description,
            'user_transaction_type_id' => TRANSACTION_TYPE_ID_USE_SERVICE
        );
        $this->transaction_model->add_transaction($transaction_data);
        
        $response = array(
            'message' => 'Transaction is executed successfully.'
        );
        echo json_encode($response);
    }
    
    public function show_user_transactions($user_id = 0)
    {
        print_r($this->transaction_model->get_all_transactions()->result_array());
    }
}
