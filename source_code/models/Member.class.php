<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        
        return $this->execute($query);
    }

    function getMemberJoin()
    {
        $query = "SELECT * FROM members join grup on members.grup_id=grup.id";
        
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members where id = $id";
        
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join = $data['join_date'];
        $grup = $data['grup_id'];
        $query = "INSERT INTO `members`(`name`, `email`, `phone`, `join_date`, `grup_id`) VALUES ( '$name', '$email', '$phone', '$join', '$grup')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE from `members` where id=$id";

        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data["id"];
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $join = $data["join_date"];
        $grup = $data['grup_id'];

        $query = "update members set name='$name', email='$email', phone='$phone', join_date='$join', grup_id='$grup' where id='$id'";

        return $this->execute($query);
    }
}
