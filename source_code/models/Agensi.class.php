<?php

class Agensi extends DB
{
    function getAgensi()
    {
        $query = "SELECT * FROM agensi";
        
        return $this->execute($query);
    }

    function getAgensiById($id)
    {
        $query = "SELECT * FROM agensi where id = $id";
        
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['nama'];
        $pendiri = $data['pendiri'];
        $query = " INSERT INTO `agensi`(`nama`, `pendiri`) VALUES ( '$name', '$pendiri')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE from `agensi` where id=$id";

        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data["id"];
        $name = $data['nama'];
        $pendiri = $data['pendiri'];

        $query = "update agensi set nama='$name', pendiri='$pendiri' where id='$id'";

        return $this->execute($query);
    }
}
