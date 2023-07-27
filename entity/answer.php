<?php

class Answer {

    private int $id;
    private string $label;
    private bool $isCorrect;
    public const BONNE_REPONSE = true;

    public function __construct(array $answer)
    {
        $this->hydrate($answer);
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
     * Get isCorrect.
     *
     * @return isCorrect.
     */
    public function getIsCorrect(): Bool
    {
        return $this->isCorrect;
    }
    
    /**
     * Set isCorrect.
     *
     * @param isCorrect the value to set.
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;
    }

    private function hydrate(array $answer)
    {
        if ($answer['id_response']) $this->setId($answer['id_response']);

        if ($answer['response']) $this->setLabel($answer['response']);

        if ($answer['is_correct']) $this->setIsCorrect($answer['is_correct']);
    }
}

?>
