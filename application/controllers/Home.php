<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModel');
	}

// HANDLING COMMON PART START
    public function index(){
        $data['receiver'] = $this->session->userdata('name');
        $data['states'] = $this->HomeModel->states();

        $this->load->view('Layout/Upper');
        $this->load->view('Layout/mainNav', $data);
        $this->load->view('home');
        include("AjaxReq/script.php");
        include("AjaxReq/bloodAvailable_Fetch.php");
        include("AjaxReq/receiverReq_bloodSam.php");
        include("AjaxReq/fetchingCity.php");
        $this->load->view('Layout/Bottom');
        
    }

    public function blood_avlbl_receiver(){
       $blood_group = $this->input->post("select_blood_group");
       $state = $this->input->post("select_state");
       $city = $this->input->post("select_city");

       $data = $this->HomeModel->blood_avlbl_receiver($blood_group, $state, $city);
       echo json_encode($data);
    }

    public function cities(){
        $state_id = $this->input->post("state");
        $state_id = array("state_id"=>$state_id);
        echo json_encode($this->HomeModel->cities($state_id));
    }

    public function logout(){
        if ($this->session->userdata('hospital_login')){
            $this->session->unset_userdata('hospital_login');
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('type');
        }
        if ($this->session->userdata('receiver_login')) {
            $this->session->unset_userdata('receiver_login');
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('type');
        }
        redirect(base_url(), "refresh");
    }
// HANDLING COMMON PART END

// -------------------------------------------------------------------------------------------------------

// HOSPITAL CODE START

    // HANDLING VIEW PART START
    public function hospital(){
        if (!$this->session->userdata('hospital_login')){
            redirect(base_url()."login_hospital", "refresh");
        }

        $data['login'] = $this->session->userdata('type');     
        $data['states'] = $this->HomeModel->states();
        $data['name'] = $this->session->userdata('name');     

        $this->load->view('Layout/Upper');
        $this->load->view('Layout/hospitalNav', $data);
        $this->load->view("home");
        include("AjaxReq/script.php");
        include("AjaxReq/bloodAvailable_Fetch.php");
        include("AjaxReq/fetchingCity.php");
        $this->load->view('Layout/Bottom');
    }

    public function add_blood_info(){
        if (!$this->session->userdata('hospital_login')){
            redirect(base_url()."login_hospital", "refresh");
        }
        $data["blood_avlbl"] = $this->HomeModel->fetch_blood_info_hospital($this->session->userdata('id'));
        $data['name'] = $this->session->userdata('name');     

        $this->load->view('Layout/Upper');
        $this->load->view('Layout/hospitalNav', $data);
        $this->load->view("hospital/AddBloodInfo");
        include("AjaxReq/script.php");
        include("AjaxReq/blood_InfoHospital.php");
        $this->load->view('Layout/Bottom');
    }

    public function view_requests(){
        if (!$this->session->userdata('hospital_login')){
            redirect(base_url()."login_hospital", "refresh");
        }
        $id = $this->session->userdata("id");
        $data["data"] = $this->HomeModel->view_requests($id);
        $data['name'] = $this->session->userdata('name');     


        $this->load->view('Layout/Upper');
        $this->load->view('Layout/hospitalNav', $data);
        $this->load->view("hospital/viewRequests");
        $this->load->view('Layout/Bottom');
    }

    public function login_hospital(){
        if ($this->session->userdata('hospital_login')){
            redirect(base_url()."hospital", "refresh");
        }
        $this->load->view('Layout/Upper');
        $this->load->view('Layout/mainNav');
        $this->load->view("login_hospital");
        include("AjaxReq/script.php");
        include("AjaxReq/loginHospital.php");
        $this->load->view('Layout/Bottom');
    }

    public function register_hospital(){
        $data['states'] = $this->HomeModel->states();

        $this->load->view('Layout/Upper');
        $this->load->view('Layout/mainNav');
        $this->load->view("register_hospital", $data);
        include("AjaxReq/script.php");
        include("AjaxReq/regHospital.php");
        include("AjaxReq/fetchingCity.php");
        $this->load->view('Layout/Bottom');
    }
    // HANDLING VIEW PART END

    // HANDLING REQUESTS START
    public function submitbloodInfo(){
        if (!$this->session->userdata('hospital_login')){
            redirect(base_url()."login_hospital", "refresh");
        }
        $hospital_id = $this->session->userdata('id');
        $o_pve = $this->input->post("o_positive");
        $o_nve = $this->input->post("o_negative");
        $a_pve = $this->input->post("a_positive");
        $a_nve = $this->input->post("a_negative");
        $b_pve = $this->input->post("b_positive");
        $b_nve = $this->input->post("b_negative");
        $ab_pve = $this->input->post("ab_positive");
        $ab_nve = $this->input->post("ab_negative");

        $data = array("id"=>$hospital_id, "o_pve"=>$o_pve, "o_nve"=>$o_nve, "a_pve"=>$a_pve, "a_nve"=>$a_nve, "b_pve"=>$b_pve, "b_nve"=>$b_nve, "ab_pve"=>$ab_pve, "ab_nve"=>$ab_nve);
        echo $this->HomeModel->submitbloodInfo($data);
    }

    public function registerHospital(){
        $hospital_name = $this->input->post("hospital_name");
        $email = $this->input->post("email");
        $state = $this->input->post("select_state");
        $city = $this->input->post("select_city");
        $local_address = $this->input->post("local_address");
        $password = $this->input->post("password");
        
        if($this->HomeModel->role_exists("registered_hospitals_bbs", array("email" => $email))){
            return False;
        }
        
        $data = array("name"=>$hospital_name, "email"=>$email, "password"=>$password, "state"=>$state, "city"=>$city, "local_address"=>$local_address);
        echo $this->HomeModel->registerHospital($data);
    }

    public function loginHospital(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $data = array("email"=>$email, "password"=>$password);
        echo $this->HomeModel->loginHospital($data);
    }
    // HANDLING REQUESTS END
// HOSPITAL CODE END

// -------------------------------------------------------------------------------------------------------

// RECEIVER CODE START
    // HANDLING VIEW PART START
    public function login_receiver(){
        if ($this->session->userdata('receiver_login')){
            redirect(base_url(), "refresh");
        }
        $this->load->view('Layout/Upper');
        $this->load->view('Layout/mainNav');
        $this->load->view("login_receiver");
        include("AjaxReq/script.php");
        include("AjaxReq/loginReceiver.php");
        $this->load->view('Layout/Bottom');
    }

    public function register_receiver(){
        $this->load->view('Layout/Upper');
        $this->load->view('Layout/mainNav');
        $this->load->view("register_receiver");
        include("AjaxReq/script.php");
        include("AjaxReq/regReceiver.php");
        $this->load->view('Layout/Bottom');
    }
    // HANDLING VIEW PART END

    // HANDLING REQUESTS START
    public function req_sample(){
        if (!$this->session->userdata('receiver_login')) {
            echo False;
        }else{
            $hospital_id = $this->input->post("hospital_id");
            $blood_group = $this->input->post("req_sample");

            echo $this->HomeModel->req_sample($hospital_id, $this->session->userdata('id'), $blood_group);
        }
    }

    public function loginReceiver(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $data = array("email"=>$email, "password"=>$password);
        echo $this->HomeModel->loginReceiver($data);
    }

    public function registerReceiver(){
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $contact = $this->input->post("contact");
        $password = $this->input->post("password");

        if($this->HomeModel->role_exists("registered_receivers_bbs", array("email" => $email))){
            return False;
        }
        
        $data = array("name"=>$username, "email"=>$email, "contact"=>$contact, "password"=>$password);
        echo $this->HomeModel->registerReceiver($data);
    }
    // HANDLING REQUESTS END
// RECEIVER CODE END

}