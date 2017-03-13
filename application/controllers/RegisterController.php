<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class RegisterController extends CI_Controller
    {
        public function index($msg = "")
        {
            if($msg != "")
                $this->load->view("register", array("msg" => $msg));
            else $this->load->view("register");
        }

        public function register()
        {
            $this->load->helper("email");

            if($this->input->post("name") != ""
            && $this->input->post("email") != ""
            && $this->input->post("password") != "")
            {
                if(valid_email($this->input->post("email")))
                {
                    if(strlen($this->input->post("password")) >= 6)
                    {
                        $this->load->model("user");
                        $result = $this->user->register();
                        if($result["status"])
                            redirect(base_url()."login");
                        else $this->index($result["msg"]);
                    }
                }else $this->index("Lütfen geçerli bir e-mail adresi girin.");
            }else $this->index("Lütfen boş alan bırakmayınız.");
        }
    }