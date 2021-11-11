<?php 

class Administrators extends Model {
    
    public function getAll() {
        $this->db->query("SELECT * FROM administrators LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM administrators WHERE id_administrator = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getByEmail($email) {
        $this->db->query("SELECT * FROM administrators WHERE email = '$email'");
        return $this->db->fetch();
    }

    public function create($name, $lastname, $email, $password) {
        // TODO obtener administradores y chequear que no exista el email sino explotar con exepcion
        $this->db->query("INSERT INTO administrators (name, lastname, email, password)
                            VALUES ('$name', '$lastname', '$email', '$password')");
    }

    public function update($id, $name, $lastname, $email) {
        $this->db->query("UPDATE administrators 
                            SET name = '$name',
                            lastname = '$lastname',
                            email = '$email'
                            WHERE id_administrator = $id");
    }

    public function deleteById($id) {
        $this->db->query("DELETE FROM administrators 
                            WHERE id_administrator = $id");
    }

    public function changePassword($id, $password) {
        $this->db->query("UPDATE administrators 
                            SET password = '$password'
                            WHERE id_administrator = $id");
    }


    public function validateID($id) {
        if ( !isset($id) ) die ("El campo no existe");
        if ( !ctype_digit($id) ) die("Tiene que ser un numero");
        if ( $id < 1 ) die("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM administrators WHERE id_administrator = $id LIMIT 1");
        if ( $this->db->numRows() != 1 ) die("El administrador no existe");

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