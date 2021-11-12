<?php 

class Administrators extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM administrators LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {

        $this->validateID($id);

        $this->db->query("SELECT * FROM administrators WHERE id_administrator = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getByEmail($email) {

        $this->validateString($email, 50, 7);
        $aux = $this->db->query("SELECT * FROM administrators WHERE email = '$email' LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("El administrador no existe");

        $this->db->query("SELECT * FROM administrators WHERE email = '$email'");
        return $this->db->fetch();
    }

    public function create($name, $lastname, $email, $password) {
        
        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);

        $name = $this->db->escape($name);
        $lastname = $this->db->escape($lastname);
        $email = $this->db->escape($email);

        $this->db->query("INSERT INTO administrators (name, lastname, email, password)
                            VALUES ('$name', '$lastname', '$email', '$password')");
    }

    public function update($id, $name, $lastname, $email) {
        
        $this->validateID($id);
        $this->validateString($name, 50);
        $this->validateString($lastname, 50);
        $this->validateString($email, 50, 7);

        $name = $this->db->escape($name);
        $lastname = $this->db->escape($lastname);
        $email = $this->db->escape($email);

        $this->db->query("UPDATE administrators 
                            SET name = '$name',
                            lastname = '$lastname',
                            email = '$email'
                            WHERE id_administrator = $id");
    }

    public function deleteById($id) {

        $this->validateID($id);

        $this->db->query("DELETE FROM administrators 
                            WHERE id_administrator = $id");
    }

    public function changePassword($id, $password) {

        $this->validateID($id);
        
        $this->db->query("UPDATE administrators 
                            SET password = '$password'
                            WHERE id_administrator = $id");
    }


    public function validateID($id) {
        if ( !ctype_digit($id) ) throw new ValidationException("Tiene que ser un numero");
        if ( $id < 1 ) throw new ValidationException("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM administrators WHERE id_administrator = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) throw new ValidationException("El administrador no existe");
    }

    public function validateString($str, $max = 10000, $min = 1) {
        if ( strlen($str) < $min ) throw new ValidationException("La longitud minima es: $min");
        if ( substr($str, $max) ) throw new ValidationException("La longitud maxima es: $max");
    }
}

class ValidationException extends Exception {}

?>