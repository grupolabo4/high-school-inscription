<?php 
class Careers extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM careers LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {

        $this->validateID($id);

        $this->db->query("SELECT * FROM careers WHERE id_career = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function updateName($id, $name) {

        $this->validateID($id);
        $this->validateString($name, 50);

        $name = $this->db->escape($name);

        $this->db->query("UPDATE careers SET name = '$name' WHERE id_career = $id");
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