<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM member JOIN sport ON member.sport_id=sport.sport_id JOIN team ON member.team_id=team.team_id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM member JOIN sport ON member.sport_id=sport.sport_id JOIN team ON member.team_id=team.team_id WHERE member.member_id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join = $data['join_date'];
        $sport = $data['sport'];
        $team = $data['team'];
        $query = "INSERT INTO member VALUES('', '$name', '$email', '$phone', '$join', '$sport','$team')";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join = $data['join_date'];
        $sport = $data['sport'];
        $team = $data['team'];
        $query = "UPDATE member SET member_name='$name', member_email='$email', member_phone='$phone', member_join_date='$join', sport_id='$sport', team_id='$team' WHERE member_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM member WHERE member_id=$id";
        // Mengeksekusi query
        return $this->executeAffected($query);
    }
}


?>