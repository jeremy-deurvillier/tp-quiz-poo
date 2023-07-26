<?php

class Answer {

    private string $label;
    public const BONNE_REPONSE = true;

    public function __construct(string $answer, bool $isCorrect = false) {
        $this->setLabel($answer);
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

}

?>
