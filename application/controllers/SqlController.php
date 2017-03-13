<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class SqlController extends CI_Controller
    {
        public function index()
        {
            $this->load->model("sql");

            $users = $this->sql->getAllUsers();
            $this->load->view("sql", array("users" => $users));
        }

        public function getOneUser($userId)
        {
            $this->load->model("sql");

            $oneUser = $this->sql->getOneUser($userId);
            $this->load->view("sql", array("user" => $oneUser));
        }

        public function getThreeUser($b, $i, $u)
        {
            $this->load->model("sql");

            $threeUser = $this->sql->getThreeUser($b, $i, $u);
            $this->load->view("sql", array("users" => $threeUser));
        }

        public function getLikeUser($mail)
        {
            $this->load->model("sql");

            $user = $this->sql->getLikeUser($mail);
            $this->load->view("sql", array("users" => $user));
        }

        public function insertUser()
        {
            $this->load->model("sql");

            $result = $this->sql->insertUser();
            $this->load->view("sql", array("result" => $result));
        }

        public function updateUser()
        {
            $this->load->model("sql");

            $result = $this->sql->updateUser();
            $this->load->view("sql", array("result" => $result));
        }

        public function deleteUser()
        {
            $this->load->model("sql");

            $result = $this->sql->deleteUser();
            $this->load->view("sql", array("result" => $result));
        }

        public function truncateUser()
        {
            $this->load->model("sql");

            $result = $this->sql->truncateUser();
            $this->load->view("sql", array("result" => $result));
        }
    }