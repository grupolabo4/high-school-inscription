<?php 

class Students extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM students LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {

        $this->validateID($id);
        
        $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function create($name, $lastname, $email, $password, $identifier) {

        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);
        $this->validateNumber($identifier);

        $name = $this->db->escape($name);
        $lastname = $this->db->escape($lastname);
        $email = $this->db->escape($email);

        $this->db->query("INSERT INTO students (name, lastname, email, password, identifier)
                            VALUES ('$name', '$lastname', '$email', '$password', '$identifier')");
    }

    public function update($id, $name, $lastname, $email, $identifier) {

        $this->validateID($id);
        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);
        $this->validateNumber($identifier);

        $name = $this->db->escape($name);
        $lastname = $this->db->escape($lastname);
        $email = $this->db->escape($email);

        $this->db->query("UPDATE students 
                            SET name = '$name',
                            lastname = '$lastname',
                            email = '$email',
                            identifier = '$identifier'
                            WHERE id_student = $id");
    }

    public function deleteById($id) {

        $this->validateID($id);

        $this->db->query("DELETE FROM students 
                            WHERE id_student = $id");
    }

    public function changePassword($id, $password) {

        $this->validateID($id);

        $this->db->query("UPDATE students 
                            SET password = '$password'
                            WHERE id_student = $id");
    }

    public function validateNumber($num) {
        if ( !ctype_digit($num) ) throw new ValidationException("Tiene que ser un numero");
        if ( $num < 1 ) throw new ValidationException("Tiene que ser mayor a 0");
    }

    public function validateID($id) {
        if ( !ctype_digit($id) ) throw new ValidationException("Tiene que ser un numero");
        if ( $id < 1 ) throw new ValidationException("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("El estudiante no existe");
    }

    public function validateString($str, $max = 10000, $min = 1) {
        if ( strlen($str) < $min ) throw new ValidationException("La longitud minima es: $min");
        if ( substr($str, $max) ) throw new ValidationException("La longitud maxima es: $max");
    }
}

class ValidationException extends Exception {}

?>