<?php
class User extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM users WHERE id = '.$id);

        $userInfo = $result->fetch_assoc();

        return $userInfo;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM users');

        $userList = array();
        while ($data = $result->fetch_assoc())
        {
            $userList[] = $data;
        }

        return $userList;
    }
}

