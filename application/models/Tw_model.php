<?php

class Tw_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('string');
    }

    function save_new_account($data)
    {
        $this->db->insert('twitter_accounts', $data);

        return $this->db->insert_id();
    }

    function update_account($id,$data)
    {
        $this->db->where('acct_id',$id);
        $this->db->update('twitter_accounts', $data);
        return true;
    }
    
    function list_accts()
    {
        $this->db->order_by("acct_id","desc");
        $query = $this->db->get('twitter_accounts');

        if ($query->num_rows() > 0) {
            $result = $query->result_array(); 
            return $result;
        }
        return false;        
        
    }
    
    function count_accts(){
        $query = $this->db->get('twitter_accounts');
        return $query->num_rows();         
    }
    
    function get_accts($start,$stop)
    {
        $this->db->order_by("acct_id","desc");
        $query = $this->db->get('twitter_accounts',$start,$stop);

        if ($query->num_rows() > 0) {
            $result = $query->result_array(); 
            return $result;
        }
        return false;        
        
    }

    function get_acct($id)
    {
        $query = $this->db->get_where('twitter_accounts', array('acct_id' => $id), 1, 0);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
        
    function get_current_stat($id)
    {
        $this->db->select_max('stat_id');
        $this->db->where('acct_id',$id);
        $query = $this->db->get('twitter_stats');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $sid = $row->stat_id;
        } else { return false; }
        
        $this->db->where('stat_id',$sid);
        $query = $this->db->get('twitter_stats');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }        
    }
    
    function get_month_stats($id)
    {
        $month = date('Y-m-d', strtotime('-30 days'));
        $this->db->where('acct_id',$id);
        $this->db->where('date >=',$month);
        $query = $this->db->get('twitter_stats');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }        
        return false;
    }
    
     function get_schedule($id)
    {
        $this->db->where('acct_id',$id);
        $this->db->where('active','1');
        $query = $this->db->get('twitter_scheduler');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }        
        return false;
    } 
    
    function get_opers($id)
    {
        $this->db->where('acct_id',$id);
       // $this->db->where('active','1');
        $query = $this->db->get('twitter_operations');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }        
        return false;
    }  
    
    function update_opers($id,$data)
    {
        $this->db->where('acct_id',$id);
        $query = $this->db->update('twitter_operations',$data);
        return;    
    }   
    
    function save_stat($alias, $realurl, $clientip, $hostname, $referer)
    {
     return;   
    }
    
    function count_bycat($cat) {
        $this->db->where(array('category' => $cat));
        $query = $this->db->get('twitter_accounts');
        return $query->num_rows();  
    }
    
    



/**

* Method to see if a generated Alias already exists in the table

* @param type $alias String to check to see if it exists

* @return Bool True or False

*/

    function does_alias_exist($alias)
    {
        $this->db->select('id');
        $query = $this->db->get_where('twitter_accounts', array('alias' => $alias), 1, 0);
        if ($query->num_rows() > 0) { return true; }
    
        return false;
    }




}

?>