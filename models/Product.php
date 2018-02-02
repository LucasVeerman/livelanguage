<?php
class Product extends Model{

    // maak deze functie af
    public function getOne($id) {

        $result = $this->db->query('SELECT * FROM tblproduct WHERE id = '.$id);

        $productInfo = $result->fetch_assoc();

        return $productInfo;
    }

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM tblproduct');

        $productList = array();
        while ($data = $result->fetch_assoc())
        {
            $productList[] = $data;
        }

        return $productList;
    }
}
?>