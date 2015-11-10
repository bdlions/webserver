<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Transaction_library {
    public function __construct() {
        $this->load->model('transaction_model');
        $this->load->library('Date_utils');
    }

    /**
     * __call
     *
     * Acts as a simple way to call model methods without loads of stupid alias'
     *
     * */
    public function __call($method, $arguments) {
        if (!method_exists($this->transaction_model, $method)) {
            throw new Exception('Undefined method Transaction_library::' . $method . '() called');
        }

        return call_user_func_array(array($this->transaction_model, $method), $arguments);
    }

    /**
     * __get
     *
     * Enables the use of CI super-global without having to define an extra variable.
     *
     * I can't remember where I first saw this, so thank you if you are the original author. -Militis
     *
     * @access	public
     * @param	$var
     * @return	mixed
     */
    public function __get($var) {
        return get_instance()->$var;
    }
    
    public function get_load_balance_list()
    {
        $transaction_list = array();
        $total_amount = 0;
        $load_balance_list = $this->transaction_model->get_load_balance_history()->result_array();
        foreach($load_balance_list as $transaction_info)
        {
            $total_amount = $total_amount + $transaction_info['balance_in'];
            $transaction_info['created_on'] = $this->date_utils->get_unix_to_human_date($transaction_info['created_on']);
            $transaction_list[] = $transaction_info;
        }
        $result = array(
            'total_amount' => $total_amount,
            'transaction_list' => $transaction_list
        );
        return $result;
    }
    
    public function get_user_transaction_list($user_id)
    {
        $transaction_list = array();
        $total_amount = 0;
        $transaction_list_array = $this->transaction_model->get_user_transaction_list($user_id)->result_array();
        foreach($transaction_list_array as $transaction_info)
        {
            $total_amount = $total_amount + $transaction_info['balance_out'];
            $transaction_info['created_on'] = $this->date_utils->get_unix_to_human_date($transaction_info['created_on']);
            $transaction_list[] = $transaction_info;
        }
        $result = array(
            'total_amount' => $total_amount,
            'transaction_list' => $transaction_list
        );
        return $result;
    }
    
    public function get_credit_transfer_list($user_id)
    {
        $transaction_list = array();
        $transaction_list_array = $this->transaction_model->get_credit_transfer_list($user_id)->result_array();
        foreach($transaction_list_array as $transaction_info)
        {
            $transaction_info['created_on'] = $this->date_utils->get_unix_to_human_date($transaction_info['created_on']);
            $transaction_list[] = $transaction_info;
        }        
        return $transaction_list;
    }

}
