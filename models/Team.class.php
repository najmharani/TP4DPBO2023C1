<?php

class Team extends DB
{
    function getTeam()
    {
        $query = "SELECT * FROM team";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getTeamById($id)
    {
        $query = "SELECT * FROM team WHERE team_id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['fname'];
        $query = "INSERT INTO team VALUES('', '$name')";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($id, $data)
    {
        $name = $data['fname'];
        $query = "UPDATE team SET team_name='$name' WHERE team_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM team WHERE team_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }
}


?>