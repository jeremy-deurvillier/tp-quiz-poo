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
            $q = '<p>' . $question->getLabel() . '</p>' . PHP_EOL;

            foreach($question->getAnswers() as $aKey => $answer) {
                $q .= '<button type="submit" name="reponse" value="' . $answer->getLabel()  . '" class="btn btn-outline-primary m-2">' . $answer->getLabel()  . '</button>' . PHP_EOL;
            }

            $quiz.= $q;
        }

        echo '<form action="index.php" method="post">' . $quiz . '</form>' . PHP_EOL;
    }
}

?>
