<?php 

require_once "../exceptions/ValidationException.php";

class Students extends Model {
    
    public function getAll() {
        $this->db->query("SELECT s.id_student, s.identifier, s.name, s.lastname, s.email,  c.name as career
                            FROM students s JOIN careers c 
                            on s.id_career = c.id_career LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {

        $this->validateID($id);
        
        $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getByEmail($email) {

        $this->validateString($email, 50, 7);
        $this->db->query("SELECT * FROM students WHERE email = '$email' LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("El estudiante no existe");

        $this->db->query("SELECT * FROM students WHERE email = '$email'");
        return $this->db->fetch();
    }

    public function create($name, $lastname, $email, $password, $identifier, $career) {

        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);
        $this->validateNumber($identifier);
        $this->validateNumber($career);

        $this->db->query("SELECT * FROM students WHERE email = '$email' LIMIT 1");
        if ( $this->db->numRows() == 1 ) throw new ValidationException("El alumno ya existe");

        $this->db->query("SELECT * FROM students WHERE identifier = $identifier LIMIT 1");
        if ( $this->db->numRows() == 1 ) throw new ValidationException("El alumno ya existe");

        $name = $this->db->escape($name);
        $lastname = $this->db->escape($lastname);
        $email = $this->db->escape($email);

        $this->db->query("INSERT INTO students (name, lastname, email, password, identifier, id_career )
                            VALUES ('$name', '$lastname', '$email', '$password', '$identifier', '$career')");
    }

    public function update($id, $name, $lastname, $email, $identifier) {

        $this->validateID($id);
        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);
        $this->validateNumber($identifier);

        $this->db->query("SELECT * FROM students WHERE email = '$email'");
        $aux = $this->db->fetch();
        if ( $this->db->numRows() != 0 && $aux["id_student"] != $id ) throw new ValidationException("Ya existe un alumno con ese email");

        $this->db->query("SELECT * FROM students WHERE identifier = $identifier");
        $aux = $this->db->fetch();
        if ( $this->db->numRows() != 0 && $aux["id_student"] != $id ) throw new ValidationException("Ya existe un alumno con ese legajo");

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
        $this->validateNumber($id);

        $aux = $this->db->query("SELECT * FROM students WHERE id_student = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("El alumno no existe");
    }

    public function validateString($str, $max = 10000, $min = 1) {
        if ( strlen($str) < $min ) throw new ValidationException("La longitud minima es: $min");
        if ( substr($str, $max) ) throw new ValidationException("La longitud maxima es: $max");
    }
}
?>