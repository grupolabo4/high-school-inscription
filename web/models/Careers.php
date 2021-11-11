<?php 
class Careers extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM careers LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM careers WHERE id_career = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function updateName($id, $name) {
        $this->db->query("UPDATE careers SET name = '$name' WHERE id_career = $id");
    }

    public function validateID($id) {
        if ( !isset($id) ) die ("El campo no existe");
        if ( !ctype_digit($id) ) die("Tiene que ser un numero");
        if ( $id < 1 ) die("Tiene que ser mayor a 0");

        $aux = $this->getById($id);
        if ( count($aux) != 1 ) die("La carrera no existe");

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