<?php 
class Careers extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM careers LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM careers WHERE id_career = $id");
        return $this->db->fetchAll();
    }

    public function updateName($id, $name) {
        $this->db->query("UPDATE careers SET name = '$name' WHERE id_career = $id");
    }
    
}

?>