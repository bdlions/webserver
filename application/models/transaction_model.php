<?php
class Transaction_model extends Ion_auth_model 
{
    public function __construct() {
        parent::__construct();    
    }
    
    public function get_service_charge_info($service_id)
    {
        $this->db->where('service_id', $service_id);
        return $this->db->select($this->tables['service_charges'].'.*')
            ->from($this->tables['service_charges'])
            ->get();
    }
    
    public function get_subagent_info($subagent_user_id)
    {
        $this->db->where('subagent_user_id', $subagent_user_id);
        return $this->db->select($this->tables['subagents'].'.*')
            ->from($this->tables['subagents'])
            ->get();
    }
    
    public function get_commission_users($service_id, $user_id_list = array())
    {
        $this->db->where('service_id', $service_id);
        $this->db->where_in('user_id', $user_id_list);
        return $this->db->select($this->tables['users_commissions'].'.*')
            ->from($this->tables['users_commissions'])
            ->get();
    }
    
    public function add_transaction($transaction_data)
    {
        $transaction_data['created_on'] = now();
        $additional_data = $this->_filter_data($this->tables['user_transactions'], $transaction_data);
        $this->db->insert($this->tables['user_transactions'], $additional_data);
        $insert_id = $this->db->insert_id();
        return (isset($insert_id)) ? $insert_id : FALSE;
    }
    
    public function add_user_profit($profit_data)
    {
        $profit_data['created_on'] = now();
        $additional_data = $this->_filter_data($this->tables['users_profits'], $profit_data);
        $this->db->insert($this->tables['users_profits'], $additional_data);
        $insert_id = $this->db->insert_id();
        return (isset($insert_id)) ? $insert_id : FALSE;
    }
    
    public function get_agents_current_balance()
    {
        $this->db->where('group_id', GROUP_ID_AGENT);
        $this->db->group_by($this->tables['users'].'.id');
        return $this->db->select($this->tables['users'].'.id as user_id, first_name, last_name, sum(balance_in) - sum(balance_out) as current_balance')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'], $this->tables['users_groups'] . '.user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['user_transactions'] . '.user_id=' . $this->tables['users_groups'] . '.user_id', 'left')    
            ->get();
    }
    
    public function get_subagents_current_balance($agent_user_id)
    {
        $this->db->where($this->tables['subagents'].'.agent_user_id', $agent_user_id);
        $this->db->group_by($this->tables['users'].'.id');
        return $this->db->select($this->tables['users'].'.id as user_id, first_name, last_name, sum(balance_in) - sum(balance_out) as current_balance')
            ->from($this->tables['users'])
            ->join($this->tables['subagents'], $this->tables['subagents'] . '.subagent_user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['subagents'] . '.subagent_user_id=' . $this->tables['user_transactions'] . '.user_id', 'left')
            ->get();
    }
    
    public function get_user_current_balance($user_id)
    {
        $this->db->where($this->tables['user_transactions'].'.user_id', $user_id);
        return $this->db->select('user_id, sum(balance_in) - sum(balance_out) as current_balance')
            ->from($this->tables['user_transactions'])
            ->get();
    }
    
    public function get_load_balance_history()
    {
        $this->db->where('type_id', TRANSACTION_TYPE_ID_LOAD_BALANCE);
        $this->db->order_by('id','desc');
        return $this->db->select($this->tables['user_transactions'].'.*')
            ->from($this->tables['user_transactions'])
            ->get();
    }
    
    public function get_credit_transfer_list($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where_in('type_id', array(TRANSACTION_TYPE_ID_SEND_CREDIT, TRANSACTION_TYPE_ID_RECEIVE_CREDIT));
        $this->db->order_by('id','desc');
        return $this->db->select($this->tables['user_transactions'].'.*')
            ->from($this->tables['user_transactions'])
            ->get();
    }
    
    public function get_user_transaction_list($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('type_id', TRANSACTION_TYPE_ID_USE_SERVICE);
        $this->db->order_by('id','desc');
        return $this->db->select($this->tables['user_transactions'].'.*,'.$this->tables['user_transaction_statuses'].'.title as status')
            ->from($this->tables['user_transactions'])
            ->join($this->tables['user_transaction_statuses'], $this->tables['user_transaction_statuses'] . '.id=' . $this->tables['user_transactions'] . '.status_id')
            ->get();
    }
    
    public function get_all_transactions()
    {
        return $this->db->select($this->tables['user_transactions'].'.*')
            ->from($this->tables['user_transactions'])
            ->get();
    }
    
    public function get_agents_total_transactions()
    {
        $this->db->where('group_id', GROUP_ID_AGENT);
        $this->db->where('type_id', TRANSACTION_TYPE_ID_USE_SERVICE);
        return $this->db->select('sum(balance_out) as total_transactions')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'], $this->tables['users_groups'] . '.user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['user_transactions'] . '.user_id=' . $this->tables['users_groups'] . '.user_id', 'left')    
            ->get();
    }
    
    public function get_agents_total_transactions_today($start_time, $end_time)
    {
        $this->db->where($this->tables['user_transactions'].'.created_on >= ', $start_time);
        $this->db->where($this->tables['user_transactions'].'.created_on <= ', $end_time);
        $this->db->where('group_id', GROUP_ID_AGENT);
        $this->db->where('type_id', TRANSACTION_TYPE_ID_USE_SERVICE);
        return $this->db->select('sum(balance_out) as total_transactions')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'], $this->tables['users_groups'] . '.user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['user_transactions'] . '.user_id=' . $this->tables['users_groups'] . '.user_id', 'left')    
            ->get();
    }
    
    public function get_subagents_total_transactions()
    {
        $this->db->where('group_id', GROUP_ID_SUBAGENT);
        $this->db->where('type_id', TRANSACTION_TYPE_ID_USE_SERVICE);
        return $this->db->select('sum(balance_out) as total_transactions')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'], $this->tables['users_groups'] . '.user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['user_transactions'] . '.user_id=' . $this->tables['users_groups'] . '.user_id', 'left')    
            ->get();
    }
    
    public function get_subagents_total_transactions_today($start_time, $end_time)
    {
        $this->db->where($this->tables['user_transactions'].'.created_on >= ', $start_time);
        $this->db->where($this->tables['user_transactions'].'.created_on <= ', $end_time);
        $this->db->where('group_id', GROUP_ID_SUBAGENT);
        $this->db->where('type_id', TRANSACTION_TYPE_ID_USE_SERVICE);
        return $this->db->select('sum(balance_out) as total_transactions')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'], $this->tables['users_groups'] . '.user_id=' . $this->tables['users'] . '.id')
            ->join($this->tables['user_transactions'], $this->tables['user_transactions'] . '.user_id=' . $this->tables['users_groups'] . '.user_id', 'left')    
            ->get();
    }
    
    public function get_user_profit_list($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id','desc');
        return $this->db->select($this->tables['users_profits'].'.*')
            ->from($this->tables['users_profits'])
            ->get();
    }
}

