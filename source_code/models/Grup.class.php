<?php

class Grup extends DB
{
    function getGrup()
    {
        $query = "SELECT * FROM grup";
        
        return $this->execute($query);
    }

    function getGrupJoin() {
        $query = "SELECT * FROM grup JOIN agensi ON grup.agensi_id=agensi.id";

        return $this->execute($query);
    }

    function getGrupById($id)
    {
        $query = "SELECT * FROM grup where id = $id";
        
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $tahundebut = $data['tahun_debut'];
        $agensi = $data['agensi_id'];
        $query = " INSERT INTO `grup`(`nama`, `tahun_debut`, `agensi_id`) VALUES ( '$nama', '$tahundebut', '$agensi')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE from `grup` where id=$id";

        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data["id"];
        $nama = $data["nama"];
        $tahundebut = $data["tahun_debut"];
        $agensi = $data["agensi_id"];

        $query = "update grup set nama='$nama', tahun_debut='$tahundebut', agensi_id='$agensi' where id='$id'";

        return $this->execute($query);
    }
}
