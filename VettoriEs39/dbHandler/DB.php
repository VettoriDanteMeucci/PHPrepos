<?php 
    class DB {
        private function createConn(){
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "museo";
            return mysqli_connect($host, $user, $pass, $db);
        }

        public function fetchArtists(){
            $conn = $this->createConn();
            $query = "SELECT * FROM artista";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function fetchAllOpereWithArtist(){
            $conn = $this->createConn();
            $query = "SELECT * FROM opera
            JOIN artista AS a ON a.id_artista = opera.id_artista";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function fetchOpereArtist($id){
            $conn = $this->createConn();
            $query = "SELECT * FROM opera WHERE id_artista = '$id'";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteOperaByID($id){
            $conn = $this->createConn();
            $query = "DELETE FROM opera WHERE id_opera = '$id'";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        }

        public function fetchOpereBetween($yearStart, $yearEnd){
            if($yearEnd < $yearStart){return null;}
            $pitture = $this->fetchOperePittura($yearStart, $yearEnd);
            $sculture = $this->fetchOpereScultura($yearStart, $yearEnd);
            if($pitture == null || $sculture == null){return null;}
            $ans = ["sculture" => $sculture, "pitture" => $pitture];
            $ans["countSculture"] = count($sculture);
            $ans["countPitture"] = count($pitture);
            return $ans;
        }

        private function fetchOpereScultura($yearStart, $yearEnd){
            if($yearEnd < $yearStart){return null;}
            $conn = $this->createConn();
            $query = "
            SELECT * FROM opera 
            JOIN artista ON artista.id_artista = opera.id_artista 
            WHERE anno_nascita_artista BETWEEN $yearStart AND $yearEnd 
            AND tipo_opera = 'scultura'";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        private function fetchOperePittura($yearStart, $yearEnd){
            if($yearEnd < $yearStart){return null;}
            $conn = $this->createConn();
            $query = "
            SELECT * FROM opera 
            JOIN artista ON artista.id_artista = opera.id_artista 
            WHERE anno_nascita_artista BETWEEN $yearStart AND $yearEnd 
            AND tipo_opera = 'pittura'";
            $res = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $res->fetch_all(MYSQLI_ASSOC);
        }
    }
?>