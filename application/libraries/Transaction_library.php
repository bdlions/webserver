<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Transaction_library {
    public function __construct() {
        $this->load->model('transaction_model');
        $this->load->model('user_model');
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

    public function get_dashboard_summary()
    {
        $start_time = $this->date_utils->get_current_date_start_time();
        $end_time = $start_time + 86400;
        
        $total_agents = 0;
        $total_agents_array = $this->user_model->get_total_agents()->result_array();
        if(!empty($total_agents_array))
        {
            $total_agents = $total_agents_array[0]['total_agents'];
        }
        
        $total_agents_today = 0;
        $total_agents_today_array = $this->user_model->get_total_agents_today($start_time, $end_time)->result_array();
        if(!empty($total_agents_today_array))
        {
            $total_agents_today = $total_agents_today_array[0]['total_agents'];
        }
        
        $total_subagents = 0;
        $total_subagents_array = $this->user_model->get_total_subagents()->result_array();
        if(!empty($total_subagents_array))
        {
            $total_subagents = $total_subagents_array[0]['total_subagents'];
        }
        
        $total_subagents_today = 0;
        $total_subagents_today_array = $this->user_model->get_total_subagents_today($start_time, $end_time)->result_array();
        if(!empty($total_subagents_today_array))
        {
            $total_subagents_today = $total_subagents_today_array[0]['total_subagents'];
        }
        
        $agents_total_transactions = 0;
        $agents_total_transactions_array = $this->transaction_model->get_agents_total_transactions()->result_array();
        if(!empty($agents_total_transactions_array))
        {
            $agents_total_transactions = $agents_total_transactions_array[0]['total_transactions'];
        }
        
        $agents_total_transactions_today = 0;
        $agents_total_transactions_today_array = $this->transaction_model->get_agents_total_transactions($start_time, $end_time)->result_array();
        if(!empty($agents_total_transactions_today_array))
        {
            $agents_total_transactions_today = $agents_total_transactions_today_array[0]['total_transactions'];
        }
        
        $subagents_total_transactions = 0;
        $subagents_total_transactions_array = $this->transaction_model->get_subagents_total_transactions()->result_array();
        if(!empty($subagents_total_transactions_array))
        {
            $subagents_total_transactions = $subagents_total_transactions_array[0]['total_transactions'];
        }
        
        $subagents_total_transactions_today = 0;
        $subagents_total_transactions_today_array = $this->transaction_model->get_subagents_total_transactions($start_time, $end_time)->result_array();
        if(!empty($subagents_total_transactions_today_array))
        {
            $subagents_total_transactions_today = $subagents_total_transactions_today_array[0]['total_transactions'];
        }
        
        $result = array(
            'total_agents' => $total_agents,
            'total_agents_today' => $total_agents_today,
            'total_subagents' => $total_subagents,
            'total_subagents_today' => $total_subagents_today,
            'total_agent_transactions' => $agents_total_transactions,
            'total_agent_transactions_today' => $agents_total_transactions_today,
            'total_subagent_transactions' => $subagents_total_transactions,
            'total_subagent_transactions_today' => $subagents_total_transactions_today
        );
        return $result;
    }
    
}
