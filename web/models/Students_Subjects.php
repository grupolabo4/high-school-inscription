<?php 

require_once "../exceptions/ValidationException.php";

class Students_Subjects extends Model {
    

    public function getById($id) {
        $this->validateID($id);
        $this->db->query("SELECT ss.id, s.name, ss.status, ss.value1, ss.value2 FROM `students_subjects` as ss join subjects as s on ss.id_subject = s.id_subject where ss.id_student = $id");
        return $this->db->fetchAll();
    }

    public function getOneById($id) {
        $this->validateID($id);
        $this->db->query("SELECT ss.name, ss.status, ss.value1, ss.value2 FROM `students_subjects` as ss join subjects as s on ss.id_subject = s.id_subject where ss.id_student = $id");
        return $this->db->fetchAll();
    }
    public function updateValue1($id, $value) {

        $this->validateID($id);
      // falta agregar validacion de la nota 

        $name = $this->db->escape($name);

        $this->db->query("UPDATE students_subjects SET value1 = '$value' WHERE id = $id");
    }

    public function updateValue2($id, $value) {

        $this->validateID($id);
         // falta agregar validacion de la nota 

        $name = $this->db->escape($name);

        $this->db->query("UPDATE students_subjects SET value2 = '$value' WHERE id = $id");
    }   
    
    public function updateStatus($id, $s) {

        $this->validateID($id);
        $name = $this->db->escape($name);

        $this->db->query("UPDATE students_subjects SET status = '$s' WHERE id = $id");
    }    




    public function validateID($id) {
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