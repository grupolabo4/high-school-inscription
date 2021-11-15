<?php 

require "../exceptions/ValidationException.php";

class Subjects extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM subjects LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getSubjectByCareerId($careerId) {
        
        $this->validateCareerId($careerId);

        $this->db->query("SELECT s.id_subject, name, teacher 
                            FROM subjects s
                            INNER JOIN subjects_careers sc
                            ON s.id_subject = sc.id_subject
                            WHERE sc.id_career = $careerId");
        return $this->db->fetchAll();
    }

    public function getById($id) {

        $this->validateID($id);

        $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function updateSubject($id, $name, $teacher) {

        $this->validateID($id);
        $this->validateString($name, 80);
        $this->validateString($teacher, 50);

        $name = $this->db->escape($name);
        $teacher = $this->db->escape($teacher);

        $this->db->query("UPDATE subjects 
                            SET name = '$name',
                            teacher = '$teacher'
                            WHERE id_subject = $id");
    }

    public function validateID($id) {
        if ( !ctype_digit($id) ) throw new ValidationException("Tiene que ser un numero");
        if ( $id < 1 ) throw new ValidationException("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("La materia no existe");
    }

    public function validateCareerId($id) {
        if ( !ctype_digit($id) ) throw new ValidationException("Tiene que ser un numero");
        if ( $id < 1 ) throw new ValidationException("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM careers WHERE id_career = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("La carrera no existe");
    }

    public function validateString($str, $max = 10000, $min = 1) {
        if ( strlen($str) < $min ) throw new ValidationException("La longitud minima es: $min");
        if ( substr($str, $max) ) throw new ValidationException("La longitud maxima es: $max");
    }
}

?>