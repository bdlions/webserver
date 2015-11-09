<?php
class Transaction_model extends Ion_auth_model 
{
    public function __construct() {
        parent::__construct();    
    }
    
    public function add_transaction($transaction_data)
    {
        $transaction_data['created_on'] = now();
        $additional_data = $this->_filter_data($this->tables['user_transactions'], $transaction_data);
        $this->db->insert($this->tables['user_transactions'], $additional_data);
        $insert_id = $this->db->insert_id();
        return (isset($insert_id)) ? $insert_id : FALSE;
    }
    
    public function get_all_transactions()
    {
        return $this->db->select($this->tables['user_transactions'].'.*')
            ->from($this->tables['user_transactions'])
            ->get();
    }
}

