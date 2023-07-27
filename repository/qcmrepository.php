<?php

class QcmRepository {

    private PDO $db;
    private Qcm $qcm;

    public function __construct($db)
    {
        $this->setDb($db);
        $this->setQcm(new Qcm());

        $this->generateNewQcm();
    }
    
    /**
     * Get db.
     *
     * @return db.
     */
    public function getDb(): PDO
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
     public function getQcm(): Qcm
     {
         return $this->qcm;
     }
     
     /**
      * Set qcm.
      *
      * @param qcm the value to set.
      */
     private function setQcm($qcm)
     {
         $this->qcm = $qcm;
     }

     private function getAllQuestions(): Array
     {
        $query = $this->getDb()->query('SELECT * FROM questions;');

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }

     private function getGoodAnswersByQuestion(int $question): Array
     {
        $query = $this->getDb()->prepare('SELECT * FROM responses WHERE question_id = :id AND is_correct IS true;');
        $query->bindValue(':id', $question, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }

     private function getBadsAnswersByQuestion(int $question): Array
     {
        $query = $this->getDb()->prepare('SELECT * FROM responses WHERE question_id = :id AND is_correct IS false;');
        $query->bindValue(':id', $question, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }

     private function generateNewQcm()
     {
        $aq = $this->getAllQuestions();

        shuffle($aq);

        for ($item = 0; $item <= 7; $item ++) {
            $q = new Question($aq[$item]);

            $cr = $this->getGoodAnswersByQuestion($aq[$item]['id_question']);
            $ir = $this->getBadsAnswersByQuestion($aq[$item]['id_question']);

            shuffle($ir);

            array_pop($ir);
            array_push($ir, $cr[0]);

            shuffle($ir);

            for ($index = 0; $index <= 3; $index ++) {
                if ($ir[$index]['is_correct']) {
                    $q->addAnswer(new Answer($ir[$index], Answer::BONNE_REPONSE));
                } else {
                    $q->addAnswer(new Answer($ir[$index]));
                }
            }

            $this->getQcm()->addQuestion($q);
        }
     }
}

?>
