<?php 
    class DB {
        private function createConn(){
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "museo";
            return mysqli_connect($host, $user, $pass, $db);
        }

        private function fetchArtist($name, $surname){
            $conn = $this->createConn();
            $query = "SELECT * FROM artista 
            WHERE nome_artista = '$name'
            AND cognome_artista = '$surname'";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            if($res == null){
                var_dump($res);
                return false;
            }
            return $res->fetch_assoc();
        }
        public function fetchArtistWorks($name, $surname){
            $conn = $this->createConn();
            $art = $this->fetchArtist($name, $surname);
            if(!$art) return false;
            $query = "SELECT * FROM opera
            WHERE id_artista = '$art[id_artista]'";
            $res = mysqli_query($conn, $query);
            $ans = [];
            while($row = $res->fetch_assoc()){
                $ans[] = $row;
            }
            return $ans;
        }

        public function fetchArtists(){
            $conn = $this->createConn();
            $query = "SELECT * FROM artista";
            $res = mysqli_query($conn, $query);
            $ans = [];
            while($row = $res->fetch_assoc()){
                $ans[] = $row;
            }
            return $ans;
        }

        public function insertOpera($name, $type, $artistID){
            $conn = $this->createConn();
            $query = "INSERT INTO museo.opera (opera.nome_opera,opera.tipo_opera,opera.id_artista)
            VALUES ('$name', '$type', '$artistID');";
            mysqli_query($conn, $query);
        }

        public function getNumOpereByArtistID($isPittura, $artistID){
            $conn = $this->createConn();
            $query = "SELECT COUNT(*) AS tot FROM opera
            WHERE opera.id_artista = $artistID ";
            if($isPittura){
                $query = $query . 
                "AND tipo_opera = 'pittura' ";
            }else{
                $query = $query . 
                "AND tipo_opera = 'scultura' ";
            }
            $res = mysqli_query($conn, $query);
            return $res->fetch_assoc();
        }

    }
?>