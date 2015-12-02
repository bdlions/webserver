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
        $response = array(
            'message' => ''
        );
        $api_key = API_KEY_BKASH_SEND_MONEY;
        $amount = $this->input->post('load_balance_amount');
        if($amount < 0)
        {
            $response['message'] = 'Invalid amount';
        }
        else
        {
            $transaction_id = "";
            $this->curl->create(WEBSERVICE_URL_ADD_SUBSCRIBER_PAYMENT);
            $this->curl->post(array("APIKey" => $api_key, "amount" => $amount ));
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
                'balance_in' => $amount,
                'balance_out' => 0,
                'type_id' => TRANSACTION_TYPE_ID_LOAD_BALANCE,
                'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
            );
            $this->transaction_model->add_transaction($transaction_data);
            $response['message'] = 'Transaction is executed successfully.';            
        }        
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
            'balance_in' => 0,
            'balance_out' => $amount,
            'type_id' => TRANSACTION_TYPE_ID_SEND_CREDIT,
            'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
        );
        $this->transaction_model->add_transaction($admin_transaction_data);
        $agent_transaction_data = array(
            'user_id' => $agent_user_id,
            'transaction_id' => $transaction_id,
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'balance_in' => $amount,
            'balance_out' => 0,
            'type_id' => TRANSACTION_TYPE_ID_RECEIVE_CREDIT,
            'status_id' => TRANSACTION_STATUS_ID_SUCCESSFUL
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