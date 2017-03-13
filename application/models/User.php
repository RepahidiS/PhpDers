<?php
    class User extends CI_Model
    {
        public function register()
        {
            $result = array();
            $this->db->where("email", $this->input->post("email"));
            $query = $this->db->get("user")->result();
            if(count($query) == 0)
            {
                $this->load->helper("hash_password");
                $userData = array
                (
                    "name" => $this->input->post("name"),
                    "email" => $this->input->post("email"),
                    "password" => encrypt($this->input->post("password"))
                );
                $insert = $this->db->insert("user", $userData);
                $result["status"] = $insert;
            }else
            {
                $result["status"] = false;
                $result["msg"] = "Bu e-mail'e kayıtlı bir hesap bulunuyor.";
            }
            return $result;
        }

        public function login()
        {
            $result = array();
            $this->load->helper("hash_password");
            $this->db->where("email", $this->input->post("email"));
            $this->db->where("password", encrypt($this->input->post("password")));
            $query = $this->db->get("user")->result();
            if(count($query) == 1)
            {
                $authkey = $this->createAuthkey();
                $this->db->where("email", $this->input->post("email"));
                $this->db->where("password", encrypt($this->input->post("password")));
                $updateUser = $this->db->update("user", array("authkey" => $authkey));
                if($updateUser)
                {
                    $result["status"] = true;
                    $authSession = array("authkey" => $authkey);
                    $this->session->set_userdata($authSession);
                }else
                {
                    $result["status"] = false;
                    $result["msg"] = "Veritabanı hatası";
                }
            }else
            {
                $result["status"] = false;
                $result["msg"] = "Hatalı Giriş";
            }
            return $result;
        }

        public function chechAuth()
        {
            if($this->session->has_userdata("authkey"))
            {
                $this->db->where("authkey", $this->session->userdata("authkey"));
                $query = $this->db->get("user")->result();
                if(count($query) == 1)
                    return true;
                return false;
            }return false;
        }

        private function createAuthkey()
        {
            return sprintf("%04x%04x%04x%s",
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                md5(microtime().rand()));
        }
    }