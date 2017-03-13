<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class LoginController extends CI_Controller
    {
        public function index($msg = "")
        {
            if($msg != "")
                $this->load->view("login", array("msg" => $msg));
            else $this->load->view("login");
        }

        public function login()
        {
            if($this->input->post("email") != "" && $this->input->post("password") != "")
            {
                $this->load->model("user");
                $result = $this->user->login();
                if($result["status"])
                    redirect(base_url()."membersArea");
                else $this->index($result["msg"]);
            }else $this->index("Lütfen boş alan bırakmayınız.");
        }
    }