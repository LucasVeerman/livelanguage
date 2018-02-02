<?php
class Word extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM words WHERE id = '.$id);

        $wordInfo = $result->fetch_assoc();

        return $wordInfo;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM words');

        $wordList = array();
        while ($data = $result->fetch_assoc())
        {
            $wordList[] = $data;
        }

        return $wordList;
    }
}
?>