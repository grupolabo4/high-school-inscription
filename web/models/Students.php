<?php 

class Students extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM students LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM students WHERE id_student = $id");
        return $this->db->fetchAll();
    }

    public function update($id, $name, $lastname, $email, $identifier) {
        $this->db->query("UPDATE students 
                            SET name = '$name',
                            lastname = '$lastname',
                            email = '$email',
                            identifier = '$identifier'
                            WHERE id_student = $id");
    }
}

?>