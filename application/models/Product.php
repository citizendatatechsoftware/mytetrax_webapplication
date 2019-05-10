<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->proTable   = 'products';
        $this->transTable = 'payments';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($clientid){
        $this->db->limit(1);
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('clientid', $clientid);
        if($id){
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = $query->row_array();
        }else{
             $this->db->order_by("id","desc");
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        
        // return fetched data
        return !empty($result)?$result:false;
    }
            function getclient($clientid){
        $this->db->select('*');
        $this->db->from('addclient');
        $this->db->where('clientid', $clientid);
       
        $query = $this->db->get();

        if($query->num_rows()){
            
         return TRUE;
        }else {
         return FALSE;
        }
        }
            
    /*
     * Insert data in the database
     * @param data array
     */
    public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
    }
    public function licence($data){
        $insert = $this->db->insert($this->proTable,$data);
        return $insert?true:false;
    }
    
}