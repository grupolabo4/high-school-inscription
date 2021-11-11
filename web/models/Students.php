<?php 

class Students extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM students LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
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

    public function validateID($id) {
        if ( !isset($id) ) die ("El campo no existe");
        if ( !ctype_digit($id) ) die("Tiene que ser un numero");
        if ( $id < 1 ) die("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) die("El estudiante no existe");

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