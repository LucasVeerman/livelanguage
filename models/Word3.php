<?php
class Word3 extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM words2 WHERE id = '.$id);

        $wordInfo3 = $result->fetch_assoc();

        return $wordInfo3;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM words2');

        $wordList3 = array();
        while ($data = $result->fetch_assoc())
        {
            $wordList3[] = $data;
        }

        return $wordList3;
    }
}
?>