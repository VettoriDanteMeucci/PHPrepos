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
}

?>