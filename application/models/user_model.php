<?php
class User_model extends Ion_auth_model 
{
    public function __construct() {
        parent::__construct();    
    }
    
    public function get_user_info($user_id)
    {
        $this->db->where($this->tables['users'].'.id', $user_id);
        return $this->db->select($this->tables['users'].'.id as user_id,'.$this->tables['users'].'.*')
            ->from($this->tables['users'])
            ->get();
    }
    
    public function get_all_agents()
    {
        $this->db->where($this->tables['groups'].'.id', GROUP_ID_AGENT);
        return $this->db->select($this->tables['users'].'.id as user_id,'.$this->tables['users'].'.*')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
    
    public function get_all_subagents($agent_user_id = 0)
    {
        if($agent_user_id > 0)
        {
            $this->db->where($this->tables['subagents'].'.agent_user_id', $agent_user_id);
        }
        $this->db->where($this->tables['groups'].'.id', 4);
        return $this->db->select($this->tables['users'].'.id as user_id,'.$this->tables['users'].'.*')
            ->from($this->tables['users'])
            ->join($this->tables['subagents'],  $this->tables['subagents'].'.subagent_user_id='.$this->tables['users'].'.id')
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
    
    public function get_total_agents()
    {
        $this->db->where($this->tables['groups'].'.id', GROUP_ID_AGENT);
        return $this->db->select('count('.$this->tables['users'].'.id) as total_agents')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
    
    public function get_total_agents_today($start_time, $end_time)
    {
        $this->db->where($this->tables['users'].'.created_on >= ', $start_time);
        $this->db->where($this->tables['users'].'.created_on <= ', $end_time);
        $this->db->where($this->tables['groups'].'.id', GROUP_ID_AGENT);
        return $this->db->select('count('.$this->tables['users'].'.id) as total_agents')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
    
    public function get_total_subagents()
    {
        $this->db->where($this->tables['groups'].'.id', GROUP_ID_SUBAGENT);
        return $this->db->select('count('.$this->tables['users'].'.id) as total_subagents')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
    
    public function get_total_subagents_today($start_time, $end_time)
    {
        $this->db->where($this->tables['users'].'.created_on >= ', $start_time);
        $this->db->where($this->tables['users'].'.created_on <= ', $end_time);
        $this->db->where($this->tables['groups'].'.id', GROUP_ID_SUBAGENT);
        return $this->db->select('count('.$this->tables['users'].'.id) as total_subagents')
            ->from($this->tables['users'])
            ->join($this->tables['users_groups'],  $this->tables['users_groups'].'.user_id='.$this->tables['users'].'.id')
            ->join($this->tables['groups'],  $this->tables['groups'].'.id='.$this->tables['users_groups'].'.group_id')
            ->get();
    }
}

