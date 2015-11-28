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
        $this->load->library('Ion_auth');
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
    
    public function add_user_transaction($transaction_data)
    {
        //adding user transaction
        $this->transaction_model->add_transaction($transaction_data);
        //initializing user profit data
        $user_profits = array(
            'user_id' => $transaction_data['user_id'],
            'transaction_id' => $transaction_data['transaction_id'],
            'service_id' => SERVICE_TYPE_ID_BKASH_SEND_MONEY,
            'amount' => $transaction_data['balance_out'],
            'admin_profit' => 0,
            'agent_profit' => 0,
            'subagent_profit' => 0
        );
        //retrieving service charge info
        $service_charge_info = array();
        $service_charge_info_array = $this->transaction_model->get_service_charge_info(SERVICE_TYPE_ID_BKASH_SEND_MONEY)->result_array();
        if(!empty($service_charge_info_array))
        {
            $service_charge_info = $service_charge_info_array[0];
        }
        
        //retrieving user group
        $user_group_id = 0; 
        $user_group_array = $this->ion_auth->get_current_user_types();
        foreach($user_group_array as $group_id => $name)
        {
            $user_group_id = $group_id;
            break;
        }
        //calculating profit for transaction of admin
        if($user_group_id == GROUP_ID_ADMIN)
        {
            $user_profits['admin_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * $service_charge_info['user_charge']; 
        }
        else
        {
            //calculating profit for transaction of agent or subagent
            $subagent_info = array();
            $agent_user_id = 0;
            $subagent_user_id = 0;
            $agent_commission = 0;
            $subagent_commission = 0;
            //user id list to get commission info
            $user_id_list = array();
            if($user_group_id == GROUP_ID_AGENT)
            {
                $agent_user_id = $transaction_data['user_id'];
                $user_id_list[] = $agent_user_id;
            }
            else if($user_group_id == GROUP_ID_SUBAGENT)
            {
                //retrieving subagent info
                $subagent_info_array = $this->transaction_model->get_subagent_info($transaction_data['user_id'])->result_array();
                if(!empty($subagent_info_array))
                {
                    $subagent_info = $subagent_info_array[0];
                    $agent_user_id = $subagent_info['agent_user_id'];
                    $subagent_user_id = $subagent_info['subagent_user_id'];
                    $user_id_list[] = $agent_user_id;
                    $user_id_list[] = $subagent_user_id;
                }
            }
            if($user_group_id == GROUP_ID_AGENT || $user_group_id == GROUP_ID_SUBAGENT)
            {
                //retrieving commission info
                $user_commission_array = $this->transaction_model->get_commission_users(SERVICE_TYPE_ID_BKASH_SEND_MONEY, $user_id_list)->result_array();
                foreach($user_commission_array as $user_commission)
                {
                    if($user_commission['user_id'] == $agent_user_id)
                    {
                        $agent_commission = $user_commission['commission'];
                    }
                    if($user_commission['user_id'] == $subagent_user_id)
                    {
                        $subagent_commission = $user_commission['commission'];
                    }
                }
            }
            //calculating agent profit
            if($user_group_id == GROUP_ID_AGENT)
            {
                $user_profits['admin_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * ($service_charge_info['user_charge'] - $agent_commission); 
                $user_profits['agent_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * $agent_commission; 
            }
            //calculating subagent profit
            if($user_group_id == GROUP_ID_SUBAGENT)
            {
                $user_profits['admin_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * ($service_charge_info['user_charge'] - $agent_commission); 
                $user_profits['agent_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * ($agent_commission - $subagent_commission); 
                $user_profits['subagent_profit'] = ($user_profits['amount']/$service_charge_info['unit']) * $subagent_commission; 
            }
        }
        $this->transaction_model->add_user_profit($user_profits);        
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
    
    public function get_user_profit_list($user_id)
    {
        $profit_list = array();
        $total_amount = 0;
        $profit_list_array = $this->transaction_model->get_user_profit_list($user_id)->result_array();
        foreach($profit_list_array as $profit_info)
        {
            $total_amount = $total_amount + $profit_info['amount'];
            $profit_info['created_on'] = $this->date_utils->get_unix_to_human_date($profit_info['created_on']);
            $profit_list[] = $profit_info;
        }
        $result = array(
            'total_amount' => $total_amount,
            'profit_list' => $profit_list
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
