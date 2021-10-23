<?php 
class Careers extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM careers LIMIT 50");
        return $this->db->fetchAll();
    }
}

$careers = new Careers();
var_dump($careers->getAll());

?>