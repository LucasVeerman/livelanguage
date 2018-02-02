<?php
class Category extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM categories WHERE id = '.$id);

        $categoryInfo = $result->fetch_assoc();

        return $categoryInfo;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM categories');

        $categoryList = array();
        while ($data = $result->fetch_assoc())
        {
            $categoryList[] = $data;
        }

        return $categoryList;
    }
}
?>