<?php
// hernoem dit bestand en de class name naar bijvoorbeeld Post, Topic, Comment etc
class MyModel extends Model {

	// maak deze functie af
	public function getOne($id) {

		$result = $this->db->query('SELECT * FROM tablenamehere WHERE id = '.$id);

        $info = $result->fetch_assoc();

		return $info;
	}

    // schrijf deze functie
    public function getAll() {

        $result = $this->db->query('SELECT * FROM tablenamehere');

        $list = array();
        while ($data = $result->fetch_assoc())
        {
            $list[] = $data;
        }

        return $list;
    }
}
?>
