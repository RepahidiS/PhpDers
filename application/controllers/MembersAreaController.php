<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class MembersAreaController extends CI_Controller
    {
        public function index()
        {
            $this->load->model("user");

            if($this->user->chechAuth())
                $this->load->view("membersArea");
            else redirect(base_url()."login");
        }
    }