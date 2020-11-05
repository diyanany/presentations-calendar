<?php
    require_once "db.php";
    require_once '../config/config.php';

    $db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

    class Student{
        private $full_name;
        private $identity;
        private $course;
        private $speciality;
        private $email;
        private $password;
        private $confirm_password;
        private $db;

        public function __constructor($full_name, $identity, $course, $speciality, $email, $password, $confirm_password){
            $this->full_name = $full_name;
            $this->identity = $identity;
            $this->course = $course;
            $this->speciality = $speciality;
            $this->email = $email;
            $this->password = $password;
            $this->confirm_password = $confirm_password;
            $this->db = new Database();
        }

        public function is_valid() {
            $query = $this->db->get_student_by_identity_and_password(array("student_identity" => $this->identity));
            if($query["success"]) { 
                $student = $query["data"]->fetch(PDO::FETCH_ASSOC);
                if($student) {
                    if(password_verify($this->password, $student["password"])) {
                        $this->password = $student["password"];
                        $this->identity = $student["identity"];

                        return array("success" => true);
                    } else {
                        return array("success" => false, "error" => "Wrong password.");
                    }
                } else {
                    return array("success" => false, "error" => "Wrong identity.");
                }
            } else {
                return array("success" => false, "error" => $query["error"]);
            }
        }
       
        public function get_student_identity() {
            return $this->identity;
        }

        public function get_student_password() {
            return $this->password;
        }
    }
?>