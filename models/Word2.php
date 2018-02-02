<?php
class Word2 extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM words2 WHERE id = '.$id);

        $wordInfo2 = $result->fetch_assoc();

        return $wordInfo2;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM words2 WHERE user_id = '.$_SESSION['id']);

        $wordList2 = array();
        while ($data = $result->fetch_assoc())
        {
            $wordList2[] = $data;
        }

        return $wordList2;
    }
}
?>