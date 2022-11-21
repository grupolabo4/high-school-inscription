<?php

require_once "../exceptions/ValidationException.php";

class Subjects extends Model
{

    public function getAll()
    {
        $this->db->query("SELECT * FROM subjects LIMIT 50");
        return $this->db->fetchAll();
    }

    public function getSubjectByCareerId($careerId)
    {

        $this->validateCareerId($careerId);

        $this->db->query("SELECT s.id_subject, s.name, CONCAT(t.name, ' ', t.lastname) AS teacher
                            FROM subjects s
                            INNER JOIN subjects_careers sc
                            ON s.id_subject = sc.id_subject
                            INNER JOIN teachers t
                            ON s.id_teacher = t.id_teacher
                            WHERE sc.id_career = $careerId");
        return $this->db->fetchAll();
    }

    public function getSubjectsAndStatusByStudentId($studentId)
    {
        $this->validateStudentId($studentId);

        $this->db->query("SELECT s.id_subject, s.name, sb.status
                            FROM students_subjects sb, subjects s
                            WHERE sb.id_student = $studentId
                            AND s.id_subject = sb.id_subject");
        return $this->db->fetchAll();
    }

    public function getById($id)
    {

        $this->validateID($id);

        $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getByName($name)
    {

        $this->validateString($name, 80);
        $name = $this->db->escape($name);

        $this->db->query("SELECT * FROM subjects WHERE name = '$name' LIMIT 1");
        return $this->db->fetch();
    }

    public function create($name, $teacher)
    {

        $this->validateString($name, 80);
        $this->validateString($teacher, 50);

        $aux = $this->db->query("SELECT * FROM subjects WHERE name = '$name' LIMIT 1");
        if ($this->db->numRows() == 1) throw new ValidationException("La materia ya existe");

        $name = $this->db->escape($name);
        $teacher = $this->db->escape($teacher);

        $this->db->query("INSERT INTO subjects (name, teacher)
                            VALUES ('$name', '$teacher')");
    }

    public function updateSubject($id, $name, $teacher)
    {

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

    public function deleteById($id)
    {

        $this->validateID($id);

        $this->db->query("DELETE FROM subjects 
                            WHERE id_subject = $id");
    }

    public function enrollToSubject($studentId, $subjectId)
    {
        $this->validateStudentId($studentId);
        $this->validateID($subjectId);

        $studentId = $this->db->escape($studentId);
        $subjectId = $this->db->escape($subjectId);

        $this->db->query("INSERT INTO students_subjects
                            (id_student, id_subject, status)
                            VALUES ('$studentId', '$subjectId', 'Inscripto')");
    }

    public function approveSubjectToStudent($studentId, $subjectId)
    {
        $this->validateStudentId($studentId);
        $this->validateID($subjectId);

        $studentId = $this->db->escape($studentId);
        $subjectId = $this->db->escape($subjectId);

        $this->db->query("UPDATE students_subjects
                            SET status = 'Aprobado'
                            WHERE id_student = $studentId 
                            AND id_subject = $subjectId");
    }

    public function validateID($id)
    {
        if (!ctype_digit($id)) throw new ValidationException("Tiene que ser un numero");
        if ($id < 1) throw new ValidationException("Tiene que ser mayor a 0");

        $aux = $this->db->query("SELECT * FROM subjects WHERE id_subject = $id LIMIT 1");
        if ($this->db->numRows() != 1) throw new ValidationException("La materia no existe");
    }

    public function validateStudentId($id)
    {
        $students = new Students();
        $students->validateID($id);
    }

    public function validateCareerId($id)
    {
        $careers = new Careers();
        $careers->validateID($id);
    }

    public function validateString($str, $max = 10000, $min = 1)
    {
        if (strlen($str) < $min) throw new ValidationException("La longitud minima es: $min");
        if (substr($str, $max)) throw new ValidationException("La longitud maxima es: $max");
    }
}
