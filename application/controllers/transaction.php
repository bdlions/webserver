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
        $response = array(
            'message' => ''
        );
        
        //add form validation if required.
        
        $amount = $this->input->post('add_transaction_amount');    
        //check user current available balance and then allow transaction
        $user_id = $this->session->userdata('user_id');
        $user_current_balance = $this->transaction_library->get_user_current_balance($user_id);
        if($amount > $user_current_balance)
        {
            $response['message'] = 'Insufficient balance.';
        }
        else
        {
            $api_key = API_KEY_BKASH_SEND_MONEY;
            $cell_no = $this->input->post('add_transaction_cell_no');
            $description = $this->input->post('add_transaction_description');
            
            $transaction_id = "";
            //calling the webservice for the transaction
            $this->curl->create(WEBSERVICE_URL_CREATE_TRANSACTION);
            $this->curl->post(array("APIKey" => $api_key, "amount" => $amount, "cell_no" => $cell_no, "description" => $description ));
            $result_event = json_decode($this->curl->execute());
            if (!empty($result_event)) {
                $response_code = '';
                if (property_exists($result_event, "responseCode") != FALSE) {
                    $response_code = $result_event->responseCode;
                }
                if($response_code == RESPONSE_CODE_SUCCESS)
                {
                    if (property_exists($result_event, "result") != FALSE) {
                        $transaction_info = $result_event->result;
                        $transaction_id = $transaction_info->transactionId;
                        if(empty($transaction_id) || $transaction_id == "")
                        {
                            //Handle a message if there is no transaction id
                            $response['message'] = $response_code;
                            echo json_encode($response);
                            return;
                        }
                    }
                    else
                    {
                        //Handle a message if there is no result even though response code is success
                        $response['message'] = $response_code;
                        echo json_encode($response);
                        return;
                    }
                }
                else
                {
                    //Add a message for this response code
                    $response['message'] = $response_code;
                    echo json_encode($response);
                    return;
                }
            }
            
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
            $response['message'] = 'Transaction is executed successfully.';
        }
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
