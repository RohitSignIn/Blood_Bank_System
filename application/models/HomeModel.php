<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function registerHospital($data){
        $this->db->insert('registered_hospitals_bbs',$data);
        $id = $this->db->insert_id();

        
        if($id){
            $data = array("id"=>$id);
            $this->db->insert('available_blood_group_bbs',$data);
            return True;
        }
        return False;
    }

    public function registerReceiver($data){
        $q = $this->db->insert('registered_receivers_bbs',$data);
        if($q){
            return True;
        }
        return False;
    }
    
    public function submitbloodInfo($data){
        $q = $this->db->replace('available_blood_group_bbs', $data);
        if($q){
            return True;
        }
        return False;
    }
    
    public function loginHospital($data){
        $this->db->select("*");
        $this->db->from("registered_hospitals_bbs");
        $this->db->where("email", $data["email"]);
        $this->db->where("password", $data["password"]);
        $query = $this->db->get();
        foreach ($row = $query->result() as $val) {
            $id = $val->id;
            $name = $val->name;
            $type = "hospital";
        }
        
        if($row){
            $this->session->set_userdata('hospital_login', True);
            $this->session->set_userdata('id', $id);
            $this->session->set_userdata('name', $name);
            $this->session->set_userdata('type', $type);
            return True;
        }
        
        return False;
    }

    public function loginReceiver($data){
        $this->db->select("*");
        $this->db->from("registered_receivers_bbs");
        $this->db->where("email", $data["email"]);
        $this->db->where("password", $data["password"]);
        $query = $this->db->get();
        foreach ($row = $query->result() as $val) {
            $id = $val->id;
            $name = $val->name;
            $type = "receiver";
        }
        
        if($row){
            $this->session->set_userdata('receiver_login', True);
            $this->session->set_userdata('id', $id);
            $this->session->set_userdata('name', $name);
            $this->session->set_userdata('type', $type);
            return True;
        }
        
        return False;
    }

    public function fetch_blood_info_hospital($id){
        $this->db->select("*");
        $this->db->from("available_blood_group_bbs");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function blood_avlbl_receiver($blood_group, $state, $city){
        $blood_group = "available_blood_group_bbs.{$blood_group} !=";
        $this->db->select('*');
        $this->db->from('available_blood_group_bbs');
        $this->db->join('registered_hospitals_bbs', 'registered_hospitals_bbs.id = available_blood_group_bbs.id');
        $this->db->where('registered_hospitals_bbs.state', $state);
        $this->db->where('registered_hospitals_bbs.city', $city);
        $this->db->where($blood_group, 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function req_sample($hospital_id, $user_id, $blood_group){
        $data = array("hospital_id"=>$hospital_id, "user_id"=>$user_id, "blood_group"=>$blood_group);
        $this->db->where('hospital_id',$hospital_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('blood_group',$blood_group);
        $q = $this->db->get('request_sample_bbs');
     
        if ( $q->num_rows() > 0 ) 
        {
            return "Request Already Submitted";
        } else {
            $q = $this->db->insert('request_sample_bbs',$data);
            if($q){
                return "Request submitted";
            }
        }
    }

    public function view_requests($id){
        $this->db->select('*');
        $this->db->from('request_sample_bbs');
        $this->db->join('registered_hospitals_bbs', 'registered_hospitals_bbs.id = request_sample_bbs.hospital_id');
        $this->db->join('registered_receivers_bbs', 'registered_receivers_bbs.id = request_sample_bbs.user_id');
        $this->db->where('registered_hospitals_bbs.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function states(){
        $this->db->select("*");
        $this->db->from("states");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cities($state_id){
        $this->db->select("*");
        $this->db->from("cities");
        $this->db->where($state_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}