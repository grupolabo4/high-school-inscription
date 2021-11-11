<?php 

class Subjects extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM subjects LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getSubjectByCareerId($careerId) {
        $this->db->query("SELECT s.id_subject, name, teacher 
                            FROM subjects s
                            INNER JOIN subjects_careers sc
                            ON s.id_subject = sc.id_subject
                            WHERE sc.id_career = $careerId");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function updateSubject($id, $name, $teacher) {
        $this->db->query("UPDATE subjects 
                            SET name = '$name',
                            teacher = '$teacher'
                            WHERE id_subject = $id");
    }

    public function validateID($id) {
        if ( !isset($id) ) die ("El campo no existe");
        if ( !ctype_digit($id) ) die("Tiene que ser un numero");
        if ( $id < 1 ) die("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) die("La materia no existe");

        return $id;
    }

    public function validateString($str, $max = 10000, $min = 1) {
        if ( !isset($str) ) die ("El campo no existe");
        if ( strlen($str) < $min ) die ("La longitud minima es: $min");
        if ( substr($str, $max) ) die ("La longitud maxima es: $max");

        return $this->db->escape($str);
    }
}

?>