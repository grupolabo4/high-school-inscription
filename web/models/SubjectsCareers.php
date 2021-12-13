<?php 

require_once "../exceptions/ValidationException.php";
require_once "Careers.php";

class SubjectsCareers extends Model {

  public function create($subjectId, $careerId) {

    $this->validateSubjectId($subjectId);
    $this->validateCareerId($careerId);

    $this->db->query("INSERT INTO subjects_careers (id_subject, id_career)
                      VALUES ('$subjectId', '$careerId')");
  }

  public function deleteBySubjectId($id) {

    $this->validateSubjectId($id);

    $this->db->query("DELETE FROM subjects_careers 
                        WHERE id_subject = $id");
}

  public function validateCareerId($id) {
    $careers = new Careers();
    $careers->validateID($id);
  }

  public function validateSubjectId($id) {
    $subjects = new Subjects();
    $subjects->validateID($id);
  }
}


?>