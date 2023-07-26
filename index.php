<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Quiz POO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
<?php

require_once('utils/autoload.php');

$qcm = new Qcm();

$q1 = new Question('POO signifie :');

$q1->AddAnswer(new Answer('PHP Orienté Objet'));
$q1->AddAnswer(new Answer('Programmation Orientée Outils'));
$q1->AddAnswer(new Answer('Papillon Onirique Ostentatoire'));
$q1->AddAnswer(new Answer('Programmation Orientée Objet', Answer::BONNE_REPONSE));

$qcm->addQuestion($q1);

$qcm->generate();

?>
        </div>
    </section>
</body>
</html>
