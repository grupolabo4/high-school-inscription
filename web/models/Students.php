<?php 

class Students extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM students LIMIT 50");
        return $this->db->fetchAll();
    }
}

?>