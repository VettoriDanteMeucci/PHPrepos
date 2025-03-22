<?php 
class DB {
    private $db;
    public function __construct(){
        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "nome_utenti";
        $this->db = new mysqli($host, $username, $pass, $dbname);
    }

    public function getTypes(){
        $query = "SELECT * FROM tipo";
        $res = $this->db->query($query);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUser(User $user){
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $type = $user->getType();
        $pass = $user->getPassword();
        $query = "INSERT INTO utente 
        (nome,cognome,username,password,id_tipo) 
        VALUES ('$name', '$surname', '$username', '$pass', $type)";
        $this->db->query($query);
    }

    function getTypeByID($id){
        $query ="SELECT * FROM tipo WHERE id = $id";
        $res = $this->db->query($query);
        return $res->fetch_assoc();
    }

    function getUsers(){
        $query = "SELECT * FROM utente";
        $res = $this->db->query($query);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function getUser($id){
        $query = "SELECT * FROM utente 
        WHERE id = '$id'";
        $res = $this->db->query($query);
        var_dump($res);
        return $res->fetch_assoc();
    }

    function login($username, $pass){
        $query = "SELECT * FROM utente 
        WHERE username = '$username' 
        AND password = '$pass'";
        $res = $this->db->query($query);
        $res = $res->fetch_assoc();
        return $res;
    }

    function modifyUser(User $user){
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $type = $user->getType();
        $pass = $user->getPassword();
        $id = $user->getId();
        if($id == null) return false;
        $query ="UPDATE utente 
        SET nome = '$name', cognome = '$surname', username = '$username',
        password = '$pass', id_tipo = '$type'  
        WHERE id = '$id'";
        $res = $this->db->query($query);
        if($res == true){
            $res = $this->getUserByID($id);
        }
        return $res;
    }

    function getUserByID($id){
        $query = "SELECT * FROM utente 
        WHERE id = '$id'";
        $res = $this->db->query($query);
        return $res->fetch_assoc();
    }

    function deleteUser($id){
        $query = "DELETE FROM utente 
        WHERE id = '$id'";
        $res = $this->db->query($query);
        return $res;
    }
}

?>