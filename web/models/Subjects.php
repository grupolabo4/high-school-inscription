<?php 

class Subjects extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM subjects LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getSubjectByCareerId($careerId) {
        // TODO validar parametro
        $this->db->query("SELECT s.id_subject, name, teacher 
                            FROM subjects s
                            INNER JOIN subjects_careers sc
                            ON s.id_subject = sc.id_subject
                            WHERE sc.id_career = $careerId");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM subjects WHERE id_subject = $id");
        return $this->db->fetchAll();
    }

    public function updateSubject($id, $name, $teacher) {
        $this->db->query("UPDATE subjects 
                            SET name = '$name',
                            teacher = '$teacher'
                            WHERE id_subject = $id");
    }
}

?>