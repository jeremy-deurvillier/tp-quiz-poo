<?php

class Question {

    private string $label;
    private array $answers;

    public function __construct(string $question) {
        $this->answers = [];

        $this->setLabel($question);
    }

     /**
      * Get label.
      *
      * @return label.
      */
     public function getLabel()
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
     public function getAnswers()
     {
         return $this->answers;
     }

    public function addAnswer(Answer $answer) {
        $this->answers[] = $answer;
    }
     
}

?>
