<?php

class Question {

    private int $id;
    private string $label;
    private array $answers;

    public function __construct(array $question)
    {
        $this->answers = [];

        $this->hydrate($question);
    }

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId(): Int
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

     /**
      * Get label.
      *
      * @return label.
      */
     public function getLabel(): String
     {
         return $this->label;
     }
     
     /**
      * Set label.
      *
      * @param label the value to set.
      */
     public function setLabel($label)
     {
         $this->label = $label;
     }

     /**
      * Get answers.
      *
      * @return answers.
      */
     public function getAnswers(): Array
     {
         return $this->answers;
     }

     public function addAnswer(Answer $answer)
     {
        $this->answers[] = $answer;
    }

     private function hydrate($question)
     {
         if ($question['id_question']) $this->setId($question['id_question']);

         if ($question['question']) $this->setLabel($question['question']);
     }

}

?>
