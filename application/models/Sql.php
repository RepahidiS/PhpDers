<?php
    class Sql extends CI_Model
    {
        //SELECT
        public function getAllUsers()
        {
            $this->db->limit(5);
            $this->db->order_by("id", "desc");
            return $this->db->get("user")->result();
        }

        public function getOneUser($userId)
        {
            $this->db->where("id", $userId);
            return $this->db->get("user")->result();
        }

        public function getThreeUser($b, $i, $u)
        {
            $this->db->where("id", $b);
            $this->db->or_where("id", $i);
            $this->db->or_where("id !=", $u);
            return $this->db->get("user")->result();
        }

        public function getLikeUser($mail)
        {
            $this->db->like("email", $mail);
            $this->db->not_like("name", "ğ");
            $this->db->or_not_like("name", "ü");
            return $this->db->get("user")->result();
        }

        //INSERT
        public function insertUser()
        {
            $data = array
            (
                "name" => "Serhat",
                "email" => "repahidis@hotmail.com",
                "password" => "asdasd"
            );
            $result = $this->db->insert("user", $data);
            if($result)
                return "Kayıt başarılı.";
            else return "Hata";
        }

        //UPDATE
        public function updateUser()
        {
            $data = array
            (
                "name" => "Ahmet"
            );
            $this->db->where("name", "Serhat");
            $this->db->or_where("name", "Serhat İŞBİLİR");
            $result = $this->db->update("user", $data);
            if($result)
                return "Güncelleme başarılı.";
            else return "Hata";
        }

        //DELETE
        public function deleteUser()
        {
            $this->db->where("name", "Ahmet");
            $this->db->where("password", "asdasd");
            $result = $this->db->delete("user");
            if($result)
                return "Silme işlemi başarılı.";
            else return "Hata";
        }

        //TRUNCATE & EMPTY_TABLE
        public function truncateUser()
        {
            $result = $this->db->empty_table("user");
            if($result)
                return "Silme işlemi başarılı.";
            else return "Hata";
        }
    }