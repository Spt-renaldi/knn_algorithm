<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_uji extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_uji )
    {
        return $this->db->insert_batch('data_uji', $data_uji);
    }
    public function read( $data_id = -1 )
    {
        $sql = "
            SELECT a.*, b.* from data_uji a
            left join user_profile b on b.user_id = a.user_id
        ";
        if( $data_id != -1 ){
            $sql .= "
                where a.data_id = '$data_id'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }
    public function record_count(  )
    {
        return $this->db->count_all( 'data_uji' );
    }
    public function read_normalize( $data_id = -1 )
    {
        $sql = "
            SELECT a.* from data_uji a
        ";
        if( $data_id != -1 ){
            $sql .= "
                where a.data_id = '$data_id'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }
    public function update( $data_uji, $data_uji_param )
    {
        return  $this->db->update('data_uji', $data_uji, $data_uji_param);
    }
    public function _update_batch( $data_uji )
    {
        return $this->db->update_batch('data_uji' , $data_uji, 'data_id');
    }
    public function delete(  $data_uji_param )
    {
        return $this->db->delete( "data_uji" , $data_uji_param);
    }
    public function count(  )
    {
        return $this->db->count_all("data_uji");
    }
}