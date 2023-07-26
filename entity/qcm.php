<?php

class Qcm {
    private array $questionsList;

    public function __construct() {
        $this->questionsList = [];
    }

    public function addQuestion(Question $question) {
        $this->questionsList[] = $question;
    }

    public function generate() {
        $quiz = '';

        foreach($this->questionsList as $key => $question) {
            $q = '<p>' . $question->getLabel() . '</p>';

            foreach($question->getAnswers() as $answer) {
                $q .= '<button type="submit" name="reponse" value="' . $answer->getLabel()  . '">' . $answer->getLabel()  . '</button>';
            }

            $quiz.= $q;
        }

        echo '<form action="index.php" method="post">' . $quiz . '</form>';
    }
}

?>
