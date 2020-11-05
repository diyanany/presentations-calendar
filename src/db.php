<?php
    class DataBase{
        private $connection;
        private $host;
        private $db_name;
        private $user;
        private $password;

        public function __construct($host, $db_name, $user="", $password=""){
            $this->init($host, $db_name, $user, $password);
        }

        public function init($host, $db_name, $user="", $password=""){
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo "Connection was successful!";
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function consoleLog($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }  
        
        public function get_all_students(){
            $result = array();
            try {
                $sql = "SELECT * FROM Student;";
                $query = $this->connection->query($sql) or die("Method get_all_students() failed!");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }

                $this->consoleLog($result);
                return $result;
            } catch(PDOException $e) {
                    echo "get_all_students failed: " . $e->getMessage();
            }
        }

        public function get_all_presentations(){
            $result = array();
            try {
                $sql = "SELECT * FROM Presentation;";
                $query = $this->connection->query($sql) or die("Method get_all_presentations() failed!");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                } 
                
                $this->consoleLog($result);
                return $result;   
            } catch(PDOException $e) {
                echo "get_all_presentations failed: " . $e->getMessage();
            }
            
        }

        public function get_all_presentations_by_subject($subject){
            try {
                $query = $this->connection->prepare("SELECT * FROM Presentation WHERE Subject LIKE ?;");
                $query->execute(["%$subject%"]);
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $this->consoleLog($row);
                }
            } catch(PDOException $e) {
                echo "get_all_presentations_by_subject failed: " . $e->getMessage();
            }
        }

        public function get_student_by_identity($identity){
            try{
                $query = $this->connection->prepare("SELECT * FROM Student WHERE Identity LIKE ?;");
                $query->execute(["$identity"]);
                return $query->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                echo "get_student_by_identity failed: " . $e.getMessage();
            }
        }

        public function get_student_by_identity_and_password($data){
            try{
                $query = $this->connection->prepare("SELECT * FROM Student WHERE Identity LIKE ? AND Password LIKE ?;");
                $query->execute($data);
                return array("success" => true, "data" => $query);
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                return array("success" => false, "error" => $e->getMessage());
            }
        }

        public function add_new_presentation($subject, $date, $time, $studentID){
            try{
                $query = $this->connection->prepare("INSERT INTO Presentation (Subject, Date, Time, StudentID)
                VALUES (?, ?, ?, ?);");
                $query->execute([$subject, $date, $time, $studentID]);
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                return array("success" => false, "error" => $e->getMessage());
            }
        }

        public function delete_presentation_by_studentID($studentID, $time, $date){
            try{
                $query = $this->connection->prepare("DELETE FROM Presentation
                WHERE StudentID = $studentID AND Time = $time AND Date = $date;");
                $query->execute([$studentID, $time, $date]);
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                return array("success" => false, "error" => $e->getMessage());
            }
        }

        public function __destruct() {
            $this->connection = null;
        }
    }
?>