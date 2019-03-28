<?php

class home extends CI_Model{
    public function get(){
        return  $this->db->order_by("id","desc")->get('bilgiler',12)->result();
    }
    public function find($skey){
        return $this->db->like("name",$skey)->or_like("content",$skey)->get('bilgiler')->result();
    }

}