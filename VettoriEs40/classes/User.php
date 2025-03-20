<?php 
    class User implements JsonSerializable {
        private $id;
        private $name;
        private $surname;
        private $username;
        private $type;
        private $password;

        public function __construct($id = null, $name, $surname, $username, $type, $password){
            if($id != null){
            $this->id = $id;
            }
            $this->name = $name;
            $this->surname = $surname;
            $this->username = $username;
            $this->type = $type;
            $this->password = $password;
        }

        function getID(){
            return $this->id;
        }

        function getName(){
            return $this->name;
        }
        function getSurname(){
            return $this->surname;
        }

        function getUsername(){
            return $this->username;
        }

        function getType(){
            return $this->type;
        }

        function getPassword(){
            return $this->password;
        }
        function checkPassword($password){
            return $password == $this->password;
        }

        public function jsonSerialize(){
            return [
                "id"=> $this->id,
                "name"=> $this->name,
                "surname"=> $this->surname,
                "type"=> $this->type,
                "password"=> $this->password,
            ];
        }
    }
?>