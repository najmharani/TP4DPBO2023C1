<?php

class Sport extends DB
{
    function getSport()
    {
        $query = "SELECT * FROM sport";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getSportById($id)
    {
        $query = "SELECT * FROM sport WHERE sport_id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['fname'];
        $query = "INSERT INTO sport VALUES('', '$name')";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($id, $data)
    {
        $name = $data['fname'];
        $query = "UPDATE sport SET sport_name='$name' WHERE sport_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM sport WHERE sport_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }
}


?>