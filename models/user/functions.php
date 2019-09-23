<?php
    function getAllUsers(){
        return executeQuery("SELECT k.*, u.id AS ulogaId, uloga from korisnik k INNER JOIN uloga u ON k.idUloga = u.id");
    }
    function userExists($user){
        global $conn;
        $res = $conn->prepare("SELECT * FROM korisnik WHERE korisnickoIme = :korIme");
        $res->bindParam(":korIme", $user);
        $res->execute();
        return $res->rowCount();
    }
    function emailExists($email){
        global $conn;
        $res = $conn->prepare("SELECT * FROM korisnik WHERE email = :email");
        $res->bindParam(":email", $email);
        $res->execute();
        return $res->rowCount();
    }
    function userValid($korIme, $sifra){
        global $conn;
        $res = $conn->prepare("SELECT * FROM korisnik WHERE korisnickoIme = :korIme AND sifra = :sifra");
        $res->bindParam(":korIme", $korIme);
        $res->bindParam(":sifra", $sifra);
        $res->execute();
        $brojRedova = $res->rowCount();
        return $res->fetch();
        
    }
    function specificUser($id){
        global $conn;
        $res = $conn->prepare("SELECT * FROM korisnik WHERE id = :id");
        $res->bindParam(":id", $id);
        $res->execute();
        return $res->fetch();
    }
    function specificUserName($user){
        global $conn;
        $res = $conn->prepare("SELECT * FROM korisnik WHERE korisnickoIme = :user");
        $res->bindParam(":user", $user);
        $res->execute();
        return $res->fetch();
    }