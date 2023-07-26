<?php

class QcmRepository {

    private PDO $db;
    private Qcm $qcm;

    public function __construct($db) {
        $this->setDb($db);
        $this->setQcm(new Qcm());

        $this->generateNewQcm();
    }
    
    /**
     * Get db.
     *
     * @return db.
     */
    public function getDb()
    {
        return $this->db;
    }
    
    /**
     * Set db.
     *
     * @param db the value to set.
     */
    private function setDb($db)
    {
        $this->db = $db;
    }
     
     /**
      * Get qcm.
      *
      * @return qcm.
      */
     public function getQcm()
     {
         return $this->qcm;
     }
     
     /**
      * Set qcm.
      *
      * @param qcm the value to set.
      */
     public function setQcm($qcm)
     {
         $this->qcm = $qcm;
     }

     private function getAllQuestions() {
        $query = $this->getDb()->query('SELECT * FROM questions;');

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }

     private function getAllAnswersByQuestion(int $question) {
        $query = $this->getDb()->prepare('SELECT * FROM responses WHERE question_id = :id;');
        $query->bindValue(':id', $question, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }

     private function generateNewQcm() {
        $aq = $this->getAllQuestions();

        shuffle($aq);

        for ($item = 0; $item <= 7; $item ++) {
            $q = new Question($aq[$item]);

            $ar = $this->getAllAnswersByQuestion($aq[$item]['id_question']);

            shuffle($ar);

            for ($index = 0; $index <= 3; $index ++) {
                $q->addAnswer(new Answer($ar[$index]));
            }

            $this->getQcm()->addQuestion($q);
        }
     }
}

?>
