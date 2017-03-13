<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class LogoutController extends CI_Controller
    {
        public function index()
        {
            $this->db->where("authkey", $this->session->userdata("authkey"));
            $update = $this->db->update("user", array("authkey" => "0"));
            if($update)
            {
                $this->session->unset_userdata("authkey");
                $this->session->sess_destroy();
                redirect(base_url()."login");
            }
        }
    }